<?php
//一、
	//读取资源类型
	$fh = fopen("1.test.php","r");
	//var_dump 能输出所有类型 所以在不确定资源类型的情况下 用var_dump输出
	//得到了一个text流
	var_dump($fh);
	echo "<br><br>";
	//取出text流中一个
	//$str = fread($fh,1);
	//filesize("1.test.php") 用来表示整个文件的text流
	
	//fread必须配合我们的fopen来使用
	//第一个参数就是我们fopen得到的资源类型的文件流
	//第二个参数就是我们要读取的文件长度，如果是中文要一次读取3个长度 
	//否则会出现乱码
	//如果要获取整个文件的长度，就要配合我们的filesize()方法来获取我们文件的大小
	$str = fread($fh,filesize("1.test.php"));
	echo $str;
	//关闭文件
	fclose($fh);
//二、
	//①	
	$fh1 = fopen("1.test.php","r");
	//遇到换行、EOF、或已经读取到length-1结束
	//读取第一行
	$str1 = fgets($fh1);
	echo "<br><br>";
	echo $str1;
	//读取第二行
	$str1 = fgets($fh1);
	echo "<br><br>";
	echo $str1;
	fclose($fh1);
	//②
	$fh2 = fopen("1.test.php","r");
	//判断文件指针是否在文件结尾处，即循环输出每一行的文档
	while (!feof($fh2)) {
		$str2 = fgets($fh2);
		echo "<br><br>";
		echo $str2;
	}
	fclose($fh2);
	
//三、file("1.test.php")将文件读取到数组中
	$arr = file("1.test.php");
	echo "<br><br>";
	var_dump($arr);
//四、将文件内容读取到字符串中
	$string = file_get_contents("1.test.php");
	echo "<br><br>";
	echo $string;
	
?>