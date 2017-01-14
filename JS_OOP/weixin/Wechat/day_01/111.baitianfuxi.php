<?php
	//登录测试号 在开发者工具中找到 测试号管理 获取appID 和 appsecret
	$appid = "wx466aaa1f091327fb";
	$appsecret = "344edc3736803a0897ca0d5a036ba22f";
	//通过get请求方式获取access_token
		//通过地址直接获取
	//$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx466aaa1f091327fb&secret=344edc3736803a0897ca0d5a036ba22f";
		//通过代码获取
	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
	//传入接口 返回access_token
	function httpGet($url) {
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
	    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
	    // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	    //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
	    curl_setopt($curl, CURLOPT_URL, $url);
	
	    $res = curl_exec($curl);
	    curl_close($curl);
		
	    return $res;
  }
	$result = httpGet($url);
	//var_dump($result);//string类型
	//将json字符串变成对象或关联数组(加第二个参数 true)
	$what = json_decode($result,TRUE);
	//获取到access_token
	$access_token = $what["access_token"];
	//var_dump($access_token);
	
	//验证获取到的是否是真的access_token
		//通过获取微信服务器的IP地址
	$api = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=$access_token";
	$list = httpGet($api);
	var_dump($list);
?>