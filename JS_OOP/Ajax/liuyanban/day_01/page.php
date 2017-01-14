<?php
	include_once "muban.php";
	$pagesize = 5;
	//$page = $_GET["page"];
	
	
	
//	$query = "select count(*) from message where deleteId=0";
//	$result = mysql_query($query);
//	$row = mysql_fetch_row($result);
	
	
	$page = 0;
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
		
	}
	//echo $page;
	$query = "select * from message where deleteId=0 order By time desc limit ".$page*$pagesize.",".$pagesize;
	$result = mysql_query($query);
	if (mysql_num_rows($result)>0) {
		while ($row = mysql_fetch_assoc($result)) {
			//echo $page."页";		
		 	//echo $row["name"]; 
		 	$arr[] = $row;
		}
	}
	$json = json_encode($arr);
	echo $json;
?>