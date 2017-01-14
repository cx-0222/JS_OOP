<?php
	include_once "muban.php";
	$name = "";
	$pass = "";
	if(empty($_SESSION)){
		//如果session为空 且 用户没有点击免登陆
		if(!isset($_COOKIE["username"]) || !isset($_COOKIE["password"])){
			//说明没有点击免登陆 所以停留登录界面 进行登录
		}else{
			$_SESSION["username"] = $_COOKIE["username"];
			$_SESSION["password"] = $_COOKIE["password"];
			header("location:zhuyejiemian.php");
		}
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>登录界面</title>
		<style type="text/css">
			* {
				margin: 0;
				padding: 0;
			}
			.wrap {
				width: 400px;
				height: 400px;
				margin: 200px auto;
			}
			.content {
				width: 400px;
				height: 200px;
				border: 1px solid black;
				position: relative;
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
			}
			.btn {
				display: inline;
				margin-left: 10px;
			}
		</style>
	</head>
	<body>
		<div class="wrap">
			<div class="content">
				<form action="zhuyejiemian.php" method="post">
					姓名：<input type="text" name="username" id="username" value="<?php echo $name; ?>" />
					密码：<input type="password" name="password" id="password" value="<?php echo $pass; ?>" />
					<input type="checkbox" class="btn" id="" name="remember" />七天免登陆
					<input type="submit" class="btn" value="登录"/>
				</form>
			</div>
		</div>
	</body>
	
</html>