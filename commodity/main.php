<?php
session_start();

?><head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>百货商品信息管理平台</title>
<link rel="stylesheet" type="text/css" href="images/style.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/manager.js"></script>
<style type="text/css">
<!--

.STYLE7x {color: #FFFFFF;font-size: 12px}
.STYLE4 {font-size: 12px}
.STYLE5 {color: #CCFFCC;
	font-size: 26pt;
}
-->
</style>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" >
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" >
	
<tbody>
		<tr height="126">
			<td height="126" colspan="3" width="100%" ><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="__01">
              <tr>
                <td background="images/1_01_01.jpg" height="50"><table width="100%" height="54" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="7%" height="54" align="center">&nbsp;</td>
                    <td width="46%"><div style="font-family:宋体; color:#FFFFFF; filter:Glow(Color=#000000,Strength=2); WIDTH: 100%; FONT-WEIGHT: bold; FONT-SIZE: 19pt; margin-top:5pt">
                        <div align="left" class="STYLE5">百货商品信息管理平台</div>
                    </div></td>
                    <td width="47%"><table width="240" border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="37%" height="40">&nbsp;</td>
                          <td width="31%">&nbsp;</td>
                          <td width="32%">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center"><a href="sy.php" target="mainFrame"><span class="STYLE7x">桌面</span></a></td>
                          <td align="center"><a href="#" onClick="javascript:alert('无');"><span class="STYLE7x">帮助</span></a></td>
                          <td align="center"><a href="logout.php" target="_parent"><span class="STYLE7x">退出</span></a></td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td background="images/1_01_02.jpg" height="55" ><table width="90%" height="28" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="15%" align="center"><span class="STYLE4"><img src="images/siteico.gif">当前用户：<?php echo $_SESSION['username']?><br>
                    <img src="images/document.gif">权限：<?php echo $_SESSION['username']?></span></td>
                    <td width="85%">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
		</tr>
		
		<tr>
			<td width="190" align="middle" valign="top" id="mainLeft" style="background:#FFF;" height="100%"><IFRAME 
      style="Z-INDEX:2; VISIBILITY:inherit; WIDTH:190; HEIGHT:100%" 
      name="leftFrame" id="leftFrame"  marginWidth="0" marginHeight="0"
      src="mygo.php" frameBorder="0"  >
	</IFRAME></td>
			<td width="9" valign="middle" style="width:8px;background:url(images/main_cen_bg.gif) repeat-x;"><div id="sysBar" style="cursor:pointer;"><img id="barImg" src="images/butClose.gif" alt="关闭/打开左栏" /></div></td>
			<td width="100%" valign="top" style="width:100%"><iframe frameborder="0" id="mainFrame" name="mainFrame" scrolling="yes" src="sy.php" style="height:100%;visibility:inherit; width:100%;"></iframe></td>
		</tr>
		<tr>
			<td height="28" colspan="3" bgcolor="#EBF5FC" style="padding:0px 10px; font-size:12px;color:#2C89AD;background:url(images/foot_bg.gif) repeat-x;">
			百货商品信息管理平台 当前日期：<?php echo date("Y-m-d");?>			</td>
		</tr>
  </tbody>
</table>
</body>
</html>
