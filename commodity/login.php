<?php
//验证登陆信息
session_start();
header("Content-Type: text/html; charset=utf-8");
include_once 'conn.php';
//if($_POST['submit']){
	$login=$_POST["login"];
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	$cx=$_POST['cx'];
echo $cx;
echo $username;
echo $pwd;
	//$userpass=md5($userpass);
	if($login=="1")
	{
		if ($username!="" && $pwd!="")
		{
		if($cx=="管理员")
		{
			$sql="select * from allusers where username='$username' and pwd='$pwd'";
		}
		if($cx=="普通用户")
		{
			$sql="select * from yuangongxinxi where gonghao='$username' and mima='$pwd' ";
		}
		$query=mysql_query($sql);
		$rowscount=mysql_num_rows($query);
			if($rowscount>0)
			{
					$_SESSION['username']=$username;
					if($cx=="管理员")
		{
					$_SESSION['cx']=mysql_result($query,0,"cx");
					}
					else
					{
					$_SESSION['cx']=$cx;
					}
					//$row = mysql_fetch_row($query)
					//echo $_SESSION['cx'];
					echo "<script language='javascript'>alert('登陆成功！');location='main.php';</script>";
			}
			else
			{
			 echo "<script language='javascript'>alert('用户名或密码错误！');history.back();</script>";
			}
		}
		else
		{
		 echo "<script language='javascript'>alert('请输入完整密码！');history.back();</script>";
		}
	}
	
//}
?>
