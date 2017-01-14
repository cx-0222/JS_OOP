<?php
	include_once "muban.php";

	mysql_connect("localhost","root","");
	mysql_select_db("BStore");
	$query = "select count(bookId) from book";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	//var_dump($row);
	$count = $row[0];
	define("PAGESIZE",6);
	$pages = ceil($count/PAGESIZE);
	echo $pages;
	
	
//	$page = 0;
//	if (isset($_GET["page"])) {
//		$page = $_GET["page"];
//	}	
?>