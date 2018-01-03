<?php 
include('constants.php');

# favourite list api for customer
$userId = $data['userId'];
$favouriteSpecialistDetails = array();
$specialistArray = array();
//echo $userId;die;
$favListQuery = @mysqli_query($con, "SELECT f.*,s.* FROM `favorite` f inner join specialist s on f.spe_id=s.spr_id WHERE f.user_id=$userId");
/*echo "SELECT f.*,s.* FROM `favorite` f inner join specialist s on f.spe_id=s.spr_id WHERE f.user_id=$userId";
die;*/
if (@mysqli_num_rows($favListQuery) > 0){

	while($favRow = @mysqli_fetch_array($favListQuery)){
			$specialistArray['specialist_fav_id'] = $favRow['fav_id'];		
			$specialistArray['specialist_name'] = $favRow['brand_name'];
			$specialistArray['specialist_logo'] = FAVOURITE_IMAGE_PATH.$favRow['brand_logo'];
			$specialistArray['specialist_contact'] = $favRow['contact'];
			$specialistArray['specialist_address'] = $favRow['address'];
			$specialistArray['specialist_city'] = $favRow['city_name'];


			# validation checks before sending response	
			if($specialistArray['specialist_name'] == '' || $specialistArray['specialist_name'] == null){
				$specialistArray['specialist_name'] = 'NA';
			}
			if($specialistArray['specialist_logo'] == '' || $specialistArray['specialist_logo'] == null){
				$specialistArray['specialist_logo'] = 'NA';
			}
			if($specialistArray['specialist_contact'] == '' || $specialistArray['specialist_contact'] == null){
				$specialistArray['specialist_contact'] = 'NA';
			}
			if($specialistArray['specialist_address'] == '' || $specialistArray['specialist_address'] == null){
				$specialistArray['specialist_address'] = 'NA';
			}
			if($specialistArray['specialist_city'] == '' || $specialistArray['specialist_city'] == null){
				$specialistArray['specialist_city'] = 'NA';
			}
			array_push($favouriteSpecialistDetails,$specialistArray);
	}


	$datatext['status'] = true;
	$datatext['message'] = "Successfully Listed.";
	$datatext['details'] = $favouriteSpecialistDetails;
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'Favourite_List',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'success',
			"Actual_Data_Received" => $json,
			"Data_Responded" => $favouriteSpecialistDetails
	);
	$logs->create_log($logParameters,'customer');
}
else{
	$datatext['results'] = false;
	$datatext['message'] = "No Favourite List Found.";
	$datatext['details'] = [];
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'Favourite_List',
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