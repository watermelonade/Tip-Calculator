<html>
<head>
	<link rel="stylesheet" href="tip_calc.css">

	<title>Welcome</title>
</head>
<body>
	<div class="boxed">
	<h2>Tip Calculator</h2>
	<form action="calc.php" method="post">
		<table border="0">
		<tr>
			<td>Bill subtotal:</td>
			<td>$<input type="text" name="bill" value="0" /></td>
		</tr>
		
		<td>Tip percentage:</td>
		<td><?php 
			for($i = 0; $i < 3; $i++) { ?>
				<input type="radio" name="tip<?php echo $i; ?>" value="<?php echo .10 + $i*.05; ?>"/> <?php echo 10 + $i*5; ?>%
			<?php } ?>

		
		<tr>
			<td># of People:</td>
			<td><input type="text" name="num_people" value="1" /> </td>
		</tr><tr>
			<td><input type="submit" name="calculate" value="Calculate" /></td>
		</tr>
		</table>
	</form>
	</div>
	
	<div class="boxed">
	<?php 
	for($i = 0; $i < 3; $i++) {
		if( isset($_POST['tip' . $i]) and isset($_POST["bill"]) ) 
		{
			
			$tip = $_POST['tip' . $i]; 
			$bill = $_POST["bill"]; ?>
			
			<td> <?php echo "Tip: $" . $tip*$bill . "\n"; ?></td><br>
			<td> <?php echo "Total: $" . ($tip*$bill + $bill);?></td>
			<?php
		} 
	} ?>
	</div>
</body>
</html>