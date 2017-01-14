<?php
//一、拷贝
	//haha.txt 是要新建的文件 所以需要对文件夹day_04有写权限 所以需要先将文件夹的权限改为可读可写
	if(copy("2.index.txt","haha.txt")){
		echo "<br><br>";
		echo "文件拷贝成功";
	}else{
		echo "<br><br>";
		echo "文件拷贝成功";
	}
	
//二、重命名
	if(rename("haha.txt","4.haha.txt")){
		echo "<br><br>";
		echo "文件重命名成功";
	}else{
		echo "<br><br>";
		echo "文件重命名成功";
	}
	
//三、删除
	if(unlink("4.haha.txt")){
		echo "<br><br>";
		echo "文件删除成功";
	}else{
		echo "<br><br>";
		echo "文件删除成功";
	}
?>