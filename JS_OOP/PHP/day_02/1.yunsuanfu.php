<?php
	//$arr = array(1,2,3);
	$arr[] = "cc";
	$arr[] = "ee";
	$arr[] = "rr";
	foreach ($arr as $key => $value) {
		//$key 表示下标
		//$sum.=$value;
		$array[] = $value;
	}
	//echo $sum;
	print_r($array);
	
	
	$arrs = array(1,2,3,4,5);
	
	for ($i=0; $i < count($arrs); $i++) {
		if($arrs[$i]==3){
			break;//结束整个循环
			continue;//结束当前本次循环
		} 
		echo "<hr>";
		echo $arrs[$i];
	}
//	foreach ($arrs as  $value) {
//		echo "<hr>";
//		echo $value;
//	}
?>