<?php
	//从数据库中取出数据 变成json文件
	
	//防止中文乱码
    header("Content-type:text/html;charset=utf-8");
    //设置使用东八区时间格式
	date_default_timezone_set('PRC');
	mysql_connect("localhost","root","");
	mysql_select_db("BOOK");
	//防止插入中的中文出现乱码
	mysql_query("set names utf8");  
	
	$query = "select * from book";
	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result)){
		//var_dump($row);
		//将取到的数组变成一个二维数组
		$arr[] = $row;
	}
	//var_dump($arr);
	//json_encode() 将数组变成json字符串
	$str = json_encode($arr);
	//echo $str;
	
	//将json字符串变为json文件
	file_put_contents("book.json", $str);
	
	//再将json文件变为数据插入数据
	$str = file_get_contents("book.json");
	//echo $str;
	$arr = json_decode($str);
	//var_dump($arr);
	//$query = "insert into book (bookId,name,writer,price) values ()";
	foreach ($arr as $key => $value) {
		$str = "insert into book (";
		$valuestr = "";
		foreach ($value as $keys => $values) {
			if($keys != "bookId"){
				$str .= $keys.",";
				$valuestr .= "'".$values."',";
			}
			
		}
	$str = substr($str, 0,-1);
	$valuestr = substr($valuestr, 0,-1);
	$str .= ") values (";
	$valuestr .= ")";
	$str .= $valuestr;
	echo "<br><br>";
	var_dump($str);
	mysql_query($str);
	if(mysql_affected_rows()){
		echo "成功";
	}
	}
?>