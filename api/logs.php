<?php 
class logs {

function create_log($message,$userType)  
{               
	extract($message);
	$LOG_PATH = '';
	$stCurLogFileName = '';  
	$content = PHP_EOL.'------------------------------------------------------------------------------------------------------------------------------'.PHP_EOL;  
	$content.= PHP_EOL.'Requested Remote Address:'.$Request_Remote_Address.PHP_EOL;
	$content.= PHP_EOL.'Requested Requested_Page:'.$Requested_Page.PHP_EOL;
	$content.= PHP_EOL.'Requested Method:'.$Request_Method.PHP_EOL;
	$content.= PHP_EOL.'Request Sent From:'.$Request_Sent_From.PHP_EOL;
	$content.= PHP_EOL.'Requested Date And Time:'.$Requested_Date_Time.PHP_EOL;
	$content.= PHP_EOL.'Request Status:'.$Request_Status.PHP_EOL;
	$content.= PHP_EOL.'User Type:'.$userType.PHP_EOL;
	$content.= PHP_EOL.'Actual Data Received:'.$Actual_Data_Received.PHP_EOL;
	if($Data_Responded == '' || $Data_Responded == 'NA'){
		// do not add  $Data_Responded parameter
	} else {
		$content.= PHP_EOL.'Data Responded:'.json_encode($Data_Responded).PHP_EOL;
	}
	
	$content.= PHP_EOL.'------------------------------------------------------------------------------------------------------------------------------'.PHP_EOL;
	if($userType == 'customer') {
		$LOG_PATH = 'logs/customer/';
		$stCurLogFileName ='customer_log_'.date('Y-m-d').'.txt';  
	} else if($userType == 'specialist') {
		$LOG_PATH = 'logs/specialist/';
		$stCurLogFileName ='specialist_log_'.date('Y-m-d').'.txt';  
	}

	//open the file append mode,dats the log file will create day wise  
	$fHandler = fopen($LOG_PATH.$stCurLogFileName,'a+');  
	//write the info into the file  
	fwrite($fHandler,$content);  
	//close handler  
	fclose($fHandler);  
}


}
 
?>