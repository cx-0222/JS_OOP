<?php
	//防止中文乱码
    header("Content-type:text/html;charset=utf-8");
    //设置使用东八区时间格式
	date_default_timezone_set('PRC');
	mysql_connect("localhost","root","");
	mysql_select_db("BOOK");
	//防止插入中的中文出现乱码
	mysql_query("set names utf8");  
	
	//$query = "select * from book";
	//$result = mysql_query($query);
	define("PAGESIZE",1);
	$query = "select count(bookId) from book";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	//var_dump($row);
	$count = $row[0];
	$pages = ceil($count/PAGESIZE);
	$page = 0;
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	}
	$query = "select * from book limit ".$page*PAGESIZE.",".PAGESIZE;
	$result = mysql_query($query);
	
	
	if (mysql_num_rows($result)) {
		while ($row = mysql_fetch_assoc($result)) {
			//echo $page."页";		
		 	//echo $row["name"]; 
		 	$arr[] = $row;
		}
	}
	$json = json_encode($arr);
	echo $json;
?>