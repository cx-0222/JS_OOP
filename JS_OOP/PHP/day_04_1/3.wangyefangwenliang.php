<?php
//一、记录用户浏览器session_id的
//	session_start();
//	$log = '3.log.txt';
//	if(!$handle = fopen($log,"a+")){ echo '日志文件打开失败'; exit(); }
//	if(!fwrite($handle,session_id().chr(13))){ echo '数据写入失败'; exit(); }
//	fclose($handle);
//	$file = file_get_contents($log);
//	$content = explode(chr(13),$file);
//	echo "本页被访问次数： <b>".(count($content)-1)." </b>";


//二、简单的记录一个网页的访问次数 在一个txt中设置初始值为0 即访问量为零
	//1.访问这个txt文件 获取里面的内容
	//2.将内容(即访问量加一)
	//3.再将你更改的值以"w"替换的方式写入文件！！！这里注意txt文件的权限是可读可写的
	$count = file_get_contents("33.fang.txt");
	$count++;
	echo "<h1>该网页访问了{$count}次</h1>";
	file_put_contents("33.fang.txt","$count");
	//fclose("33.fang.txt");
	
	
	//如果我们的权限是w或w+就会自动截断
	//会影响我们下面的操作 filesize都没法获取我们文件的大小了 
	//所以如果要在这种情况下使用 需要将filesize放在外面去获取 
	//而且w的截断会给我们下面的操作造成影响，导致我们想要的效果无法实现
	//所以一般都是使用我们的file_get_contents()
	//和file_put_contents()来完成我们的操作
?>