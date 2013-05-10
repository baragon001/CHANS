<?php

	$mysqli = new mysqli("localhost","dpwmson","mypassword","autocomplete");
	$mysqli= new mysqli('localhost','baragon001', 'BRANDOn2369338', 'info230_SP13FP_CHANS');
	
	$query = "SELECT username FROM Users WHERE username REGEXP '^".$_GET['UserName']."'";
	
	$result = $mysqli->query($query);
	
	if ($result->num_rows == 0) {
		$result = json_encode(array('taken' => '0'));	
		print(json_encode($result));
	}
	else {
		$result = json_encode(array('taken' => '1'));	
		print(json_encode($result));
	}
	
?>
	