<?php
session_start();
require_once('db.php');
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
	margin-bottom:20px;
	font-weight:bold;
	font-size:15px;
	padding:10px;
}
}
</style>
<center> <h1>student <h1></center>
</head>
<body><form action="login.php" method="post" class="fo"><br><br>
<center>
stu Id
<input type="text"  name="id" required><br><br>
Password <input type="password" name="pwd" required><br><br>
<button type="Submit" name="login">Log in </button><br> <br> 
<a href="register.php"><button type="button"> Register</button></a></center>
</form>
</body>
</html>
<?php
if(isset($_POST['login'])){
$con=connect();
$id=$con->real_escape_string($_POST['id']);
$psd=$con->real_escape_string($_POST['pwd']);
			$sql="SELECT fn from emp where id='$id' and  pswd='$psd'";
			$r=mysqli_query($con,$sql) or die(mysqli_error($con));
			$count=mysqli_num_rows($r);
      if($count == 1) {
         $_SESSION['id'] = $id;
		 $_SESSION['psd']=$psd;
		 header("location:wel.php");
	  }
	  else{
         echo '<script type="text/javascript">alert("Invalid Employee Id and Password")</script>';
}

}
?>