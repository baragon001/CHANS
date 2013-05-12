
<html>
<head>
<title>CHANS Cornell Health and Nutrition Society</title>
<link rel="stylesheet" href="../samplecss.css">
<link href='http://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'/>
</head>

<div id="header" class = "header clearfix">
<?php 
if(isset($_SESSION['name'])) { 
?>
<label id="greeting"> Hello <?php print($_SESSION['name']);?> </label>
<form id ="logout" action="logout.php" method="post">
	<input type='submit' name='basic' value='Logout'/>
</form>

<?php }?>
<?php if(!isset($_SESSION['name'])) {
?>
<div id="button"><?php include('basic/index.html'); ?></div>
<div id="register">
<a href="register.php"> Register Here </a> </div>

<?php }?>
<div class="logo">
<a href="sampleindex.php"><img src="img/logo.png" alt="logo" width="174" height="73"></img></a>
</div>
<div class = 'main-nav'> 
     <ul>
	  <li><a href="sampleindex.php">01. <span class='bold'>Home</span></a></li>
	  <li><a href="about.php">02. <span class='bold'>About</span></a></li>
	<li><a href="members.php">03. <span class='bold'>Members</span></a></li>
	  <li><a href="account.php">04. <span class='bold'>Account</span></a></li>
	  <li><a href="forum.php">05. <span class='bold'>Forum</span></a></li>
	  <li><a href="contact.php">06. <span class='bold'>Contact</span></a></li>
     </ul>
</div>
</div>
</html>