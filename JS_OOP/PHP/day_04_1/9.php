<?php
	$url = "./test";
	$arr = scandir($url);
	var_dump($arr);
	
	//$i 从2开始 是因为数组的前两个肯定是"."".." 而这两个是不可以删除的
	for ($i=2; $i < count($arr) ; $i++) { 
		echo "<br><br>";
			//$url."/".$arr[$i] 表示删除test下面的
			//删除是按文件名查找
		unlink($url."/".$arr[$i]);
		//如果直接是unlink($arr[$i]) 删除的就是当前目录即day_04_1下面的同名的文件  注意是同名的文件 
	}
	
	if (rmdir($url)) {
		echo "删除成功";
	} else {
		echo "删除失败";
	}
	
?>