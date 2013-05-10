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
</body>
</html>