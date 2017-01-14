<?php
	include_once "muban.php";
	$name = $_POST["username"];
	$pass = $_POST["password"];
	
	var_dump($_POST);
	if (isset($_POST["miandeng"])) {
		echo "存在";
	}else {
		echo "不存在";
	}
	
	//开启session
	session_start();
	//将获取的username password 与数据中的比较
	$query = "select * from user where name='$name' and password='$pass'";
	$result = mysql_query($query);
	//当在数据库中找到唯一的一条记录时，说明登录成功
	if (mysql_num_rows($result) == 1) {
		//登录成功后给这个用户设置唯一的sessionID
		$row = mysql_fetch_assoc($result);
		$_SESSION["userId"] = $row["userId"];
		echo "登录成功";
		if (isset($_POST["miandeng"])) {
			setcookie("username",$name,time()+3600*24*7);
			setcookie("password",$pass,time()+3600*24*7);
		}else {
			echo "不免等";
		} 
		
	} else {
		echo "登录失败";
	}
	
	
?>