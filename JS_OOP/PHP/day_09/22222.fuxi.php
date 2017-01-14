<?php
	//防止中文乱码
    header("Content-type:text/html;charset=utf-8");
    //设置使用东八区时间格式
	date_default_timezone_set('PRC');
	mysql_connect("localhost","root","");
	mysql_select_db("BOOK");
	//防止插入中的中文出现乱码
	mysql_query("set names utf8");  
	
	$xmlStr = <<<XML
<?xml version="1.0" encoding="utf-8"?>
	<books>
	</books>
XML;
	echo $xmlStr;
	//simplexml_load_string() 函数把 XML 字符串载入对象中。
	//返回类 SimpleXMLElement 的一个对象，该对象的属性包含 
	//XML 文档中的数据。如果失败，则返回 false。
	$xml = simplexml_load_string($xmlStr);
	//$book = $xml->addChild("book");
	//$name = $book->addChild("name","海底两万里");
	//var_dump($xml);
	$query = "select * from book";
	$result = mysql_query($query);
	//将数据库里面的内容解析为xml文件形式
	while($row = mysql_fetch_assoc($result)){
		$book = $xml->addChild("book");
		foreach ($row as $keys=> $values) {
			$$keys = $book->addChild("$keys","$values");
		}	
	}
	var_dump($xml);
	
	//生成XML文件
	//asXML()以字符串形式从SimpleXMLElement对象中返回xml文档
	//echo $xml->asXML();
	$xml->saveXML("222.newxml.xml");
	
	
	//从xml文档中取出值再次插入到数据库中
?>