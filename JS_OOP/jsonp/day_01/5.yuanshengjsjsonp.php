<?php
	include_once "muban.php";
	$cb = $_GET["ccc"];
	$name = $_GET["user"];
	
	$query = "select * from user where name='$name'";
	$result = mysql_query($query);
	$msg = '{"msg":"抱歉，没有找到符合条件的用户"}';
	if(mysql_num_rows($result)>0){
		while ($row = mysql_fetch_assoc($result)) {
			$arr[] = $row;
		}
		$msg = json_encode($arr);
	}
	echo $cb."(".$msg.")";
?>