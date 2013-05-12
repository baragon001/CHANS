<?php
 session_start();
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

	<div class="wrapper">
	<div class="header">
	<?php include('inc/nav.php'); ?>
	</div>
	<?php
	include ('inc/password.php');
	if ($mysqli->errno) {
		print($mysqli->error);
		exit();
	}
	?>
	
	<?php
	$tid = $_GET['tid'];
	$result = $mysqli->query("SELECT * FROM replies WHERE topics_tid = " . $tid);
	if ($result) {
		while ($row = $result->fetch_assoc()) {
			print "<div id='replies'>";
			print $row['content'];
			print "</div>";
			print '<br/>';
		}
		?>
		<?php
		if (isset($_SESSION['username'])) {
			include ('addreply.php');
			
			$replyid = "NULL";
			if(isset($_POST['reply'])){
				$query = "INSERT INTO replies VALUES ('$replyid', '".$_REQUEST['reply']."', '$tid', '".$_SESSION['username']."', CURRENT_TIMESTAMP)";
				$results = $mysqli->query($query);
				if ($results){
					print "Score! Your reply has been added";
				}
				else {
					print "BOO! There was an error";
				}
			}
			$replyid++;

		}
	}
	
	?>
	

	


</body>
</html>