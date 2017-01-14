<!--由表单提交的文件 保存在超全局变量 $_FILES 中-->
<!--文件上传的相关配置：
	1.表单的数据提交方式为post
	2.设定enctype属性值为: multipart/form-data 
	-->
<?php
	//$_FILES 是二维关联数组
	//$_FILES是一个二维数组，数组中共有5项：
	//$_FILES["userfile"]["name"]	上传文件的名称
	//$_FILES["userfile"]["type"] 	上传文件的类型
	//$_FILES["userfile"]["size"] 	上传文件的大小, 以字节为单位
	//$_FILES["userfile"]["tmp_name"]	文件上传后在服务器端储存的临时文件名
	//$_FILES["userfile"]["error"] 	文件上传相关的错误代码
	var_dump($_FILES);
	//因为文件上传后用的还是服务器端的临时文件名
	//所以要将其拷贝到当前目录
	//判断当前目录有没有这个文件夹  没有就新建
	if (!file_exists("./imgg")) {
		if(!mkdir("./imgg")){
			echo "创建失败";
			//return 了就不会再走了
			return ;
		}
	}
	//一切准备好后
	//move_uploaded_file()将上传文件由临时目录移动到目标目录
	move_uploaded_file($_FILES["img"]["tmp_name"],"./imgg/1.jpg");
	
?>