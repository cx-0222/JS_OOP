<?php
	include_once "muban.php";
	$name = "";
	$pass = "";
	if(!empty($_POST)){
		if($_POST["username"]=="" || $_POST["password"]==""){
			//echo "用户名或密码不可以为空";
			echo "<script type='text/javascript'>alert('用户名或密码不可以为空');</script>";
		}else{
			//var_dump($_POST);
			$name = $_POST["username"];
			$pass = $_POST["password"];
			//echo $name;
			//echo $pass;
			mysql_connect("localhost","root","");
			mysql_select_db("php");
			$query = "insert into user (name,password) values ('$name','$pass')";
			$result = mysql_query($query);
			if(mysql_affected_rows()){
				//echo "注册成功";
				//echo "<script type='text/javascript'>alert('注册成功');</script>";
				header("location:login.php");
			}else{
				echo "<script type='text/javascript'>alert('注册失败');</script>";
			}
		}
		
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册界面</title>
		<style type="text/css">
			* {
				margin: 0;
				padding: 0;
			}
			.wrap {
				width: 60vw;
				height: 50vh;
				margin: 0 auto;
				background-color: #F0EAE5;
				border-top: 1px solid #F0EAE5;
			}
			.content {
				width: 400px;
				height: 200px;
				border: 1px solid black;
				margin: 12% auto;
				/*position: relative;*/
			}
			form {
				text-align: center;
				margin-top: 20px;
				font-size: 13px;
			}
			input {
				display: block;
				margin: 10px auto;
				font-size: 16px;
				outline-color: burlywood;
			}
			.btn {
				display: inline;
				/*margin-left: 10px;*/
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
						<li><a class="addbook" href="addBook.html">添加图书</a></li>
						<li><a class="shCar" href="shopCar.php">购物车</a></li>
						<li><a class="login" href="login.php" >登录</a></li>
						<li><a class="registe" href="registe.php" style="color: white;">注册</a></li>
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
			<div class="content">
				<form action="registe.php" method="post">
					姓名：<input type="text" name="username" id="username" value="" />
					密码：<input type="password" name="password" id="password" value="" />
					<input type="submit" class="btn" value="注册"/>
				</form>
			</div>
		</div>
	</body>
</html>