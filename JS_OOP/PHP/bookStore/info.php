<?php
	include_once "muban.php";
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
			break;
		}
	}
	//var_dump($info);
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>书本详情</title>
		<style type="text/css">
			* {
				margin: 0;
				padding: 0;
			}
			
			.img {
				display: inline-block;
				border: 1px solid black;
				padding: 50px;
			}
			.img img{
				width: 100%;
				height: 100%;
			}
			.infomation {
				display: inline-block;
				vertical-align: top;
				margin-left: 100px;
			}
			h1 {
				width: 550px;
				/*height: 70px;*/
				color: #565656;
				margin-bottom: 50px;
			}
			.description {
				text-indent: 2em;
				width: 550px;
				/*height: 100px;*/
				padding-bottom: 30px;
				border-bottom: 1px solid #F2F2F2;
				color: #888888;
				font-size: 16px;
				letter-spacing: 3px;
			}
			.intro {
				width: 550px;
				height: 145px;
				margin-top: 20px;
				background-color: #EBEBEB;
				color: #999999;
			}
			
			.intro div {
				margin-bottom: 20px;
			}
			.shCar {
				margin-top: 70px;
				border: none;
				width: 105px;
				height: 35px;
				background-color: #FFEDEE;
				color:#FF2533 ;
				font-size: 15px;
				outline: none;
			}
			.shCar:hover {
				color: white;
				background-color: #FF2533;
			}
			.shopping {
				margin-left: 220px;
				border: none;
				width: 105px;
				height: 35px;
				background-color: #FFEDEE;
				color:#FF2533 ;
				font-size: 15px;
				outline: none;
			}
			.shopping:hover {
				color: white;
				background-color: #FF2533;
			}
			.writer, .pblish {
				color: #3783BB;
			} 
			.price {
				color: #FF0000;
				font-size: 30px;
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
				/*background-color: red;*/
				margin: 0 auto;
			}
			.nav_ul {
				list-style: none;
				text-align: center;
				
			}
			.nav_ul li{
				height: 65px;
				width: 18%;
				display: inline-block;
				/*margin: 4% 2%*/;
				line-height: 65px;
				
			}
			.nav_ul li a{
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
			.shopCar:hover {
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
						<li ><a class="index" href="index.php" style="color: white;">书城首页</a></li>
						<li><a class="addbook" href="addBook.html" >添加图书</a></li>
						<li><a class="shopCar" href="shopCar.php">购物车</a></li>
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
			<div class="img">
				<img src="img/<?php echo $info["images"]; ?>"/>
			</div>
			<div class="infomation">
				<h1><?php echo $info["name"]; ?></h1>
				<div class="description"><?php echo $info["description"]; ?></div>
				<div class="intro">
					<div >作者：<span class="writer"><?php echo $info["writer"]; ?></span></div>
					<div >出版社：<span class="pblish"><?php echo $info["publish"]; ?></span></div>
					<div >页码：<span class="pages"><?php echo $info["pages"]; ?></span></div>
					<div >价格：<span class="price"><?php echo $info["baseprice"]; ?></span></div>
				</div>
				<a href="shopCar.php?index=<?php echo "$row[bookId]"; ?>"><button class="shCar">加入购物车</button></a>
				<a href=""><button class="shopping">立即购买</button></a>
			</div>
		</div>
	</body>
</html>
