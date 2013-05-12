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

	<div id="wrapper">
	<div id="header">
	<div id="button"><?php include('basic/index.html'); ?></div>
	<div class="logo">
		<a href="home.php"><img src="img/logo.png" alt="logo" width="174" height="73"></img></a>
	</div>
	<?php include('inc/nav.php'); ?>
	
	<?php
	include ('inc/password.php');
	if ($mysqli->errno) {
		print($mysqli->error);
		exit();
	}
	?>
	
	<?php
	$tid = $_GET['tid'];
		$result = $mysqli->query("SELECT * FROM Topics WHERE tid = " . $tid);
			if ($result) {
				while ($row = $result->fetch_assoc()) {
					$tid2 = $row['tid'];
				}
			}
			$result = $mysqli->query("SELECT * FROM replies WHERE topics_tid = " . $tid);
				if ($result) {
					while ($row = $result->fetch_assoc()) {
						print '<ul>';
						print $row['content'];
						print "</ul>";
					}
				}
	?>
	
	<h3>Add a Reply</h3>
	
	<form id="rform" action="" method="post">
	<table border="0">
		<tr>
			<td>Reply:</td>
		</tr>
		<tr>
			<td><textarea id="reply" name="reply" placeholder="Leave me a message"></textarea></td>
		</tr>
		<tr>
			<td><button type="submit" id="submit">Submit</button><td>
		</tr>
	</table>	
	</form>
	
	<?php
	$replyid = "NULL";
	if(isset($_POST['reply'])){
		$query = "INSERT INTO replies VALUES ('$replyid', '".$_POST['reply']."', '$tid', 'baragon001', CURRENT_TIMESTAMP)";
		//$update = $mysqli->query("UPDATE albums SET datemodified=CURDATE() WHERE title = " . $title);
		$results = $mysqli->query($query);
		if ($results){
			print "Score! Your reply has been added";
			print '<br/>';
			print $_POST['reply'];
		}
		else {
			print "There was an error";
		}
	}
	$replyid++;
	?>
	


</body>
</html>