<?php
//一、运算符 js 类似 不同的在于
	//1.在PHP中 +仅仅代表加运算 .= 表示拼接
	$a = 12;
	$b = 13;
	echo $a + $b;//25
	echo "<br><br>";
	echo $a.$b;//1213
	$str1 = "hello";
	$str2 = $str1."wrold";
	echo "<br><br>";
	echo $str2;
	
	//2.异或：有且仅有一个为true，则返回true
	$c = 15;
	echo "<br><br>";
		//真真也为假 假在PHP中表示为空 即什么也不输出
	echo $a < $b xor $b < $c;
	echo "<br><br>";
		//只有 有且只有一真才为真 真为1 
	echo $a > $b xor $b < $c;	
		
		
//二、foreach 遍历数组
	//1.遍历索引数组
	$arr = array(1,2,3,4,5);
	echo "<br><br>";
		//输出数组不可以用echo 会报错!!!
	var_dump($arr);
	foreach ($arr as $value) {
		echo "<br><br>";
		echo $value;
	}
	//2.遍历关联数组
	$arr1["aaa"] = "aaa";
	$arr1["bbb"] = "bbb";
	$arr1["ccc"] = "ccc";
	foreach ($arr1 as $key => $value) {
		echo "<br><br>";
		echo $key."是：".$value;
	}
	
	
//三、函数
	//！！！在php中 函数名不区分大小写，不过在调用函数的时候 通常使用其在定义时相同的形式
	//！！php不支持函数重载 所以自定义函数不能和内置函数重名
	
	//1.值传递：函数内对参数的改变不会影响函数外部
	$num = 10;
	function Num($num){
		$num++;
		echo "<br><br>";
		echo $num;//11
	}
	Num($num);
	echo "<br><br>";
	echo $num;//10 函数内部的改变不会影响外部的值
	
	//2.引用传递 传址：函数内部对参数的改变对外部参数有影响
	//!!!!因为在接受参数的时候接受的是参数的地址 所以在改变参数的值的时候 
	//就是将这个地址里面的内容改变了 所以外部的参数的值也发生了改变
	$num1 = 10;
	function Num1(&$num1){
		$num1++;
		echo "<br><br>";
		echo $num1;//11
	}
	Num1($num1);
	echo "<br><br>";
	echo $num1;//11 函数内部的改变影响外部的值
	echo "<br><br>";
//四、引入文件
	//include 是写几次就引入几次 include_once 是先验证是否已经引入过了 如果引入过了 就不在引入了
	//但他只检测本行之前
	//include("2.test1.php");
	//include_once("2.test.php");
	//require与include 作用相同
	//require_once 与 require 相同
	//!!！当文件不存在或文件存在错误的时候 require会中断执行并显示致命错误 
	//而include会继续执行 并显示一个警告错误
	//require 一般放在php程序的最前面
	require("2.test1.php");
	require_once("2.test.php");
	
