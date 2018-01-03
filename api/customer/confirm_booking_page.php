<?php
include('../constants.php');
$worker_id = $data['worker_id'];
$specialist_id = $data['specialist_id'];
$service_id = $data['service_id'];
$userId  = $data['userId'];
$date_booking = $data['date_of_booking'];

$serviceQuery = mysqli_query($con,"SELECT t1.*,t2.ser_name FROM service AS t1 INNER JOIN service_detail AS t2 ON t1.serv_title=t2.ser_detail_id WHERE t1.serv_title='".$data['service_id']."'");
//print_r($worker_id);
//print_r($serviceQuery);

$serviceData = mysqli_fetch_array($serviceQuery);

//print_r($serviceData);die;
$time_service = $serviceData['time'];
//print_r($time_service);die;
$name_service = $serviceData['ser_name'];	
//print_r($name_service);die;
$time_div = $time_service/15;

//print_r($time_div);die;
$start = $data['time_of_booking'];


$minutes = 15;
$commaSeperatedTime = [];

for($i=0;$i<$time_div;$i++){
//		$commaSeperatedTime[].= $start; 
	$commaSeperatedTime[].= $data['time_of_booking']; 
		//$start =  date("H:i:s", strtotime($start)+($minutes*60));
		$start =  date("H:i:s", strtotime($data['time_of_booking'])+($minutes*60));
}

$time_booking = implode(',',$commaSeperatedTime);
//print_r($start);die;

    date_default_timezone_set("Europe/Paris");

    $datetime = date('Y-m-d H:i:s');
	$start_service = $date_booking." ".$commaSeperatedTime[0];
	$end_service = date("Y-m-d H:i:s",strtotime($start_service)+($time_service*60));

    $res = mysqli_query($con,"insert into add_booking_new(
    	worker_id,
    	user_id,
    	spe_id,
    	service_id,
    	date_booking,
    	time_booking,
    	cu_date,
    	title,
    	start,
    	end,
    	status
    	)
    	values(
    	$worker_id,
    	$userId,
    	$specialist_id,
    	$service_id,
    	'".$date_booking."',
    	'".$time_booking."',
    	'".$datetime."',
    	'".$name_service."',
    	'".$start_service."',
    	'".$end_service."',
    	1
    	)"); 

/*    echo "insert into add_booking_new(
    	worker_id,
    	user_id,
    	spe_id,
    	service_id,
    	date_booking,
    	time_booking,
    	cu_date,
    	title,
    	start,
    	end,
    	status
    	)
    	values(
    	$worker_id,
    	$userId,
    	$specialist_id,
    	$service_id,
    	'".$date_booking."',
    	'".$time_booking."',
    	'".$datetime."',
    	'".$name_service."',
    	'".$start_service."',
    	'".$end_service."',
    	1
    	)";die;*/

    $last_inserted_booking_id = mysqli_insert_id($con);
    //print_r($last_inserted_booking_id);die;

    if($last_inserted_booking_id!=''){
    	$comment = $data['booking_comment'];
        if($comment == 'NA'){
                $datatext['status'] = true;
                $datatext['message'] = "Booking Success.";

                //$datatext['details'] = $finalData;

                $logParameters = array(
                        "Request_Remote_Address" => $remoteAddress,
                        "Requested_Page" => 'confirm_booking_page',
                        "Request_Method" => $requestType,
                        "Request_Sent_From" => $deviceType,
                        "Requested_Date_Time" => date('Y-m-d h:i:s'),
                        "Request_Status" => 'success',
                        "Actual_Data_Received" => $json,
                        "Data_Responded" => $datatext
                );
                $logs->create_log($logParameters,'customer');
        }else{
            $commentInsertQuery = mysqli_query($con,"INSERT INTO comment (last_id,comment,status) values('$last_inserted_booking_id','$comment','1')");
            if($commentInsertQuery){
                $datatext['status'] = true;
                $datatext['message'] = "Booking Success.";

                //$datatext['details'] = $finalData;

                $logParameters = array(
                        "Request_Remote_Address" => $remoteAddress,
                        "Requested_Page" => 'confirm_booking_page',
                        "Request_Method" => $requestType,
                        "Request_Sent_From" => $deviceType,
                        "Requested_Date_Time" => date('Y-m-d h:i:s'),
                        "Request_Status" => 'success',
                        "Actual_Data_Received" => $json,
                        "Data_Responded" => $datatext
                );
                $logs->create_log($logParameters,'customer');
            }else{
                $datatext['status'] = true;
                $datatext['message'] = "Could not insert comment,appointment added.";

                //$datatext['details'] = $finalData;

                $logParameters = array(
                        "Request_Remote_Address" => $remoteAddress,
                        "Requested_Page" => 'confirm_booking_page',
                        "Request_Method" => $requestType,
                        "Request_Sent_From" => $deviceType,
                        "Requested_Date_Time" => date('Y-m-d h:i:s'),
                        "Request_Status" => 'failed',
                        "Actual_Data_Received" => $json,
                        "Data_Responded" => $datatext
                );
                $logs->create_log($logParameters,'customer');
            }
        }
    }else{
    	$datatext['status'] = false;
		$datatext['message'] = "Booking Failed";

		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'confirm_booking_page',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'failed',
				"Actual_Data_Received" => $json,
				"Data_Responded" => "NA"
		);
		$logs->create_log($logParameters,'customer');
    }

echo json_encode($datatext);



?>