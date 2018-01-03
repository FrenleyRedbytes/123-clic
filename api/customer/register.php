<?php 
#register api for customer
$availabilityQuery = mysqli_query($con, "SELECT id,name FROM register where email='".$data['cust_email']."' and password = '".$data['cust_password']."' and status_reg='1'");
/*
echo "SELECT id,name FROM register where email='".$data['cust_email']."' and password = '".$data['cust_password']."' and status_reg='1'";die;*/

//print_r($data['cust_email']);die;

if (@mysqli_num_rows($availabilityQuery) > 0){
	// user already exist
	$row = @mysqli_fetch_array($availabilityQuery);
	$userDetails = array();

	$userDetails['cust_id'] = $row['id'];
	$userDetails['cust_name'] = $row['name'];

	if($userDetails['cust_id'] == '' || $userDetails['cust_id'] == null){
		$userDetails['cust_id'] = 'NA';
	}
	if($userDetails['cust_name'] == '' || $userDetails['cust_name'] == null){
		$userDetails['cust_name'] = 'NA';
	}

	$datatext['status'] = false;
	$datatext['message'] = "User Already Registered.";


	//$datatext['details'] = $userDetails;
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'registration',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'success',
			"Actual_Data_Received" => $json,
			"Data_Responded" => $userDetails
	);
	$logs->create_log($logParameters,'customer');
}
else{
	// new user registration
	$name = $data['cust_name'];
	$password = $data['cust_password'];
	$mobile = $data['cust_mobile'];
	$email = $data['cust_email'];
	$zip_code = $data['cust_zip_code'];
	$address = $data['cust_address'];
	$city = $data['cust_city'];
	$device_token = $data['cust_device_token'];
	$os_type = $data['cust_os_type'];
	$cu_date = date('Y-m-d h:i:s');


	$registrationQuery = mysqli_query($con, "INSERT INTO `register`(`name`,`password`,`new_pass`,`mobile`,`email`,`zip_code`,`address`,`city`,`cu_date`,`device_token`,`os_type`) VALUES ('$name','$password','0','$mobile','$email','$zip_code','$address','$city','$cu_date','$device_token','$os_type')");

/*echo "INSERT INTO `register`(`name`,`password`,`new_pass`,`mobile`,`email`,`zip_code`,`address`,`city`,`cu_date`,`device_token`,`os_type`) VALUES ('$name','$password','0','$mobile','$email','$zip_code','$address','$city','$cu_date','$device_token','$os_type')";
die;*/
	$getInsertedId = mysqli_insert_id($con);
	if(empty($getInsertedId)){
		$datatext['status'] = false;
		$datatext['message'] = "User Registration Failed.";
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'registration',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'success',
				"Actual_Data_Received" => $json,
				"Data_Responded" => $datatext
		);
	} else{
		$datatext['status'] = true;
		$datatext['message'] = "User Registration Success.";

		$loginQuery = mysqli_query($con, "SELECT id,name,mobile,email,zip_code,address,city FROM register where id=$getInsertedId and status_reg='1'");

		$loginDetails = array();
		if ($row = mysqli_fetch_array($loginQuery)){
				$loginDetails['cust_id'] = $row['id'];
				$loginDetails['cust_name'] = $row['name'];
				$loginDetails['cust_mobile'] = $row['mobile'];
				$loginDetails['cust_email'] = $row['email'];
				$loginDetails['cust_zipcode'] = $row['zip_code'];
				$loginDetails['cust_address'] = $row['address'];
				$loginDetails['cust_city'] = $row['city'];

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

		}
		

		$datatext['details'] = $loginDetails;
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'registration',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'success',
				"Actual_Data_Received" => $json,
				"Data_Responded" => $datatext
		);
	}
	$logs->create_log($logParameters,'customer');
	
}
echo json_encode($datatext);

?>