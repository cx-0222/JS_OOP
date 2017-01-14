<?php
	include_once "muban.php";
	//var_dump($_GET["content"]);
	$pagesize = 5;
	$content = $_GET["content"];
	//发布留言真正的时间 是数据被插入数据库的时间 而不是前台点提交的时间(避免网络不稳定的时候 前后台时间差)
	$time = time();
	//echo $content;
	//echo $time;
	
	//将前台传过来的数据插入数据库
	$query = "insert into message (content,time) values ('$content','$time')";
	$result = mysql_query($query);
	if(mysql_affected_rows()){
		//echo "插入成功";
		//查找插入的信息的主键 
		$id = mysql_insert_id();
		
		//将插入数据库中的信息取出来返回给前台
		//查询刚插入的信息 取出信息 返回给前台 便于前台创建li标签 
		$query = "select * from message where messageId = $id";
		$result = mysql_query($query);
		//mysql_num_rows($result) 只适用于查询语句获取的结果集 表示结果集中的查询到的记录数
		if(mysql_num_rows($result) == 1){
			$row = mysql_fetch_assoc($result);
			$arr[] = $row;
			
			$query = "select count(*) from message where deleteId=0";
			$result = mysql_query($query);
			if(mysql_num_rows($result)>0){
				$row = mysql_fetch_row($result);
				$size = $row[0];
			}
			$pages = ceil($size/$pagesize);
			$arr["page"] = $pages;
			
			$json = json_encode($arr);
			echo $json;
		}
	}else{
		echo "插入失败";
	}
	
	
?>