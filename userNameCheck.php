<?php

	$mysqli= new mysqli('localhost','CHANS', 'cs5tqe0zt1k', 'info230_SP13FP_CHANS');
	
	$userName = "^".$_GET['UserName']."$";
	
	$query = "SELECT username FROM Users WHERE username REGEXP \"$userName\"";
	
	$result = $mysqli->query($query);
	
	if ($result->num_rows == 0) {
		$result = json_encode(array("taken" => "0"));	
		print($result);
	}
	else {
		$result = json_encode(array("taken" => "1"));	
		print($result);
	}
	
?>
	