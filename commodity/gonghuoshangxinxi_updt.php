<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{

	$gonghuoshangbianhao=$_POST["gonghuoshangbianhao"];$gonghuoshangmingcheng=$_POST["gonghuoshangmingcheng"];$lianxiren=$_POST["lianxiren"];$dianhua=$_POST["dianhua"];$dizhi=$_POST["dizhi"];$youxiang=$_POST["youxiang"];$zhuyingchanpin=$_POST["zhuyingchanpin"];
	$sql="update gonghuoshangxinxi set gonghuoshangbianhao='$gonghuoshangbianhao',gonghuoshangmingcheng='$gonghuoshangmingcheng',lianxiren='$lianxiren',dianhua='$dianhua',dizhi='$dizhi',youxiang='$youxiang',zhuyingchanpin='$zhuyingchanpin' where id= ".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');location.href='gonghuoshangxinxi_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改供货商信息</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
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
<p>修改供货商信息： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql="select * from gonghuoshangxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 

      <tr><td>供货商编号：</td><td><input name='gonghuoshangbianhao' type='text' id='gonghuoshangbianhao' value='<?php echo mysql_result($query,$i,gonghuoshangbianhao);?>' /></td></tr><tr><td>供货商名称：</td><td><input name='gonghuoshangmingcheng' type='text' id='gonghuoshangmingcheng' size='50' value='<?php echo mysql_result($query,$i,gonghuoshangmingcheng);?>' /></td></tr><tr><td>联系人：</td><td><input name='lianxiren' type='text' id='lianxiren' value='<?php echo mysql_result($query,$i,lianxiren);?>' /></td></tr><tr><td>电话：</td><td><input name='dianhua' type='text' id='dianhua' value='<?php echo mysql_result($query,$i,dianhua);?>' /></td></tr><tr><td>地址：</td><td><input name='dizhi' type='text' id='dizhi' size='50' value='<?php echo mysql_result($query,$i,dizhi);?>' /></td></tr><tr><td>邮箱：</td><td><input name='youxiang' type='text' id='youxiang' value='<?php echo mysql_result($query,$i,youxiang);?>' /></td></tr><tr><td>主营产品：</td><td><textarea name='zhuyingchanpin' cols='50' rows='8' id='zhuyingchanpin'><?php echo mysql_result($query,$i,zhuyingchanpin);?></textarea></td></tr>
   
   
    <tr>
      <td>&nbsp;</td>
      <td><input name="addnew" type="hidden" id="addnew" value="1" />
      <input type="submit" name="Submit" value="修改" style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>


