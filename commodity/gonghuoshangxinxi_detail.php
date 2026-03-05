<?php 
$id=$_GET["id"];
include_once 'conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>内容详细</title><link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<p>内容详细：</p>
					<?php
$sql="select * from gonghuoshangxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>

<table width="70%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 
      <tr>
	  <td width='11%'>供货商编号：</td><td width='39%'><?php echo mysql_result($query,0,gonghuoshangbianhao);?></td><td width='11%'>供货商名称：</td><td width='39%'><?php echo mysql_result($query,0,gonghuoshangmingcheng);?></td></tr><tr><td width='11%'>联系人：</td><td width='39%'><?php echo mysql_result($query,0,lianxiren);?></td><td width='11%'>电话：</td><td width='39%'><?php echo mysql_result($query,0,dianhua);?></td></tr><tr><td width='11%'>地址：</td><td width='39%'><?php echo mysql_result($query,0,dizhi);?></td><td width='11%'>邮箱：</td><td width='39%'><?php echo mysql_result($query,0,youxiang);?></td></tr><tr><td width='11%'>主营产品：</td><td width='39%'><?php echo mysql_result($query,0,zhuyingchanpin);?></td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td colspan=4 align=center><input type=button name=Submit5 value=返回 onClick="javascript:history.back()" style='border:solid 1px #000000; color:#666666'  /> <input type="button" name="Submit2" onclick="javascript:window.print();" value='打印本页' style='border:solid 1px #000000; color:#666666' /></td></tr>
    
     
  </table>

<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>


