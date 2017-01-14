<?php
	include_once "muban.php";
	$name = $_POST["username"];
	$password = $_POST["password"];
	
	$query = "select * from user where name='$name' and password='$password'";
	$result = mysql_query($query);
	if(mysql_num_rows($result)==1){
		$row = mysql_fetch_assoc($result);
		session_start();
		$_SESSION["userId"] = $row["userId"];
		header("Location:ajax_15_list.html");
	}else{
		header("Location:login.html");
	}
?>