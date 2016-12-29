<html><center>
<head>
	<link rel="stylesheet" href="tip_calc.css">

	<title>Welcome</title>
</head>
<body>
	<div class="container">
	<h2><center>Tip Calculator</center></h2>
	<form action="calc.php" method="post">
		<table border="0">
		<tr>
			<td>Bill subtotal:</td>
			<td>$<input type="text" name="bill" value="<?php echo isset($_POST['bill']) ? $_POST['bill'] : '' ?>" /></td>
		</tr>
		
		<td>Tip percentage:</td>
		<td><?php 
			for($i = 0; $i < 3; $i++) { ?>
				<input type="radio" name="tip" <?php if($i == 0){ echo "checked";}?> value="<?php echo .10 + $i*.05; ?>" 
					<?php if(isset($_POST['tip']) && $_POST['tip'] == 'No')  echo ' checked="checked"';?>/> <?php echo 10 + $i*5; ?>%
			<?php } ?>
		<tr>
		<td></td>
			<td><input type="radio" name="tip">Custom<input type="text" name="tip" />%</td>
		</tr>
		<tr>
			<td># of People:</td>
			<td><input type="text" name="num_people" value="1" /> </td>
		</tr><tr>
			<center><td><input type="submit" name="calculate" value="Calculate" /></td></center>
		</tr>
		</table>
	</form>
	
	<div class="child">
	<?php 
	
		if( isset($_POST['tip']) and isset($_POST["bill"]) ) 
		{
			
			$tip = $_POST['tip']; 
			$bill = $_POST["bill"]; 
			
			if($tip > 1)
				$tip = 1/$tip;
			
			$stip = preg_replace("[^-?\\d+(\\.\\d+)?]","",$tip);
			$sbill = preg_replace("[^-?\\d+(\\.\\d+)?]","",$bill);
			if(!$stip && !$sbill && !empty($bill) )
			{
			?>
			<td> <?php echo "Tip: $" . round($tip*$bill,2) . "\n"; ?></td><br>
			<td> <?php echo "Total: $" . round($tip*$bill + $bill,2);?></td>
			
			<?php 
			if(isset($_POST['num_people'])) 
			{
				$split = $_POST['num_people'];
				if($split > 1)
				{
					echo "\nTip per person   : " . round(($tip*$bill)/$split,2);
					echo "\nTotal per person : " . round(round(($tip*$bill + $bill)/$split,2));
				}
			}?>
			
			<?php 
			} else {
				if($stip)
					echo "ERROR: Please enter a valid tip. \n ";
				else
					echo "ERROR: Please enter a valid bill. \n ";
			}
		}  ?>
	</div>
	</div>
	
	
</body>
</center>
</html>