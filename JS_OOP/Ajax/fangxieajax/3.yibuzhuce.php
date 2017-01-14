<?php
	include_once "../day_01/muban.php";
	$name = "";
	if(isset($_GET["username"])){
		$name = $_GET["username"];
	}
	$pass = "";
	if(isset($_GET["password"])){
		$pass = $_GET["password"];
	}
	
	if($name == "" || $pass == ""){
		echo "用户名或密码不可为空";
	}else{
		//echo $name;
		//echo $pass;
		$query = "insert into user (name,password) values ('$name','$pass')";
		$result = mysql_query($query);
		if(mysql_affected_rows()){
			echo "注册成功";
		}else{
			echo "注册失败";
		}
	}
?>