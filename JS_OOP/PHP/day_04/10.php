<?php
	
	$path = "/home/www/data/users.txt";
	//返回路径中文件名部分 加上".txt"表示去掉后缀
	$url = basename($path,".txt");
	//返回路径中文件名前面的路径部分
	$dir = dirname($path);
	echo $url;
	echo "<br><br>";
	echo $dir;
	
	//
	$arr = pathinfo($path);
	echo "<br><br>";
	var_dump($arr);
?>