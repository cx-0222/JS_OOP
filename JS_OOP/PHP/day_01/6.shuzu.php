<?php
	$arr = array(1,2,3);
	//var_dump 输出的更详细 包括每个值的类型
	var_dump($arr);
	echo "<br>";
	print_r($arr);
	echo "<br>";
	echo $arr[0];
	$arr["haha"] = "ccc";
	echo "<br>";
	print_r($arr);
	echo "<br>";
	echo $arr["haha"];
?>