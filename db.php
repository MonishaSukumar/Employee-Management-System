<?php
function connect(){
$con = new mysqli("localhost","root","moni","dbms");
if($con->connect_error){
die("Connection Failed".$con->connect.error);
} return $con;
}
?>
