<?php
include ('db.php');
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
$method = mysqli_real_escape_string($con, $_REQUEST['method']);

// ***********Login User**************
if ($method == "1"){
		$email = mysqli_real_escape_string($con, $_REQUEST['email']);
		$password = mysqli_real_escape_string($con, $_REQUEST['password']);
		$datatext = array();
		$datatext['results'] = false;
		$chk = mysqli_query($con, "SELECT * FROM specialist WHERE `email`='$email' and password='$password'");
		if ($row = mysqli_fetch_array($chk)){
			$datatext['results'] = true;
			$datatext['spe_id'] = $row['spr_id'];
			$datatext['name'] = $row['brand_name'];
			$datatext['msg'] = "Successfully login.";
		}
		else{
			$datatext['results'] = false;
			$datatext['msg'] = "Invalid Email Or Password.";
		}
		echo json_encode($datatext);
}

// ***************Change Password************/
if ($method == "2"){
	$spe_id = mysqli_real_escape_string($con, $_REQUEST['spe_id']);
	$password = mysqli_real_escape_string($con, $_REQUEST['password']);
	$old_password = mysqli_real_escape_string($con, $_REQUEST['old_password']);
	$datatext = array();
	$datatext['results'] = false;
	$res = mysqli_query($con, "SELECT * FROM specialist WHERE `spr_id`='$spe_id' and `password`='$old_password'");
	if ($chk = mysqli_fetch_array($res)){
		$user_info = mysqli_query($con, "update specialist set `password`='$password' where `spr_id`='$spe_id'");
		$datatext['results'] = true;
		$datatext['msg'] = "Password Changed Successfully.";
	}
	else{
		$datatext['results'] = false;
		$datatext['msg'] = "Old password not valid.";
	}
	echo json_encode($datatext);
}

// ******Profile info show******
if ($method == "3"){
	$spe_id = mysqli_real_escape_string($con, $_REQUEST['spe_id']);
	$path=$serverURL1;
	$datatext = array();
	$datatext['results'] = false;
	$chk = mysqli_query($con, "SELECT * FROM specialist where spr_id='$spe_id'");
	while ($c = mysqli_fetch_array($chk)){
		$datatext['results'] = true;
		$arr[] = array(
			"spe_id" => $c['spr_id'],
			"name" => $c['brand_name'],
			"image" =>$path.$c['brand_logo'],
			"email" => $c['email'],
			"mobile" => $c['contact'],
			"disc" => $c['disc'],
			"lat" => $c['lat'],
			"long" => $c['longt'],
			"city_name" => $c['city_name'],
			"zipcode" => $c['zip_code']
		);
	}
	$datatext['data'] = $arr;
	echo json_encode($datatext);
}

// ****forgot password*****
// if ($method == "4"){
// 	$email = mysqli_real_escape_string($con, $_REQUEST['email']);
// 	$path = 'http://etango.fr/directory';
// 	$datatext = array();
// 	$datatext['results'] = false;
// 	$chk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM specialist WHERE `email`='$email'"));
// 	if ($chk > 0){
// 		$datatext['results'] = true;
// 		$pass_change = mt_rand(100000, 999999);
// 		$token = base64_encode($pass_change);
// 		$user_info = "update specialist set new_token='$token' where email='$email'";
// 		if ($user_info){
// 			$to = $email;
// 			$subject = 'Password Reset';
// 			$headers = "From: " . strip_tags('noreply@123click.com') . "\r\n";
// 			$headers.= "MIME-Version: 1.0\r\n";
// 			$headers.= "Content-Type: text/html; charset=UTF-8\r\n";
// 			$message.= '<h4>123click</h4>
// 							<p>Click on the link below to reset your password</p>
//             				' . $path . '?email=' . $email . '&token=' . $token;
// 			mail($to, $subject, $message, $headers);
// 			$datatext['msg'] = "Password sent Successfully.";
// 		}
// 		else{
// 			$datatext['msg'] = "Something Went wrong.";
// 		}
// 	}
// 	else{
// 		$datatext['results'] = false;
// 		$datatext['msg'] = "Invalid email.";
// 	}
// 	echo json_encode($datatext);
// }

