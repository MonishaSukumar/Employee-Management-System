<?php
session_start();
require_once('db.php');
if(isset($_POST['Register']))
{
$con=connect();
$id=$con->real_escape_string($_POST['eno']);
$fname=$con->real_escape_string($_POST['un']);
$mname=$con->real_escape_string($_POST['mn']);
$lame=$con->real_escape_string($_POST['ln']);
$dob=$con->real_escape_string($_POST['dob']);
$gender=$con->real_escape_string($_POST['gen']);
$dep=$con->real_escape_string($_POST['dep']);
$jt=$con->real_escape_string($_POST['jt']);
$ph=$con->real_escape_string($_POST['ph']);
$em=$con->real_escape_string($_POST['em']);
$adds=$con->real_escape_string($_POST['adds']);
$psd=$con->real_escape_string($_POST['pwd']);
$cpsd=$con->real_escape_string($_POST['cpwd']);
$sal="Rs: 15000";
			if($psd==$cpsd)
				{
	$sql= "INSERT into emp VALUES('" . $id . "','". $fname ."','". $mname ."','". $lname ."','".$dob."','" . $gender. "','". $dep."','". jt."','". $ph ."','".$em."','" . $adds. "','".$psd."','".$sal."')";
				   $success = $con->query($sql);
						if (!$success) {
							die("Couldn't enter data: ".$con->error);
										}
										else{
										echo '<script type="text/javascript">alert("User Registered ")</script>';
										$_SESSION['id'] = $id;
								        $_SESSION['psd'] = $psd;
										header("location: reg.php");
										}
										
				}
				
				else{
					echo '<script type="text/javascript">alert("Enter valid password")</script>';
				}
}
			?>
<html>
<head>
<style>
.fo{
	border-radius : 20px;
	background-color: white;
	border: 3px solid #000000;
	width: 500px;
	margin: 0 auto; 
	font-weight:bold;
	font-size:15px;
	padding:10px;
}

}
</style>
<center> <h1>EMPLOYEE MANAGEMENT SYSTEM<h1>
<h3>Registeration Form</h3></center>
</head>
<body><form action="register.php" method="post" class="fo"><br><br>
<center>
Employee ID : 
<input type="text"  name="eno" required><br><br>
First Name : 
<input type="text"  name="un" required><br><br>
Middle Name : 
<input type="text"  name="mn" ><br><br>
Last Name : 
<input type="text"  name="ln"><br><br>
Date Of Birth: 
<input type="text"  name="dob" placeholder="YYYY-MM-DD" required><br><br>
Gender:
<input type="radio" name="gen" value="Male">Male
<input type="radio" name="gen" value="Female">Female<br><br>
Department: 
<input type="text"  name="dep" required><br><br>
Job Title: 
<input type="text"  name="job" required><br><br>
Contact: 
<input type="text"  name="ph" placeholder="mobile number" required><br><br>
E-Mail ID : 
<input type="text"  name="em" required><br><br>
Address :<br>
<textarea cols="40" rows="5" name="adds"></textarea><br><br>
Password :<input type="password" name="pwd" required><br><br>
Confirm Password :<input type="password" name="cpwd" required><br><br>
<button type="Submit" name="Register"> Register</button><br><br>
<a href="login.php"><button type ="button">Back </button></a><br><br></center>
</form>
</body>
</html>
