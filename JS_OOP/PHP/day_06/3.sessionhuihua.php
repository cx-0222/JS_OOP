<?php
//	var_dump($_COOKIE);
//	setcookie("username","cx");
//	echo "<br><br>";
//	var_dump($_COOKIE);
//	echo "<br><br>";
//	echo $_COOKIE["username"];
//	echo "<br><br>";
//	setcookie("username","cx",time()+60);
		$name ="";
		if(isset($_COOKIE["username"])){
			$name = $_COOKIE["username"];
		}
		$pass = "";
		if(isset($_COOKIE["password"])){
			$pass = $_COOKIE["password"];
		}
		
?>
<!--<input type="text" name="" id="" value="<?php echo $_COOKIE['username']; ?>" />-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="3.sessionlogin.php" method="post">
			<input type="text" name="username" id="username" value="<?php echo $name; ?>" />
			<input type="password" name="password" id="password" value="<?php echo $pass; ?>"/>
			<input type="submit" value="提交"/>
		</form>
	</body>
</html>