//add booking list acording to specilist 
if ($method == "5"){
		$spe_id = mysqli_real_escape_string($con, $_REQUEST['spe_id']);
		$datatext = array();
		$datatext['results'] = false;
		$chk = mysqli_query($con, "SELECT * FROM add_booking_new WHERE spe_id='$spe_id' and status='0'");
		$co=mysqli_num_rows($chk);
		if($co>0){
		while($row = mysqli_fetch_array($chk)){
			$user_id=$row['user_id'];
			$user_detail = mysqli_query($con, "SELECT * FROM register WHERE id='$user_id'");
			$user_detail_row = mysqli_fetch_array($user_detail);
			$service_id=$row['service_id'];
			$service_detail = mysqli_query($con, "SELECT * FROM service_detail WHERE ser_detail_id='$service_id'");
			$service_detail_row = mysqli_fetch_array($service_detail);
			$datatext['results'] = true;
			$arr[] = array(
			"User_id" => $user_detail_row['id'],
			"User_name" => $user_detail_row['name'],
			"mobile" => $user_detail_row['mobile'],
			"service_name" => $service_detail_row['ser_name'],
			"date_booking" => $row['date_booking'],
			"time_booking" => $row['time_booking']
			);
		}}else{
			$datatext['msg']='No record';
		}
		$datatext['data']=$arr;
		echo json_encode($datatext);
}
// ***************confirm add booking new************/
if ($method == "6"){
	$booking_id = mysqli_real_escape_string($con, $_REQUEST['booking_id']);
	$datatext = array();
	$datatext['results'] = false;
	$res = mysqli_query($con, "update add_booking_new set `status`='1' where `booking_id`='$booking_id'");
	if ($res){
		$user_detail = mysqli_query($con, "SELECT * FROM add_booking_new WHERE booking_id='$booking_id'");
		$user_detail_row = mysqli_fetch_array($user_detail);
		$user_id=$user_detail_row['user_id'];
		$user_detail = mysqli_query($con, "SELECT * FROM register WHERE id='$user_id'");
		$user_detail_row = mysqli_fetch_array($user_detail);
		$email=$user_detail_row['email'];
		$email_to=$email;
		$mail   = base64_encode($email_to);
		$email_message = "Email: Your Booking has been Confirm.";
		$email_subject="Booking Confimred";
		@mail($email_to, $email_subject, $email_message); 
		$datatext['results'] = true;
		$datatext['msg'] = "Booking Is Confirmed.";
	}
	else{
		$datatext['results'] = false;
		$datatext['msg'] = "Booking Is Not Confirmed.";
	}
	echo json_encode($datatext);
}
// ***************rejected add boking ************/
if ($method == "7"){
	$booking_id = mysqli_real_escape_string($con, $_REQUEST['booking_id']);
	$datatext = array();
	$datatext['results'] = false;
	$res = mysqli_query($con, "SELECT * FROM add_booking_new WHERE booking_id='$booking_id'");
	if ($user_detail_row=mysqli_fetch_array($res)){
		$user_id=$user_detail_row['user_id'];
		$user_detail = mysqli_query($con, "SELECT * FROM register WHERE id='$user_id'");
		$user_detail_row = mysqli_fetch_array($user_detail);
		$email=$user_detail_row['email'];
		$email_to=$email;
		$mail   = base64_encode($email_to);
		$email_message = "Email: Your Booking has been cancled because of some reason.<br>Thank you for Booking.";
		$email_subject="Booking Canceled";
		@mail($email_to, $email_subject, $email_message); 

		$delete_id = mysqli_query($con, "delete from add_booking_new where `booking_id`='$booking_id'");
		$datatext['results'] = true;
		$datatext['msg'] = "Booking Is Canceled.";
	}
	else{
		$datatext['results'] = false;
		$datatext['msg'] = "Booking Is Not Canceled.";
	}
	echo json_encode($datatext);
}

//add booking list acording to specilist  in full calender
if ($method == "8"){
		$spe_id = mysqli_real_escape_string($con, $_REQUEST['spe_id']);
		$datatext = array();
		$datatext['results'] = false;
		$chk = mysqli_query($con, "SELECT * FROM add_booking_new WHERE spe_id='$spe_id' and status='1'");
		$count_row=mysqli_num_rows($chk);
		if($count_row>0){
		while($row = mysqli_fetch_array($chk)){
			$service_id=$row['service_id'];
			$service_detail = mysqli_query($con, "SELECT * FROM service_detail WHERE ser_detail_id='$service_id'");
			$service_detail_row = mysqli_fetch_array($service_detail);
			$date_time=$row['date_booking'].' '.$row['time_booking'];
    		$date_time=date(DATE_ISO8601, strtotime($date_time));
			$datatext['results'] = true;
			$arr[] = array(
			"id" => $row['booking_id'],
			"title" => $service_detail_row['ser_name'],
			"start"=>$date_time
			);
		}
	}else{
			date_default_timezone_set('Asia/Calcutta');
            $datee=date('Y-m-d');
            $date_time1=date(DATE_ISO8601, strtotime($datee));
			$datatext['msg'] = "No record found.";
			$arr[] = array(
			"id" =>'',
			"title" =>'No Record',
			"start"=>$date_time1
			);
	}
		$datatext['data']=$arr;
		echo json_encode($datatext);
}
// ***************booking lsit ************/
if ($method == "9"){
		$spe_id = mysqli_real_escape_string($con, $_REQUEST['spe_id']);
		$datatext = array();
		$datatext['results'] = false;
		$chk = mysqli_query($con, "SELECT * FROM add_booking_new WHERE spe_id='$spe_id' and status='1'");
		$count_row=mysqli_num_rows($chk);
		if($count_row>0){
			while($row = mysqli_fetch_array($chk)){
				$user_id=$row['user_id'];
				$user_detail = mysqli_query($con, "SELECT * FROM register WHERE id='$user_id'");
				$user_detail_row = mysqli_fetch_array($user_detail);
				$service_id=$row['service_id'];
				$service_detail = mysqli_query($con, "SELECT * FROM service_detail WHERE ser_detail_id='$service_id'");
				$service_detail_row = mysqli_fetch_array($service_detail);
				$datatext['results'] = true;
				$arr[] = array(
				"User_id" => $user_detail_row['id'],
				"User_name" => $user_detail_row['name'],
				"mobile" => $user_detail_row['mobile'],
				"service_name" => $service_detail_row['ser_name'],
				"date_booking" => $row['date_booking'],
				"time_booking" => $row['time_booking']
				);
			}
		}else{
		$datatext['msg']="No record";
		}
		$datatext['data']=$arr;
		echo json_encode($datatext);
}
// add booking
if ($method == "10")
	{
	$spe_id = mysqli_real_escape_string($con, $_REQUEST['spe_id']);
	$service_id = mysqli_real_escape_string($con, $_REQUEST['service_id']);
	$date_booking = mysqli_real_escape_string($con, $_REQUEST['date_booking']);
	$time_booking = mysqli_real_escape_string($con, $_REQUEST['time_booking']);
	date_default_timezone_set("Asia/Calcutta");
	$datetime = date('Y-m-d H:i:s');
	$datatext = array();
	$datatext['results'] = false;
	$chk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_booking_new WHERE spe_id='$spe_id' and service_id='$service_id' and date_booking='$date_booking'and time_booking='$time_booking' "));
	if (!$chk){
			$res = mysqli_query($con, "insert into add_booking_new(user_id,spe_id,service_id,date_booking,time_booking,cu_date)values('$user_id','$spe_id','$service_id','$date_booking','$time_booking','$datetime')");
			if (!$res){
				$datatext['results'] = false;
				$datatext['msg'] = "Booking not successfully.";
			}
			else{
				$datatext['results'] = true;
				$datatext['msg'] = "Booking successfully.";
			}
		}
	  	else{
			$datatext['msg'] = "You have already booked this service.";
		}
	echo json_encode($datatext);
}

