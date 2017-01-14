<?php
	//include "2.test.php";
	//include "2.test1.php";
	//include_once 先检测在这之前！！(如果在之后引入了，这个无法避免)是否引入过了 
	//如果是 就不再引入 
	//include_once "2.test.php";
	require "2.test.php";
	//require "2.test1.php";
	require_once "2.test.php";
	echo "wrold";
?>