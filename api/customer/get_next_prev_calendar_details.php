<?php 
include('../constants.php');
#send booking parameters api
$specilaist_id = $data['specialist_id'];
$cat_id = $data['specialist_cat_id'];
$sub_cat_id = $data['specialist_subcat_id'];


/*$workersQuery = mysqli_query($con,"SELECT w.first_name,w.last_name,w.work_id,w.image,w.day,
w.mon_from_time_am,w.mon_to_time_am,w.mon_from_time_pm,
w.mon_to_time_pm,w.tue_from_time_am,w.tue_to_time_am,w.tue_from_time_pm,
w.tue_to_time_pm,w.wed_to_time_am,w.wed_from_time_am,w.wed_from_time_pm,w.wed_to_time_pm
,w.thu_from_time_am,w.thu_to_time_am,w.thu_from_time_pm,w.thu_to_time_pm,w.fri_from_time_am,
w.fri_to_time_am,w.fri_from_time_pm,w.fri_to_time_pm,w.sat_from_time_pm,w.sat_to_time_pm,w.sat_from_time_am,w.sat_to_time_am,w.sun_from_time_am,w.sun_to_time_am,w.sun_from_time_pm,w.sun_to_time_pm  FROM worker w WHERE w.spe_id=$specilaist_id AND w.cat_id=$cat_id AND w.subcat_id=$sub_cat_id");
*/

$specialistQuery = mysqli_query($con,"SELECT sp.* from `specialist` sp where sp.spr_id=$specilaist_id");

$serviceData = array();
$finalData = array();
$workerData = array();
$calendarData = array();
$serviceArray = array();

$day_one = array();
$day_two = array();
$day_three = array();
$beforeNoonTime = array();	
$afterNoonTime = array();
$calendarData =array();

$dateTimeDayArray = array();

$dateLoop  = array();
$dayLoop = array();


