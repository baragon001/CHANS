<?php
#session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>CHANS Cornell Health and Nutrition Society</title>
	<link rel="stylesheet" href="samplecss.css">
	<link href='http://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'/>
</head>

<body>
	
	<?php
	include ('inc/password.php');
	if ($mysqli->errno) {
		print($mysqli->error);
		exit();
	}
	?>
	
	<form id="rform" action="addreply.php" method="post">
	<table border="0">
		<tr>
			<td>Content:</td>
			<td><input type="text" id="reply" name="reply" placeholder="Write your opinion"/></td>
		</tr>
		<tr>
			<td><input type="submit" value="Submit" /></td>
		</tr>
	</table>	
	</form>
	
	<?php
	$replyid = "NULL";
	if(isset($_POST['reply']) && isset($_POST['submit'])){
		$query = "INSERT INTO replies VALUES('$replyid', 'Hey!', '4', 'baragon001')";
		$results = $mysqli->query($query);
		if ($results){
			print "Score! Your reply has been added";
		}
		else {
			print "BOO! There was an error";
		}
	}
	$replyid++;
	?>
	
</body>
</html>