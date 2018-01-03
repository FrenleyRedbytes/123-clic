<?php 
include('constants.php');
#sub category listing api
$subCategoryListQuery = mysqli_query($con, "SELECT subcat_id,cat_id,subcat_name,logos FROM subcategory where cat_id='".$data['category_id']."' and status = '1'");

$subCategoryDetails = array();
if(mysqli_num_rows($subCategoryListQuery) > 0){
	$datatext['status'] = true;
 	while($row = mysqli_fetch_array($subCategoryListQuery)){
		$subcategory['category_id'] = $row['cat_id'];
		$subcategory['sub_category_id'] = $row['subcat_id'];
		$subcategory['sub_category_name'] = $row['subcat_name'];
		$subcategory['sub_category_logo'] = SUB_CATEGORY_IMAGE_PATH.$row['logos'];

		if($subcategory['category_id']  == '' || $subcategory['category_id']  == null){
			$subcategory['category_id'] = 'NA';
		}
		if($subcategory['sub_category_id']  == '' || $subcategory['sub_category_id']  == null){
			$subcategory['sub_category_id'] = 'NA';
		}
		if($subcategory['sub_category_name'] == '' || $subcategory['sub_category_name'] == null){
			$subcategory['sub_category_name'] = 'NA';
		}
		if($subcategory['sub_category_logo'] == '' || $subcategory['sub_category_logo'] == null){
			$subcategory['sub_category_logo'] = 'NA';
		}

		array_push($subCategoryDetails,$subcategory);
		
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'sub_category_list',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'success',
				"Actual_Data_Received" => $json,
				"Data_Responded" => $subCategoryDetails
		);
		$logs->create_log($logParameters,'customer');
	}
	$datatext['message'] = "Successfully Listed";
	$datatext['details'] = $subCategoryDetails;
} else {
	$datatext['status'] = false;
	$datatext['message'] = "No Sub Category List Found.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'sub_category_list',
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