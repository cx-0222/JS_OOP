<?php
	//var_dump($_COOKIE);
	//echo "<br><br>";
	//1.设置cookie
		//刷新一下才可以？？
		//setcookie("cookie名字(必填)","cookie值",设置过期时间和日期)
	setcookie("username","cx");
	//var_dump($_COOKIE);
	//echo "<br><br>";
	//echo $_COOKIE["username"];
	//2.设置cookie的过期时间
		// time() 获取一个标准的Unix时间标记 由秒为单位
		//要设置cookie什么时候过期 就在time()后面加上多少秒 注意是多少秒！！！
	setcookie("username","cx",time()+60)	;
	//3.删除cookie
		//① 调用只带name参数的setcookie函数
	setcookie("username");	
		// ② 将time()-1,使得cookie过期失效
	setcookie("password","1",time()-1);	
	
	
	//使用cookie的注意点！
	//1.设置cookie之前不能有任何的html的输出，哪怕是空格也不可以
	//2.设置cookie之后，在当前页面调用echo $_COOKIE["name"] 
	//不会有任何的输出 必须刷新或者到下一个页面才能看到cookie值
	
?>