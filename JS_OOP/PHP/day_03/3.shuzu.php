<?php
	//创建数组的方法
	//索引数组
	//1.
	$arr1[] = "aaa";
	$arr1[] = "bbb";
	$arr1[] = "ccc";
	//var_dump 打印数组的详细信息
	var_dump($arr1);
	$arr = array(1,2,3,4);
	
	//关联数组 key都是字符串 必须加引号
	//2.
	//哪怕前面几个设置了键值对 
	//但是当不设置key的时候 还是会从0开始设置
	$arr2["a"] = "ccc";
	$arr2["b"] = "ddd";
	$arr2[] = "eee";
	var_dump($arr2);
	
	$array = array('name' => 'cx','age'=> 18,'sex' => "女" );
	
	//3. 用方法创建数组
	//range — 建立一个包含指定范围单元的数组
	//array range ( mixed $start , mixed $limit [, number $step = 1 ] )
	//start序列的第一个值。
	//limit序列结束于 limit 的值。
	//step如果给出了 step 的值，它将被作为单元之间的步进值。
		//step 应该为正值。如果未指定，step 则默认为 1。


	$numArr = range(1,100,5);
	//$numArr = range("a","z");0
1	var_dump($numArr);
?>