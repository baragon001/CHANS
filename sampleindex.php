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
<?php include('basic/index.html'); ?>
<div class="logo">
<a href="sampleindex.php"><img src="img/logo.png" alt="logo" width="174" height="73"></img></a>
</div>
<?php
include('inc/nav.html');
?>
</div>
<div class="portfolio">
<div id="main">
<div class="left-column">
<p>this page will a brief description of the site and
a basic registration form for users have access to the
multiple page of this website</p>
</div>

<div class="right-column">
<p>this page will a brief description of the site and
a basic registration form for users have access to the
multiple page of this website</p>
</div>
</div>
</div>
<?php
// include "inc/password.php";
// if ($mysqli->errno) {
// print($mysqli->error);
// exit();
// }
?>


<?php
// //for logging in
// if (!isset($_POST['username']) && !isset($_POST['password'])) {
?>


<?php
// } else {
// $username = $_POST['username'];
// $password = hash('sha256', $_POST['password']);
// $query = "SELECT * FROM users WHERE username = '".$_POST['username']."' AND hashpwd = '".hash("sha256", $_POST['password'])."'";
// $results = $mysqli->query($query);

// if ($results->num_rows == 1) {
// $array = $results->fetch_assoc();
// print "Score! <br/>";
// $_SESSION['logged_user'] = $array['name'];
// print '<a href="home.php">Explore the site</a><br />';
// include "inc/logoutForm.html";

// } else {
// print '<span style="color: red; font-size: 14pt">RATS! login was unsuccessful</span> <br/>';
// include "loginform.php";
// }
// }
?>

<div style="clear:both;"></div>
</div>
</body>
</html>