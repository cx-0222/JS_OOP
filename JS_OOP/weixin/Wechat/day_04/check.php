<?php
	header('content-type:text/html;charset=utf-8');
	//自动加载类函数
	function __autoload($class){
		$file = "$class.class.php";
		//判断是否是一个文件
		if(is_file($file)){
			include_once $file;
		}
	}
	
	$captcha = new Captcha();
	//调用方法 制作画布
	$captcha -> createCanvas();
	
	var_dump($captcha);
?>