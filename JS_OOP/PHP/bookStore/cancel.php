<?php
	session_start();
	session_destroy();
	setcookie("username");
	setcookie("passwork");
	header("location:index.php");
?>
<!--<a href="test.php">验证</a>-->