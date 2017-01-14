<?php
//一、
	//"w"表示删除之前的内容再写 "a"表示在之前的内容的后面以追加的形式写入
	$fh = fopen("2.index.txt","a");
	//输出写入内容的长度
	//echo fwrite($fh,"hahahh");
	fclose($fh);
//二、	
	$str = "hello";
	//替换 默认是以"w"方式写入  第三个参数 FILE_APPEND 表示以"a"追加形式写入
	file_put_contents("2.index.txt",$str,FILE_APPEND);
	

?>