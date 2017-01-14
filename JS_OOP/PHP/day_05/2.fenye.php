<?php
	$db = mysql_connect("localhost","root","");
	mysql_select_db("php");
	//!! 1.'$name' 此时只看最外层的引号 是双引号 值就可以被引用
	$name = "陈馨";
	//!! 2. 当名字为中文的时候 会出现乱码0
	mysql_query("set names utf8"); 
	$query = "insert into user (name,password) values ('$name',6666)";
	$query = "update user set name = '小玉' where userid = 6";
	$query = "select * from user";
	$result = mysql_query($query);
	//被影响的行数  调用直接有返回值
	//用来判断 写入的mysql语句是否执行成功 0代表不成功 
	//if (mysql_affected_rows()) {
		//echo "插入成功";
	//} else {
		//echo "插入失败";
	//}
	

	//分页
	define("PAGESIZE",4);
	//查询记录数量的sql语句
	$query = "select count(userId) from user";
	//该语句查询到的结果中只有一条记录
	//所以不需要用while循环输出
	//直接用fetch方法就可
	//因为该语句如果用关联数组取出我们的记录数量要写很多代码 
	//所以喜欢用row方法来获取我们的结果数组
	//得到的就是一个索引数组 并且里面只有一个元素 就是$row[0]
	//也就是我们想要的记录个数 通过$row[0]将我们的记录个数存到我们的变量中 以供使用
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	//$row = mysql_fetch_array($result);
	$count = $row[0];
	//echo $count;

	$pages = ceil($count/PAGESIZE);
	//echo "<br><br>";
	//echo $pages;
	//echo "<br><br>";
	$page = 0;
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	}
	
	//字符串拼接后 limit 注意要加空格
	$query = "select * from user limit ".$page*PAGESIZE.",".PAGESIZE;
	//echo $query;
	$result = mysql_query($query);
	//如果下面报资源不存在 说明sql语句写错了 echo 输出检查！！！
	if (mysql_num_rows($result)) {
		while ($row = mysql_fetch_assoc($result)) {
			?>
			<h1>
				<?php 
				    echo $row["name"]." : ".$row["password"]; 
				?>
			</h1>
			<?php
		}
	}	
	
	
	for ($i=0; $i < $pages ; $i++) { 
	?>
		<a href="2.php?page=<?php echo $i; ?>">
			<?php 
				$num=$i+1;
				echo "第".$num."页 ";
				//echo $num;
			 ?>
		</a>&nbsp;
	<?php	
	}
	
?>