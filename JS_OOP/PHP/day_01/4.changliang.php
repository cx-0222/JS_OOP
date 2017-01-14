<?php
	//第三个参数默认 false 大小写敏感
	//如果要对大小写不敏感 第三个数为true
	define('PI', 3.1415926535,true);
	echo pi;
	echo "<br> ";
	echo PHP_OS;
	echo "<br> "	;
	echo PHP_VERSION;
	//查看PHP配置信息
	//phpinfo();
	
	//魔术常量
	echo "<br> "	;
	echo __LINE__;//文件中的当前行号
	echo "<br> "	;       
	echo __FILE__;//文件的完整路径和文件名
	echo "<br> "	;
	function ccc(){
		echo __FUNCTION__;//函数名称
	}
	ccc();
	echo "<br> "	;
?>