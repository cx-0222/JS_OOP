<?php
	function sum($name,$age){
		echo "hello,{$name}haha";
		return $age;
	}
	sum("cx",18);
	echo "<hr>";
	$age = sum("cx",18);
	echo $age;
	
	$nums = 3;
	function num(&$nums){
		//++ 不会对外面的$nums 值有影响 除非是指向同一个地址
		//当形参是&$nums 代表引用传值 即指向了同一个地址
		$nums++;
	}
	num($nums);
	echo "<hr>";
	echo $nums;
	
	
	function aaa($name,$pass=1){
		//$pass=1 设置默认值 当有实参传递过来的时候 用实参
		echo "<hr>";
		echo $name;
		echo "<hr>";
		echo $pass;
	}
	//必填参数写在前面 可选的写在后面  有默认值的也往后放
	aaa("lck");
?>