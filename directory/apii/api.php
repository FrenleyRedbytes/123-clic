<?php
include ('db.php');
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
$serverURL1 = "http://etango.fr/directory_admin/uploads/";
$method = mysqli_real_escape_string($con, $_REQUEST['method']);

// *********Register User**********
if ($method == "1")
	{
	$name = mysqli_real_escape_string($con, $_REQUEST['name']);
	$email = mysqli_real_escape_string($con, $_REQUEST['email']);
	$password = mysqli_real_escape_string($con, $_REQUEST['password']);
	$mobile = mysqli_real_escape_string($con, $_REQUEST['mobile']);
	date_default_timezone_set("Asia/Calcutta");
	$datetime = date('Y-m-d H:i:s');	
	$datatext = array();
	$datatext['results'] = false;
	$chk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM register WHERE `email`='$email'"));
	if (!$chk){
			$res = mysqli_query($con, "insert into register(name,email,password,mobile,cu_date)values('$name','$email','$password','$mobile','$datetime')");
			if (!$res){
				$datatext['results'] = false;
				$datatext['msg'] = "Not Successfully Registerd.";
			}
			else{
				$id = mysqli_insert_id($con);
				$datatext['User_id'] = $id;
				$datatext['name'] = $name;
				$datatext['results'] = true;
				$datatext['msg'] = "Registerd Successfully.";
			}
		}
	  	else{
			$datatext['msg'] = "Email Already Registered.";
		}
	echo json_encode($datatext);
}

// ***********Login User**************
if ($method == "2"){
		$email = mysqli_real_escape_string($con, $_REQUEST['email']);
		$password = mysqli_real_escape_string($con, $_REQUEST['password']);
		$datatext = array();
		$datatext['results'] = false;
		$chk = mysqli_query($con, "SELECT * FROM register WHERE `email`='$email' and password='$password'");
		if ($row = mysqli_fetch_array($chk)){
			$datatext['results'] = true;
			$datatext['User_id'] = $row['id'];
			$datatext['name'] = $row['name'];
			$datatext['msg'] = "Successfully login.";
		}
		else{
			$datatext['results'] = false;
			$datatext['msg'] = "Invalid Email Or Password.";
		}
		echo json_encode($datatext);
}

