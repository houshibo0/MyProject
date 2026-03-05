<?php
session_start();
error_reporting(0); 
date_default_timezone_set("PRC");
?>
<HTML>
<HEAD>
<TITLE>后台管理导航</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />

<link rel="stylesheet" href="images/CssAdmin.css">
<script src="images/prototype.js"></script>


<style type="text/css">
<!--
.STYLE1 {
	color: #FFFFFF;
	font-weight: bold;
}
body {
	background-image: url(images/ffef.gif);
}
.STYLE3 {color: #0000FF}
-->
</style>
</HEAD>

<BODY>
<table cellpadding="0" cellspacing="0" width="189" align="center">
  <tr>
    <td height="28"  background="Images/Admin_left_09.gif" id="menuTitle1" onClick="new Element.toggle('submenu9')" style="cursor:hand;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%"><span class=" STYLE1">＋用户管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu9">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="yhzhgl.php" target="mainFrame">系统管理员</a></td>
    </tr>
   
	<tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="mod.php" target="mainFrame">修改密码</a></td>
    </tr>
  </table>
    
      </td>
  </tr>
</table>
<table cellpadding="0" cellspacing="0" width="189" align="center">
  <tr>
    <td height="28"  background="Images/Admin_left_09.gif" id="menuTitle1" onClick="new Element.toggle('submenu1')" style="cursor:hand;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%"><span class=" STYLE1">＋职工信息管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu1"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="yuangongxinxi_add.php" target="mainFrame">职工信息添加</a></td>
    </tr>
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="yuangongxinxi_list.php" target="mainFrame">职工信息查询</a></td>
    </tr>
	
  </table>
    </td>
  </tr>
</table>
<table cellpadding="0" cellspacing="0" width="189" align="center">
  <tr>
    <td height="28"  background="Images/Admin_left_09.gif" id="menuTitle1" onClick="new Element.toggle('submenu2')" style="cursor:hand;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%"><span class=" STYLE1">＋商品类别管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu2"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="shangpinleibie_add.php" target="mainFrame">商品类别添加</a></td>
    </tr>
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="shangpinleibie_list.php" target="mainFrame">商品类别查询</a></td>
    </tr>
	
  </table>
    </td>
  </tr>
</table>
<table cellpadding="0" cellspacing="0" width="189" align="center">
  <tr>
    <td height="28"  background="Images/Admin_left_09.gif" id="menuTitle1" onClick="new Element.toggle('submenu3')" style="cursor:hand;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%"><span class=" STYLE1">＋商品信息管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu3"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="shangpinxinxi_add.php" target="mainFrame">商品信息添加</a></td>
    </tr>
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="shangpinxinxi_list.php" target="mainFrame">商品信息查询</a></td>
    </tr>
	
  </table>
    </td>
  </tr>
</table>
<table cellpadding="0" cellspacing="0" width="189" align="center">
  <tr>
    <td height="28"  background="Images/Admin_left_09.gif" id="menuTitle1" onClick="new Element.toggle('submenu4')" style="cursor:hand;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%"><span class=" STYLE1">＋进货管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu4"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="shangpinxinxi_list2.php" target="mainFrame">进货登记</a></td>
    </tr>
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="rukujilu_list.php" target="mainFrame">进货记录查看</a></td>
    </tr>
	
  </table>
    </td>
  </tr>
</table>
<table cellpadding="0" cellspacing="0" width="189" align="center">
  <tr>
    <td height="28"  background="Images/Admin_left_09.gif" id="menuTitle1" onClick="new Element.toggle('submenu5')" style="cursor:hand;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%"><span class=" STYLE1">＋销售管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu5"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="shangpinxinxi_list3.php" target="mainFrame">销售登记</a></td>
    </tr>
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="chukujilu_list.php" target="mainFrame">销售记录查看</a></td>
    </tr>
	
  </table>
    </td>
  </tr>
</table>
<table cellpadding="0" cellspacing="0" width="189" align="center">
  <tr>
    <td height="28"  background="Images/Admin_left_09.gif" id="menuTitle1" onClick="new Element.toggle('submenu6')" style="cursor:hand;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%"><span class=" STYLE1">＋库存管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu6"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="shangpinxinxi_list4.php" target="mainFrame">库存预警查询</a></td>
    </tr>
    
  </table>
    </td>
  </tr>
</table>
<table cellpadding="0" cellspacing="0" width="189" align="center">
  <tr>
    <td height="28"  background="Images/Admin_left_09.gif" id="menuTitle1" onClick="new Element.toggle('submenu7')" style="cursor:hand;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%"><span class=" STYLE1">＋供货商管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu7"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="gonghuoshangxinxi_add.php" target="mainFrame">供货商添加</a></td>
    </tr>
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="gonghuoshangxinxi_list.php" target="mainFrame">供货商查询</a></td>
    </tr>
	
  </table>
    </td>
  </tr>
</table>
<

<table cellpadding="0" cellspacing="0" width="189" align="center">
  <tr>
    <td height="28"  background="Images/Admin_left_09.gif" id="menuTitle208"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%"><span class=" STYLE1">系统信息</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="right">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="STYLE3">版权：xxxxx</td>
    </tr>
    <tr>
      <td width="36" height="22"></td>
      <td class="STYLE3">开发时间：<?php echo date("Y-m-d");?>	</td>
    </tr>
	<tr>
      <td width="36" height="22"></td>
      <td class=" STYLE3">学校：周口师范学院</td>
    </tr>
  </table>
    </td>
  </tr>
</table>
</BODY>
</HTML>

