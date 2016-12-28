<html>

<?php 
if( isset($_POST["tip"]) and isset($_POST["bill"]) ) 
{
	$tip = $_POST["tip"]; 
	$bill = $_POST["bill"];
	echo $tip*$bill;
}
?><br>

</html>