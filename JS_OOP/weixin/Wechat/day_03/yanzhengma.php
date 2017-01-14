<?php
	header('content-type:text/html;charset=utf-8');
	function __autoload($class){
		$file="$class.class.php";
		if(is_file($file)){
			include_once $file;
		}
	}
	$chptcha=new Chptcha();
	
	$chptcha->generate();
?>