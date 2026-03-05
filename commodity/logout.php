<?php
//注销登录
session_start();
header("Content-Type: text/html; charset=utf-8");
$_SESSION['username']="";
$_SESSION['cx']="";

echo "<script language='javascript'>alert('注销登录成功！');location='login.html';</script>";
?>
