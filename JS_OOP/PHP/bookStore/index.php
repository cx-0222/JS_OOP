<?php
	include_once "muban.php";
	$name = "";
	$pass = "";
	//第一次登录的时候 cookie为空 所以从post中取值
	if (isset($_POST["username"])) {
		$name = $_POST["username"];
	} else if(isset($_COOKIE["username"])) {
		//当没有经过form表单提交的时候 即用户点击了免登陆的时候 从cookie中取值
		$name = $_COOKIE["username"];
	}
	if (isset($_POST["password"])) {
		$pass = $_POST["password"];
	} else if(isset($_COOKIE["password"])) {
		$pass = $_COOKIE["password"];
	}
	
	session_start();
	if($name == "" || $pass == "" ){
		//echo "用户名或密码不可以为空";
		//echo "<script type='text/javascript'>alert('用户名或密码不可以为空');</script>";
	}else{
		$query = "select * from user where name='$name' and password='$pass'";
		$result = mysql_query($query);
		if (mysql_num_rows($result) == 1) {
			$row = mysql_fetch_assoc($result);
			$_SESSION["userId"] = $row["userId"];
			if (isset($_POST["remember"])) {
				echo "cookie";
				setcookie("username",$name,time()+3600*24*7);
				setcookie("password",$pass,time()+3600*24*7);
			}
		} else if(mysql_num_rows($result) == 0){
				//echo "用户名或密码错误";
				echo "<script type='text/javascript'>alert('用户名或密码错误,请重新登录');</script>";
				header("location:login.php");
			}
	}


