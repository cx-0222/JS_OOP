<?php
	//用json进行数据传输
	//防止中文乱码
    header("Content-type:text/html;charset=utf-8");
    //设置使用东八区时间格式
	date_default_timezone_set('PRC');
	mysql_connect("localhost","root","");
	mysql_select_db("BOOK");
	//防止插入中的中文出现乱码
	mysql_query("set names utf8"); 
	
	
	//1.从数据库中取出数据
	$query = "select * from book";
	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result)){
		//var_dump($row);
		//2.将取得的数据变成json字符串
		//$str = json_encode($row);
		//echo $str;//json对象
		$arr[] = $row;
	}
	//var_dump($arr);//一个二维数组
	$str = json_encode($arr);
	//echo $str;//json 字符串 数组 元素是对象
	//3.将json字符串变成json文件(即将json字符串写入文件)
		//!!注意权限
	file_put_contents("111.book.json", $str);
	
	//从json文件获取数据 插入数据库
	//1.读取json文件 得到json字符串
	$str = file_get_contents("111.book.json");
	//echo $str;
	//2.将json字符串变为数组
	$arr = json_decode($str);
	//var_dump($arr);
	//$query = "insert into book (name,write,price) values ()";
	//3.获取要插入的值
	foreach ($arr as $keys => $values) {
		//var_dump($value);
		$str = "insert into book (";
		$valueStr = ") values (";
		foreach ($values as $key => $value) {
			if($key != "bookId"){
				//echo $key."<br>";
				//echo $value;
				$str .= $key.",";
				$valueStr .= "'".$value."'".","; 
			}
		}
	
	//去除拼接时候key 与 value 尾部的 逗号
	//substr() 函数返回字符串的一部分。
	//substr(string,start,length)
	//string	必需。规定要返回其中一部分的字符串。
	//start	
		//必需。规定在字符串的何处开始。
		//正数 - 在字符串的指定位置开始
		//负数 - 在从字符串结尾开始的指定位置开始
		//0 - 在字符串中的第一个字符处开始
	//length	
		//可选。规定被返回字符串的长度。默认是直到字符串的结尾。
		//正数 - 从 start 参数所在的位置返回的长度
		//负数 - 从字符串末端返回的长度
	$str = substr($str,0,-1);
	$valueStr = substr($valueStr,0,-1);
	$valueStr .= ")";
	$str .= $valueStr;
	echo $str;
	mysql_query($str);
	if(mysql_affected_rows()){
		echo "成功";
	}
}
?>