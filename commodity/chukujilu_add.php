<?php
session_start();
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$kucun=$_POST["kucun"];
	$bianhao=$_POST["bianhao"];$mingcheng=$_POST["mingcheng"];$leibie=$_POST["leibie"];$jiage=$_POST["jiage"];$chukushuliang=$_POST["chukushuliang"];$leixing=$_POST["leixing"];$beizhu=$_POST["beizhu"];$caozuoyuan=$_POST["caozuoyuan"];
	if($kucun<$chukushuliang)
	{
		echo "<script>javascript:alert('对不起，库存不足，操作失败!');history.back();</script>";
		
	}
	else
	{
	$sql="insert into chukujilu(bianhao,mingcheng,leibie,jiage,chukushuliang,leixing,beizhu,caozuoyuan) values('$bianhao','$mingcheng','$leibie','$jiage','$chukushuliang','$leixing','$beizhu','$caozuoyuan') ";
	mysql_query($sql);
	$sql="update shangpinxinxi set kucun=kucun-".$chukushuliang." where bianhao='".$bianhao."'";
	mysql_query($sql);
	echo "<script>javascript:alert('操作成功!');location.href='chukujilu_list.php';</script>";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>出库记录</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
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
<p>添加出库记录： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.bianhao.value==""){alert("请输入编号");document.form1.bianhao.focus();return false;}if(document.form1.mingcheng.value==""){alert("请输入名称");document.form1.mingcheng.focus();return false;}if(document.form1.leibie.value==""){alert("请输入类别");document.form1.leibie.focus();return false;}if(document.form1.jiage.value==""){alert("请输入价格");document.form1.jiage.focus();return false;}if(document.form1.chukushuliang.value==""){alert("请输入出库数量");document.form1.chukushuliang.focus();return false;}if(document.form1.caozuoyuan.value==""){alert("请输入操作员");document.form1.caozuoyuan.focus();return false;}
}
	function gow()
	{
		location.href='peixunccccailiao_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value;
	}
</script>
<form id="form1" name="form1" method="post" action="">
<?php
$i=0;
$sql="select * from shangpinxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>编号：</td><td><input name='bianhao' type='text' id='bianhao' value='<?php echo mysql_result($query,$i,bianhao);?>' />	  &nbsp;*</td></tr><tr><td>名称：</td><td><input name='mingcheng' type='text' id='mingcheng' size='50' value='<?php echo mysql_result($query,$i,mingcheng);?>' />	  &nbsp;*</td></tr><tr><td>类别：</td><td><input name='leibie' type='text' id='leibie' value='<?php echo mysql_result($query,$i,leibie);?>' />	  &nbsp;*</td></tr><tr><td>价格：</td><td><input name='jiage' type='text' id='jiage' value='<?php echo mysql_result($query,$i,jiage);?>' />&nbsp;*</td></tr>
	<tr>
	  <td>库存：</td>
	  <td><input name="kucun" type="text" id="kucun" value="<?php echo mysql_result($query,$i,kucun);?>" /></td>
    </tr>
	<tr><td>出库数量：</td><td><input name='chukushuliang' type='text' id='chukushuliang' value='' />&nbsp;*</td></tr><tr><td>类型：</td><td><select name='leixing' id='leixing'>
	  <option value="销售">销售</option>
	  <option value="报损">报损</option>
	</select></td></tr><tr><td>备注：</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu'></textarea></td></tr><tr><td>操作员：</td><td><input name='caozuoyuan' type='text' id='caozuoyuan' value='<?php echo $_SESSION['username'];?>' />&nbsp;*</td></tr>

    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="添加" onclick="return check();" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
    <?php
	}
?>
</form>
<p>&nbsp;</p>
</body>
</html>


