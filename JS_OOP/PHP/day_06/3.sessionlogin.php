<?php
	include_once "muban.php";
	$name = $_POST["username"];
	$pass = $_POST["password"];
	//开启session 是操作session的必须步骤 哪怕是输出一下session 也得写
	//同时在同一个php中也不可以开启多遍！！
	session_start();
	
	//var_dump($_SESSION);
	$query = "select * from user where name='$name' and password='$pass'";
	
	$result = mysql_query($query);
	//var_dump($result);
	if (mysql_num_rows($result) == 1){
		$row = mysql_fetch_assoc($result);
		//var_dump($row);
		$_SESSION["userId"] = $row["userId"];
		var_dump($_SESSION);
		setcookie("username",$name,time()+3600*24*7);
		setcookie("password",$pass,time()+3600*24*7);
		var_dump($_COOKIE);
		if ($_SESSION["userId"]=="1") {
			echo "哈哈我进来了";
		}
		echo "登录成功";
	}else{
		echo "登录失败";
	}
	echo '<a href="index.php">个人主页</a>';
?>