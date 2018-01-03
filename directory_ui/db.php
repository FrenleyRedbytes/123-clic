<?php

	global $con;
	$host_name = "localhost";
	$database = "db689177143";
	$user_name = "root";
	$password = "redbytes";
	$con = mysqli_connect($host_name, $user_name, $password, $database);
	
	if (!$con){
	  die("Connection error: " . mysqli_connect_error());
	}
	
?>
