<?php
	//数据库操作练习
	//1.链接数据库
	$db = mysql_connect("localhost","root","");
	//2.选择mysql数据库
	mysql_select_db("php");
	//3.编写MySQL语句
	$query = "select * from user";
	//4.执行mysql语句 获取结果集
	//mysql_query 执行mysql语句 执行成功 返回一个php资源的指针 不成功(如：里面内容已经取完)
	//返回false
	$result = mysql_query($query);
	//5.展示结果集的方法
		//① 以普通数组的形式展示
	//$row = mysql_fetch_row($result);
	//var_dump($row);
		//② 以关联数组的形式来展示结果集
	//$row = mysql_fetch_array($result);
	//var_dump($row);
		
	$row = mysql_fetch_assoc($result);
	var_dump($row);
	
		//③ 
?>