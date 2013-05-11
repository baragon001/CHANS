<?php
session_start();
$mysqli= new mysqli('localhost','CHANS', 'cs5tqe0zt1k', 'info230_SP13FP_CHANS');
$registerSuccess = false;
$registerAttempt = false;

//checks submitted credentials
function inputCheck() {
	$mysqli= new mysqli('localhost','CHANS', 'cs5tqe0zt1k', 'info230_SP13FP_CHANS');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$major = $_POST['major'];
	$year = $_POST['year'];
	$validYear = false;
	$validName = false;
	$validMajor = false;
	$validUserName = false;
	
	//check valid year: HTML enforces that it must be a number, if its not an empty string is returned
	//hence We will check only whether it is a valid graduation year assuming it is a number
	$currentYear = date("Y");
	$validYear = ($year - $currentYear <= 4) && ($year-$currentYear>0);
	
	//check valid name and major: must be a series of letters separated by spaces
	$validName = preg_match('/^[a-zA-Z ]+$/', $name);
	$validMajor = preg_match('/^[a-zA-Z ]+$/', $major);
	
	//check that username does not already exist in db:
	
	$clean = $mysqli->real_escape_string($username);
	$query = "SELECT username FROM Users WHERE username REGEXP \"$clean\"";
	
	$result = $mysqli->query($query);
	
	if ($result->num_rows == 0) {
		$validUserName = true;
	}
	else {
		$validUserName = false;
	}
	return $validUserName && $validYear && $validMajor && $validName;		
}