//五、数组
	//索引数组：没有明确设置键值,索引为整数，如果没有指定索引值则默认为0 依次递增
	//创建数组的方法；
	$array[] = 1;
	$array[] = 2;
	echo "<br><br>";
	var_dump($array);
	$array1[] = "aaa";
	$array1[] = "bbb";
	echo "<br><br>";
	var_dump($array1);
	$array2 = array(1,2,"lan");
	echo "<br><br>";
	var_dump($array2);
	//关联数组：索引为字符串的数组
	$array3["aaa"] = "aaa";
	$array3["bbb"] = "bbb";
	echo "<br><br>";
	var_dump($array3);
	$array4 = array("name" => "cx","age" => 18);
	echo "<br><br>";
	var_dump($array4);
	//当有某一个键值没有设置的时候 用0代替 多个没设置 从0开始依次递增
	$array5["aaa"] = "aaa";
	$array5[] = "bbb";//0
	$array5[] = "ccc";//1
	echo "<br><br>";
	var_dump($array5);
	
	//用函数创建数组
	//range(start,limit,step):建立一个包含指定范围的单元的的数组
	//start 指序列的第一个值
	//limit 序列结束于limit值
	//step 表示步长 默认为1
	$sum = range(1,100,5);//最后一个为96 因为100与96之间不足5 所以100不满足 而101超出100范围 也不大符合
	var_dump($sum);
	
	//数组的基本操作
    $arrayName = array('name' =>'cx' ,'age'=>21,'sex'=>'女','hobby'=>'sleepping');
    echo "<br><br>";
	var_dump($arrayName);
    //1.删除数组元素 对于索引数组 直接 数组名[下标] 即可
    unset($arrayName["name"]);
    echo "<br><br>";
	var_dump($arrayName);
	//2.count()取得数组的大小 获取数组的长度 常用于for循环中循环变量的判读
	echo "<br><br>";
	echo count($arrayName);//3
	
	//3.in_array("被比较的值"，数组)检查数组中是否包含某个值 返回值为布尔型 存在这个值返回1 不存在什么也不返回
	echo "<br><br>";
	echo in_array('21',$arrayName);
	
	//遍历数组
	//for循环遍历 遍历索引数组
	for ($i=0; $i <count($array) ; $i++) { 
		echo "<br><br>";
		echo $array[$i];
	}
	//foreach 遍历关联数组
	foreach ($arrayName as $key => $value) {
		echo "<br><br>";
		echo $key."是：".$value;
	}
	
	//数组的排序
	//sort()升序 rsort()降序
	$Arr = array(2,1,4,3,7,5);
	echo "<br><br>";
	var_dump($Arr);
	//sort() 在原数组上进行排序 由小到大 
	sort($Arr);
	echo "<br><br>";
	var_dump($Arr);
	//rsort()在原数组上进行排序 由大到小
	rsort($Arr);
	echo "<br><br>";
	var_dump($Arr);
	//对关联数组同样适用 按ascii码排序
	$Arr1 = array('name'=>'cx','age'=>'21');
	echo "<br><br>";
	var_dump($Arr1);
	//sort() 在原数组上进行排序 由小到大 
	sort($Arr1);
	echo "<br><br>";
	var_dump($Arr1);
	//rsort()在原数组上进行排序 由大到小
	rsort($Arr1);
	echo "<br><br>";
	var_dump($Arr1);
	
	
	//ksort()升序 krsort()降序 对数组按索引进行升序或降序 并保持索引关系
	$fruits = array('l'=>'lemon','o'=>'orange','b'=>'banana','a'=>'apple');
	echo "<br><br>";
	var_dump($fruits);
	echo "<br><br> 升序排序后：";
	sort($fruits);
	var_dump($fruits);
	echo "<br><br>按索引升序排序后：";
	ksort($fruits);
	var_dump($fruits);
	//降序
	echo "<br><br> 降序排序后：";
	rsort($fruits);
	var_dump($fruits);
	echo "<br><br>按索引降序排序后：";
		//降序排序后 索引值也是有大到小 保持了索引关系 并不是由0~3
	krsort($fruits);
	var_dump($fruits);
	
	//！！二维数组
	$erArr = array(array(1,2,3,4),array(5,6,7,8),array(9,10,11,12));
	echo "<br><br>";
	var_dump($erArr);
	
	$erArr1 = array(
		"11"=>array(1,2,3,4),
		"22"=>array(5,6,7,8),
		"33"=>array(9,10,11,12)
		);
	echo "<br><br>";
	var_dump($erArr1);
	
	$erArr2 = array(
		"11"=>array('name'=>'cx','age'=>21),
		"22"=>array('name'=>'cw','age'=>23),
		"33"=>array('name'=>'lck','age'=>24)
		);
	echo "<br><br>";
	var_dump($erArr2);
	//二维数组的遍历
	foreach ($erArr2 as $key => $value) {
		//外层的值是里层的数组
		foreach ($value as $key => $value) {
			echo "<br><br>";
			echo $key."是：".$value;
		}
	}

