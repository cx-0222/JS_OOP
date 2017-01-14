<?php
	include_once "muban.php";
	$info["images"] = "0.png";
	$info["name"] = "";
	$info["baseprice"] = "";
	$num = "";
	if(!empty($_GET)){
		$index = $_GET["index"];
		//echo $index;
		mysql_connect("localhost","root","");
		mysql_select_db("BStore");
		$query = 'select * from book';
		$result = mysql_query($query);
		$info = [];
		while($row = mysql_fetch_assoc($result)){
			if($row["bookId"]==$index){
				//var_dump($row);
				$info = $row;
				$num = 1;
				break;
			}
		}
		//var_dump($info);
	}
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>购物车</title>
		<style type="text/css">* {
	margin: 0;
	padding: 0;
}

.wrap {
	width: 100vw;
	height: 50vh;
	/*background-color:gainsboro;*/
	text-align: center;
	border-bottom: 2px solid #F3F3F3;
}

.content {
	width: 80%;
	height: 70%;
	/*background-color: red;*/
	margin: 0 auto;
	border: 4px solid #F0EAE5;
}

.bookimg {
	width: 10%;
}

p {
	font-size: 50px;
	margin-top: 8%;
	margin-bottom: 1%;
}

table {
	margin: 2% auto;
	border: 2px solid #EAEAEA;
}


/*头部*/

.navWarp {
	width: 100%;
	height: 4.2em;
	background-color: #222222;
}

.nav {
	width: 60%;
	height: 100%;
	margin: 0 auto;
}

.nav_ul {
	list-style: none;
	text-align: center;
}

.nav_ul li {
	height: 65px;
	width: 18%;
	display: inline-block;
	/*margin: 4% 2%*/
	;
	line-height: 65px;
}

.nav_ul li a {
	text-decoration: none;
	color: #939393;
	font-size: 20px;
}

.index:hover {
	color: white;
}

.addbook:hover {
	color: white;
}

.shCar:hover {
	color: white;
}

.login:hover {
	color: white;
}

.registe:hover {
	color: white;
}
/*.status {
	text-decoration: none;
	color: #939393;
}
.cancel {
	text-decoration: none;
	color: #939393;
}*/
</style>
</head>
	<body>
		<div class="navWarp">
				<div class="nav">
					<ul class="nav_ul">
						<li ><a class="index" href="index.php" >书城首页</a></li>
						<li><a class="addbook" href="addBook.html" >添加图书</a></li>
						<li><a class="shCar" href="shopCar.php" style="color:white;">购物车</a></li>
						<li><a class="login" href="login.php">登录</a></li>
						<li><a class="registe" href="registe.php">注册</a></li>
						<!--<a class="status" href="">
							<?php 
							    if (isset($_SESSION["userId"]) && $name!="") {
							   		echo $name;
							    } else {
							    		echo "未登录";
							    }    
							?>
						</a>
						<a class="cancel" href="cancel.php">注销</a>-->
					</ul>
				</div>
		</div>
		<div class="wrap">
			<p>购物车</p>
			<div class="content">
				<table width="95%"  rules="all" >
					<tr >
						<td>图书</td>
						<td>书名</td>
						<td>数量</td>
						<td>单价</td>
						<td>结算</td>
						<td>删除</td>
					</tr>
					<tr>
						<td>
							<img class="bookimg" src="img/<?php echo $info["images"]; ?>"/>
						</td>
						<td>
							<span><?php echo $info["name"]; ?></span>
						</td>
						<td>
							<span><?php echo $num; ?></span>
						</td>
						<td>
							<span><?php echo $info["baseprice"]; ?></span>
						</td>
						<td>
							<button>付款</button>
						</td>
						<td>
							<button>删除</button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>