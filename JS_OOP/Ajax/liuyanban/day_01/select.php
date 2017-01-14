<?php
	//查询数据库 在前台进行展示
	include_once "muban.php";
	$pagesize = 5;
	$page = $_GET["page"];
	$arr = [];
	//进行分页的查询
	$query = "select count(*) from message where deleteId=0";
	$result = mysql_query($query);
	if(mysql_num_rows($result)==1){
		$row = mysql_fetch_row($result);
		$size = $row[0];
		$pages = ceil($size/$pagesize);
		$arr["page"] = $pages;//这样传回前端的的就不是数组而是对象了
		//echo $pages;
	}
	
	
	//
	$query = "select * from message where deleteId=0 order By time desc limit ".$page*$pagesize.",".$pagesize;
	//echo $query;
	$result = mysql_query($query);
	if(mysql_num_rows($result)>0){
		while ($row = mysql_fetch_assoc($result)) {
			$arr[] = $row;
		}	
	}
	$json = json_encode($arr);
	echo $json;
?>



