<?php
session_start();
$mysqli= new mysqli('localhost','CHANS', 'cs5tqe0zt1k', 'info230_SP13FP_CHANS');

if(isset($_SESSION['username'])) {
	unset($_SESSION['username']);
	unset($_SESSION['name']);
	session_destroy();
}
?>

<html>
<head>
<title>Log Out</title>
<link rel="stylesheet" href="samplecss.css">
<link href='http://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'/>
</head>

<body>
<div class="wrapper">
	<div class="header">
		<?php 
		include('inc/nav.php');
		?>
	</div>
	<div class = "ReturnMessage">
	Goodbye!
	</div>
</div>
</body>
</html>