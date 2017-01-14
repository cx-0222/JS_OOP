<?php
	$name = "";
	$pass = "";
	if (isset($_COOKIE["username"])) {
		$name = $_COOKIE["username"];
	}
	if (isset($_COOKIE["password"])) {
		$pass = $_COOKIE["password"];
	}
	function check(){}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			form {
				font-size: 13px;
			}
		</style>
	</head>
	<body>
		<form action="333.denglujiemian.php" method="post">
			<input type="text" name="username" id="username" value="<?php echo $name; ?>" />
			<input type="password" name="password" id="password" value="<?php echo $pass; ?>" />
			<input type="checkbox" onclick="check()" name="miandeng" value=""/>
			<input type="submit" value="登录"/>
		</form>
	</body>
	
</html>

