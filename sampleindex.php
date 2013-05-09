<?php
#changes on line 35-40
#session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>CHANS Cornell Health and Nutrition Society</title>
<link rel="stylesheet" href="samplecss.css">
<link href='http://fonts.googleapis.com/css?family=Tauri' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Patrick+Hand+SC' rel='stylesheet' type='text/css' />

<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

<div id="wrapper">
<div id="header">
<div class="logo">
<img src="chans.jpeg" alt="logo" width="400" height="78"></img>
</div>
<div class="main-nav">
<ul>
<li><a href="../">01. Portfolio</a></li>
<li><a href="./about.html">02. About</a></li>
<li><a href="http://blog.noble-design.co.uk/">03. Blog</a></li>
<li><a href="./contact.html">04. Contact</a></li>
</ul>
</div>
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