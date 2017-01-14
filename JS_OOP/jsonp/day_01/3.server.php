<?php
	$cb = $_GET["callback"];
	$json = json_encode($_GET);
	$json1 = '{"msg":"叭叭叭叭叭叭"}';
	//echo $cb."(".$json.")";
	echo $cb."(".$json1.")";
?>