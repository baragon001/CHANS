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
	$result = $mysqli->query("SELECT * FROM Family");
	if (!$result) {
		print($mysqli->error);
		exit();
	}
	?>
	
	<h1>Families</h1>
	
	<?php
	while ($row = $result->fetch_assoc()) {
		$famName = $row['famName'];
		print '<table id="table_1" border="0">';
		print '<tr>';
		print '<td class="famName"><a href="forum.php?famName='.$row['famName'].'">';
		print $row['famName'];
		print '</td>';
		print '<td>';
		print $row['Description'];
		print '</td>';
		print '</tr>';
		print "</table>";
		print '<br/>';
	}
	
	if (!isset($_GET['famName'])){
			exit();
	}
	else {
		$q = '"';
		$famName = $_GET['famName'];
		$string = $q."" .$famName."".$q;
		$result = $mysqli->query("SELECT * FROM Forum WHERE Family_famName = " . $string);
			if ($result) {
				print '<h2>Forum Names</h2>';
				while ($row = $result->fetch_assoc()) {
					$fname = $row['fname'];
					print "<div id='forum_name'>";
					print '<a href="forum.php?famName='.$famName.'&fname='.$row['fname'].'">';
					print $row['fname'];
					print '</a>';
					print "</div>";
					print '<br/>';
				}
				if (!isset($_GET['fname'])){
					exit();
				}
				else {
					$q = '"';
					$fname = $_GET['fname'];
					$string2 = $q."" .$fname."".$q;
					$result = $mysqli->query("SELECT * FROM Topics WHERE Forum_fname = " . $string2);
						if ($result) {
							print '<h3>Topics</h3>';
							while ($row = $result->fetch_assoc()) {
								$subject = $row['subject'];
								$tid = $row['tid'];
								print '<ul>';
								print '<li class="subject"><a href="topic.php?tid='.$row['tid'].'">';
								print $row['subject'];
								print '</a>';
								print '</li>';
								print "</ul>";
								}
								?>
								<?php
								if (isset($_SESSION['username'])) {
								
									include 'addtopic.php';
								?>
								
								
								
								<?php
								$topid = "NULL";
								if(isset($_POST['topic'])){
									$query = "INSERT INTO Topics VALUES ('$topid', '0', '".$_POST['topic']."', CURRENT_TIMESTAMP, '$fname', '".$_SESSION['username']."', '0')";
									//$update = $mysqli->query("UPDATE albums SET datemodified=CURDATE() WHERE title = " . $title);
									$results = $mysqli->query($query);
									if ($results){
										print "Score! Your reply has been added";
									}
									else {
										print "There was an error";
									}
								}
								$topid++;
								}
								?>
								
							<?php	
							
							if (!isset($_GET['tid'])){
								exit();
							}
							// else {
							// $q = '"';
							// $tid = $_GET['tid'];
								// $result = $mysqli->query("SELECT * FROM replies WHERE topics_tid = " . $tid);
									// if ($result) {
										// while ($row = $result->fetch_assoc()) {
											// print '<ul>';
											// print $row['content'];
											// print "</ul>";
										// }
								// }
							// }
					}
				}
			}
	}
	?>
</body>
</html> 
	
	
	
	
	
	