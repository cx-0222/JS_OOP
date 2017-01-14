<!--白天知识点复习-->
<?php
//读取目录
	//1.打开目录句柄opendir
	//"."表示当前文件所在的文件夹 即"day_04"
	//".."表示当前文件所在文件夹的上一级文件夹即"PHP"文件夹
	$fh = opendir(".");
	var_dump($fh);
	//2.readdir()将返回指定目录中的各个元素
	//在没有遍历的时候 返回第一个目录下的第一个文件
	$file = readdir($fh);
	echo "<br><br>";
	var_dump($file);
	//遍历返回目录下所有的文件
	while($file = readdir($fh)){
		//echo "<br><br>";
		//var_dump($file);
	}
	
	//3.以数组的形式返回制定目录下的所有文件
	$arr = scandir(".");
	echo "<br><br>";
	var_dump($arr);
	
	//4.关闭目录句柄
	closedir($fh);
	
	
	//5.删除目录 即删除文件夹 
		//注意：
			//1.要删除的文件夹必须是空文件夹 否则无法删除 
			//因为我们的系统文件管理机制会帮我们生成.DS_store这个文件
			//所以在删除的时候 一定要看清楚 该文件夹是否清空了 
			//！！一定要用scandir()输出看一下
	//要删除test2文件 首先检查它是不是空文件夹	
	//$arr1 = scandir("./test3");
	echo "<br><br>";
	//var_dump($arr1);
	//发现除了"."".."还有个".DS_store"其中"."".."是不可删的 而".DS_store"是必须删的
	//所以先获取./test3下的".DS_store"文件
	//$name = "./test3/".$arr1[2];
	//echo "<br><br>";
	//echo $name;
	//找到后 删除文件！！ 这是个文件 
	//!!!删除文件夹的文件要保证有读写权限
	//unlink($name);
	//删除后再次检查一遍 是否真的删除了 但此时要把删除语句注释掉 因为如果删掉了再次删除就会报错
	//$arr2 = scandir("./test3");
	//echo "<br><br>";
	//var_dump($arr2);
	
	//当文件夹里面没有文件的时候 可以删除文件夹
	//rmdir()删除指定文件夹 返回值为布尔型
	//if (rmdir("./test3")) {
		//echo "<br><br>";
		//echo "删除目录成功";
	//} else {
		//echo "<br><br>";
		//echo "删除目录失败";
	//}
	
	//同样这些代码也只能执行一遍 再次执行就会报错
	
	
	//6.创建文件夹
	//mkdir(pathname) 新建一个由pathname指定的目录 返回值为布尔值
	//if (mkdir("./22.test")) {
		//echo "<br><br>";
		//echo "创建成功";
	//} else {
		//echo "<br><br>";
		//echo "创建失败";
	//}
	//创建成功后就不需要再次执行了 否则会报文件已经存在的错误
	
	//7.修改文件
	//用chmod()修改权限 只适用于用代码创建的文件夹 返回值为布尔型
	//最后一位表示所有人的权限 倒数第二位表示所有人所在的组的权限 倒数第三个表示所有者的权限
	//0777 表示可读可写
	//0775 表示只读
	if (chmod("./22.test",0777)) {
		echo "<br><br>";
		echo "修改成功";
	} else {
		echo "<br><br>";
		echo "修改失败";
	}
	
	//8.检查文件是否存在
	//file_exists() 返回值为布尔型
	//检查文件是否存在 存在返回存在 不存在就新建这个文件夹
	$url = "./ttt";
	if (file_exists($url)) {
		echo "<br><br>";
		echo "文件存在";
	} else {
		if (mkdir($url)) {
			echo "<br><br>";
			echo "文件不存在，但创建成功";
		} else {
			echo "<br><br>";
			echo "文件不存在，但创建失败";
		}
	}
	
//解析目录路径函数
	$path = "/home/www/data/users.txt";
	//1. basename($path,".txt")返回路径中的文件名 加上".txt"表示去掉".txt"后缀
	$url1 = basename($path);
	echo "<br><br>";
	echo $url1;
	//2. dirname() 返回除文件名外的路径
	$dir = dirname($path);
	echo "<br><br>";
	echo $dir;
	//3.pathinfo() 将路径信息用关联数组返回出来 包括四个部分
	//目录名 dirname，文件名 filename， extension扩展名，basename文件名+扩展名(如果有扩展名的话)
	$arr3 = pathinfo($path);
	echo "<br><br>";
	var_dump($arr3);
?>