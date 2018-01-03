<?php 
include('constants.php');
#category listing api
$categoryListQuery = mysqli_query($con, "SELECT cat_id,name,logo FROM category where status = '1'");
$categoryDetails = array();
if(mysqli_num_rows($categoryListQuery) > 0){
	$datatext['status'] = true;
 	while($row = mysqli_fetch_array($categoryListQuery)){
		$category['category_id'] = $row['cat_id'];
		$category['category_name'] = $row['name'];
		$category['category_logo'] = CATEGORY_IMAGE_PATH.$row['logo'];

		if($category['category_id'] == '' || $category['category_id'] == null){
			$category['category_id'] = 'NA';
		}
		if($category['category_name'] == '' || $category['category_name'] == null){
			$category['category_name'] = 'NA';
		}
		if($category['category_logo'] == '' || $category['category_logo'] == null){
			$category['category_logo'] = 'NA';
		}

		array_push($categoryDetails,$category);
		
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'category_list',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'success',
				"Actual_Data_Received" => $json,
				"Data_Responded" => $categoryDetails
		);
		$logs->create_log($logParameters,'customer');
	}
	$datatext['message'] = "Successfully Listed";
	$datatext['details'] = $categoryDetails;
} else {
	$datatext['status'] = false;
	$datatext['message'] = "No Category List Found.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'category_list',
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