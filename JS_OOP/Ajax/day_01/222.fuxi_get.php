<?php
	include_once "muban.php";
	//因为是通过get方式提交的请求
	//所以由 $_GET 数组获取
	//$name = $_GET["name"];
	//echo $name;
	//$id = $_GET["userId"];
	//echo $id;
	$query = "select * from user";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		//var_dump($row);
		//利用json字符串进行数据传输
		$arr[] = $row;
	}
	$json = json_encode($arr);
	echo $json;//json字符串 数组 元素为对象
?>