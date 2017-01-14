<?php
	function __autoload($class_name){
		echo "<br><br>";
		echo "我被调用了";
		var_dump($class_name);
		include_once("$class_name"."_class.php");
	}
	
	
	$person = new Person("lck","8");
	echo "<br><br>";
	$person->info();
	$children = new Children("ck","18","999");
	echo "<br><br>";
	$children->info();
?>