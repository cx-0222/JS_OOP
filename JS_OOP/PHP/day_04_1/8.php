<?php
	
	$url = "./test2";
	$arr = scandir($url);
	var_dump($arr);
	//因为"."和".."不可以删 又因为$arr的前两个肯定是"."".." 所以i从2开始
	for ($i=2; $i < count($arr); $i++) { 
		echo "<br><br>";
		echo $arr[$i];
		//unlink($arr[$i]);
		unlink($url."/".$arr[$i]);
	}
	
	if (rmdir($url)) {
		echo "删除成功";
	} else {
		echo "删除失败";
	}
	
?>