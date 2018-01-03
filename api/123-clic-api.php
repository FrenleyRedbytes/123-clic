<?php 
/*
* @author:<Frenley E>
* @Description: This page is about authenticating the request and then  giving access to respective api request pages
* @Date:2017-11-09
*/
require_once 'Mobile_Detect.php';
include('db.php');
include('logs.php');
include('common.php');
include('constants.php');

// check if request is coming from system or phone or tablet
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();

$requestType = '';
$fileLocation = '';
$userType = '';
$logParameters = array();
$responseArray = array();
header('Access-Control-Allow-Origin:*');
header('Content-type: application/json');
// get json data from request
$json = file_get_contents('php://input');
$data = json_decode($json,true);

//print_r($data);die;

$userType = '';
$userType = $data['userType'];
$command = $data['command'];
$responseArray = array();

// log class object creation
$logs = new logs();

// check request method type
if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$requestType = 'POST';
} else if($_SERVER['REQUEST_METHOD'] === 'GET'){
	$requestType = 'GET';
};

// validation file
$common = new common();
$authTokenStatus = $common->checkAuthToken($data['authToken']);

// Get remote address 
$remoteAddress = $_SERVER["REMOTE_ADDR"];

if(empty($authTokenStatus)) {
	// entry for succeded authentication in log file
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'authentication',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'success',
			"Actual_Data_Received" => $json,
			"Data_Responded" => "NA"
	);
	$logs->create_log($logParameters,$userType);

	// check the command - which function request is calling
	
	
	if($userType == "customer") {

		$fileLocation = 'customer/';
		switch($command) {
			case 'login':

					// initial log for login page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'login',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside Login Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);

					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "email" => "",
					    "password" => "",
					    "cust_device_token" => "",
					    "cust_os_type" => ""
					);

					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					//print_r($responseArray);die;
					if (empty($responseArray)) {
    					include($fileLocation.'login.php');
					} else {
						echo json_encode($responseArray);
						die;
					}					
			break;

			case 'add_customer':
					// initial log for registration - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'registration',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside Registration Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);

					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "cust_email" => "",
					    "cust_password" => "",
					    "cust_mobile" => "",
					    "cust_name" => "",					    
					    "cust_address" => "",
					    "cust_city" => "",
					    "cust_zip_code" => "",
					    "cust_device_token" => "",
					    "cust_os_type" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					
					if (empty($responseArray)) {
    					include($fileLocation.'register.php');
					} else {
						echo json_encode($responseArray);
						die;
					}	
			break;

			case 'edit_customer':
			break;

			case 'forgot_password';
					// initial log for forgot password page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'forgot_pasword',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside forgot_pasword Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "registered_email" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include($fileLocation.'forgot_password_by_email.php');
					} else {
						echo json_encode($responseArray);
						die;
					}

			break;

			case 'category_list':
				// initial log for category_list page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'category_list',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside category_list Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include('category_list.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
			break;

			case 'sub_category_list':
					// initial log for sub_category_list page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'sub_category_list',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside sub_category_list Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "category_id" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include('sub_category_list.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
					
			break;

			case 'specialist_list':
					// initial log for specialist list by category,subcategory,latitude,longitude page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'specialist_list',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside Specilist listing Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "category_id" => "",
					    "sub_category_id" => "",
					    "lat" => "",
					    "long" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include($fileLocation.'specialist_list_with_filter.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
					
			break;

			case 'get_my_reservations':
					// initial log for my reservation page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'my_reservations',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside my reservation Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "userId" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include($fileLocation.'my_reservation_list.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
					
			break;

			/*case 'add_reservations':
					// initial log for add reservation page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'add_reservation',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside add reservation Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "userId" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include($fileLocation.'add_booking.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
			break;*/

			case 'delete_appointment':
					// initial log for delete appointment page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'delete_appointment',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside Delete Appointment Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "userId" => "",
					    "bookingId" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include($fileLocation.'delete_appointment_by_id.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
			break;

			case 'get_booking_workers_services':
					// initial log for get_booking_workers_services - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'get_booking_workers_services',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside get_booking_workers_services Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);

					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "userId" => "",
					    "specialist_id" => "",
					    "specialist_cat_id" => "",
					    "specialist_subcat_id" => "",
					    "current_date" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					
					if (empty($responseArray)) {
    					include($fileLocation.'get_booking_parameters.php');
					} else {
						echo json_encode($responseArray);
						die;
					}


			break;

			case 'get_next_prev_calendar_details':
					// initial log for get_booking_workers_services - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'get_next_prev_calendar_details',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside get_next_prev_calendar_details Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);

					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "userId" => "",
					    "specialist_id" => "",
					    "specialist_cat_id" => "",
					    "specialist_subcat_id" => "",
					    "prev_date" => "",
					    "next_date" => "",
					    "worker_id" => "",
					    "service_id" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					
					if (empty($responseArray)) {
    					include($fileLocation.'get_next_prev_calendar_details.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
			break;

			case 'confirm_booking':
					// initial log for favourite list page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'confirm_booking_page',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside confirm_booking_page Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "userId" => "",
					    "specialist_id" => "",
					    "date_of_booking" => "",
					    "time_of_booking" => "",
					    "service_id" => "",
					    "worker_id" => "",
					    "booking_comment" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
						//echo $fileLocation;die;
    					include($fileLocation.'confirm_booking_page.php');
					} else {
						
						echo json_encode($responseArray);
						die;
					}
			break;



			case 'booking_list':
			break;

			case 'favourite_list':
					// initial log for favourite list page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'favourite_list',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside Favourite List Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "userId" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include($fileLocation.'fav_list.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
			break;

			case 'delete_favourite':
					// initial log for delete appointment page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'delete_favourite',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside Delete Favourite Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "favId" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include($fileLocation.'delete_favourite_by_id.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
			break;

			case 'add_personal_reservation':
					// initial log for favourite list page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'add_personal_reservation',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside add_personal_reservation Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "userId" => "",
					    "ensigne" => "",
					    "specialite" => "",
					    "hour_of_appointment" => "",
					    "date_of_appointment" =>"",
					    "telephone" => "",
					    "comment" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include($fileLocation.'add_my_personal_reservation.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
			break;
			case 'get_personal_reservation':
					// initial log for favourite list page - customer
					$logParameters = array(
							"Request_Remote_Address" => $remoteAddress,
							"Requested_Page" => 'get_personal_reservation',
							"Request_Method" => $requestType,
							"Request_Sent_From" => $deviceType,
							"Requested_Date_Time" => date('Y-m-d h:i:s'),
							"Request_Status" => 'Before Going Inside get_personal_reservation Page',
							"Actual_Data_Received" => $json,
							"Data_Responded" => "NA"
					);
					$logs->create_log($logParameters,$userType);
					$apiArray = array(
						"authToken" => "",
					    "command" => "",
					    "userType" => "",
					    "userId" => ""
					);
					$responseArray = $common->validateInput($requestType,$data,$apiArray);
					if (empty($responseArray)) {
    					include($fileLocation.'get_my_personal_reservation.php');
					} else {
						echo json_encode($responseArray);
						die;
					}
			break;





		}
	} else if($userType == 'specialist') {

		$fileLocation = 'specialist/';
		switch($command) {
			case 'login':
					include($fileLocation.'login.php');
			break;

		}

	}

} else {
	// entry for failed authentication in log file
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'authentication',
			"Request_Method" => $requestType,
			"Request_Sent_From" => $deviceType,
			"Requested_Date_Time" => date('Y-m-d h:i:s'),
			"Request_Status" => 'failed',
			"Actual_Data_Received" => $json,
			"Data_Responded" => "NA"
	);
	$logs->create_log($logParameters,$userType);

	echo json_encode($authTokenStatus);
	die;
}
?>