// add booking confirm
if ($method == "11"){
	$last_id = mysqli_real_escape_string($con, $_REQUEST['last_id']);
	$comment = mysqli_real_escape_string($con, $_REQUEST['comment']);
	$worker_id = mysqli_real_escape_string($con, $_REQUEST['worker_id']);
	$name = mysqli_real_escape_string($con, $_REQUEST['name']);
	$mobile = mysqli_real_escape_string($con, $_REQUEST['mobile']);
	$email = mysqli_real_escape_string($con, $_REQUEST['email']);
	$datatext = array();
	$datatext['results'] = false;
		$check_user=mysqli_query($con,"select * from register where email='$email'");
		if($check_user_array=mysqli_fetch_array($check_user)){
				$user_id=$check_user_array['id'];
				$res = mysqli_query($con, "insert into comment(last_id,comment)values('$last_id','$comment')");
				$res1=mysqli_query($con,"UPDATE `add_booking_new` SET `worker_id` = '$worker_id', `user_id` = '$user_id', `status` = '1' WHERE `booking_id` = '$last_id';");
			if (!$res1){
				$datatext['results'] = false;
				$datatext['msg'] = "Booking not confirm.";
			}else{
				$email_to=$email;
				$mail   = base64_encode($email_to);
				$email_message = "Email: Your Booking has been Confirm.";
				$email_subject="Booking Confirm";
				@mail($email_to, $email_subject, $email_message); 
				$datatext['results'] = true;
				$datatext['msg'] = "Booking Confirm.";
			}
		}else{
			$register_new = mysqli_query($con, "insert into register(name,mobile,email)values('$name','$mobile','$email')");
			 $user_id11 = mysqli_insert_id($con);
			$res = mysqli_query($con, "insert into comment(last_id,comment)values('$last_id','$comment')");
			$res1=mysqli_query($con,"UPDATE `add_booking_new` SET `worker_id` = '$worker_id', `user_id` = '$user_id11', `status` = '1' WHERE `booking_id` = '$last_id';");
			if (!$res){
				$datatext['results'] = false;
				$datatext['msg'] = "Booking not confirm.";
			}else{
				$user_detail = mysqli_query($con, "SELECT * FROM register WHERE id='$user_id11'");
				$user_detail_row = mysqli_fetch_array($user_detail);
				$email_to=$user_detail_row['email'];
				$mail   = base64_encode($email_to);
				$email_message = "Email: Your Booking has been confirm.<br>Thank you for Booking.";
				$email_subject="Booking confirm";
				@mail($email_to, $email_subject, $email_message); 
				$datatext['results'] = true;
				$datatext['msg'] = "Booking confirm.";
			}
		}		
	echo json_encode($datatext);
}
// add booking Canceled	
if ($method == "12"){
	$last_id = mysqli_real_escape_string($con, $_REQUEST['last_id']);
	$datatext = array();
	$datatext['results'] = false;
		$res1=mysqli_query($con,"DELETE FROM `add_booking_new` WHERE last_id='$last_id'");
		if (!$res){
				$datatext['results'] = false;
				$datatext['msg'] = "Booking not Cancel.";
			}else{
				$datatext['results'] = true;
				$datatext['msg'] = "Booking Canceled.";
			}		
	echo json_encode($datatext);
}

