<?php
	
	$arr["aaa"] = "111";
	$arr["bbb"] = "222";
	$arr["ccc"] = "333";
	$arr["ddd"] = "444";
	var_dump($arr);
	//sort 升序
	//数组排序 适用于索引数组
	//使用sort()对关联数组进行排序 key值会变成0 1 2 3 这种形式 
	//很多情况下不合适
	sort($arr);
	echo "<hr>";
	var_dump($arr);
	
	$array = array("lan","ou","ke","ji");
	echo "<hr>";
	var_dump($array);
	
	sort($array);
	echo "<hr>";
	var_dump($array);
?>