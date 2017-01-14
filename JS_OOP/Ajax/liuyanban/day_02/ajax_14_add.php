<?php
	include_once 'muban.php';
	
	$content = $_GET["content"];
	$times = time();
	$query = "insert into message (content,time) values ('$content',$times)";
	$result = mysql_query($query);
	if(mysql_affected_rows() == 1){
		$id = mysql_insert_id();
		$query = "select * from message where messageId = $id";
		$result = mysql_query($query);
		if(mysql_num_rows($result) == 1){
			$row = mysql_fetch_assoc($result);
			
			//
			$query = "select count(*) from message where deleteId=0";
			$result = mysql_query($query);
			$count = mysql_fetch_row($result);
			$pages = ceil($count[0]/$pagesize);
			
			$row["page"] = $pages;
			
			$json = json_encode($row);
			echo $json;
		}
	}
	
	
	
?>