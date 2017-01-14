
	<?php
	//var_dump($_GET);	
	$score = $_GET["score"];
	$openid = $_GET["openid"];
	$nickname = $_GET["nickname"];
	$headimgurl = $_GET["headimgurl"];
	// 连主库
	$db = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	
	// 连从库
	// $db = mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);
	if ($db) {
		mysql_select_db(SAE_MYSQL_DB, $db);
        $query = "select * from user";
		$result = mysql_query($query);
		if(mysql_num_rows($result)>0){
            while($row = mysql_fetch_assoc($result)){
                if($row["openid"] == $openid){
					//同一个人  更新分数
					if($row["score"] < $score){
						$query = "update user set score='$score' where openid='$openid'";
						mysql_query($query);
					}
				}
				//不是同一个人
				$query = "insert into user (nickname,openid,score,img) values ('$nickname','$openid','$score','$headimgurl')";
				$result = mysql_query($query);
            }
		}
        
        
        $query = "select * from user order By score desc limit 0,10";
		$result = mysql_query($query);
		if(mysql_num_rows($result)>0){
			while($row = mysql_fetch_assoc($result)){
				$arr[] = $row;
			}
		}else{
			$json = '{"msg":"抱歉，还没有排名榜哦"}';
		}
		$json = json_encode($arr);
		echo $json;
	}

?>

