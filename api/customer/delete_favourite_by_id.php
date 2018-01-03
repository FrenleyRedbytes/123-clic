<?php 
#delete favourite api for customer
//$userId = $data['userId'];
$favId = $data['favId'];
//$speId = $data['speId'];

//print_r($data);die;
$deleteFavouriteQuery = mysqli_query($con, "delete from `favorite` where fav_id=$favId");

//echo "delete from `favorite` where user_id=$userId and spe_id=$speId and fav_id=$favId";die;
if (@mysqli_affected_rows($con) == 1){
	
	$datatext['status'] = true;
	$datatext['message'] = "Favourite Specialist Deleted Successfully.";
	
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'delete_favourite',
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
	$datatext['message'] = "Cannot Delete Favourite.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'delete_favourite',
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