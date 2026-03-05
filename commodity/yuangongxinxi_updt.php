<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{

	$gonghao=$_POST["gonghao"];$xingming=$_POST["xingming"];$nianling=$_POST["nianling"];$shenfenzheng=$_POST["shenfenzheng"];$dianhua=$_POST["dianhua"];$youxiang=$_POST["youxiang"];$zhaopian=$_POST["zhaopian"];$zhuyaozhize=$_POST["zhuyaozhize"];$ruzhishijian=$_POST["ruzhishijian"];$xingbie=$_POST["xingbie"];$beizhu=$_POST["beizhu"];
	$sql="update yuangongxinxi set gonghao='$gonghao',xingming='$xingming',nianling='$nianling',shenfenzheng='$shenfenzheng',dianhua='$dianhua',youxiang='$youxiang',zhaopian='$zhaopian',zhuyaozhize='$zhuyaozhize',ruzhishijian='$ruzhishijian',xingbie='$xingbie',beizhu='$beizhu' where id= ".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');location.href='yuangongxinxi_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改员工信息</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
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
<p>修改员工信息： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql="select * from yuangongxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 

      <tr><td>工号：</td><td><input name='gonghao' type='text' id='gonghao' value='<?php echo mysql_result($query,$i,gonghao);?>' /></td></tr><tr><td>姓名：</td><td><input name='xingming' type='text' id='xingming' value='<?php echo mysql_result($query,$i,xingming);?>' /></td></tr><tr><td>年龄：</td><td><input name='nianling' type='text' id='nianling' value='<?php echo mysql_result($query,$i,nianling);?>' /></td></tr><tr><td>身份证：</td><td><input name='shenfenzheng' type='text' id='shenfenzheng' size='50' value='<?php echo mysql_result($query,$i,shenfenzheng);?>' /></td></tr><tr><td>电话：</td><td><input name='dianhua' type='text' id='dianhua' value='<?php echo mysql_result($query,$i,dianhua);?>' /></td></tr><tr><td>邮箱：</td><td><input name='youxiang' type='text' id='youxiang' value='<?php echo mysql_result($query,$i,youxiang);?>' /></td></tr><tr><td>照片：</td><td><input name='zhaopian' type='text' id='zhaopian' size='50'  value='<?php echo mysql_result($query,$i,zhaopian);?>' /> &nbsp;<a href="javaScript:OpenScript('upfile.php?Result=zhaopian',460,180)"><img src="Images/Upload.gif" width="30" height="16" border="0" align="absmiddle" /></a></td></tr><tr><td>主要职责：</td><td><input name='zhuyaozhize' type='text' id='zhuyaozhize' size='50' value='<?php echo mysql_result($query,$i,zhuyaozhize);?>' /></td></tr><tr><td>入职时间：</td><td><input name='ruzhishijian' type='text' id='ruzhishijian' value='<?php echo mysql_result($query,$i,ruzhishijian);?>' onclick="getDate(form1.ruzhishijian,'2')" need="1" /></td></tr><tr><td>性别：</td><td><select name='xingbie' id='xingbie'><option value="男">男</option><option value="女">女</option></select></td></tr><script language="javascript">document.form1.xingbie.value='<?php echo mysql_result($query,$i,xingbie);?>';</script><tr><td>备注：</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu'><?php echo mysql_result($query,$i,beizhu);?></textarea></td></tr>
   
   
    <tr>
      <td>&nbsp;</td>
      <td><input name="addnew" type="hidden" id="addnew" value="1" />
      <input type="submit" name="Submit" value="修改" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>
<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>


