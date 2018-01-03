<?php 
#add personal reservation api for customer

	// new reseravation addition
	$userId = $data['userId'];
	//$date_of_appointment = date('Y-m-d h:i:s');
	//echo $userId;die;
	$reservationQuery = mysqli_query($con, "SELECT pa.ensigne,pa.specialite,pa.date_of_appointment,pa.hour_of_appointment,pa.telephone,pa.comment from `personal_appointment` pa where pa.user_id='$userId'");

/*echo "SELECT pa.ensigne,pa.specialite,pa.date_of_appointment,pa.hour_of_appointment,pa.telephone,pa.comment from `personal_appointment` where pa.user_id='$userId'";die;*/

	if(mysqli_num_rows($reservationQuery) >0){
		$datatext['status'] = true;
		$datatext['message'] = "Personal Reservation Listed Successfully.";
		$reservationDetails = array();

		while($row=mysqli_fetch_array($reservationQuery)){
				$reservationInsideDetails['personal_ensigne'] = $row['ensigne'];
				$reservationInsideDetails['personal_specialite'] = $row['specialite'];
				$reservationInsideDetails['personal_date_of_appointment'] = $row['date_of_appointment'];
				$reservationInsideDetails['personal_hour_of_appointment'] = $row['hour_of_appointment'];
				$reservationInsideDetails['personal_telephone'] = $row['telephone'];
				$reservationInsideDetails['personal_comment'] = $row['comment'];
				array_push($reservationDetails,$reservationInsideDetails);
		}
		


		$datatext['details'] = $reservationDetails;
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'add_personal_reservation',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'success',
				"Actual_Data_Received" => $json,
				"Data_Responded" => $reservationDetails
		);
	} else{
		$datatext['status'] = false;
		$datatext['message'] = "No Personal Reservations Found.";
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'get_personal_reservation',
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