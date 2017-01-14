<?php
	//$_GET 代表我们get请求传过来的参数
	//它是一个超全局变量，并且是一个关联数组
	print_r($_GET);
	//想要取出关联数组中key的值如下 并且如果取出的key不存在会报错
	$name = $_GET["username"];
	$psw = $_GET["password"];
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
	
	//变量的变量？？？给key赋值？？
	
	//给关联数组做循环 要用foreach方法 第一个参数是要循环谁 
	//第二个值是当前循环的key
	//第三个值是当前key所对应的值
	
	foreach ($_GET as $key => $value) {
		echo "<br>";
		echo $key."是".$value;
		//使用变量的变量实现
		//接受变量的简化
		$$key = $value;
	}
?>