<?php
	//php中 方法名不区分大小写
	
	
	//要计算两个数的和
	
	//计算2+3的值并展示
	//无参无返
	//function add(){
		//echo 2+3;
	//}
	//add(); 
	
	//根据传入的参数进行计算 并展示结果
	//!!!php中 传参 接受参数 都得$符
	//有参无返
	//function add($num1,$num2){
		//echo $num1 + $num2;
	//}
	//add(5,6);
	
	//使用一个方法得到3+5的值 并将结果返回出来供我使用
	//无参有返
	//function add(){
		//return 3+5;
	//}
	//$sum = add();
	//echo $sum;
	
	//用户提供两个数值 并将结果返回 以供使用
	function add($num1,$num2){
		return $num1+$num2;
	}
	$sum = add(4,6);
	echo $sum;
?>