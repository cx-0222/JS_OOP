<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>九九乘法表</title>
	</head>
	<body>
		<table border="" cellspacing="" cellpadding="10">
			<?php 
			    for ($i=1; $i < 10; $i++) { 
			    	?>
			    	<tr>
			    		<?php 
			    		    for ($j=1; $j <= $i; $j++) { 
			    		    	?>
			    		    	<td>
			    		    		<?php 
			    		    		    $sum = $j*$i;
			    		    		    echo $j."x".$i."=".$sum; 
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