// ***************Change Password************/
if ($method == "3"){
	$uid = mysqli_real_escape_string($con, $_REQUEST['uid']);
	$password = mysqli_real_escape_string($con, $_REQUEST['password']);
	$old_password = mysqli_real_escape_string($con, $_REQUEST['old_password']);
	$datatext = array();
	$datatext['results'] = false;
	$res = mysqli_query($con, "SELECT * FROM register WHERE `id`='$uid' and `password`='$old_password'");
	if ($chk = mysqli_fetch_array($res)){
		$user_info = mysqli_query($con, "update register set `password`='$password' where `id`='$uid'");
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
if ($method == "4"){
	$uid = mysqli_real_escape_string($con, $_REQUEST['uid']);
	$datatext = array();
	$datatext['results'] = false;
	$chk = mysqli_query($con, "SELECT * FROM register where id='$uid'");
	while ($c = mysqli_fetch_array($chk)){
		$datatext['results'] = true;
		$arr[] = array(
			"User_id" => $c['id'],
			"name" => $c['name'],
			"email" => $c['email'],
			"mobile" => $c['mobile']
		);
	}
	$datatext['data'] = $arr;
	echo json_encode($datatext);
}

// ******Edit User Info********/
if ($method == "5"){
	$uid = mysqli_real_escape_string($con, $_REQUEST['uid']);
	$name = mysqli_real_escape_string($con, $_REQUEST['name']);
	$mobile = mysqli_real_escape_string($con, $_REQUEST['mobile']);
	$datatext = array();
	$datatext['results'] = false;
	$user_info = mysqli_query($con, "update register set name='$name',mobile='$mobile' where id='$uid'");
	if ($user_info){
		$datatext['results'] = true;
		$datatext['msg'] = "Changed Successfully.";
	}
	else{
		$datatext['results'] = False;
		$datatext['msg'] = "Changed Not Successfully.";
	}
	echo json_encode($datatext);
}

// ****forgot password*****
if ($method == "6"){
	$email = mysqli_real_escape_string($con, $_REQUEST['email']);
	$path = 'http://ec2-52-70-234-40.compute-1.amazonaws.com/directory';
 		$datatext = array();
	$datatext['results'] = false;
	$chk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE `email`='$email'"));
	if ($chk > 0){
		$datatext['results'] = true;
		$email = $chk['email'];
		$pass_change = mt_rand(100000, 999999);
		$token = base64_encode($pass_change);
		$user_info = mysqli_query($con, "update user set `new_pass`='$pass_change'  where `email`='$email'");
		if ($user_info){
			$to = $email;
			$subject = 'Password Reset';
			$headers = "From: " . strip_tags('noreply@silk_ticket.com') . "\r\n";
			$headers.= "MIME-Version: 1.0\r\n";
			$headers.= "Content-Type: text/html; charset=UTF-8\r\n";
			$message.= '<h4>Silk Ticket</h4>
							<p>Click on the link below to reset your password</p>
            				' . $path . '?email=' . $email . '&token=' . $token;
			mail($to, $subject, $message, $headers);
			$datatext['msg'] = "Password sent Successfully.";
		}
		else{
			$datatext['msg'] = "Something Went wrong.";
		}
	}
	else{
		$datatext['results'] = false;
		$datatext['msg'] = "Invalid email.";
	}
	echo json_encode($datatext);
}

// ****category Show****
if ($method == "7"){
	$datatext = array();
	$path=$serverURL1;
	$datatext['results'] = false;
	$chk = mysqli_query($con, "SELECT * FROM category WHERE status='1' ");
	// echo "SELECT * FROM category WHERE status='1'";
	while ($c = mysqli_fetch_array($chk)){
			$cat_id=$c['cat_id'];
	 		$chk1 = mysqli_query($con, "SELECT * FROM subcategory WHERE `cat_id`='$cat_id'");
	    	if($c1 = mysqli_fetch_array($chk1))
	    	{
	    		$status=1;
	    	}else{
	    		$status=0;
	    	}
		$datatext['results'] = true;
		$arr[] = array(
			"cat_id" => $c['cat_id'],
			"name" => $c['name'],
			"logo" => $path.$c['logo1'],
			"icon" => $c['icon'],
			"status"=>$status

		);
	}
	$datatext['data'] = $arr;
	echo json_encode($datatext);
}
// ****Specialist Show A/C category Not use****
if ($method == "8"){
	$cat_id = mysqli_real_escape_string($con, $_REQUEST['cat_id']);
	$datatext = array();
	$datatext['results'] = false;
	$path = $serverURL1;
	// $arr[]='';
	$chk = mysqli_query($con, "SELECT * FROM `specialist` where cat_id='$cat_id'");
	while ($c = mysqli_fetch_array($chk)){
		$datatext['results'] = true;
		$arr[] = array(
			"specialistID" => $c['spr_id'],
			"Shop_name" => $c['brand_name'],
			"Shop_logo" => $path.$c['brand_logo'],
			"contact_name" => $c['contact_name'],
			"contact_image" => $path.$c['contact_image'],
			"address" => $c['address'],
			"address_map" => $c['address_map'],
			"contact" => $c['contact'],
			"disc" => $c['disc'],
			"lat" => $c['lat'],
			"longt" => $c['longt'],
			"email" => $c['email']
		);
	}
	$datatext['data'] = $arr;
	echo json_encode($datatext);
}

//specialist detail
if ($method == "9"){
	$spe_id = mysqli_real_escape_string($con, $_REQUEST['spe_id']);
	$user_id = mysqli_real_escape_string($con, $_REQUEST['user_id']);
	$datatext = array();
	$path = $serverURL1;
	$datatext['results'] = false;
	// $arr[]='';
	$chk = mysqli_query($con, "SELECT * FROM `specialist` where spr_id='$spe_id'");
	while ($c = mysqli_fetch_array($chk)){

		$spe_id=$c['spr_id'];
	 		$chk1 = mysqli_query($con, "SELECT * FROM favorite WHERE `user_id`='$user_id' and `spe_id`='$spe_id'");
	    	if($c1 = mysqli_fetch_array($chk1))
	    	{
	    		$fav_status=1;
	    	}else{
	    		$fav_status=0;
	    	}

		$datatext['results'] = true;
		$arr[] = array(
			"specialistID" => $c['spr_id'],
			"Shop_name" => $c['brand_name'],
			"Shop_logo" => $path.$c['brand_logo'],
			"contact_name" => $c['contact_name'],
			"contact_image" => $path.$c['contact_image'],
			"email" => $c['email'],
			"address" => $c['address'],
			"address_map" => $c['address_map'],
			"contact" => $c['contact'],
			"disc" => $c['disc'],
			"lat" => $c['lat'],
			"longt" => $c['longt'],
			"fav_status"=>$fav_status
		);
	}
	$datatext['data'] = $arr;
	echo json_encode($datatext);
}

//show sub category
if ($method == "10"){
	$cat_id = mysqli_real_escape_string($con, $_REQUEST['cat_id']);
	$datatext = array();
	$datatext['results'] = false;
	$path = $serverURL1;
	// $arr[]='';
	$chk = mysqli_query($con, "SELECT * FROM `subcategory` where cat_id='$cat_id'");
	$count_num=mysqli_num_rows($chk);
	if($count_num>0){
	while ($c = mysqli_fetch_array($chk)){	
		$datatext['results'] = true;
		$arr[] = array(
			"subcatid" => $c['subcat_id'],
			"subcat_name" => $c['subcat_name'],
			"logo" => $path.$c['logos']
		);
	} }else{
		$chk1 = mysqli_query($con, "SELECT * FROM `specialist` where cat_id='$cat_id'");
	while ($c1 = mysqli_fetch_array($chk1)){
		$datatext['results'] = true;
		$arr[] = array(
			"specialistID" => $c1['spr_id'],
			"Shop_name" => $c1['brand_name'],
			"Shop_logo" => $path.$c1['brand_logo'],
			"contact_name" => $c1['contact_name'],
			"contact_image" => $path.$c1['contact_image'],
			"email" => $c1['email'],
			"address" => $c1['address'],
			"address_map" => $c1['address_map'],
			"contact" => $c1['contact'],
			"disc" => $c1['disc'],
			"lat" => $c1['lat'],
			"longt" => $c1['longt']
		);
	}

	}
	$datatext['data'] = $arr;
	echo json_encode($datatext);
}
// sub category clcik and specilist list open

if ($method == "11"){
	$cat_id = mysqli_real_escape_string($con, $_REQUEST['cat_id']);
	$subcat_id = mysqli_real_escape_string($con, $_REQUEST['subcat_id']);
	$user_id = mysqli_real_escape_string($con, $_REQUEST['user_id']);
	$datatext = array();
	$datatext['results'] = false;
	$path = $serverURL1;
	// $arr[]='';
	$chk = mysqli_query($con, "SELECT * FROM `specialist` where cat_id='$cat_id' and subcat_id='$subcat_id' ");
	while ($c = mysqli_fetch_array($chk)){

		    $spe_id=$c['spr_id'];
	 		$chk1 = mysqli_query($con, "SELECT * FROM favorite WHERE `user_id`='$user_id' and `spe_id`='$spe_id'");
	    	if($c1 = mysqli_fetch_array($chk1))
	    	{
	    		$fav_status=1;
	    	}else{
	    		$fav_status=0;
	    	}
	    	$chk1 = mysqli_query($con, "SELECT * FROM `service` where spe_id='$spe_id'");
		while ($c1 = mysqli_fetch_array($chk1)){
			$service[] = array(
			"serviceID" => $c1['serve_id'],
			"spe_id" => $c1['spe_id'],
			"service_name" => $c1['serv_title'],
			"price" => $c1['price']
			);
		}

		$datatext['results'] = true;
		$arr[] = array(
			"specialistID" => $c['spr_id'],
			"Shop_name" => $c['brand_name'],
			"Shop_logo" => $path.$c['brand_logo'],
			"contact_name" => $c['contact_name'],
			"contact_image" => $path.$c['contact_image'],
			"email" => $c['email'],
			"address" => $c['address'],
			"address_map" => $c['address_map'],
			"contact" => $c['contact'],
			"disc" => $c['disc'],
			"lat" => $c['lat'],
			"longt" => $c['longt'],
			"fav_status"=>$fav_status,
			"service"=>$service
		);

	}
	$datatext['data'] = $arr;
	echo json_encode($datatext);
}
// favorite  
if ($method == "12") {
	    $user_id                = mysqli_real_escape_string($con, $_REQUEST['user_id']);
	    $spe_id                = mysqli_real_escape_string($con, $_REQUEST['spe_id']);
	    $datatext            = array();
	    $datatext['results'] = false;	  

	    $data=mysqli_query($con,"select * from favorite where user_id='$user_id' and spe_id='$spe_id'");
	    if($data_res=mysqli_fetch_array($data))
	    {
	        $datatext['msg']     = "Already favorite.";
	    }
	     else  {
	        $res = mysqli_query($con, "insert into favorite(`user_id`,`spe_id`)
	        	values('$user_id','$spe_id')");
	        if ($res) {
	            $datatext['results'] = true;
	            $datatext['msg']     = "Successfully.";
	        } else {
	            $datatext['results'] = false;
	        	$datatext['msg']     = "Not Successfully.";
	        }
	    }
	    echo json_encode($datatext);
	}
// ****fav list Show****
if ($method == "13"){
	$user_id                = mysqli_real_escape_string($con, $_REQUEST['user_id']);
	$datatext = array();
	$datatext['results'] = false;
	$path = $serverURL1;
	// $arr=[];
	$chk = mysqli_query($con, "SELECT * FROM favorite WHERE user_id='$user_id' ");
	while ($c = mysqli_fetch_array($chk)){		
		$spe_id=$c['spe_id'];

		$chk1 = mysqli_query($con, "SELECT * FROM `specialist` where spr_id='$spe_id'");
	while ($c1 = mysqli_fetch_array($chk1)){
		$spe_id1=$c1['spr_id'];
		$chk2 = mysqli_query($con, "SELECT * FROM favorite WHERE `user_id`='$user_id' and `spe_id`='$spe_id1'");
	    	if($c2 = mysqli_fetch_array($chk2))
	    	{
	    		$fav_status=1;
	    	}else{
	    		$fav_status=0;
	    	}

		$datatext['results'] = true;
		$arr[] = array(
			"specialistID" => $c1['spr_id'],
			"Shop_name" => $c1['brand_name'],
			"Shop_logo" => $path.$c1['brand_logo'],
			"contact_name" => $c1['contact_name'],
			"contact_image" => $path.$c1['contact_image'],
			"email" => $c1['email'],
			"address" => $c1['address'],
			"address_map" => $c1['address_map'],
			"contact" => $c1['contact'],
			"disc" => $c1['disc'],
			"lat" => $c1['lat'],
			"longt" => $c1['longt'],
			"status"=>$fav_status
		);
	}
}
	$datatext['data'] = $arr;
	echo json_encode($datatext);
}

// delete fav from db
	if ($method == "14") {		
	    $user_id                = mysqli_real_escape_string($con, $_REQUEST['user_id']);
	    $spe_id                = mysqli_real_escape_string($con, $_REQUEST['spe_id']);

        $datatext            = array();
	    $datatext['results'] = false;

	    $chk                 = mysqli_query($con, "delete FROM favorite where user_id='$user_id' and spe_id='$spe_id'");
	    if($chk)
	    {
	        $datatext['results'] = true;	        
	        $datatext['message'] = "Delete Successfully";	        
	    }else{
	    	$datatext['results'] = False;	        
	        $datatext['message'] = "No data";	
	    }
	    
	    echo json_encode($datatext);
	}

// add booking
if ($method == "15")
	{
	$user_id = mysqli_real_escape_string($con, $_REQUEST['user_id']);
	$spe_id = mysqli_real_escape_string($con, $_REQUEST['spe_id']);
	$service_id = mysqli_real_escape_string($con, $_REQUEST['service_id']);
	$date_booking = mysqli_real_escape_string($con, $_REQUEST['date_booking']);
	$time_booking = mysqli_real_escape_string($con, $_REQUEST['time_booking']);
	$comment = mysqli_real_escape_string($con, $_REQUEST['comment']);
	date_default_timezone_set("Asia/Calcutta");
	$datetime = date('Y-m-d H:i:s');
	$datatext = array();
	$datatext['results'] = false;
	$chk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_booking_new WHERE `user_id`='$user_id' and spe_id='$spe_id' and service_id='$service_id' and date_booking='$date_booking' "));
	if (!$chk){
			$res = mysqli_query($con, "insert into add_booking_new(user_id,spe_id,service_id,date_booking,time_booking,cu_date)values('$user_id','$spe_id','$service_id','$date_booking','$time_booking','$datetime')");
			if (!$res){
				$datatext['results'] = false;
				$datatext['msg'] = "Booking not successfully.";
			}
			else{
				$last_id = mysqli_insert_id($con);
				$res = mysqli_query($con, "insert into comment(last_id,comment)values('$last_id','$comment')");
				$datatext['results'] = true;
				$datatext['msg'] = "Booking successfully.";
			}
		}
	  	else{
			$datatext['msg'] = "You have already booked this service.";
		}
	echo json_encode($datatext);
}
?>