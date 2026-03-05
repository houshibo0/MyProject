<?php
session_start();

	//echo $_SESSION['cx'];
	if($_SESSION['cx']=="普通用户")
	{
		echo "<script>javascript:location.href='left2.php';</script>";
	}
	else
	{
		echo "<script>javascript:location.href='left.php';</script>";
	}

?>
