<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$gonghuoshangbianhao=$_POST["gonghuoshangbianhao"];$gonghuoshangmingcheng=$_POST["gonghuoshangmingcheng"];$lianxiren=$_POST["lianxiren"];$dianhua=$_POST["dianhua"];$dizhi=$_POST["dizhi"];$youxiang=$_POST["youxiang"];$zhuyingchanpin=$_POST["zhuyingchanpin"];
	ischongfu("select id from gonghuoshangxinxi where gonghuoshangbianhao='".$gonghuoshangbianhao."'");
	$sql="insert into gonghuoshangxinxi(gonghuoshangbianhao,gonghuoshangmingcheng,lianxiren,dianhua,dizhi,youxiang,zhuyingchanpin) values('$gonghuoshangbianhao','$gonghuoshangmingcheng','$lianxiren','$dianhua','$dizhi','$youxiang','$zhuyingchanpin') ";
	mysql_query($sql);
	echo "<script>javascript:alert('添加成功!');location.href='gonghuoshangxinxi_add.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
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
<p>添加供货商信息： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.gonghuoshangbianhao.value==""){alert("请输入供货商编号");document.form1.gonghuoshangbianhao.focus();return false;}if(document.form1.gonghuoshangmingcheng.value==""){alert("请输入供货商名称");document.form1.gonghuoshangmingcheng.focus();return false;}if(document.form1.lianxiren.value==""){alert("请输入联系人");document.form1.lianxiren.focus();return false;}if(document.form1.dianhua.value==""){alert("请输入电话");document.form1.dianhua.focus();return false;}
}
	function gow()
	{
		location.href='peixunccccailiao_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value;
	}
</script>
 <?php
//islbdq $sql="select * from melieibaoduqubiaoiguo where id=".$_GET["id"];
//islbdq $query=mysql_query($sql);
//islbdq $rowscount=mysql_num_rows($query);
//islbdq if($rowscount>0)
//islbdq {
//islbdq 	lelelelelele
//islbdq }
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>供货商编号：</td><td><input name='gonghuoshangbianhao' type='text' id='gonghuoshangbianhao' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><tr><td>供货商名称：</td><td><input name='gonghuoshangmingcheng' type='text' id='gonghuoshangmingcheng' value='' size='50' style='border:solid 1px #000000; color:#666666'  />&nbsp;*</td></tr><tr><td>联系人：</td><td><input name='lianxiren' type='text' id='lianxiren' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><tr><td>电话：</td><td><input name='dianhua' type='text' id='dianhua' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><tr><td>地址：</td><td><input name='dizhi' type='text' id='dizhi' value='' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr><tr><td>邮箱：</td><td><input name='youxiang' type='text' id='youxiang' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><tr><td>主营产品：</td><td><textarea name='zhuyingchanpin' cols='50' rows='8' id='zhuyingchanpin' style='border:solid 1px #000000; color:#666666'></textarea></td></tr>

    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="添加" onclick="return check();"  style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php
	function ischongfu($sql)
	{
		$query=mysql_query($sql);
 		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			echo "<script>javascript:alert('对不起，该供货商编号已经存在，请换其他供货商编号!');history.back();</script>";
			exit;
		}
		
	}
?>
</body>
</html>


