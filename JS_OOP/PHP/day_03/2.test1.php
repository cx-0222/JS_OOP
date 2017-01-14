<?php
	//include_once 只能检测到该行代码之前是否加载过我们要加载的PHP了
	//如果有就不会再次加载了，没有才加载
	//include_once "2.test.php";
	//includ 用几遍加载几次
	//include "2.test.php";
	
	//如果使用include的时候找不到文件
	//就会报警告 但是会继续执行下面的代码 
	//如果是require找不到文件
	//就不会继续执行下面的PHP代码了
	require "2.test.php";
	//require "2.test1.php";
	echo "我是test1<br><br>";
?>