<?php 
session_start();
	include "db.php";
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$mobile=$_POST['mobile'];	
	$adress=$_POST['adress'];
	$city=$_POST['city'];	
	$zipcode=$_POST['zipcode'];	
	date_default_timezone_set('Asia/Calcutta');
	$date=date('d.m.y h:i');
	$fetch=mysqli_query($con,"select * from register where email='$email'");
	$count = mysqli_num_rows($fetch);
	 if($count== 1)
	 {
	 		echo 'FalseEmail';
	 }
	 else
	 {
	 	$query = mysqli_query($con, "INSERT INTO `register` (`name`,`email`, `address`,`password`,`mobile`,`cu_date`,`city`,`zip_code`) VALUES ('$name','$email','$adress','$password','$mobile','$date','$city','$zipcode');");
	$last=mysqli_insert_id($con);
	$query1 = mysqli_query($con, "SELECT * from register where id='$last'");
	if($row = mysqli_fetch_array($query1)){
			$_SESSION['user_id']        = $row['id'];
			$_SESSION['email']     = $row['email'];
			$_SESSION['name']      = $row['name'];	
			echo 'true';
		}
	else{
	      echo 'FasleInsert';
	}  

}
	
?>	