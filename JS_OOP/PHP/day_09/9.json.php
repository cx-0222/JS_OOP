<?php
	$name = "lck";
	$password = "123";
	$json = '{"name":"'.$name.'","password":"'.$password.'"}';
	
	$whats = json_decode($json,true);
	var_dump($whats);
	
	$arr["name"] = $name;
	$arr["password"] = $password;
	echo "<hr>";
	echo json_encode($arr);
?>