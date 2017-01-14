<?php
	include_once "muban.php";
	//加密
	function encrypt($data, $key){
		$key = md5($key);
		print_r($key);
  		$x = 0;
  		$len = strlen($data);
  		$l = strlen($key);
  		for ($i = 0; $i < $len; $i++)
  		{
    			if ($x == $l){
     			$x = 0;
    			}
    			$char .= $key{$x};
    			$x++;
  		}
  		for ($i = 0; $i < $len; $i++){
  			//chr() 函数从指定的 ASCII 值返回字符。ASCII 值可被指定为十进制值、八进制值或十六进制值
    			//ord() 函数返回字符串中第一个字符的 ASCII 值。
    			$str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
  		}
  		//将字符串以 BASE64 编码。
  		return base64_encode($str);
	}
	
	//解密
	function decrypt($data, $key){
	    $key = md5($key);
	    $x = 0;
	    $data = base64_decode($data);
	    $len = strlen($data);
	    $l = strlen($key);
  		for ($i = 0; $i < $len; $i++){
    			if ($x == $l){
     			$x = 0;
    			}
    			$char .= substr($key, $x, 1);
    			$x++;
  		}
  		for ($i = 0; $i < $len; $i++){
    			if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1))){
      				$str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
    			}else{
      				$str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
    			}
  		}
  			return $str;
	}
	
	$data = '百度baidu.com'; // 被加密信息
	$data=iconv("gbk","utf-8",$data);
	$key = 'www.baidu.com';   // 密钥
	$encrypt = encrypt($data, $key);
	$decrypt = decrypt($encrypt, $key);
	echo $encrypt, "<br/>", $decrypt;
?> 

