<?php
	$str = "100 hello";
	$str = "hello 100";
	$num = 200;
	$sum = $str+$num;//300  //200
	echo $sum;
	echo "<br>";
	echo is_string($str);//没有即为空 1代表真
	if(is_string($str)){
		echo "<br>";
		echo "string类型";
	}else{
		echo "<br>";
		echo "number类型";
	}
?>