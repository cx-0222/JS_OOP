<?php

	$name = $_POST["username"];
	$pass = $_POST['password'];
	$db = mysql_connect("localhost","root","");
	mysql_select_db("php");
	$query = "select * from user where name='$name' and password='$pass'";
	$result = mysql_query($query);
	if(mysql_num_rows($result)==1){
		session_start();
		$row = mysql_fetch_assoc($result);
		$_SESSION["userId"] = $row["userId"];
		echo "登录成功";
	}else{
		echo "登录失败";
	}
?>
<a href="3.zhuxiao.php">注销</a>
<a href="3.yanzhengdenglu.php">验证</a>