//processes registration request
if((isset($_POST['username']) &&isset($_POST['password']) && isset($_POST['name']) && isset($_POST['email'])
		&&isset($_POST['major'])&&isset($_POST['year']))){
	$registerAttempt = true;
	$validInputs = inputCheck();
	if($validInputs){
		//sanitize inputs for SQL injection possibility
		$cleanUserName = $mysqli->real_escape_string($_POST['username']);
		$cleanPassword = $mysqli->real_escape_string($_POST['password']);
		$cleanName = $mysqli->real_escape_string($_POST['name']);
		$cleanEmail = $mysqli->real_escape_string($_POST['email']);
		$cleanMajor = $mysqli->real_escape_string($_POST['major']);
		$cleanYear = $mysqli->real_escape_string($_POST['year']);
		$hashpw = hash('sha256', $cleanPassword); //hashing users password for storage on the DB
		$query = "INSERT INTO Users(username, hashpwd, name, email, major, gyear) 
				  VALUES (\"$cleanUserName\", \"$hashpw\", \"$cleanName\", \"$cleanEmail\", \"$cleanMajor\", \"$cleanYear\")";
		$result = $mysqli->query($query);
		//login
		$_SESSION['username'] = $cleanUserName;
		$_SESSION['name'] = $cleanName;
		$registerSuccess = true;
		
	}
	else {
		
		$registerSuccess = false;
	}
}
else {
	
	$registerSuccess = false;
}
?>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="samplecss.css">
<link href='http://fonts.googleapis.com/css?family=Didact+Gothic' rel='stylesheet' type='text/css'/>
<script type='text/javascript' src='basic/js/jquery.js'></script>
<script type='text/javascript' src='js/registration.js'></script>

</head>

<body>
<div class="wrapper">
	<div class="header">
		<?php 
		include('inc/nav.php');
		?>
	</div>
	<!-- ************PRINT THIS IF USER SUCCESSFULLY REGISTERED********** -->
	<?php if($registerSuccess) {?>
		<h3 class="centerHeader"> Registration Succesfull!</h3>
	<?php }?>
	<!-- ************PRINT THIS IF USER UNSUCCESSFULLY REGISTERED BUT TRIED********** -->
	<?php if((!$registerSuccess) && $registerAttempt) {?>
		<h3 class="centerHeader"> We've encountered an error, please try again</h3>
	<div id="formWrapper">
		<h2 class = "centerHeader" >Register Here</h2>
		<form id="registerForm" action="register.php" method="post" onSubmit="return validAll();">
			<table border="0" class="centerTable">
			 <tr>
			 <td></td>
			   <td><label id="formError" class="error">Please fix errors before proceeding</label></td>
			 </tr>
			 <tr>
			   <td>Username:</td>
			   <td>
				<input id="username" type="text" name="username" size="25" required = "on"/> <br />
			   </td>
			   <td>
			   <label class= "error" id="UNerror"> Taken </label>
			   </td>
			 </tr>
			 <tr>
			   <td>Password:</td>
			   <td>
				<input type="password" name="password" size="25" required = "on" /> <br />
			   </td>
			 </tr>
			 <tr>
			   <td>Name:</td>
			   <td>
				<input id="name" type="text" name="name" size="25"/> <br required = "on" />
			   </td>
			   <td>
			   <label class="error" id="nameError"> Invalid </label>
			   </td>
			 </tr>
			 <tr>
			   <td>Email:</td>
			   <td>
				<input type="email" name="email" size="25"/> <br required = "on" />
			   </td>
			 </tr>
			 <tr>
			   <td>Major:</td>
			   <td>
				<input type="text" name="major" id="major" size="25"/> <br required = "on" />
			   </td>
			   <td>
			   <label class="error" id="majorError"> Invalid </label>
			   </td>
			 </tr>
			 <tr>
			   <td>Graduation Year:</td>
			   <td>
				<input id = "year" type="number" name="year" size="25" required = "on"/> <br />
			   </td>
			    <td>
			   <label class="error" id="YearError"> Invalid </label>
			   </td>
			 </tr>
			 <tr>
			 <td></td>
			   <td><input type="submit" value="Submit" /></td>
			 </tr>
			</table>
		</form>
	</div>
	<?php }?>
	<!-- ************PRINT THIS IF USER has not tried to register********** -->
	<?php if(!$registerAttempt) {?>
		<div id="formWrapper">
		<h2 class = "centerHeader" >Register Here</h2>
		<form id="registerForm" action="register.php" method="post" onSubmit="return validAll();">
			<table border="0" class="centerTable">
			 <tr>
			 <td></td>
			   <td><label id="formError" class="error">Please fix errors before proceeding</label></td>
			 </tr>
			 <tr>
			   <td>Username:</td>
			   <td>
				<input id="username" type="text" name="username" size="25" required = "on"/> <br />
			   </td>
			   <td>
			   <label class= "error" id="UNerror"> Taken </label>
			   </td>
			 </tr>
			 <tr>
			   <td>Password:</td>
			   <td>
				<input type="password" name="password" size="25" required = "on" /> <br />
			   </td>
			 </tr>
			 <tr>
			   <td>Name:</td>
			   <td>
				<input id="name" type="text" name="name" size="25"/> <br required = "on" />
			   </td>
			   <td>
			   <label class="error" id="nameError"> Invalid </label>
			   </td>
			 </tr>
			 <tr>
			   <td>Email:</td>
			   <td>
				<input type="email" name="email" size="25"/> <br required = "on" />
			   </td>
			 </tr>
			 <tr>
			   <td>Major:</td>
			   <td>
				<input type="text" name="major" id="major" size="25"/> <br required = "on" />
			   </td>
			   <td>
			   <label class="error" id="majorError"> Invalid </label>
			   </td>
			 </tr>
			 <tr>
			   <td>Graduation Year:</td>
			   <td>
				<input id = "year" type="number" name="year" size="25" required = "on"/> <br />
			   </td>
			    <td>
			   <label class="error" id="YearError"> Invalid </label>
			   </td>
			 </tr>
			 <tr>
			 <td></td>
			   <td><input type="submit" value="Submit" /></td>
			 </tr>
			</table>
		</form>
	</div>
	<?php }?>
</div>
</body>
</html>