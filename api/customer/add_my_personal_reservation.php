<?php 
#add personal reservation api for customer

	// new reseravation addition
	$userId = $data['userId'];
	$ensigne = $data['ensigne'];
	$specialite = $data['specialite'];
	$hour_of_appointment = $data['hour_of_appointment'];
	$date_of_appointment = $data['date_of_appointment'];
	$telephone = $data['telephone'];
	$comment = $data['comment'];
	//$date_of_appointment = date('Y-m-d h:i:s');

	$reservationQuery = mysqli_query($con, "INSERT INTO `personal_appointment`(`user_id`,`ensigne`,`specialite`,`date_of_appointment`,`hour_of_appointment`,`telephone`,`comment`) VALUES ('$userId','$ensigne','$specialite','$date_of_appointment','$hour_of_appointment','$telephone','$comment')");


	$getInsertedId = mysqli_insert_id($con);
	if(empty($getInsertedId)){
		$datatext['status'] = false;
		$datatext['message'] = "Reservation Addition Failed.";
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'add_personal_reservation',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'success',
				"Actual_Data_Received" => $json,
				"Data_Responded" => "NA"
		);
	} else{
		$datatext['status'] = true;
		$datatext['message'] = "Reservation Added Successfully.";
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'add_personal_reservation',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'success',
				"Actual_Data_Received" => $json,
				"Data_Responded" => $datatext
		);
	}
	$logs->create_log($logParameters,'customer');
	echo json_encode($datatext);
?>