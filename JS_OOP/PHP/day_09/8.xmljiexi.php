<?php
	$xml = simplexml_load_file("7.newxml.xml");
	//var_dump($xml);
	//echo "<hr>";
	//获取子节点，没有就返回空数组
	//$book 是数组
	$book = $xml->xpath("book");
	foreach ($book as $key => $value) {
		//var_dump($value->name);
		//echo $value->name;
		//echo "<hr>";
		foreach ($value as $keys => $values) {
			echo $keys."：".$values;
			echo "<hr>";
		}
	}
	
?>