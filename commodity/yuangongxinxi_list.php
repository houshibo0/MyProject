<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>员工信息</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有员工信息列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 工号：<input name="gonghao" type="text" id="gonghao" /> 姓名：<input name="xingming" type="text" id="xingming" /> 身份证：<input name="shenfenzheng" type="text" id="shenfenzheng" /> 电话：<input name="dianhua" type="text" id="dianhua" /> 入职时间：<input name="ruzhishijian1" type="text" id="ruzhishijian1"  value='' onclick="getDate(form1.ruzhishijian1,'2')" size="10" need="1" />-<input name="ruzhishijian2" type="text" id="ruzhishijian2"  value='' onclick="getDate(form1.ruzhishijian2,'2')" size="10" need="1" /> 性别：<select name='xingbie' id='xingbie'><option value="">所有</option><option value="男">男</option><option value="女">女</option></select>
  <input type="submit" name="Submit" value="查找" />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">序号</td>
    <td bgcolor='#CCFFFF'>工号</td><td bgcolor='#CCFFFF'>姓名</td><td bgcolor='#CCFFFF'>年龄</td><td bgcolor='#CCFFFF'>身份证</td><td bgcolor='#CCFFFF'>电话</td><td bgcolor='#CCFFFF'>邮箱</td><td bgcolor='#CCFFFF'>照片</td><td bgcolor='#CCFFFF'>主要职责</td><td bgcolor='#CCFFFF'>入职时间</td><td bgcolor='#CCFFFF'>性别</td><td bgcolor='#CCFFFF'>备注</td>
    <td width="120" align="center" bgcolor="#CCFFFF">添加时间</td>
    <td width="70" align="center" bgcolor="#CCFFFF">操作</td>
  </tr>
  <?php 
    $sql="select * from yuangongxinxi where 1=1";
  
if ($_POST["gonghao"]!=""){$nreqgonghao=$_POST["gonghao"];$sql=$sql." and gonghao like '%$nreqgonghao%'";}
if ($_POST["xingming"]!=""){$nreqxingming=$_POST["xingming"];$sql=$sql." and xingming like '%$nreqxingming%'";}
  if ($_POST["nianling"]!=""){$nreqnianling=$_POST["nianling"];$sql=$sql." and nianling like '%$nreqnianling%'";}
if ($_POST["shenfenzheng"]!=""){$nreqshenfenzheng=$_POST["shenfenzheng"];$sql=$sql." and shenfenzheng like '%$nreqshenfenzheng%'";}
if ($_POST["dianhua"]!=""){$nreqdianhua=$_POST["dianhua"];$sql=$sql." and dianhua like '%$nreqdianhua%'";}
if ($_POST["ruzhishijian1"]!=""){$nreqruzhishijian1=$_POST["ruzhishijian1"];$sql=$sql." and ruzhishijian >= '$nreqruzhishijian1'";}
if ($_POST["ruzhishijian2"]!=""){$nreqruzhishijian2=$_POST["ruzhishijian2"];$sql=$sql." and ruzhishijian <= '$nreqruzhishijian2'";}
if ($_POST["xingbie"]!=""){$nreqxingbie=$_POST["xingbie"];$sql=$sql." and xingbie like '%$nreqxingbie%'";}
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
  ?>
  <tr>
    <td width="25"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,gonghao);?></td><td><?php echo mysql_result($query,$i,xingming);?></td><td><?php echo mysql_result($query,$i,nianling);?></td><td><?php echo mysql_result($query,$i,shenfenzheng);?></td><td><?php echo mysql_result($query,$i,dianhua);?></td><td><?php echo mysql_result($query,$i,youxiang);?></td><td width='80'><a href="<?php echo mysql_result($query,$i,zhaopian) ?>" target='_blank'><img src='<?php echo mysql_result($query,$i,zhaopian) ?>' width='80' height='88' border='0'></a></td><td><?php echo mysql_result($query,$i,zhuyaozhize);?></td><td><?php echo mysql_result($query,$i,ruzhishijian);?></td><td><?php echo mysql_result($query,$i,xingbie);?></td><td><?php echo mysql_result($query,$i,beizhu);?></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
    <td width="70" align="center"><a href="del.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>&tablename=yuangongxinxi" onclick="return confirm('真的要删除？')">删除</a> <a href="yuangongxinxi_updt.php?id=<?php
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
	?>条,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" />
</p>
<p align="center"><a href="yuangongxinxi_list.php?pagecurrent=1">首页</a>, <a href="yuangongxinxi_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="yuangongxinxi_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="yuangongxinxi_list.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>

</body>
</html>


