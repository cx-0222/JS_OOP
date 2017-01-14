<?php
	//删除目录
	//检查(./6.test1)day_04下面的 6.test1 的内容
	//$arr = scandir("./6.test1");
	//var_dump($arr);
	//找打要删除文件夹6.test1下的要删除的内容.DS_store
	//$name = "./6.test1/".$arr[2];
	//echo $name;
	//删除找到的满足条件的.DS_store
	//unlink($name);
	//再次获取(./6.test1)day_04下面的 6.test1 的内容
	//$arr1 = scandir("./6.test1");
	//var_dump($arr1);
	
	//代码只可以执行一次 否则会报错
	//执行完后注释掉再执行下面的代码
	if(rmdir("6.test1")){
		echo "<br><br>";
		echo "删除目录成功";
	}else{
		echo "<br><br>";
		echo "删除目录失败";
	}
	
?>