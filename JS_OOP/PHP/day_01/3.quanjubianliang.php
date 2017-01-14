<?php
	//全局变量在方法中不可以直接使用
	//第一种使用方法
	$num = 1;
	function nums(){
		print_r($GLOBALS);
		echo "<hr>";
		$c = $GLOBALS["num"];
		echo $c;
		
		//第二种方法
		global $num;
		echo "<hr>";
		echo $num;
	}
	nums();
?>