<?php
	include_once "muban.php";
	$page = $_GET["page"];
	$messageId = $_GET["id"];
	$row = FALSE;
	//查找下一页的第一条 作为填充
	$query = "select * from message where deleteId=0 order by messageId desc limit ".($page+1)*$pagesize.",1";
	$result = mysql_query($query);
	if(mysql_num_rows($result)==1){
		$row = mysql_fetch_assoc($result);
	}
	$query = "update message set deleteId=1 where messageId='$messageId'";
	mysql_query($query);
	if(mysql_affected_rows() == 1){
		//echo "更新成功";
		//将获取数据传回前台
		if($row){
			$arr[] = $row;
			$arr["errorcode"] = 0;
		}else{
			$arr["errorcode"] = 1;
		}
		//时时分页
		$query = "select count(*) from message where deleteId=0";
		$result = mysql_query($query);
		if(mysql_num_rows($result)>0){
			$roww = mysql_fetch_row($result);
			$pages = ceil($roww[0]/$pagesize);
			$arr["page"] = $pages;
		}
		echo json_encode($arr);
	}
?>