<?php
		//二维数组的创建 不设置键值 默认为索引数值
	$array = array(
		"aa" => array("name" => "cx","password" => 111 ),
		"bb" => array("name" => "cw","password" => 222 ),
		"cc" => array("name" => "lck","password" => 333 )
	);
	var_dump($array);
	echo "<br><br>";
		//二维数组的取值
	echo $array["aa"]["name"];
	echo "<br><br>";
		//遍历二维数组
	foreach ($array as $key => $value) {
		foreach ($value as $key => $value) {
			//$$key = $value;
			//echo "<br><br>";
			//echo $$key;
			echo "<br><br>";
			echo $key."是: ".$value;
		}
	}
?>