<?php
session_start();
$mysqli= new mysqli('localhost','CHANS', 'cs5tqe0zt1k', 'info230_SP13FP_CHANS');

//check if user tried to login  in
$loginSuccess = false;
$loginAttempt = false;
if (isset($_POST['username']) && $_POST['password']) {
	$loginAttempt = true;
	$cleanUserName = $mysqli->real_escape_string($_POST['username']);
	$userName = "^".$cleanUserName."$";
	$query = "SELECT name, hashpwd FROM Users WHERE username REGEXP \"$userName\"";
	$result = $mysqli->query($query);
	if($result->num_rows == 0) {
		$loginSuccess = false;
	}
	else {
		$ResRow = $result->fetch_assoc();
		$pwd = $ResRow['hashpwd'];
		$name = $ResRow['name'];
		if(hash('sha256', $_POST['password']) == $pwd) {
			$loginSuccess = true;
			$_SESSION['username'] = $cleanUserName;
			$_SESSION['name'] = $name;
		}
		else {
			$loginSuccess = false;
		}
	}
}

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
	<div id="wrapper" class ="wrapper">
	<div id="header" class = "header">
		<?php
		include('inc/nav.php');
		?>
	</div>
	<!-- ************USER IS NOT LOGGED IN, GIVE PHP VERSION OF LOGIN********** -->
	<?php 
		if(!isset($_SESSION['name'])) {
	?>
	<!-- ************USER IS NOT LOGGED IN AND USER HAS NOT ALREADY TRIED TO LOG IN, NO ERROR MESSAGE NEEDED********** -->
	<?php 
		if(!$loginAttempt) {
	?>
	<h3 class="centerHeader">Please log in to view your Account information</h3>
	<?php }?>
	<!-- ************USER IS NOT LOGGED IN BUT TRIED TO LOGIN, PRINT ERROR MESSAGE********** --><
	<?php 
		if($loginAttempt){
	?>
	<h3 class="centerHeader">Incorrect username and password combination</h3>
	<?php }?>
	<div id="login">
	<form id="lform" action="account.php" method="post">
				<table border="0" class = "centerTable">
				 <tr>
				   <td>Username:</td>
				   <td>
					<input type="text" name="username" size="25" /> <br />
				   </td>
				 </tr>
				 <tr>
				   <td>Password:</td>
				   <td>
					<input type="password" name="password" size="25"/> <br />
				   </td>
				 </tr>
				 <tr>
				   <td><input type="submit" value="Submit" /></td>
				 </tr>
				</table>
			</form>
			</div>
	<?php }?>
	<!-- ************USER IS LOGGED IN, DISPLAY THE PROFILE********** -->
	<?php 
		if(isset($_SESSION['name'])){
	?>
	
		<?php 
			//find if user has profile picture on the server
			$reg = "^".$_SESSION['username']."$";
			$query = "SELECT src FROM Pictures WHERE Users_username REGEXP \"$reg\" AND isProfile=TRUE";
			$result = $mysqli->query($query);
			if($result->num_rows == 0) {
				$src = "img/default.jpg";
			}
			else {
				$ResRow = $result->fetch_assoc();
				$src = $ResRow['src'];
			}
			//get the rest of the user info to display in profile below
			$reg = "^".$_SESSION['username']."$";
			$query = "SELECT email,major,gyear,dateJoined FROM Users WHERE username REGEXP \"$reg\"";
			$res = $mysqli->query($query);
			$resRow = $res->fetch_assoc();
			$email = $resRow['email'];	
			$major = $resRow['major'];
			$year = $resRow['gyear'];
			$dateJoined = $resRow['dateJoined'];
		?>
		<div class = "portfolio">
		<h1><?php print($_SESSION['name']);?></h1>
	<div class="box4">
		<a href="photos.php"><img src=<?php print($src);?> alt="profilepic" width="100%" height="auto"></img></a>
	</div>
	
	<div class="box5">
		<h2>About</h2>
		<p>Edit your information here. Give information about yourself, your experience with supplements, etc.</p>
	</div>
	
	<div class="box6">
		<h2>Member Info</h2>
		<p>Name: <?php print($_SESSION['name']);?></p>
		<p>email: <?php print($email);?></p>
		<p>Major: <?php print($major);?></p>
		<p>Year: <?php print($year);?></p>
		<p>Member since: <?php print($dateJoined);?> </p>
	</div>
	<div style="clear:both;"></div>
	</div>
	
	<?php }?>
		
	
	</div>
</body>
</html>