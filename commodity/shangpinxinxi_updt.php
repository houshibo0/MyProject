<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{

	$bianhao=$_POST["bianhao"];$mingcheng=$_POST["mingcheng"];$leibie=$_POST["leibie"];$tupian=$_POST["tupian"];$jiage=$_POST["jiage"];$beizhu=$_POST["beizhu"];$kucun=$_POST["kucun"];
	$sql="update shangpinxinxi set bianhao='$bianhao',mingcheng='$mingcheng',leibie='$leibie',tupian='$tupian',jiage='$jiage',beizhu='$beizhu',kucun='$kucun' where id= ".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');location.href='shangpinxinxi_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改商品信息</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
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
<p>修改商品信息： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql="select * from shangpinxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 

      <tr><td>编号：</td><td><input name='bianhao' type='text' id='bianhao' value='<?php echo mysql_result($query,$i,bianhao);?>' /></td></tr><tr><td>名称：</td><td><input name='mingcheng' type='text' id='mingcheng' size='50' value='<?php echo mysql_result($query,$i,mingcheng);?>' /></td></tr><tr><td>类别：</td><td><select name='leibie' id='leibie'><?php getoption("shangpinleibie","leibie")?></select></select></td></tr><script language="javascript">document.form1.leibie.value='<?php echo mysql_result($query,$i,leibie);?>';</script><tr><td>图片：</td><td><input name='tupian' type='text' id='tupian' size='50'  value='<?php echo mysql_result($query,$i,tupian);?>' /> &nbsp;<a href="javaScript:OpenScript('upfile.php?Result=tupian',460,180)"><img src="Images/Upload.gif" width="30" height="16" border="0" align="absmiddle" /></a></td></tr><tr><td>价格：</td><td><input name='jiage' type='text' id='jiage' value='<?php echo mysql_result($query,$i,jiage);?>' /></td></tr><tr><td>备注：</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu'><?php echo mysql_result($query,$i,beizhu);?></textarea></td></tr><tr><td>库存：</td><td><input name='kucun' type='text' id='kucun' value='<?php echo mysql_result($query,$i,kucun);?>' /></td></tr>
   
   
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


