<?php
	include_once "muban.php";
	session_start();
	//var_dump($_SESSION);
	$messageId = $_GET["id"];
	$userId = $_SESSION["userId"];
	$query = "select * from manage where message_id ='$messageId' and user_id='$userId'";
	$result = mysql_query($query);
	if(mysql_num_rows($result) == 1){
		$row = mysql_fetch_assoc($result);
		$state = 0;//没操作 或者顶了又取消顶
		if($row["state"] == 2){//踩操作
			$str = '{"msg":"请取消踩之后再来顶"}';
			echo $str;
			exit();
		}else if($row["state"] == 0){//没操作 
			$state = 1;
		}
		$manageId = $row['manageId'];
		$query = "update manage set state=$state where manageId=$manageId";
		//echo $query;
		mysql_query($query);
		if(mysql_affected_rows()){
			//找到某条留言的点赞人数
			$query = "select count(*) from manage where message_id=$messageId and state=1";
			//echo $query;
			$result = mysql_query($query);
			if(mysql_num_rows($result) == 1){
				$row = mysql_fetch_row($result);
				$count = $row[0];
				//echo $count;
				//将这个数量同步到message表中 传给前端 显示在界面上
				$query = "UPDATE message SET like = $count WHERE messageId = $messageId;";
				//echo $query;
				mysql_query($query);
				if(mysql_affected_rows()){
					//echo "666";
					echo '{"errorcode":0,"count":"'.$count.'"}';
				}
			}
		}
	}else{
		//用户对留言进行了操作 将相关数据插入操作表中
		$query = "insert into manage (user_id,message_id,state) values ('$userId','$messageId',1)";
		mysql_query($query);
		//插入成功后 再一次取判断有多少条数据
		if(mysql_affected_rows()){
			//找到某条留言的点赞人数
			$query = "select count(*) from manage where message_id=$messageId and state=1";
			$result = mysql_query($query);
			if(mysql_num_rows($result) == 1){
				$row = mysql_fetch_row($result);
				$count = $row[0];
				//将这个数量同步到message表中 传给前端 显示在界面上
				$query = "update message set like=$count where messageId=$messageId";
				mysql_query($query);
				if(mysql_affected_rows()){
					echo '{"errorcode":0,"count":"'.$count.'"}';
				}
			}
		}
	}
?>