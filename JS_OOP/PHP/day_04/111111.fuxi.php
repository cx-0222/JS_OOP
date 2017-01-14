<!--白天知识点复习-->
<?php
//一、文件的操作
	//1.打开文件 fopen()将一个资源文件绑定到一个流或者句柄
	$fh = fopen("1.test.txt","r");
	var_dump($fh);
	//2.读取数据
		//① fread(指定资源,长度)
	echo "<br><br>";
	//echo fread($fh,2);
	echo "<br><br>";
		//filesize("1.test.txt")读取整个文件 里面的参数为要读取的文件名！！！
	//echo fread($fh,filesize("1.test.txt"));
		//② fgets()从指定的文件中读取一行字符 碰到换行符 EOF 或已经读取到length-1后停止
	echo "<br><br>";
	echo fgets($fh);//输出第一行
		//遍历输出每一行
		$fh1 = fopen("1.test.txt","r");
		//feof()判断文件指针是不是在文件的结尾处
		while (!feof($fh1)) {
			echo "<br><br>";
			echo fgets($fh1);
		}
		//③ file() 将文件读取到数组中 各元素由换行符分隔!!
		$arr = file("1.test.txt");
		echo "<br><br>";
		var_dump($arr);
		//④ file_get_contents()将文件内容读取到字符串中
		$str = file_get_contents("1.test.txt");
		echo "<br><br>";
		echo $str;
	//3.关闭文件 fclose()关闭文件 这文件的文件指针必须是有效的 且文件必须是有fopen()或fsockopen()打开的
	fclose($fh);
	
	//4.写入文件
		//① fwrite(resource,string[,length]); 将string写入resource中 
		//如果指定length参数，将在写入length个字符时停止
	//!!!注意：1、"w"表示以替换方式写入，删除之前的内容,"a"表示以追加方式写入 在原内容的基础上写入
	//$fh2 = fopen("1.test.txt","a");
	//fwrite($fh2,"zheshixierude",1);
	//fclose($fh2);
		//② file_put_contents()将一个字符串写入文件 与依次调用fopen() fwrite() fclose()的作用是一样的
		//也就是说在用 file_put_contents()的时候 不需要用这三个函数
		//!!!默认以替换的方式写入 即"w"方式
		//第三个参数为FILE_APPEND时 表示以追加的方式写入
	file_put_contents("1.test.txt","hello",FILE_APPEND);
	
	//5.复制文件
	//copy(soure,dest)将文件从soure复制到dest 成功则返回true 失败则返回false
	//!!!注意：此处的"11.test.txt" 是要新建的文件 所以要求对day_04有读写权限！！！
	//同样下面的重命名 删除 都得对上一层文件夹有权限要求
	if(copy("1.test.txt","11.test.txt")){
		echo "<br><br>";
		echo "拷贝成功";
	}else{
		echo "<br><br>";
		echo "拷贝失败";
	}
	//6.文件重命名
	//rename(oldname,newname)将oldname重命名为newname 返回值为布尔类型
	 if(copy("11.test.txt","111.test.txt")){
		echo "<br><br>";
		echo "重命名成功";
	}else{
		echo "<br><br>";
		echo "重命名失败";
	}
	
	//7.删除文件
	//unlink(文件名) 返回值为布尔类型
	if(unlink("111.test.txt")){
		echo "<br><br>";
		echo "删除成功";
	}else{
		echo "<br><br>";
		echo "删除失败";
	}
	
	//文件操作的例子！！
	//1.模拟网站访问量
		//访问txt的内容 获取里面表示访问量的变量 
		//对该变量做++操作
		//再将修改过的访问值变量以替换的方式写入文件方便下一次获取
	$num = file_get_contents("3.log.txt");
	$num++;
	echo "<br><br>";
	echo "该网页的访问量为{$num}次";
	file_put_contents("3.log.txt","$num");
?>