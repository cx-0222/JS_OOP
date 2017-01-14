<?php
	
	print_r($_POST);
	$name = $_POST["username"];
	$psw = $_POST["password"];
	echo "<br>";
	echo $name;
	echo "<br>";
	echo $psw;
	
	$user = "ccc";
	$pass = "333";
	if($user == $name && $pass == $psw){
		echo "<br>";
		echo "登录成功";
	}else{
		echo "<br>";
		echo "登录失败";
	}
	

	
	//给关联数组做循环 要用foreach方法 第一个参数是要循环谁 
	//第二个值是当前循环的key
	//第三个值是当前key所对应的值
	
	foreach ($_POST as $key => $value) {
		echo "<br>";
		echo $key."是".$value;
		//使用变量的变量实现
		//接受变量的简化
		$$key = $value;
	}
?>