import torch
import torch.nn as nn
import torch.nn.functional as F

import math

class Focal_Loss(nn.Module):
    def __init__(self, loss_fcn, gamma=1.5, alpha=0.25):
        super().__init__()
        self.loss_fcn = loss_fcn  # e.g. nn.BCEWithLogitsLoss()
        self.gamma = gamma
        self.alpha = alpha
        self.reduction = loss_fcn.reduction
        self.loss_fcn.reduction = 'none'

    def forward(self, pred, true):
        loss = self.loss_fcn(pred, true)
        pred_prob = torch.sigmoid(pred)
        p_t = true * pred_prob + (1 - true) * (1 - pred_prob)
        alpha_factor = true * self.alpha + (1 - true) * (1 - self.alpha)
        modulating_factor = (1.0 - p_t) ** self.gamma
        loss *= alpha_factor * modulating_factor

        if self.reduction == 'mean':
            return loss.mean()
        elif self.reduction == 'sum':
            return loss.sum()
        else:
            return loss
            

class SlideLoss(nn.Module):
    def __init__(self, loss_fcn):
        super(SlideLoss, self).__init__()
        self.loss_fcn = loss_fcn
        self.reduction = loss_fcn.reduction
        self.loss_fcn.reduction = 'none'  # required to apply SL to each element
 
    def forward(self, pred, true, auto_iou=0.5):
        loss = self.loss_fcn(pred, true)
        if auto_iou < 0.2:
            auto_iou = 0.2
        b1 = true <= auto_iou - 0.1
        a1 = 1.0
        b2 = (true > (auto_iou - 0.1)) & (true < auto_iou)
        a2 = math.exp(1.0 - auto_iou)
        b3 = true >= auto_iou
        a3 = torch.exp(-(true - 1.0))
        modulating_weight = a1 * b1 + a2 * b2 + a3 * b3
        loss *= modulating_weight
        if self.reduction == 'mean':
            return loss.mean()
        elif self.reduction == 'sum':
            return loss.sum()
        else:  # 'none'
            return loss


class Dice_Loss(nn.Module):
    def __init__(self):
        super().__init__()

    def forward(self, pred, mask):
        pred = torch.sigmoid(pred)
        smooth = 1e-5
        inter = (pred * mask).sum(dim=(1, 2, 3))
        union = pred.sum(dim=(1, 2, 3)) + mask.sum(dim=(1, 2, 3))
        dice = 1 - (2 * inter + smooth) / (union + smooth)
        return dice.mean()

class MultiModalContrastiveLoss(nn.Module):
    def __init__(self,
                 focal_weight=0.45,
                 dice_weight=0.3,
                 bce_weight=0.2,
                 slide_weight=0.05,
                 gamma=1.5,
                 alpha=0.25,
                 auto_iou=0.6,
                 resize_mask=True):
        super(MultiModalContrastiveLoss,self).__init__()
        self.focal_weight = focal_weight
        self.dice_weight = dice_weight
        self.bce_weight = bce_weight
        self.slide_weight = slide_weight
        self.resize_mask = resize_mask
        self.auto_iou = auto_iou

        self.bce = nn.BCEWithLogitsLoss()
        self.focal = Focal_Loss(nn.BCEWithLogitsLoss(reduction='none'), gamma=gamma, alpha=alpha)
        self.dice = Dice_Loss()
        self.slide = SlideLoss(nn.BCEWithLogitsLoss(reduction='mean'))

    def forward(self, pred, mask):
        # 自动调整尺寸（一般mask为标签）
        if self.resize_mask and pred.shape[-2:] != mask.shape[-2:]:
            mask = F.interpolate(mask, size=pred.shape[-2:], mode='nearest').detach()

        loss_focal = self.focal(pred, mask)
        loss_dice = self.dice(pred, mask)
        loss_bce = self.bce(pred, mask)
        loss_slide = self.slide(pred, mask, auto_iou=self.auto_iou)
        
        

        total_loss = (self.focal_weight * loss_focal +
                      self.dice_weight * loss_dice +
                      self.bce_weight * loss_bce+
                      self.slide_weight * loss_slide)
                      
        return total_loss.mean(), loss_focal.mean().detach(), loss_dice.mean().detach(), loss_bce.mean().detach(),loss_slide.mean().detach()

                      
        #return total_loss, loss_focal.detach(), loss_dice.detach(), loss_bce.detach()

        