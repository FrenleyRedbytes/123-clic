<?php 
session_start();
include "db.php";
 $email=$_POST['username'];
 $password=$_POST['password'];
$query = mysqli_query($con, "SELECT * from register where `email`='$email' and `password`='$password'");
		if($row = mysqli_fetch_array($query)){
		$_SESSION['user_id']        = $row['id'];
		$_SESSION['email']       = $row['email'];
		$_SESSION['name']       = $row['name'];
		echo 'true';
		}
		else{
		echo 'false';
		}              

 ?>