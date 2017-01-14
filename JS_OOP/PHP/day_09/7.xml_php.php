<?php
	include_once "muban.php";
	$xmlStr = <<<XML
<?xml version="1.0" encoding="utf-8"?>
	<books>
	</books>
XML;
	$xml = simplexml_load_string($xmlStr);
	var_dump($xml); 
	$book = $xml->addChild("book");
	$name = $book->addChild("name","海底两万里");
	$book1 = $xml->addChild("book");
	$name1 = $book1->addChild("name","巴拉巴拉");
	
	mysql_connect("localhost","root","");
	mysql_select_db("BStore");
	$query = "select * from book";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		$book = $xml->addChild("book");
		foreach ($row as $key => $value) {
			$$key = $book->addChild($key,$value);
		}
		//$name = $book->addChild("name",$row["name"]);
		//$descriptiion = $book->addChild("descriptiion",$row["description"]);
		//$price = $book->addChild("price",$row["baseprice"]);
	}
	var_dump($xml);
	//注意权限！！
	//asXML() 函数以字符串的形式从 
	//SimpleXMLElement 对象返回 XML 文档。
	//echo $xml->asXML();//???啥
	$xml->saveXML("7.newxml.xml");
?>