<?php
	//var_dump($_GET);
	$name = $_GET['name'];
	//echo $name;
	$arr["name"] = $name;
	$arr["password"] = "123";
	$json = json_encode($arr);
	//echo $json;
	$userId = $_GET["userId"];
	//echo $userId;
	mysql_connect("localhost","root","");
	mysql_select_db("php");
	$query = "select * from user where userId=1";
	$result = mysql_query($query);
	//echo $result;
	//$row = mysql_fetch_assoc($result);
	//var_dump($row);
	while ($row = mysql_fetch_assoc($result)) {
		$json = json_encode($row);
		echo $json;
	}
?>