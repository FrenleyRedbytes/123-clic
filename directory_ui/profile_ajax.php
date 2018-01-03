<?php 
session_start();
	include "db.php";
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$zipcode=$_POST['zipcode'];
        $city=$_POST['city'];	
	$id=$_SESSION['user_id'];
	$query1 = mysqli_query($con, "update register set name='$name',email='$email',mobile='$phone',address='$address',city='$city',zip_code='$zipcode' where id='$id'");
	if($query1){
			$data=array('chk'=>'true');
	}
	echo json_encode($data);
?>