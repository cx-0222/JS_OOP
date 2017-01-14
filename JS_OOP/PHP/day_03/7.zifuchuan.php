<?php
	$url = "HTTP://WWW.COM";
	//strtolower()将大写字符串变为小写
	//echo strtolower($url);
	//echo "<br><br>";
	//echo $url;
	
	//查找字符 strpos() 区分大小写!!
	//第三个参数是可选参数 写什么值 就从什么位置开始包含写的那个值
	//echo strpos($url,"TP");
	
	//替换 区分大小写！！
	//count如果被指定，它的值将被设置为替换发生的次数。不是手动设置替换多少次
	//如果设置了第四个参数 就会将方法替换的次数设置到我们的第四个参数中 
	//而不是通过第四个参数来决定我们要替换多少次
	$count = 1;
	//echo str_replace("T","x",$url,$count);
	//echo "<br><br>";
	//echo $count;
	
	//查询到的结果如果是返回后面的内容会帮我们将查询的部分也返回出来 
	//而如果我们要返回查询结果前面的内容 就不会带上我们查询的部分了；
	//echo strstr($url,"TT",true);
	
	
	//不给第二个参数的时候 删除空格  给了第二个参数 就是删除空格和你给的值
	$str = "ddsa  ";
	echo "(".trim($str,"d").")";
	
	
?>