//分页
	//mysql_connect("localhost","root","");
	//mysql_select_db("BStore");
	//$query = "select count(bookId) from book";
	//$result = mysql_query($query);
	//$row = mysql_fetch_row($result);
	//var_dump($row);
	//$count = $row[0];
	define("PAGESIZE",6);
	//$pages = ceil($count/PAGESIZE);
	//$page = 0;
	//if (isset($_GET["page"])) {
		//$page = $_GET["page"];
	//}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>网站首页</title>
		<style type="text/css">
			* {
				margin: 0;
				padding: 0;
			}
			
			.wrap {
				width: 100vw;
				/*height: 2000px;*/
			}
			
			.coverWarp {
				width: 100%;
				height: 45%;
				/*background-color: red;*/
				/*text-align:center;*/
			}
			
			.cover {
				margin: 0 auto;
				width: 60%;
				/*height: 100%;*/
				background-color: #EEEEEE;
				text-align: center;
				border: 1px solid white;
			}
			
			.cover h1 {
				margin-top: 5%;
				margin-bottom: 1%;
				font-size: 50px;
			}
			
			.cover p {
				font-size: 20px;
				margin-bottom: 1%;
			}
			
			.cover img {
				width: 70%;
				/*height: 70%;*/
				margin-bottom: 3%;
			}
			
			.contentWarp {
				width: 100%;
				height: 50%;
				/*background-color: red;*/
				/*border: 1px solid white;*/
				margin-top: 5%;
			}
			
			.content {
				margin: 0 auto;
				width: 60%;
				/*height: 100%;*/
				/*background-color: hotpink;*/
			}
			
			.book_ul {
				
				list-style-type: none;
			}
			.book_ul li {
				float: left;
			}
			.book_ul_li {
				width: 30%;
				/*height: 100%;*/
				height: 426px;
				border: 1px solid #E6E6E6;
				border-radius: 5px;
				text-align: center;
			}
			
			.book_img {
				border: none;
				margin-top: 5%;
				width: 70%;
			}
			
			.book_name {
				display: block;
				margin-top: 10%;
				margin-bottom: 10%;
				text-align: center;
				font-size: 28px;
				text-overflow: ellipsis;
				white-space: nowrap;
				overflow: hidden;
				
			}
			
			.book_price {
				font-size: 20px;
				float: left;
				margin-left: 5%;
				margin-top: 2.8%;
			}
			
			.buy {
				/*display: inline-block;*/
				width: 80px;
				height: 30px;
				font-size: 18px;
				border-style: none;
				outline: none;
				background-color: #42AE58;
				color: white;
				line-height: 35px;
				border-radius: 5px;
				box-shadow: 0 0 2px #1CB048;
				margin-bottom: 10%;
				margin-left: 40%;
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
				/*height: 65px;*/
				width: 17%;
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
			.shCar:hover {
				color: white;
			}
			.login:hover {
				color: white;
			}
			.registe:hover {
				color: white;
			}
			
			.status {
				text-decoration: none;
				color: #939393;
			}
			.cancel {
				text-decoration: none;
				color: #939393;
			}
			.paging {
				color: black;
				text-decoration: none;
			}
			
			.book_ul:after {
				content: "";
				display: block;
				clear: both;
			}
			
			.oPage {
				/*background-color: red;*/
				text-align: center;
			}
			.oPage button{
				width: 20px;
				height: 20px;
				background: white;
			}
		</style>
	</head>

	<body>
		<div class="wrap">
			<div class="navWarp">
				<div class="nav">
					<ul class="nav_ul">
						<li ><a class="index" href="index.php" style="color: white;">书城首页</a></li>
						<li><a class="addbook" href="addBook.html">添加图书</a></li>
						<li><a class="shCar" href="shopCar.php">购物车</a></li>
						<li><a class="login" href="login.php">登录</a></li>
						<li><a class="registe" href="registe.php">注册</a></li>
						<a class="status" href="login.php">
							<?php 
							//再次跳回来就没有了  bug
							    if (isset($_SESSION["userId"]) && $name!="") {
							   		echo $name."已登录";
							    } else {
							    		echo "未登录";
							    }    
							?>
						</a>
						<a class="cancel" href="cancel.php">注销</a>
					</ul>
				</div>
			</div>
			<div class="coverWarp">
				<div class="cover">
					<h1>我的书城</h1>
					<p>这里拥有世界各地的书籍，只有你想不到，没有我们这里没有的书籍</p>
					<img src="img/1.png" />
				</div>
			</div>
			
			<div class="contentWarp">
				<div class="content">
					<ul class="book_ul">
						
					</ul>
				</div>
			</div>
		
		</div>
		<div class="oPage">
		</div>
	</body>
	<script src="JQuery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		//异步分页
		$.ajax({
			type:"get",
			url:"page.php",
			
			success:function(data){
				console.log("成功");
				console.log(data);
				var page = 0;
				createLi(page);
				for (var j = 0; j < data;j++) {
					//console.log(j);
					var btnobj = $('<button>'+(j+1)+'</button>');
					$(".oPage").append(btnobj);
				}
				$(".oPage button").click(function(e){
					var ev = e || window.event;
					$(".book_ul").html("");
					createLi($(event.target).html()-1);
				})
				
			},
			error:function(errors){
				console.log("失败");
				console.log(errors);
			}
		});
		
		function createLi(page){
			$.ajax({
				type:"get",
				url:"createSelect.php",
				data:{
					page:page
				},
				success:function(data){
					console.log("成功");
					//console.log(data);
					var obj = JSON.parse(data);
					console.log(obj);
					
					for (var i = 0; i < obj.length; i++) {
						var liobj = $('<li class="book_ul_li" style="width: 30%; height: 100%; border:1px solid #E6E6E6 ; border-radius: 5px; text-align: center; margin: 1.5%;"><img class="book_img" src="img/'+obj[i].images+'" /><span class="book_name">'+obj[i].name+'</span><span class="book_price">￥'+obj[i].images+'</span><a href="info.php?index='+obj[i].bookId+'"><button class="buy">查看详情</button></a></li>')
						$(".book_ul").append(liobj);
					}
				},
				error:function(errors){
					console.log("失败");
					console.log(errors);
				}
			});
		}
	</script>
</html>
