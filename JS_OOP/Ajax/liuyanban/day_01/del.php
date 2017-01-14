<?php
	include_once "muban.php";
	$messageId = $_GET["messageId"];
	//echo $messageId;
	
	$query = "update message set deleteId=1 where messageId='$messageId'";
	$result = mysql_query($query);
	$arr = [];
	if(mysql_affected_rows()){
			$lastId = $_GET['lastId'];
			$query = "select * from message where messageId<'$lastId' and deleteId=0 order by messageId desc limit 0,1";
			$result = mysql_query($query);
			if(mysql_num_rows($result)==1){
				$row = mysql_fetch_assoc($result);
				//var_dump($row);
				$arr[]=$row;	
			}
			//查询总的留言记录数
				$pagesize = 5;
				$query = "select count(*) from message where deleteId=0";
				$result = mysql_query($query);
				if(mysql_num_rows($result)==1){
					$row = mysql_fetch_row($result);
					$size = $row[0];
				}
				//应该有的总的页数
				$pages = ceil($size/$pagesize);
				$arr["page"] = $pages;
	}
	
//	$pagee = $_GET['']
//	if(){
//		
//	}
	$json = json_encode($arr);
	echo $json;
	
?>