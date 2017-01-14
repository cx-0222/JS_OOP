<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>

	<body>
		<table border="" cellspacing="5" cellpadding="10">
		<?php 
			 for ($i=1; $i < 10; $i++) { 
			 	//i 代表多少行
		?>
		<tr>
			<?php 
		 	 // echo $i;
		 	 for ($j=1; $j <= $i ; $j++) { 
		 	 	//j代表多少列
		 	 	//echo $i.'x'.$j;
		 	 	//echo "\n";
		 	 	?>
		 	 		<td>
		 	 			<?php 
			 	 			if($j <= $i){
			 	 				$sum = $j*$i;
			 	 		   		echo $j."x".$i."=".$sum; 
			 	 			} 
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