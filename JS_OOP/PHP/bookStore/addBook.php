<?php
	include_once "muban.php";
	$db = mysql_connect("localhost","root","");
	mysql_select_db("BStore");
	$name = $_GET["name"];
	$description = $_GET["description"];
	$baseprice = $_GET["baseprice"];
	$writer = $_GET["writer"];
	$publish = $_GET["publish"];
	$pages = $_GET["pages"];
	$images = $_GET["images"];
//	$name = "JAVA编程思想：第3版";
//	$description = "从本书获得的各项大奖以及来自世界各地的读者评论中，不难看出这是一本经典之作。本书作者有多年的教
//					学经验，对C、C++、Java语言都有独到、深入的理解。因此他非常了解如何教授Java语言这门课程，也非
//					常明白语言教学中的难点及人们的困惑。作者以通俗易懂及小而直接的示例解释了一个个晦涩抽象的概念，
//					精心选取“对读者理解Java语言来说最为重要”的部分编写成书。同时又在随书光盘中提供了大量参考材料
//					—这也是本书绝对物超所值的地方。
//						随书光盘没有包含本书的源代码（可以从支持网站www.MindView.net免费下载），而是提供了大量
//					作者讲授的讨论课内容及本书的前2版内容。
//							本书内容丰富—从Java的基础语法到最高级特性，适合各层次的Java程序员阅读，同时也是高等
//					院校讲授面向对象程序设计语言及Java语言的绝佳教材。";
//	$baseprice = 95;
//	$writer = "（美）Bruce Eckel";
//	$publish = "机械工业出版社";
//	$pages = 796;
//	$images = "images/product/zcover.gif";
	$query = "insert into book (name,description,baseprice,writer,publish,pages,images) values ('$name','$description','$baseprice','$writer','$publish','$pages','$images')";
//	echo $query;
	$result = mysql_query($query);
	if (mysql_affected_rows()) {
		header("location:index.php");
		
	} else {
		echo "失败";
	}	
	
	
	
?>