<?php
	//1.开始会话 是操作session的必须步骤 哪怕是输出一下session 也得先开始会话
	session_start();
	var_dump($_SESSION);
	//还是session会话后，在客户端和服务器端会分别保存SessionID 
	//客户端用临时的cookie（名为PHPSESSID）或通过URL字符串传递
	//2.设置session
	$_SESSION["userId"] = "cx";
	echo "<br><br>";
	var_dump($_SESSION);
?>