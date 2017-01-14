<?php
	session_start();
	if(isset($_SESSION["userId"])){
		echo "欢迎访问";
	}else{
		header("Location:index.php");
	}
?>