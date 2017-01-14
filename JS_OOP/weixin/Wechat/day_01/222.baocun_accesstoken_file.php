<?php
	$appid = "wx466aaa1f091327fb";
	$appsecret = "344edc3736803a0897ca0d5a036ba22f";
	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
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
	
	//用来 将access_token保存在文件中 以及 判断access_token是否过期
	function getAccess_token(){
		//全局变量在函数内部使用 先声明
		global $appid;
		global $appsecret;
		//1.查看绑定文件中的access_token是否过期
		$json = file_get_contents("2222.fuxi.txt");
		$arr = json_decode($json,true);
		if($arr["expires_in"] < time()){
			//过期了 重新获取
			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
			$result = httpGet($url);
			$resultArr = json_decode($result,TRUE);
			//获取到的值
			$access_token = $resultArr["access_token"];
			$times = time() + $resultArr["expires_in"]/2;
			//将获取到的值变为一个json字符串 写入文件中
			$setArr["access_token"] = $access_token;
			$setArr["expires_in"] = $times;
			$str = json_encode($setArr);
			file_put_contents("2222.fuxi.txt", $str);
		}else{
			//没过期 直接获取
			$access_token = $arr["access_token"];
		}
		return $access_token;
	}
	
	//测试获取的access_token
	$access_token = getAccess_token();
	$api = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=$access_token";
	$list = httpGet($api);
	var_dump($list);
?>