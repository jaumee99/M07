<html>

	<head>
		<title>Conjetura Collatz</title>
	</head>
	
	<body>
		
		<form method="get"action="">
			<label for="n">Numero: </label>
			<input type="Numero" name="n" id="n" value="<?php echo $_REQUEST["n"];?>" />
			<button type="submit">Go</button>
		</form>
		
		<?php
		
		  	$n = $_REQUEST["n"];
						
			$times = 0;
			
			while ($n != 1 && $n > 0) {
				if($n % 2 == 0){
					$n = $n / 2;
					$times++;
						echo $times . ": " . $n . "<br />";
				}
				else {
					$n = ($n * 3) + 1;
					$times++;
						echo $times . ": " . $n . "<br />";
				}
			}
			
			echo "<br />Ha acabat després de: " . $times . "iteracions";
						
		?>
		
	</body>
	
</html>