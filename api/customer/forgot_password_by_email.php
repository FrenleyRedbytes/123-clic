<?php 
include('phpmailer/JPhpMailer.php');
include('phpmailer/mail_class.php');

#forgot password api
$emailId = $data['registered_email'];
//print_r($data);die;
$checkEmailQuery = mysqli_query($con,"SELECT  u.id,u.password,u.name FROM `register` u where u.email='".$emailId."' and u.status_reg='1' order by u.id desc limit 1");

/*echo "SELECT  u.id,u.password FROM `register` u where u.email='".$emailId."' and u.status_reg='1' order by u.id desc limit 1";die;*/

// $emailId = 'chetan.redbytes@gmail.com';

$userDetails = array();
if(mysqli_num_rows($checkEmailQuery) > 0){

	$user = mysqli_fetch_array($checkEmailQuery);
	// print_r($user);die;
	$password = $user['password']; 
	$userName = $user['name']; 
	$mail = new JPhpMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Host = 'smtp.googlemail.com:465';
	$mail->SMTPSecure = "ssl";
	$mail->Username = 'hrd2011frenley@gmail.com';
	$mail->Password = 'frenleybidya@89';
	$mail->FromName = "123-clic";
	$from_mail = 'frenleyredbytes@gmail.com';
	$mail->SetFrom($from_mail, "123-clic.fr");
	$subject = "Password Details:";
	$mail->Subject = $subject;
	$mail->IsHTML(true);
	$template = "<p><table><tr><td>Dear User,</td></tr><tr><td>Please find your password details:</td></tr><tr><td><b>User:</b>".$userName."</td></tr><tr><td><b>Password:</b>".$password."</td></tr></table></p>";
	$mail->Body = $template;
	$to_email = "ankush@redbytes.in";
	$mail->AddAddress($to_email);
	


	if($mail->Send()) {
	    $datatext['status'] = true;
		$datatext['message'] = "Password Sent To Registered Email.";
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'forgot_password',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'success',
				"Actual_Data_Received" => $json,
				"Data_Responded" => $mail->ErrorInfo
		);
		$logs->create_log($logParameters,'customer');
	} else {
	    $datatext['status'] = false;
		$datatext['message'] = "Password Sending Failed.";
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'forgot_password',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'failed',
				"Actual_Data_Received" => $json,
				"Data_Responded" => "NA"
		);
		$logs->create_log($logParameters,'customer');
	}



	/*$datatext['status'] = true;
	$datatext['message'] = "Password Sent To Registered Email Id.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'forgot_password',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'success',
			"Actual_Data_Received" => $data,
			"Data_Responded" => "NA"
	);
	$logs->create_log($logParameters,'customer');*/
	
} else {
	$datatext['status'] = false;
	$datatext['message'] = "User Not Found.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'forgot_password',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'failed',
			"Actual_Data_Received" => $datatext,
			"Data_Responded" => "NA"
	);
	$logs->create_log($logParameters,'customer');
}

echo json_encode($datatext);

?>