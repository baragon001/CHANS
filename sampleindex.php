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
<link href='http://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'/>

<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

<div id="wrapper">
<div id="header">
<div class="logo">
<a href="home.php"><img src="img/logo.jpg" alt="logo" width="174" height="73"></img></a>
</div>
<?php
include('nav.html');
?>
</div>
<div class="portfolio">
<p>Cornell Health and Nutrition Society (CHANS) explores the intricate connection between diet, health, and nutrition. </br>
<span class="learn"><a href="about.php">Learn more >></a></span></p>
<div class="box1">
<img src="img/current.jpg" alt="currentwork" width="100%" height="auto"></img>
</div>

<div class="box2">
<a href="http://www.news.cornell.edu/stories/2013/02/student-spurs-ban-nutritional-supplement-ny" target="_blank"><img src="img/student.jpg" alt="gregmaller" width="100%" height="auto"></img></a>
</div>

<div class="box3">
<a href="forum.php"><img src="img/forum.jpg" alt="forum" width="100%" height="auto"></img></a>
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