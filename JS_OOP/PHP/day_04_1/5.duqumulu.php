<?php
//一、读取目录 只是相对于当前文件的一个相对路径
	//"."表示这个php当前所在的目录的文件夹 表示day_04;
	//".."表示当前php的当前目录的上一级
	//$fh = opendir(".");
	$fh = opendir("../day_04");
	while($file = readdir($fh)){
		//var_dump($file);
		//echo "<br><br>";
	}
	
	//将目录以数组形式展示
	$arr = scandir(".");
	var_dump($arr);
	
		
//	$file = readdir($fh);
//	var_dump($file);
//	echo "<br><br>";
//		
//	$file = readdir($fh);
//	var_dump($file);
//	echo "<br><br>";
//		
//	$file = readdir($fh);
//	var_dump($file);
//	echo "<br><br>";
		
	closedir($fh);
?>