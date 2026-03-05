<?php 
session_start();
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>供货商信息</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有供货商信息列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 供货商编号：<input name="gonghuoshangbianhao" type="text" id="gonghuoshangbianhao" size=12 /> 供货商名称：<input name="gonghuoshangmingcheng" type="text" id="gonghuoshangmingcheng" size=12 /> 联系人：<input name="lianxiren" type="text" id="lianxiren" size=12 /> 电话：<input name="dianhua" type="text" id="dianhua" size=12 /> 地址：<input name="dizhi" type="text" id="dizhi" size=12 />
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">序号</td>
    <td bgcolor='#CCFFFF'>供货商编号</td><td bgcolor='#CCFFFF'>供货商名称</td><td bgcolor='#CCFFFF'>联系人</td><td bgcolor='#CCFFFF'>电话</td><td bgcolor='#CCFFFF'>地址</td><td bgcolor='#CCFFFF'>邮箱</td>
    <td width="120" align="center" bgcolor="#CCFFFF">添加时间</td>
    <td width="70" align="center" bgcolor="#CCFFFF">操作</td>
  </tr>
  <?php 
    $sql="select * from gonghuoshangxinxi where 1=1";
  if ($_POST["gonghuoshangbianhao"]!=""){$nreqgonghuoshangbianhao=$_POST["gonghuoshangbianhao"];$sql=$sql." and gonghuoshangbianhao like '%$nreqgonghuoshangbianhao%'";}if ($_POST["gonghuoshangmingcheng"]!=""){$nreqgonghuoshangmingcheng=$_POST["gonghuoshangmingcheng"];$sql=$sql." and gonghuoshangmingcheng like '%$nreqgonghuoshangmingcheng%'";}if ($_POST["lianxiren"]!=""){$nreqlianxiren=$_POST["lianxiren"];$sql=$sql." and lianxiren like '%$nreqlianxiren%'";}if ($_POST["dianhua"]!=""){$nreqdianhua=$_POST["dianhua"];$sql=$sql." and dianhua like '%$nreqdianhua%'";}if ($_POST["dizhi"]!=""){$nreqdizhi=$_POST["dizhi"];$sql=$sql." and dizhi like '%$nreqdizhi%'";}
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

	for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$ddddd;$i++)
{
//zoxngxetxoxngjxvi
  ?>
  <tr>
    <td width="25"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,gonghuoshangbianhao);?></td><td><?php echo mysql_result($query,$i,gonghuoshangmingcheng);?></td><td><?php echo mysql_result($query,$i,lianxiren);?></td><td><?php echo mysql_result($query,$i,dianhua);?></td><td><?php echo mysql_result($query,$i,dizhi);?></td><td><?php echo mysql_result($query,$i,youxiang);?></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
    <td width="90" align="center"><a href="del.php?id=<?php echo mysql_result($query,$i,"id");?>&tablename=gonghuoshangxinxi" onclick="return confirm('真的要删除？')">删除</a> <a href="gonghuoshangxinxi_updt.php?id=<?php echo mysql_result($query,$i,"id");?>">修改</a> <a href="gonghuoshangxinxi_detail.php?id=<?php echo mysql_result($query,$i,"id");?>">详细</a></td>
  </tr>
  	<?php
	}
}
?>
</table>
<?php //yougongzitongji?>
<p>以上数据共<?php
		echo $rowscount;
	?>条,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" style='border:solid 1px #000000; color:#666666' /> <input type="button" name="Submit3" onclick="javascript:location.href='gonghuoshangxinxi_listxls.php';" value="导出EXCEL" style='border:solid 1px #000000; color:#666666' />
</p>
<p align="center"><a href="gonghuoshangxinxi_list.php?pagecurrent=1">首页</a>, <a href="gonghuoshangxinxi_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="gonghuoshangxinxi_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="gonghuoshangxinxi_list.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>

</body>
</html>


