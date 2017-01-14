<?php
	setcookie("username","cx",time()+60);
?>
<input type="text" name="username" id="username" value="<?php echo $_COOKIE["username"]; ?>" />
