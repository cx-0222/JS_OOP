<?php
	include_once "muban.php";
	$db = mysql_connect("localhost","root","");
	mysql_select_db("BStore");
	//$query = "select * from book";
	//$result = mysql_query($query);
	$page = $_GET["page"];
	define("PAGESIZE",6);
	$query = "select * from book limit ".$page*PAGESIZE.",".PAGESIZE;
	//echo $query;
	$result = mysql_query($query);
	
	//$row = mysql_fetch_assoc($result);
	//var_dump($row);
	while ($row = mysql_fetch_assoc($result)) {
		$arr[] = $row;
		//var_dump($row);
	}
	$json = json_encode($arr);
	echo $json;
?>