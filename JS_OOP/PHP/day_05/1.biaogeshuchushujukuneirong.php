<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>

	<body>
		<table border="" cellspacing="" cellpadding="10">
			<?php 
			$db = mysql_connect("localhost","root","");
			mysql_select_db("php");
			$query = "select * from user";
			$result = mysql_query($query);
			while ($row = mysql_fetch_assoc($result)) {
			?>
				<tr>
					<?php 
					    foreach ($row as $key => $value) {
					    	?>
					    		<td>
					    			<?php 
					    			   echo $value; 
					    			?>
					    		</td>
					   <?php 		
					    } 
					?>
				</tr>
			<?php 
			}
		?>
		</table>
	</body>

</html>