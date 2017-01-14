<?php
	include_once "wechatcommon.php";
	$score = 0;
	if(isset($_GET["score"])){
		$score = $_GET["score"];
	}
	
	var_dump($score);
	
	$code = $_GET["code"];
	$api = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code"
	$result = httpGet($api);
	//var_dump($result);
	$arr = json_decode($result,TRUE);
	$access_token = $arr["access_token"];
	$openid = $arr["openid"];
	$userUrl = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
	$json = httpGet($userUrl);
	//var_dump($json);
	
	$infoArr = json_decode($json,TRUE);
	
?>

