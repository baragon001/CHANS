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
	
	<h1>Get In Touch</h1>
	
	<?php
	$to = "zk43@cornell.edu.com";
	$subject = "Test mail";
	$message = "Hello! This is a simple email message.";
	$from = "zk43@cornell.edu";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
	// echo "Mail Sent.";
	?>
	
	<?php
	if (isset($_REQUEST['email']))
	//if "email" is filled out, send email
	  {
	  //send email
	  $email = $_REQUEST['email'] ;
	  $subject = $_REQUEST['subject'] ;
	  $message = $_REQUEST['message'] ;
	  mail("zk43@cornell.edu", $subject,
	  $message, "From:" . $email);
	  echo "Thank you! We will respond in the next few days.";
	  }
	else
	//if "email" is not filled out, display the form
	  {
	  echo "<form method='post' action=''>
	  Email: <input name='email' type='text'><br>
	  Subject: <input name='subject' type='text'><br>
	  Message:<br>
	  <textarea name='message' rows='15' cols='40'>
	  </textarea><br>
	  <input type='submit'>
	  </form>";
	  }
	?>

</body>
</html>