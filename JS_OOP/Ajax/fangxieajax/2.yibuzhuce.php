<?php
	include_once "../day_01/muban.php";
	$query = "select * from user";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		//var_dump($row);
		$arr[] = $row;
	}
	$json = json_encode($arr);
	echo $json;
?>