//字符串
	//1.获取字符串的长度 strlen() 直接返回字符串的长度
	$password = "12345678hhhhha";
	echo "<br><br>";
	echo strlen($password);//14
	//可用于密码的判断
	if (strlen($password) < 8) {
		echo "密码的长度不可以小于8位";
	}	
	
	//2.strtolower() 将字符串转换为小写字母
	$string = "HTTP:WWW";
	echo "<br><br>";
		//有返回新字符串 原字符串没影响!!
	echo strtolower($string);
	echo "<br><br>";
	echo $string;	
	
	//3.strtoupper() 将字符串转换为大写字母
	$string1 = "http:www";
	echo "<br><br>";
		//有返回新字符串 原字符串没影响!!
	echo strtoupper($string1);
	echo "<br><br>";
	echo $string1;	
	
	//4.查找 strpos(string,find[,start]);区分大小写 而stripos(string,find[,start]);不区分大小写
	//在字符串中以区分大小写的方式找到find第一次出现的位置，如果没有找到就返回false
	//可选参数start指定开始查找的位置
	echo "<br><br>";
	echo strpos("how old are you","ow");//1 说明"o"的下标为1  
	echo strpos("how old are you","ow",2);//从下标2即w处开始查找 当然查找不到 所以返回false 即什么都没有 
	
	//替换 str_replace ( search, replace, subject [, int &count] )  str_ireplace不区分大小写
	//在subject中搜索search，用replace来替换，
	//找到了就替换 没找到subject不变
	//！！有返回值不会影响原字符串的值
	$str3 = "test@16@3.com";
	//!!!最后一个参数不可以直接用数字 
	//因为它会随替换的次数的变化而变化(或者说 它就是用来记录替换的次数！！！)
	$count;
	$email = str_replace("@","(at)",$str3,$count);
	echo "<br><br>";
	echo $email;
	echo "<br><br>";
	echo $str3;
	echo "<br><br>";
	echo $count;
	
	
	//截取字符串
	//substr(string,int start[,int length])
	//在string中从start处开始截取length长度的字符串 length没写的时候 默认到字符串末尾
	//！！下标从0开始
	echo "<br><br>";
	echo substr("hello world",1);
	echo "<br><br>";
		//包括开始位置的字符
	echo substr("hello world",1,6);
	
	//strstr(string,search,bool)
	//从string中搜索search 并根据第三个参数返回search后面的数据还是前面的数据
	echo "<br><br>";
		//第三个参数默认false 返回后面的数据 此时包括search
		//当第三个参数为true时  返回前面的数据 此时不包括search
	echo strstr("hello world",'or',true);
	
	
	//删除字符串?????!!!
	//trim(string,[,string charlist]);
	//删除string 空格或其他预定义字符	
	//ltrim 删除左边的;
	//rtrim 删除右边的;
	
	$str4 = "dssdfsaf  ";
	echo "<br><br>";
		//没有设置charlist的时候 删除左右的空格
	echo "(".trim($str4).")";
	echo "<br><br>";
		//???
	echo "(".trim($str4,"sd").")";
	
	//反转字符串 strrev()
	$str5 = "hello world";
	echo "<br><br>";
		//有返回值 不会影响原字符串的值
	//echo strrev($str5);
	echo "<br><br>";
	//echo $str5;
	
	//nl2br()将字符串中的换行转换为<br />
	//回车在解析的时候会被解析为空格
	//但此函数会将其转换为html5的<br /> 实现换行
	$str6 = "hello
	wrold";
	echo "<br><br>";
	echo $str6;
	echo "<br><br>";
	echo nl2br($str6);
	
	//strip_tags(string[,指定保留的标签])删除字符串中HTML XML PHP标签
	$str7 = 'test<a href="http://www.163.com">163</a>';
	echo "<br><br>";
	echo $str7;
	echo "<br><br>";
		//有返回值 不会对原字符串产生影响
	echo strip_tags($str7,"<a></a>");
	echo "<br><br>";
	echo $str7;
	
	//htmlspecialchars() 把一些预定义的字符转换为HTML实体???
	$str8 = "<a href='test'>test</a>";
	echo $str8;
	echo "<br><br>";
	$new = htmlspecialchars($str8,ENT_QUOTES);
	echo $new;
	echo "<br><br>";
		
	//explode("delimiter",string[,limit])返回由字符串组成的数组 使用一个字符串分割另一个字符串
	//此函数返回由字符串组成的数组，每个元素都是 string 的一个子串，
	//它们被字符串 delimiter 作为边界点分割出来。
	//如果设置了 limit 参数并且是正数，则返回的数组包含最多 limit 个元素，
	//而最后那个元素将包含 string 的剩余部分。
	//如果 limit 参数是负数，则返回除了最后的 -limit 个元素外的所有元素。 ????
	//如果 limit 是 0，则会被当做 1。
	$str10 = "1,2,3,4,5";
	$arr10 = explode(",",$str10,"-1");//1 2 3 4
	var_dump($arr10);
	
	//将数组元素连接成字符串
	$arr11 = array("a","b","c","d");
	$str11 = implode(",",$arr11);
	echo "<br><br>";
	echo $str11;
	
?>