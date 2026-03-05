<?php
session_start();
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
        <td width="83%"><span class=" STYLE1">＋个人资料管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu9">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="yonghuzhuce_updt2.php" target="mainFrame">个人资料管理</a></td>
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
        <td width="83%"><span class=" STYLE1">＋站内新闻</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu1"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="xinwentongzhi_add.php?lb=站内新闻" target="mainFrame">站内新闻添加</a></td>
    </tr>
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="xinwentongzhi_list.php?lb=站内新闻" target="mainFrame">站内新闻查询</a></td>
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
        <td width="83%"><span class=" STYLE1">＋用户管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu2"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="yhzhgl.php" target="mainFrame">系统管理员</a></td>
    </tr>
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="yonghuzhuce_list.php" target="mainFrame">注册用户</a></td>
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
    <td height="28"  background="Images/Admin_left_09.gif" id="menuTitle1" onClick="new Element.toggle('submenu11')" style="cursor:hand;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%"><span class=" STYLE1">＋系统管理</span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="display:none" align="right" id="submenu11"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/gr.gif">
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="databack.php" target="mainFrame">数据备份</a></td>
    </tr>
    <tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="liuyanban_list.php" target="mainFrame">留言管理</a></td>
    </tr>
	<tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="youqinglianjie_add.php" target="mainFrame">友情连接添加</a></td>
    </tr>
	<tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="youqinglianjie_list.php" target="mainFrame">友情连接添加</a></td>
    </tr>
	<tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="dx.php?lb=系统公告" target="mainFrame">系统公告设置</a></td>
    </tr>
	<tr>
      <td width="36" height="22"></td>
      <td class="SystemLeft"><a href="dx.php?lb=系统公告" target="mainFrame">系统简介设置</a></td>
    </tr>
  </table>
    </td>
  </tr>
</table>


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
      <td class=" STYLE3">学校：xxxxx</td>
    </tr>
  </table>
    </td>
  </tr>
</table>
</BODY>
</HTML>

