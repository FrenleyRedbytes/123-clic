<?php 
#login api for customer
$loginQuery = mysqli_query($con, "SELECT id,name,mobile,email,zip_code,address,city,device_token,os_type FROM register where email='".$data['email']."' and password = '".$data['password']."' and status_reg='1'");

if ($row = mysqli_fetch_array($loginQuery)){

	$loginDetails = array();

	$loginDetails['cust_id'] = $row['id'];
	$loginDetails['cust_name'] = $row['name'];
	$loginDetails['cust_mobile'] = $row['mobile'];
	$loginDetails['cust_email'] = $row['email'];
	$loginDetails['cust_zipcode'] = $row['zip_code'];
	$loginDetails['cust_address'] = $row['address'];
	$loginDetails['cust_city'] = $row['city'];
	$loginDetails['cust_device_token'] = $row['device_token'];
	$loginDetails['cust_os_type'] = $row['os_type'];

	//print_r($data['cust_device_token']);die;
	$updateQuery = @mysqli_query($con,"UPDATE register SET device_token='".$data['cust_device_token']."',os_type='".$data['cust_os_type']."' WHERE email='".$data['email']."' and password='".$data['password']."' and status_reg='1'");
	

	/*echo "UPDATE register SET device_token='".$data['cust_device_token']."',os_type='".$data['cust_os_type']."' WHERE email='".$data['email']."' and password='".$data['password']."' and status_reg='1'";
	die;*/

	# validation checks before sending response	
	if($loginDetails['cust_id'] == '' || $loginDetails['cust_id'] == null){
		$loginDetails['cust_id'] = 'NA';
	}
	if($loginDetails['cust_name'] == '' || $loginDetails['cust_name'] == null){
		$loginDetails['cust_name'] = 'NA';
	}
	if($loginDetails['cust_mobile'] == '' || $loginDetails['cust_mobile'] == null){
		$loginDetails['cust_mobile'] = 'NA';
	}
	if($loginDetails['cust_email'] == '' || $loginDetails['cust_email'] == null){
		$loginDetails['cust_email'] = 'NA';
	}
	if($loginDetails['cust_zipcode'] == '' || $loginDetails['cust_zipcode'] == null){
		$loginDetails['cust_zipcode'] = 'NA';
	}
	if($loginDetails['cust_address'] == '' ||  $loginDetails['cust_address'] == null){
		$loginDetails['cust_address'] = 'NA';
	}
	if($loginDetails['cust_city'] == '' || $loginDetails['cust_city'] == null){
		$loginDetails['cust_city'] = 'NA';
	}

	if($updateQuery){
			$datatext['status'] = true;
			$datatext['message'] = "Successfully login.";

			$datatext['details'] = $loginDetails;
			$logParameters = array(
					"Request_Remote_Address" => $remoteAddress,
					"Requested_Page" => 'login',
					"Request_Method" => $requestType,
					"Request_Sent_From" => $deviceType,
					"Requested_Date_Time" => date('Y-m-d h:i:s'),
					"Request_Status" => 'success',
					"Actual_Data_Received" => $json,
					"Data_Responded" => $loginDetails
			);
			$logs->create_log($logParameters,'customer');
	}else{
			$datatext['status'] = true;
			$datatext['message'] = "Successfully login,Device token not updated!";

			$datatext['details'] = $loginDetails;
			$logParameters = array(
					"Request_Remote_Address" => $remoteAddress,
					"Requested_Page" => 'login',
					"Request_Method" => $requestType,
					"Request_Sent_From" => $deviceType,
					"Requested_Date_Time" => date('Y-m-d h:i:s'),
					"Request_Status" => 'success',
					"Actual_Data_Received" => $json,
					"Data_Responded" => $loginDetails
			);
			$logs->create_log($logParameters,'customer');
	}

	
}
else{
	$datatext['status'] = false;
	$datatext['message'] = "Invalid Email Or Password.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'login',
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