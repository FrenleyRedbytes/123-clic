<?php 
#delete appointment api for customer
$bookingId = $data['bookingId'];
$deleteAppointmentQuery = mysqli_query($con, "delete from add_booking_new where booking_id=$bookingId and user_id='".$data['userId']."'");

if (@mysqli_affected_rows($con) == 1){
	
	$datatext['status'] = true;
	$datatext['message'] = "Booking Deleted Successfully.";
	
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'delete_booking',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'success',
			"Actual_Data_Received" => $json,
			"Data_Responded" => $datatext
	);
	$logs->create_log($logParameters,'customer');
}else{
	// appointment deletion failed

	$datatext['status'] = false;
	$datatext['message'] = "Cannot Delete Booking.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'delete_booking',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'failed',
			"Actual_Data_Received" => $json,
			"Data_Responded" => 'NA'
	);
	$logs->create_log($logParameters,'customer');
	
}
echo json_encode($datatext);

?>