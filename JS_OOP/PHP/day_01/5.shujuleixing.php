<!--数据类型-->
<?php
	$name = "cx";
	//必须是双引号 才会替换 单引号不可以
	echo "hello,$name";//hello,cx
	$str = <<<EOD
		afdsfadsagdsgg.
EOD;
	echo $str;
?>