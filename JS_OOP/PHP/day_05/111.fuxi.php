<?php
	//1.链接数据库
	$db = mysql_connect("localhost","root","");
	//2.选择数据库
	mysql_select_db("php");
	//保证插入中文不乱码
	mysql_query("set names utf8");
	//3.编写sql语句 先查询数据库中一共有多少条记录
	$query = "select count(userId) from user";
	//4.执行sql语句
	$result = mysql_query($query);
	//5.用普通数组查看结果集
	$row = mysql_fetch_row($result);
	//因为获取的索引数组中只有一个元素 所以直接取出使用即可
	//var_dump($row);
	//6.获取数据库中记录数
	$count = $row[0];
	//7.利用常量 规定每页的记录数
	define("PAGESIZE",4);
	//8.求出页数
	$pages = ceil($count/PAGESIZE);
	//9.判断由a跳转过来产生的$_GET关联数组中有没有键page 有 则获取该键值
	$page = 0;
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	}
	
	//10.进行分页展示
	$query = "select * from user limit ".$page*PAGESIZE.",".PAGESIZE;
	//echo $query;
	$result = mysql_query($query);
	//mysql_num_rows()返回结果集中行的数目，
	//仅对 SELECT 语句有效。注意其参数是mysql_query返回的结果集ID。
	if (mysql_num_rows($result)) {
		while($row = mysql_fetch_assoc($result)){
			?>
			<h1>
				<?php 
				    echo $row["name"]." : ".$row["password"]; 
				?>
			</h1>
			<?php
		}
	}
	
	//11.利用for设置页数链接
	//a链接相当于get提交 提交跳转到本php页面后 得到关联数组 $_GET 
	for ($i=0; $i < $pages; $i++) { 
		?>
			<a href="111.fuxi.php?page=<?php echo $i; ?>">
				<?php 
				    $num = $i+1;
				    echo "第".$num."页"; 
				?>
			</a>
		<?php
	}
?>