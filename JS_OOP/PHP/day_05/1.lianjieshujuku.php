<?php
	//mysql_connect("主机名（服务器名）","名称","密码")
	$db = mysql_connect("localhost","root","");
	//获取到的是资源类型
	var_dump($db);
	if ($db) {
		mysql_select_db("php");
		$query = "select * from user";
		//获取结果集
		$result = mysql_query($query);
		//mysql_fetch_assoc()取出结果集的内容 以关联数组展示 当取完以后 会返回false
		while($row = mysql_fetch_assoc($result)){
			var_dump($row);
		}

		//$row = mysql_fetch_assoc($result);
		//var_dump($row);
		//$row = mysql_fetch_assoc($result);
		//var_dump($row);
		
		//以普通数组的形式来展示
		//$row = mysql_fetch_row($result);
		//var_dump($row);
		
		//以关联数组的形式展示结果集
		//$row = mysql_fetch_array($result);
		//var_dump($row);
		
		//以对象的形式来展示结果集
		//$row = mysql_fetch_object($result);
		//var_dump($row);
		//！！！对象获取属性值
		//echo $row -> name;
		
	
	}
	
?>