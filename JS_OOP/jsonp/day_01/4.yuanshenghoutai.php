<?php
	include_once "muban.php";
	$cb = $_GET["cb"];
	//如果数据库没有$wd开头的 就会不进if报错 所以 先定义一个$user
	$user = '{"msg":"对不起，此用户不存在"}';
	$wd = $_GET["wd"];
	//echo $wd;
	//$cb = 'success'
	//模糊查询
	$query = "select * from user where name like '%$wd%'";
	$result = mysql_query($query);
	if(mysql_num_rows($result)>0){
		while($row = mysql_fetch_assoc($result)){
			$arr[] = $row;
		}
		$user = json_encode($arr);
	}
	echo $cb."(".$user.")";
	//$json = json_encode($_GET);
	//$json1 = '{"msg":"叭叭叭叭叭叭"}';
	//echo $cb."(".$json.")";
	//echo $cb."(".$json1.")";
?>