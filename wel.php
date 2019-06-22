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
<center> <h1>EMPLOYEE MANAGEMENT SYSTEM<h1>
<h3>Employee Details</h3>
</center>
</head>
<body>
<center><h1>
<?php
if (isset($_SESSION['id'])){
$apn= $_SESSION['id'];
echo "Employee ID: " . $apn . "";
}
?>
<form action="wel.php" class="fo" method="post">
<br><button type="Submit" name="view">View details</button>
<button type="Submit" name="salary">Salary  details</button>
<a href="logout.php"><button type="button" name="view">Log out</button></a>
<?php
if(isset($_POST['view'])){
$con=connect();
$id=$_SESSION['id'];
			$sql="SELECT * from emp where id='$id'";
            $result =$con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br><br>Employee ID: " . $row["id"]."<br>";
		echo "Name: " . $row["fn"].  $row["mn"]. $row["ln"]."<br>" ;
		echo "Date Of Birth: " . $row["dob"]."<br>";
		echo "Gender: " . $row["gender"]."<br>";
		echo "Department: " . $row["dept"]."<br>";
		echo "Job:" . $row["Job"]."<br>";
		 echo "Contact: " . $row["phone"]."<br>";
		  echo "E-Mail ID: " . $row["email"]."<br>";
				 echo "Address: " . $row["address"]."<br>";
				  echo "Salary: " . $row["sal"]."<br>";
    }
} else {
    echo "0 results";
}
}


?>

<?php
if(isset($_POST['salary'])){
$con=connect();
$id=$_SESSION['id'];
			$sql="SELECT * from emp where id='$id'";
            $result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br><br>Employee Id: " . $row["id"]."<br>";
		echo "Name: " . $row["fn"].$row["mn"].$row["ln"]."<br>" ;
		 echo "Salary: ". $row["sal"]."<br>";
    }
} else {
    echo "0 results";
}
}

?>

</center>
</form>
</body>
</html>
