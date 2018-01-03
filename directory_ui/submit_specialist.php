<?php
	session_start();
  
	include 'db.php';
  
	$user_id=$_SESSION['user_id'];
    $spe_id=$_GET['spe_id'];
    $date_booking=$_GET['date'];
    $service=$_GET['service_id'];

    //$service_data =mysqli_query($con,"SELECT * FROM service WHERE serv_title='$service'");
	$service_data =mysqli_query($con,"SELECT t1.*,t2.ser_name FROM service AS t1 INNER JOIN service_detail AS t2 ON t1.serv_title=t2.ser_detail_id WHERE t1.serv_title='$service'");
	$ser_ar = mysqli_fetch_array($service_data);
	$time_service=$ser_ar['time'];
	$name_service=$ser_ar['ser_name'];
	$time_div=$time_service/15;
        
	$Start =$_GET['time'];
	$_SESSION['time_show']=$Start;
	$Minutes = 15;
	$abc=[];

	for($i=0;$i<$time_div;$i++){
		$abc[].=$Start; 
		$Start=  date("H:i:s", strtotime($Start)+($Minutes*60));
	}

    $time_booking=implode(',',$abc);

    date_default_timezone_set("Europe/Paris");
    $datetime = date('Y-m-d H:i:s');
	$start_service = $date_booking." ".$abc[0];
	$end_service = date("Y-m-d H:i:s",strtotime($start_service)+($time_service*60));
    $res = mysqli_query($con,"insert into add_booking_new(user_id,spe_id,service_id,date_booking,time_booking,cu_date,title,start,end,status)values('$user_id','$spe_id','$service','$date_booking','$time_booking','$datetime','$name_service','$start_service','$end_service','1')");    
    $last_id=mysqli_insert_id($con);
    
	if (!$res){
        $data = array('chk' =>'true');     
    }
    else{   
        $data = array('last_id'=>$last_id,'chk' =>'true');        
    }

    echo json_encode($data);