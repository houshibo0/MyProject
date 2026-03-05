<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{

	$bianhao=$_POST["bianhao"];$mingcheng=$_POST["mingcheng"];$leibie=$_POST["leibie"];$jiage=$_POST["jiage"];$chukushuliang=$_POST["chukushuliang"];$leixing=$_POST["leixing"];$beizhu=$_POST["beizhu"];$caozuoyuan=$_POST["caozuoyuan"];
	$sql="update chukujilu set bianhao='$bianhao',mingcheng='$mingcheng',leibie='$leibie',jiage='$jiage',chukushuliang='$chukushuliang',leixing='$leixing',beizhu='$beizhu',caozuoyuan='$caozuoyuan' where id= ".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');location.href='chukujilu_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改出库记录</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
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
<p>修改出库记录： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql="select * from chukujilu where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 

      <tr><td>编号：</td><td><input name='bianhao' type='text' id='bianhao' value='<?php echo mysql_result($query,$i,bianhao);?>' /></td></tr><tr><td>名称：</td><td><input name='mingcheng' type='text' id='mingcheng' size='50' value='<?php echo mysql_result($query,$i,mingcheng);?>' /></td></tr><tr><td>类别：</td><td><input name='leibie' type='text' id='leibie' value='<?php echo mysql_result($query,$i,leibie);?>' /></td></tr><tr><td>价格：</td><td><input name='jiage' type='text' id='jiage' value='<?php echo mysql_result($query,$i,jiage);?>' /></td></tr><tr><td>出库数量：</td><td><input name='chukushuliang' type='text' id='chukushuliang' value='<?php echo mysql_result($query,$i,chukushuliang);?>' /></td></tr><tr><td>类型：</td><td><select name='leixing' id='leixing'></select></td></tr><script language="javascript">document.form1.leixing.value='<?php echo mysql_result($query,$i,leixing);?>';</script><tr><td>备注：</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu'><?php echo mysql_result($query,$i,beizhu);?></textarea></td></tr><tr><td>操作员：</td><td><input name='caozuoyuan' type='text' id='caozuoyuan' value='<?php echo mysql_result($query,$i,caozuoyuan);?>' /></td></tr>
   
   
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


