<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>出库记录</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有出库记录列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 编号：<input name="bianhao" type="text" id="bianhao" /> 名称：<input name="mingcheng" type="text" id="mingcheng" /> 类别：<input name="leibie" type="text" id="leibie" /> 类型：<select name='leixing' id='leixing'><option value="">所有</option><option value="销售">销售</option>
	  <option value="报损">报损</option></select> 操作员：<input name="caozuoyuan" type="text" id="caozuoyuan" />
  <input type="submit" name="Submit" value="查找" />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">序号</td>
    <td bgcolor='#CCFFFF'>编号</td><td bgcolor='#CCFFFF'>名称</td><td bgcolor='#CCFFFF'>类别</td><td bgcolor='#CCFFFF'>价格</td><td bgcolor='#CCFFFF'>出库数量</td><td bgcolor='#CCFFFF'>类型</td><td bgcolor='#CCFFFF'>备注</td><td bgcolor='#CCFFFF'>操作员</td>
    <td width="120" align="center" bgcolor="#CCFFFF">添加时间</td>
    <td width="70" align="center" bgcolor="#CCFFFF">操作</td>
  </tr>
  <?php 
    $sql="select * from chukujilu where 1=1";
  
if ($_POST["bianhao"]!=""){$nreqbianhao=$_POST["bianhao"];$sql=$sql." and bianhao like '%$nreqbianhao%'";}
if ($_POST["mingcheng"]!=""){$nreqmingcheng=$_POST["mingcheng"];$sql=$sql." and mingcheng like '%$nreqmingcheng%'";}
if ($_POST["leibie"]!=""){$nreqleibie=$_POST["leibie"];$sql=$sql." and leibie like '%$nreqleibie%'";}
if ($_POST["leixing"]!=""){$nreqleixing=$_POST["leixing"];$sql=$sql." and leixing like '%$nreqleixing%'";}
if ($_POST["caozuoyuan"]!=""){$nreqcaozuoyuan=$_POST["caozuoyuan"];$sql=$sql." and caozuoyuan like '%$nreqcaozuoyuan%'";}
  $sql=$sql." order by id desc";
  
$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=10;//每页行数；
  $pagecurrent=$_GET["pagecurrent"];
  if($rowscount%$pagelarge==0)
  {
		$pagecount=$rowscount/$pagelarge;
  }
  else
  {
   		$pagecount=intval($rowscount/$pagelarge)+1;
  }
  if($pagecurrent=="" || $pagecurrent<=0)
{
	$pagecurrent=1;
}
 
if($pagecurrent>$pagecount)
{
	$pagecurrent=$pagecount;
}
		$ddddd=$pagecurrent*$pagelarge;
	if($pagecurrent==$pagecount)
	{
		if($rowscount%$pagelarge==0)
		{
		$ddddd=$pagecurrent*$pagelarge;
		}
		else
		{
		$ddddd=$pagecurrent*$pagelarge-$pagelarge+$rowscount%$pagelarge;
		}
	}
$ze=0;
	for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$ddddd;$i++)
{
$ze=$ze+mysql_result($query,$i,jiage) * mysql_result($query,$i,chukushuliang);
  ?>
  <tr>
    <td width="25"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,bianhao);?></td><td><?php echo mysql_result($query,$i,mingcheng);?></td><td><?php echo mysql_result($query,$i,leibie);?></td><td><?php echo mysql_result($query,$i,jiage);?></td><td><?php echo mysql_result($query,$i,chukushuliang);?></td><td><?php echo mysql_result($query,$i,leixing);?></td><td><?php echo mysql_result($query,$i,beizhu);?></td><td><?php echo mysql_result($query,$i,caozuoyuan);?></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
    <td width="70" align="center"><a href="del.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>&tablename=chukujilu" onclick="return confirm('真的要删除？')">删除</a> <a href="chukujilu_updt.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>">修改</a></td>
  </tr>
  	<?php
	}
}
?>
</table>
<p>以上数据共<?php
		echo $rowscount;
	?>条,共计总额<?php echo $ze?>元
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印报表" />
</p>
<p align="center"><a href="chukujilu_list.php?pagecurrent=1">首页</a>, <a href="chukujilu_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="chukujilu_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="chukujilu_list.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>

</body>
</html>


