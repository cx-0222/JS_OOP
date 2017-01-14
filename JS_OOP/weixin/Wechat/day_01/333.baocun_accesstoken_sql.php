<?php
	include_once "muban.php";
	//引进$url 和 httpGet()方法
	include_once "wechatcommon.php";
	//查询accessToken表格 判断里面是否有数据 
	function getAccessTokenSql(){
		global $url;
		$query = "select * from accessToken";
		$result = mysql_query($query);
		if(mysql_num_rows($result) == 1){
			$row = mysql_fetch_assoc($result);
			//表示有数据存在 只需要判断是否过期
			if($row["times"] < time()){
				//过期了 重新获取 并更新数据库里的数据
				$result = json_decode(httpGet($url),TRUE);
				$access_token = $result["access_token"];
				//加上当前时间 time() 否则时时刻刻都在过期状态!!!!!!
				$times =time() + $result["expires_in"];
				$query = "update accessToken set access_token='$access_token',times='$times'";
				mysql_query($query);
			}else{
				//没过期
				$access_token = $row["access_token"];
			}
		}else{
			//没有数据 获取数据直接插入
			$result = json_decode(httpGet($url),TRUE);
			$access_token = $result["access_token"];
			$times = $result["expires_in"];
			$query = "insert into accessToken (access_token,times) value ('$access_token','$times')";
			mysql_query($query);
		}
		return $access_token;
	}
	
	$access_token = getAccessTokenSql();
	var_dump($access_token);
?>