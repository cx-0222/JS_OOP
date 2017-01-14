<?php
	//include_once "muban.php"
	$message_id = $_GET["message_id"];
	$query = "insert into manage (message_id) values ('$message_id')";
	$result = mysql_query($query);
	if(mysql_affected_rows()){
		echo "chen";
	}else{
		echo "ss";
	}

?>