<?php
	//防止中文乱码
    header("Content-type:text/html;charset=utf-8");
    //设置使用东八区时间格式
	date_default_timezone_set('PRC');
	
	mysql_connect("localhost","root","");
	mysql_select_db("MessageBoard");
	//防止插入中的中文出现乱码
	mysql_query("set names utf8"); 
	
	$content = $_GET['content'];
	$time = $_GET['time'];
	//echo $content;
	//echo $time;
	 $query = "insert into message (content,time) values ('$content','$time')";
	 $result = mysql_query($query);
	 if(mysql_affected_rows()){
		echo "插入成功";
	 }else{
	 	echo "插入失败";
	 }
?>