if(@mysqli_num_rows($specialistQuery) > 0){

	$speRow = @mysqli_fetch_array($specialistQuery);
	
	$spe_cat_id = $speRow['cat_id'];
	$spe_sub_cat_id = $speRow['subcat_id'];
	

	$serviceQuery = mysqli_query($con,"SELECT ser.* from `service` ser where ser.spe_id=$specilaist_id group by ser.serv_title");

	if(@mysqli_num_rows($serviceQuery)>0){

			while($serviceRow = @mysqli_fetch_array($serviceQuery)){
				$ser_detail_id = $serviceRow['serv_title'];
				$serviceArray ['service_price'] =  $serviceRow['price'];
				$serviceDetailsQuery = @mysqli_query($con, "SELECT sd.* FROM `service_detail` sd where sd.ser_detail_id='$ser_detail_id'");

				if(@mysqli_num_rows($serviceDetailsQuery)>0){
					while($serviceDetailsRow = mysqli_fetch_array($serviceDetailsQuery)){
							$serviceArray['service_serve_id'] = $serviceDetailsRow['ser_detail_id'];
							$serviceArray['service_ser_name'] = $serviceDetailsRow['ser_name'];
							array_push($serviceData,$serviceArray);
					}
				}else{
						$finalData['serviceDetails'] = [];
				}
			}			
	}
	
	$finalData['serviceDetails'] = $serviceData;
	
	// check worker
	$checkWorkersQuery = mysqli_query($con,"SELECT w.* from `worker` w where w.spe_id=$specilaist_id and w.cat_id=$spe_cat_id and w.subcat_id=$spe_sub_cat_id");

	if(@mysqli_num_rows($checkWorkersQuery) > 0){
		while($workerDetailsRow = @mysqli_fetch_array($checkWorkersQuery)){
				$worker_id = $workerDetailsRow['work_id'];
				$workerArray['worker_id'] = $worker_id;
				$workerArray['worker_first_name'] = $workerDetailsRow['first_name'];
				$workerArray['worker_last_name'] = $workerDetailsRow['last_name'];
				$workerArray['worker_days_of_work'] = $workerDetailsRow['day'];
				array_push($workerData,$workerArray);
		}
		$finalData['workerDetails'] = $workerData;	
	} else{
		$finalData['workerDetails'] = [];		
	}

	// appointment calendar starts here
			$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
			$data_value12 = mysqli_query($con,"SELECT * FROM service WHERE spe_id='$specilaist_id' order by serve_id desc limit 1");

			$data_ar11=mysqli_fetch_array($data_value12);

			$service_detail_id = $data_ar11['serv_title'];


			$service_time=$data_ar11['time'];
			//print_r($service_time);die;

			for($k=0;$k<3;$k++){
				$hou=9;
				$j=0;
				$sql=mysqli_query($con,"SELECT * FROM specialist WHERE spr_id='$specilaist_id'");
    			$sql1=mysqli_fetch_array($sql);
    			$str_am=$sql1['mon_from_am_time'];
				$en_am=$sql1['mon_to_am_time'];
				$str_pm=$sql1['mon_from_pm_time'];	
				$en_pm=$sql1['mon_to_pm_time'];	
				
				$weekend=$sql1['weekend'];
				for($i=0;$i<25;$i++){
					// before noon time slot starts here
					$start_time=$str_am;
					$start_time1=explode(':',$start_time);
					$end_time=$en_am;
					$end_time1=explode(':',$end_time);
					for($i=$start_time*60+$start_time1[1];$i<=$end_time*60+$end_time1[1];$i+=$service_time){
						$show_new_time= floor($i/60) . ":" . ($i/60-floor($i/60))*60; 
			  	 		$current_date=date('m/d/Y',strtotime("+$k day"));
			  	 		$time=$hou+$j.":00:00";
			  			
						 $a=mysqli_query($con,"select * from worker where spe_id='$specilaist_id'"); 

						 $sum=0;
						 $sum1=0;
						 $sum3=0;

						 while($data=mysqli_fetch_array($a)){
						 	$worker=$data['work_id']; 
				
						 	$ser=mysqli_query($con,"select * from worker_service where worker_service_id='$worker' and service_id='$service_detail_id' ");
							$worker_id_with_service=mysqli_fetch_array($ser);
						 	$worker_id1=$worker_id_with_service['worker_service_id'];
						 	$num_rows1 = mysqli_num_rows($ser);
							$sum+=$num_rows1;
							
						 	$worker_holiday=mysqli_query($con,"select * from worker_holiday where worker_id='$worker_id1' ");
						 	$data1=mysqli_fetch_array($worker_holiday);
						 	//$query1 = "";

						 	if(!empty($data1['day_leave_start']) || !empty($data1['day_leave_end'])){
					
						 		$day_leave_start=$data1['day_leave_start'];
						 		$day_leave_end=$data1['day_leave_end'];
						 		$query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
								$worker_holiday1=mysqli_query($con,"select * from worker_holiday where worker_id='$worker_id1' and  '$current_date' $query1");
								$num_rows11 = mysqli_num_rows($worker_holiday1);
						 		$sum1+=$num_rows11;                              
						 	} 
						 }


						 $abc=$sum-$sum1;
						 $current_date1=date('Y-m-d',strtotime("+$k day"));
						 $a=explode(':', $show_new_time);
						
						 if(strlen($a[0])==1 || strlen($a[1])==1){
							
							if(strlen($a[1])==1){
						 		$show_new_time=$show_new_time.'0';
							}else{
						 		$show_new_time=$show_new_time;
						 	}
			                
						 	if(strlen($a[0])==1){
						 		$show_new_time='0'.$show_new_time;
						 	}else{
						 		$show_new_time=$show_new_time;
						 	}
			                
							$showdata=$show_new_time.':00';//09:00:00
						 }
						 else{
						 	$showdata=$show_new_time.':00';             
						 }

						 $add_booking=mysqli_query($con,"select * from add_booking_new where spe_id='$specilaist_id' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1'");

						 while($data3=mysqli_fetch_array($add_booking)){
						 	if($data3['worker_id']!='0'){
								$sum3+=count($data3['worker_id']);
							}
							
						 } 
						
						 date_default_timezone_set('Europe/Paris');
			
						 $current_time=date('H:i:s');
						 $current_date_loop=date('m/d/Y',strtotime("+$k day"));
						 $current_date_show=date('m/d/Y');   

						 $loop_day=date('l',strtotime("+$k day"));
						
						 $database_day1=explode(',',$weekend);
						 $database_day=in_array($loop_day, $database_day1);


						
						 if(($abc<=$sum3) || (($current_date_show==$current_date_loop) && ($showdata<$current_time)) || ($database_day)){

							
						 	// already  occupied
						 	array_push($beforeNoonTime,array('time'=>$show_new_time,'hasAppointment'=>true));
						 	$dateLoop = $current_date_loop;
						 	$dayLoop = $loop_day;							
				 	 	}else{ 
			 			
			 				// available for booking 						
				 			array_push($beforeNoonTime,array('time'=>$show_new_time,'hasAppointment'=>false));
				 			$dateLoop = $current_date_loop;
						 	$dayLoop = $loop_day;
				 			
				 	 	}

				 		
					}

					// before noon time slot ends here

					// after noon time slot starts here
					$start_time=$str_pm;
					$start_time1=explode(':',$start_time);
					$end_time=$en_pm;
					$end_time1=explode(':',$end_time);
					for($i=$start_time*60+$start_time1[1];$i<=$end_time*60+$end_time1[1];$i+=$service_time){
						$show_new_time= floor($i/60) . ":" . ($i/60-floor($i/60))*60; 
			  	 		$current_date=date('m/d/Y',strtotime("+$k day"));
			  	 		$time=$hou+$j.":00:00";
			  			
						 $a=mysqli_query($con,"select * from worker where spe_id='$specilaist_id'"); 

						 $sum=0;
						 $sum1=0;
						 $sum3=0;

						 while($data=mysqli_fetch_array($a)){
						 	$worker=$data['work_id']; 
				
						 	$ser=mysqli_query($con,"select * from worker_service where worker_service_id='$worker' and service_id='$service_detail_id' ");
							$worker_id_with_service=mysqli_fetch_array($ser);
						 	$worker_id1=$worker_id_with_service['worker_service_id'];
						 	$num_rows1 = mysqli_num_rows($ser);
							$sum+=$num_rows1;
							
						 	$worker_holiday=mysqli_query($con,"select * from worker_holiday where worker_id='$worker_id1' ");
						 	$data1=mysqli_fetch_array($worker_holiday);
						 	//$query1 = "";

						 	if(!empty($data1['day_leave_start']) || !empty($data1['day_leave_end'])){
					
						 		$day_leave_start=$data1['day_leave_start'];
						 		$day_leave_end=$data1['day_leave_end'];
						 		$query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
								$worker_holiday1=mysqli_query($con,"select * from worker_holiday where worker_id='$worker_id1' and  '$current_date' $query1");
								$num_rows11 = mysqli_num_rows($worker_holiday1);
						 		$sum1+=$num_rows11;                              
						 	} 
						 }


						 $abc=$sum-$sum1;
						 $current_date1=date('Y-m-d',strtotime("+$k day"));
						 $a=explode(':', $show_new_time);
						
						 if(strlen($a[0])==1 || strlen($a[1])==1){
							
							if(strlen($a[1])==1){
						 		$show_new_time=$show_new_time.'0';
							}else{
						 		$show_new_time=$show_new_time;
						 	}
			                
						 	if(strlen($a[0])==1){
						 		$show_new_time='0'.$show_new_time;
						 	}else{
						 		$show_new_time=$show_new_time;
						 	}
			                
							$showdata=$show_new_time.':00';//09:00:00
						 }
						 else{
						 	$showdata=$show_new_time.':00';             
						 }

						 $add_booking=mysqli_query($con,"select * from add_booking_new where spe_id='$specilaist_id' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1'");

						 while($data3=mysqli_fetch_array($add_booking)){
						 	if($data3['worker_id']!='0'){
								$sum3+=count($data3['worker_id']);
							}
							
						 } 
						
						 date_default_timezone_set('Europe/Paris');
			
						 $current_time=date('H:i:s');
						 $current_date_loop=date('m/d/Y',strtotime("+$k day"));
						 $current_date_show=date('m/d/Y');   

						 $loop_day=date('l',strtotime("+$k day"));
						
						 $database_day1=explode(',',$weekend);
						 $database_day=in_array($loop_day, $database_day1);


						
						 if(($abc<=$sum3) || (($current_date_show==$current_date_loop) && ($showdata<$current_time)) || ($database_day)){

							
						 	// already  occupied
						 	array_push($afterNoonTime,array('time'=>$show_new_time,'hasAppointment'=>true));
						 	$dateLoop = $current_date_loop;
						 	$dayLoop = $loop_day;							
				 	 	}else{ 
			 			
			 				// available for booking 						
				 			array_push($afterNoonTime,array('time'=>$show_new_time,'hasAppointment'=>false));
				 			$dateLoop = $current_date_loop;
						 	$dayLoop = $loop_day;
				 			
				 	 	}

				 		
					}


					// after noon time slot ends here

					
				}
				
				array_push($calendarData,array('Date'=>$dateLoop,'Day'=>$dayLoop,'details'=>array("BeforeNoon"=>$beforeNoonTime,"AfterNoon"=>$afterNoonTime)));
				$beforeNoonTime = array();
				$afterNoonTime = array();
				
			}

	// appointment calendar ends here
	
	
		
	$finalData['calendarDetails'] = $calendarData;
	
	$datatext['status'] = true;
	$datatext['message'] = "Service List Fetched.";

	$datatext['details'] = $finalData;

	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'specialist_list',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'failed',
			"Actual_Data_Received" => $json,
			"Data_Responded" => $serviceArray
	);
	$logs->create_log($logParameters,'customer');

} else {
	/*$datatext['status'] = false;
	$datatext['message'] = "No Specialist List Found.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'specialist_list',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'failed',
			"Actual_Data_Received" => $json,
			"Data_Responded" => "NA"
	);
	$logs->create_log($logParameters,'customer');*/
}

echo json_encode($datatext);

?>