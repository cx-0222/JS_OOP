<?php
	include_once 'muban.php';
	
	$page = $_GET["page"];
	
	$size = 0;
	$query = "select count(*) from message where deleteId = 0";
	$result = mysql_query($query);
	if(mysql_num_rows($result) == 1){
		$row = mysql_fetch_row($result);
		$size = $row[0];
	}
	$pages = ceil($size/$pagesize);
	$arr["page"] = $pages;
	
	$query = "select * from message where deleteId = 0 order By time desc limit ".$page*$pagesize.",".$pagesize;
	$result = mysql_query($query);
	if(mysql_num_rows($result)>0){
		while($row = mysql_fetch_assoc($result)){
			$arr[] = $row;
		}
	}
	$json = json_encode($arr);
	echo $json;
?>