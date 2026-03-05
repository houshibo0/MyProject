<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$gonghao=$_POST["gonghao"];$xingming=$_POST["xingming"];$nianling=$_POST["nianling"];$shenfenzheng=$_POST["shenfenzheng"];$dianhua=$_POST["dianhua"];$youxiang=$_POST["youxiang"];$zhaopian=$_POST["zhaopian"];$zhuyaozhize=$_POST["zhuyaozhize"];$ruzhishijian=$_POST["ruzhishijian"];$xingbie=$_POST["xingbie"];$beizhu=$_POST["beizhu"];
	$sql="insert into yuangongxinxi(gonghao,xingming,nianling,shenfenzheng,dianhua,youxiang,zhaopian,zhuyaozhize,ruzhishijian,xingbie,beizhu) values('$gonghao','$xingming','$nianling','$shenfenzheng','$dianhua','$youxiang','$zhaopian','$zhuyaozhize','$ruzhishijian','$xingbie','$beizhu') ";
	mysql_query($sql);
	echo "<script>javascript:alert('添加成功!');location.href='yuangongxinxi_add.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>员工信息</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>
<script language="javascript">
	
	
	function OpenScript(url,width,height)
{
  var win = window.open(url,"SelectToSort",'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes' );
}
	function OpenDialog(sURL, iWidth, iHeight)
{
   var oDialog = window.open(sURL, "_EditorDialog", "width=" + iWidth.toString() + ",height=" + iHeight.toString() + ",resizable=no,left=0,top=0,scrollbars=no,status=no,titlebar=no,toolbar=no,menubar=no,location=no");
   oDialog.focus();
}
</script>
<body>
<p>添加员工信息： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.gonghao.value==""){alert("请输入工号");document.form1.gonghao.focus();return false;}if(document.form1.xingming.value==""){alert("请输入姓名");document.form1.xingming.focus();return false;}if(document.form1.mima.value==""){alert("请输入密码");document.form1.mima.focus();return false;}if(document.form1.shenfenzheng.value==""){alert("请输入身份证");document.form1.shenfenzheng.focus();return false;}if(document.form1.dianhua.value==""){alert("请输入电话");document.form1.dianhua.focus();return false;}
}
	function gow()
	{
		location.href='peixunccccailiao_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value;
	}
</script>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>工号：</td><td><input name='gonghao' type='text' id='gonghao' value='' />&nbsp;*</td></tr><tr><td>姓名：</td><td><input name='xingming' type='text' id='xingming' value='' />&nbsp;*</td></tr><tr><td>年龄：</td><td><input name='nianling' type='text' id='nianling' value='' />&nbsp;*</td></tr><tr><td>身份证：</td><td><input name='shenfenzheng' type='text' id='shenfenzheng' value='' size='50'  />&nbsp;*</td></tr><tr><td>电话：</td><td><input name='dianhua' type='text' id='dianhua' value='' />&nbsp;*</td></tr><tr><td>邮箱：</td><td><input name='youxiang' type='text' id='youxiang' value='' /></td></tr><tr><td>照片：</td><td><input name='zhaopian' type='text' id='zhaopian' value='' size='50'  />&nbsp;<a href="javaScript:OpenScript('upfile.php?Result=zhaopian',460,180)"><img src="Images/Upload.gif" width="30" height="16" border="0" align="absmiddle" /></a></td></tr><tr><td>主要职责：</td><td><input name='zhuyaozhize' type='text' id='zhuyaozhize' value='' size='50'  /></td></tr><tr><td>入职时间：</td><td><input name='ruzhishijian' type='text' id='ruzhishijian' value='' onclick="getDate(form1.ruzhishijian,'2')" need="1" /></td></tr><tr><td>性别：</td><td><select name='xingbie' id='xingbie'><option value="男">男</option><option value="女">女</option></select></td></tr><tr><td>备注：</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu'></textarea></td></tr>

    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="添加" onclick="return check();" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>


