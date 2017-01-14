<!--php基础-->

<?php 
	//!!!结尾加分号！！
     echo "helloWold";
     echo "<hr>";
     //变量
     $age = 28;
     echo $age;
     echo "<hr>";
     $Age = "12";
  	 echo $Age;
  	 //php 中 加号制作运算不做拼接
  	 $sum = 15 + "3";
  	 echo "<hr>";
  	 echo $sum;//18
  	 //拼接用.符号
  	 echo "<hr>";
  	 echo $age.$Age;
     //值赋值 只是数值的拷贝
     //不会关联起来
     $a = "123";
     $b = $a;
     echo "<hr>";
     echo $b;
     echo "<hr>";
     $b = "321";
     echo $b;
     echo "<hr>";
     echo $a;
     //引用赋值
     $name1 = "lck";
     $name2 = &$name1;
     echo "<hr>";
     echo $name2;
     echo "<hr>";
     $name2 = "cx";
     echo $name2;
     echo "<hr>";
     echo $name1;
     
     //变量的变量
     $c = "ccc";
     $$c = "hhh";
     echo "<hr>";
     echo $c;
     echo "<hr>";
     echo $ccc;
     echo "<hr>";
     echo $$c;
     
     //print_r():打印或输出超全局变量(用来输出数组的)
     //echo 不可以用来输出数组
     
     //$_SERVER 是一个超全局变量
     //实际上是一个关联数组
     //想要从关联数组中取出值来 就是 数组[值] 的形式
     echo "<hr>";
     print_r($_SERVER);
     echo "<hr>";
     echo($_SERVER['SERVER_NAME']);
?>