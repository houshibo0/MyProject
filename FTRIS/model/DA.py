from typing import Tuple, Union, List, Any
import math
import numpy as np
import torch
import torch.nn.functional as F
from torch import nn, Tensor

class BasicConv2d(nn.Module):
    def __init__(self, in_channels: int, out_channels: int, **kwargs: Any) -> None:
        super().__init__()
        self.conv = nn.Conv2d(in_channels, out_channels, bias=True, **kwargs)
        self.bn = nn.BatchNorm2d(out_channels, eps=0.001)

    def forward(self, x: Tensor) -> Tensor:
        x = self.conv(x)
        x = self.bn(x)
        return F.relu(x, inplace=True)
        
class CrossModalAttention(nn.Module):
    def __init__(self, image_dim, text_dim, embed_dim, num_heads, dropout=0.1):
        super(CrossModalAttention, self).__init__()
        self.multihead_attn = nn.MultiheadAttention(embed_dim, num_heads, dropout=dropout)
        
        self.image_proj = nn.Linear(image_dim, embed_dim)
        self.text_proj = nn.Linear(text_dim, embed_dim)

        self.back_proj = nn.Linear(embed_dim, image_dim)
        
    def forward(self, image_features, text_features, attention_mask=None):


        image_features = self.image_proj(image_features)
        text_features = self.text_proj(text_features)

        query = image_features.permute(1, 0, 2)
        key = text_features.permute(1, 0, 2)
        value = text_features.permute(1, 0, 2)
        
        attn_output, _ = self.multihead_attn(query, key, value, attn_mask=attention_mask)
        
        attn_output = self.back_proj(attn_output)
        
        return attn_output.permute(1, 0, 2)

class DenseAligner1(nn.Module):
    def __init__(
        self,
        fc_in_channels: int,
        in_channels: int,
        ch1x1: int,
        ch3x3red: int,
        ch3x3: int,
        ch5x5red: int,
        ch5x5: int,
        skip_connect=False,
        embed_dim=128,
        num_heads=8,
        text_dim=512,
    ):
        super().__init__()
        self.skip_connect = skip_connect

        conv_block = BasicConv2d

        # ===== dense conv branches =====
        self.dense_branch1 = conv_block(in_channels, ch1x1, kernel_size=1)

        self.dense_branch2 = nn.Sequential(
            conv_block(in_channels + ch1x1, ch3x3red, kernel_size=1),
            conv_block(ch3x3red, ch3x3, kernel_size=3, padding=1),
        )

        self.dense_branch3 = nn.Sequential(
            conv_block(in_channels + ch1x1 + ch3x3, ch5x5red, kernel_size=1),
            conv_block(ch5x5red, ch5x5, kernel_size=5, padding=2),
        )

        # ===== token projection =====
        self.D_fc1 = nn.Linear(fc_in_channels, in_channels)
        self.D_fc2 = nn.Linear(in_channels, fc_in_channels)

        # ===== cross-modal attention =====
        self.cross = CrossModalAttention(
            image_dim=in_channels,
            text_dim=text_dim,
            embed_dim=embed_dim,
            num_heads=num_heads,
        )

        self._initialize_weights()

    def _initialize_weights(self):
        for module in self.modules():
            if isinstance(module, nn.Conv2d):
                nn.init.kaiming_normal_(module.weight, nonlinearity="relu")
                if module.bias is not None:
                    nn.init.constant_(module.bias, 0)
            elif isinstance(module, nn.Linear):
                nn.init.kaiming_normal_(module.weight, nonlinearity="relu")
                if module.bias is not None:
                    nn.init.constant_(module.bias, 0)

    def forward(
        self,
        x: Tensor,                # [B, 1+H*W, C]
        text_features: Tensor,    # [B, L, D_txt]
        hw_shape: Tuple[int, int],
        split_token: int = 1,
    ) -> Tensor:

        # ===== project token =====
        x0 = self.D_fc1(x)        # [B, P, C']
        B, P, C = x0.shape
        H, W = hw_shape

        # ===== split spatial tokens =====
        xs = x0[:, split_token:, :]      # [B, H*W, C]
        assert xs.shape[1] == H * W, \
            f"Token num {xs.shape[1]} != H*W {H*W}"

        # ===== token -> feature map =====
        xs = xs.reshape(B, H, W, C).permute(0, 3, 1, 2)  # [B, C, H, W]

        # ===== dense conv =====
        d1 = self.dense_branch1(xs)
        d2 = self.dense_branch2(torch.cat([xs, d1], dim=1))
        d3 = self.dense_branch3(torch.cat([xs, d1, d2], dim=1))

        fused = torch.cat([d1, d2, d3], dim=1)
        fused = fused + xs

        # ===== feature map -> token =====
        fused = fused.flatten(2).permute(0, 2, 1)  # [B, H*W, C]

        # ===== cross-modal attention =====
        fused = self.cross(fused, text_features)

        # ===== concat cls token =====
        cls_token = x0[:, :split_token, :]
        out = torch.cat([cls_token, fused], dim=1)

        # ===== residual =====
        out = out + x0

        # ===== back projection =====
        out = self.D_fc2(out)

        if self.skip_connect:
            out = out + x

        return out


class DenseAligner(nn.Module):
    def __init__(self, d_model=64, nhead=8, ff_dim=128, dropout=0.1):
        super().__init__()

        # 自注意力
        self.v_self_attn = nn.MultiheadAttention(d_model, nhead, dropout=dropout)
        self.t_self_attn = nn.MultiheadAttention(d_model, nhead, dropout=dropout)

        # 跨模态注意力
        self.v_cross_attn = nn.MultiheadAttention(d_model, nhead, dropout=dropout)
        self.t_cross_attn = nn.MultiheadAttention(d_model, nhead, dropout=dropout)

        # FFN
        self.ff_v = nn.Sequential(
            nn.Linear(d_model, ff_dim),
            nn.ReLU(inplace=True),
            nn.Linear(ff_dim, d_model)
        )
        self.ff_t = nn.Sequential(
            nn.Linear(d_model, ff_dim),
            nn.ReLU(inplace=True),
            nn.Linear(ff_dim, d_model)
        )

        # LayerNorm
        self.norm_v1 = nn.LayerNorm(d_model)
        self.norm_v2 = nn.LayerNorm(d_model)
        self.norm_v3 = nn.LayerNorm(d_model)

        self.norm_t1 = nn.LayerNorm(d_model)
        self.norm_t2 = nn.LayerNorm(d_model)
        self.norm_t3 = nn.LayerNorm(d_model)

        self.drop = nn.Dropout(dropout)

    def forward(self, V, T):
        """
        V: [HW, B, d_model]
        T: [L,  B, d_model]
        """

        # -------- self-attn --------
        V2 = self.v_self_attn(V, V, V)[0]
        V = self.norm_v1(V + self.drop(V2))

        T2 = self.t_self_attn(T, T, T)[0]
        T = self.norm_t1(T + self.drop(T2))

        # -------- cross-attn --------
        V2 = self.v_cross_attn(V, T, T)[0]
        V = self.norm_v2(V + self.drop(V2))

        T2 = self.t_cross_attn(T, V, V)[0]
        T = self.norm_t2(T + self.drop(T2))

        # -------- FFN --------
        V2 = self.ff_v(V)
        V = self.norm_v3(V + self.drop(V2))

        T2 = self.ff_t(T)
        T = self.norm_t3(T + self.drop(T2))

        return V, T
