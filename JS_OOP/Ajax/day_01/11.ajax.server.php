<?php
	include_once "muban.php";
	$id = $_GET['userId'];
	$query = "select * from user";
	$result = mysql_query($query);
	if(mysql_num_rows($result)>0){
		while($row = mysql_fetch_assoc($result)){
			$arr[] = $row;
		}
		echo json_encode($arr);
	}
?>