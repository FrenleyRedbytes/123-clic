<?php 
include 'db.php';
session_start();
  $user_id=$_SESSION['user_id'];
$spe_id=$_POST['spe_id'];
    $date_booking=$_POST['date'];
    $service=$_POST['service'];
    $time_booking=$_POST['time'];
    date_default_timezone_set("Asia/Calcutta");
    $datetime = date('Y-m-d H:i:s');
    $res = mysqli_query($con, "insert into add_booking_new(user_id,spe_id,service_id,date_booking,time_booking,cu_date)values('$user_id','$spe_id','$service','$date_booking','$time_booking','$datetime')");
    if (!$res){
      header('location:index.php');
    }
    else{
        header("location:special_detail_new.php?last_id=$last_id");
    }