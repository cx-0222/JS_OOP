<!--php基础复习-->
<?php
	//!!!php中一定要写分号
	/*
	 * 变量的声明
	 * 1.变量以$开头，后面跟变量名
	 * 2.由字母 数字 下划线构成 不可以数字开头
	 * 3.变量名区分大小写
	 */
	$num = 17;
	$str = "19";
	$sum = $num+$str;
	//php中输出用echo
	echo $num;
	echo "<br><br>";
	echo $str;
	echo "<br><br>";
	//!!!加号在PHP中 只做加号使用 不用于字符串的拼接
	echo $sum;//36
	echo "<br><br>";
	//php中字符串的拼接用.符号
	echo $num.$str;//1719
	
	/*
	 * 变量的赋值
	 * 1.值赋值：即将赋值表达式的值赋值给变量 
	 * 2.引用赋值：两变量指向同一个地址
	 */
	$a = "hello";
	$b = $a;
	echo "<br><br>";
	echo $b;//hello
	//改变$b的值 不影响$a的值
	$b = "world";
	echo "<br><br>";
	echo $a;//hello
	
	$c = "hello";
	//相当于把$c的地址赋给了$d
	$d = &$c;
	echo "<br><br>";
	echo $d;//hello
	//改变$d的值 影响$c的值 因为这里是引用赋值 
	//相当于传址，两个变量指向的是同一个地址
	//$d改变了地址里的内容 $c再去访问的时候 值理所当然的发生了变化
	$d = "world";
	echo "<br><br>";
	echo $c;//world
	
	/*
	 * 变量的变量
	 * 经典例子 用于数组遍历 实现 接受变量的简化
	 */
	$e = "ccc";
	$$e = "dddd";
	echo "<br><br>";
	echo $e;//ccc
	echo "<br><br>";
	echo $$e;//dddd
	echo "<br><br>";
	echo $ccc;//dddd
	
	/*
	 * 超全局变量：php提供了大量的预定义变量，用于提供大量与环境有关的信息
	 * 1. $_SERVER:服务器变量，也是个关联数组，该全局变量包含着服务器和客户端配置
	 * 		以及当前请求环境的的有关信息
	 * 2. $_GET:该变量包含使用get方法传递的参数的有关信息 也是一个关联数组
	 * 
	 */
	echo "<br><br>";
	//输出全局变量用print_r(也是用来输出数组的)
	print_r($_SERVER);
	//要取出关联数组中key的值如下 并且如果取出的key不存在会报错！！！
	echo "<br><br>";
	echo $_SERVER["SERVER_NAME"];//当前运行脚本所在服务器的主机名
	
	echo "<br><br>";
	print_r($_GET);
	echo "<br><br>";
	//去关联数组相应key的值
	echo $_GET["username"];
	echo "<br><br>";
	echo $_GET["password"];
	if($_GET["username"] == "cx" && $_GET["password"] == "111"){
		echo "<br><br>";
		echo "登录成功";
	}else{
		echo "<br><br>";
		echo "登录失败";
	}
	//例子：使用变量的变量来实现接收的简化
	foreach ($_GET as $key => $value) {
		echo "<br><br>";
		$$key = $value;
		//只需要输出这一个变量 就可以输出所有的值
		echo $$key;
	}
	
	
	
		
	/*
	 * $GLOBALS 所有全局变量数组
	 */
	$num = 1;
	function cc(){
		//在方法中想要直接访问方法外的变量 是不可以的
		echo "<br><br>";
			//$GLOBALS 是这个页面中所有全局变量的集合 
			//想要获取num的值 只有通过$GLOBALS
		print_r($GLOBALS);
		echo "<br><br>";
		//方法1：
		echo $GLOBALS["num"];
		//方法2：
		echo "<br><br>";
		global $num;
		echo $num;
	}
	cc();
	
	/*
	 * 常量：
	 * 1.常量大小写敏感
	 * 2.常量是全局的 可以在脚本的任何地方引用
	 * 3.常量使用define()的函数定义
	 */
	//自定义常量 define()函数 三个参数 第三个默认false 表示大小写敏感 
		//为true的时候 表示大小写不敏感
	define('PI', 3.1415926535,true);
	echo "<br><br>";
	echo pi;
	
	//内置常量 又称系统常量 可以直接拿来用的
	echo "<br><br>";
	echo PHP_OS;//php所在操作系统的名称
	echo PHP_VERSION;//当前php的版本号
	
	/*
	 * 魔术常量:
	 */
	echo "<br><br>";
	echo __LINE__;//文件中的当前行号
	echo "<br><br>";
	echo __FILE__;//文件的完整路径 和 文件名
	function aaa(){
		echo "<br><br>";
		echo __FUNCTION__;//函数名
	}
	
	/*
	 * 标量数据类型 
	 */
	//字符串 有三种定义方式 单引号 双引号 定界符
	//1.单引号
	$str1 = "hello";
	echo "<br><br>";
	//单引号字符串中出现的变量不会被变量的值替代
	echo '$str1';//$str1
	echo "<br><br>";
	//!!!双引号字符串中的变量会被变量值替代
	//{}用来区分变量和普通字符
	echo "{$str1}hhhlhlhhlkhl";//hello
?>