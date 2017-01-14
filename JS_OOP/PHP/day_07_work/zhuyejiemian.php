<?php
	include_once "muban.php";
	$name = "";
	$pass = "";
	//第一次登录的时候 cookie为空 所以从post中取值
	if (isset($_POST["username"])) {
		$name = $_POST["username"];
	} else {
		//当没有经过form表单提交的时候 即用户点击了免登陆的时候 从cookie中取值
		$name = $_COOKIE["username"];
	}
	if (isset($_POST["password"])) {
		$pass = $_POST["password"];
	} else {
		$pass = $_COOKIE["password"];
	}
	
	session_start();
	if($name == "" || $pass == "" ){
		echo "用户名或密码不可以为空";
	}else{
		$query = "select * from user where name='$name' and password='$pass'";
		$result = mysql_query($query);
		if (mysql_num_rows($result) == 1) {
			$row = mysql_fetch_assoc($result);
			$_SESSION["userId"] = $row["userId"];
			if (isset($_POST["remember"])) {
				echo "cookie";
				setcookie("username",$name,time()+3600*24*7);
				setcookie("password",$pass,time()+3600*24*7);
			}
			echo "主页";
		} else if(mysql_num_rows($result) == 0){
				//echo "用户名或密码错误";
				//header("location:denglujiemian.php");
				echo "<script type='text/javascript'>alert('用户名或密码错误,请重新登录');</script>";
				
			}
	}

?>
