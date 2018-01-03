<?php 
include('../constants.php');
#send booking parameters api
$specilaist_id = $data['specialist_id'];
$cat_id = $data['specialist_cat_id'];
$sub_cat_id = $data['specialist_subcat_id'];

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


if(empty($sub_cat_id)){
	$sub_cat_id = 0;
}else{
	$sub_cat_id = $data['specialist_subcat_id'];
}


$specialistQuery = mysqli_query($con,"SELECT sp.* from `specialist` sp where sp.spr_id=$specilaist_id and sp.cat_id=$cat_id and sp.subcat_id=$sub_cat_id");

$checkWorkerServiceFlag = '';
$checkWorkerHolidayFlag = '';
$checkWorkerAppointmentFlag = '';
$workerArray = array();

$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");

if(@mysqli_num_rows($specialistQuery) > 0){

	$speRow = @mysqli_fetch_array($specialistQuery);
	
	$spe_cat_id = $speRow['cat_id'];
	$spe_sub_cat_id = $speRow['subcat_id'];
	
	// get service detail id by specialist id
	$serviceQuery = mysqli_query($con,"SELECT ser.* from `service` ser where ser.spe_id=$specilaist_id group by ser.serv_title");


	if(@mysqli_num_rows($serviceQuery)>0){

			while($serviceRow = @mysqli_fetch_array($serviceQuery)){
				$ser_detail_id = $serviceRow['serv_title'];
				$serviceArray ['service_price'] =  $serviceRow['price'];
				// get service details
				$serviceDetailsQuery = @mysqli_query($con, "SELECT sd.* FROM `service_detail` sd where sd.ser_detail_id='$ser_detail_id'");

				if(@mysqli_num_rows($serviceDetailsQuery)>0){
					while($serviceDetailsRow = mysqli_fetch_array($serviceDetailsQuery)){
							$serviceArray['service_serve_id'] = $serviceDetailsRow['ser_detail_id'];
							$serviceArray['service_name'] = $serviceDetailsRow['ser_name'];
							array_push($serviceData,$serviceArray);
					}
				}else{
						$finalData['serviceDetails'] = [];
				}
			}			
	}
	
	$finalData['serviceDetails'] = $serviceData;
	
	/*// check worker availability starts here
	$checkWorkersQuery = mysqli_query($con,"SELECT w.* from `worker` w where w.spe_id=$specilaist_id and w.cat_id=$spe_cat_id and w.subcat_id=$spe_sub_cat_id");


	$current_day = date('D');
	$current_day_plus_one = date('D','+1 day');
	$current_day_plus_two = date('D','+2 day');
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

		// worker details fetching starts here

		// worker details fetching ends here

	} else{
		$finalData['workerDetails'] = [];		
	}
	


	// check worker availability ends here

	
	$finalData['workerDetails'] = $workerData;*/

	
		
	
	
	$datatext['status'] = true;
	$datatext['message'] = "Available Service And Workers Fetched.";

	$datatext['details'] = $finalData;

	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'get_service_worker_list',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'success',
			"Actual_Data_Received" => $json,
			"Data_Responded" => $serviceArray
	);
	$logs->create_log($logParameters,'customer');

} else {
	$datatext['status'] = false;
	$datatext['message'] = "Not available.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'get_service_worker_list',
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