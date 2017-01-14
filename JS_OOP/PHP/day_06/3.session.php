<?php
	//session 的生命周期是浏览器关闭(大退一下) 才可以测试失败的时候
	session_start();
	if(isset($_SESSION["userId"])){
			echo "欢迎访问个人主页";
	}else{
		
	}
?>