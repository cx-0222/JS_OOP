<?php
	//$_FILES 是二维关联数组
	var_dump($_FILES);
	//将图片拷贝到当前目录"./1.jpg"
	if (!file_exists("./img")) {
		if (!mkdir("./img")) {
			echo "创建失败";
			//return 了就不会再走了
			return ;
		} 
	}
	
	move_uploaded_file($_FILES["img"]["tmp_name"],"./img/".$_FILES["img"]["name"]);
?>