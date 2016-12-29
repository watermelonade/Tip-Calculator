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
			<td><input type="radio" name="tip" id="rad" <?php if(isset($_POST['ctip']) && $_POST['ctip'] == 'No')  echo ' checked="checked"';?> value="">Custom<input type="text" onfocus="document.getElementById('rad').checked = true;" name="ctip" value="<?php echo isset($_POST['ctip']) ? $_POST['ctip'] : '' ?>" placeholder="Enter Amount" />%</td>
		</tr>
		<tr>
			<td># of People:</td>
			<td><input type="text" name="num_people" value="1" /> </td>
		</tr><tr>
			<td><br><input type="submit" name="calculate" id="s_button" value="Calculate" style="width:100px; text-align:center; position:relative;  left: 140px; " /><br></td>
		</tr>
		</table>
	</form>
	
	<div class="child">
	<?php 
	
		if( isset($_POST['tip']) and isset($_POST["bill"]) ) 
		{
			
			$tip = $_POST['tip']; 
			$bill = $_POST["bill"]; 
			
			if(empty($tip) && isset($_POST['ctip']))
				$tip = $_POST['ctip'];
			
			if($tip > 1)
				$tip = $tip/100;
			
			$stip = preg_replace("[^-?\\d+(\\.\\d+)?]","",$tip);
			$sbill = preg_replace("[^-?\\d+(\\.\\d+)?]","",$bill);
			
			if(!$stip && !$sbill && !empty($bill) && $bill > 0 && $tip > 0)
			{
			?>
			<dl>
				<dt>Tip</dt><dd><?php echo "$"; printf("%.2f", $tip*$bill); ?></dd>
				<br><dt>Total</dt><dd><?php echo "$"; printf("%.2f",$tip*$bill + $bill);?></dd><br>
			
			<?php 
			if(isset($_POST['num_people'])) 
			{
				$split = $_POST['num_people'];
				if($split > 1)
				{
					?><br><dt>Tip per person</dt><dd><?php echo " $"; printf("%.2f", ($tip*$bill)/$split);?></dd>
					<br><dt>Total per person</dt><dd><?php echo " $"; printf("%.2f", ($tip*$bill + $bill)/$split);?></dd><br><?php
				}
			}?>
			
			</dl>
			<?php 
			} else {
				if(empty($sbill) && $bill > 0){
					echo "ERROR: Please enter a valid tip. \n ";
				}else{
					echo "ERROR: Please enter a valid bill. \n ";
				}
			}
		}  ?>
	</div>
	</div>
	
	
</body>
</center>
</html>