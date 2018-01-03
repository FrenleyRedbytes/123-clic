<?php
	include('db.php');
	header('Access-Control-Allow-Origin:*');
 	header('Content-Type: application/json');
 	$method = mysqli_real_escape_string($con,$_REQUEST['method']);
 	//$img_url = "http://www.engineermaster.in/offer/";

 	$img_url = "http://ec2-52-70-234-40.compute-1.amazonaws.com/sayso_admin/";

	/****************************
	  Change Password
	********************************/
	if ($method == "33") {
		
		$user_id    = mysqli_real_escape_string($con, $_REQUEST['user_id']);
		$password = mysqli_real_escape_string($con, $_REQUEST['newpwd']);
		$old_password = mysqli_real_escape_string($con, $_REQUEST['oldpwd']);

		$datatext            = array();
		$datatext['results'] = false;
		$res=mysqli_query($con, "SELECT * FROM user WHERE `id`='$user_id' and `password`='$old_password'");
		if ($chk = mysqli_fetch_array($res)){ 

			$user_info = mysqli_query($con, "update user set `password`='$password' where `id`='$user_id'");
			$datatext['results'] = true;
			$datatext['msg']          	     = "Password Changed Successfully.";

		}else {
				$datatext['results']        = false;
				$datatext['msg']          	     = "Old password not valid.";
		}
		echo json_encode($datatext);
	}


	/****************************
	  Forgot password
	********************************/
	if ($method == "32") {
		
		$email    = mysqli_real_escape_string($con, $_REQUEST['email']);

		$datatext            = array();
		$datatext['results'] = false;
		$chk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE `email`='$email'"));
		if ($chk>0){ 

			$datatext['results']        = true;
			$email      	= $chk['email'];
			$mobile         =$chk['mobile'];

			$six_digit_random_number = mt_rand(100000, 999999);

			$user_info = mysqli_query($con, "update user set `password`='$six_digit_random_number'  where `email`='$email'");
			if($user_info){
				$message='Your New Dealfiz password is: '.$six_digit_random_number;
				$get = messageSend($message,$mobile);
				if($get!='success'){
					messageSend($message,$mobile);
				}

							 $to =$email;
				            $subject = 'Dealfiz Password Reset';

							$headers = "From: " . strip_tags('noreply@dealfiz.com') . "\r\n";
							$headers .= "MIME-Version: 1.0\r\n";
							$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

							$message .= '<!DOCTYPE html>
										<html>
										  <head>

										  </head>
										<body style=" margin: 0 auto;">
										<div class="wrapper" style="width:100%;" >
										  




										    <header style="width: 100%; float: left; background-color: #EA4335; clear: left; text-align: center;">
										    
										       <span style="padding: 10px;font-size: 40px;color: white;">Dealfiz</span>
										      
										    </header>
										    <section>
										      <div class="container" style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
										        <div class="section">
										  
										          <p style="font-size:24px;">Dear Customer</p>
										          <p style="font-size:20px; ">Your new Dealfiz Password is: '.$six_digit_random_number.'. </p>
										          <p style="float:right; font-size:24px; margin-right:190px;">Thanks</p>
										        </div>

										      </div>
										    </section>


										<footer style="  color: white; background-color: black; height: auto; width: 100%; float: left;">
										<div class="container"  style="width: 100%; margin: 0 auto;overflow: hidden; max-width: 1170px;">
										  <div class="main-box" style=" width: 100%;">
										    
										    <div style=" width: 30%; float: right; margin-right: 125px; margin-top: 10px;
										"> 
										      <a href="#"><span class="text-right" style="float: right;font-size: 24px;margin-top: 5px; color:#fff;">www.dealfiz.com</span></a>
										    </div>
										    </div>
										</footer>


										</div>
										</body>
										</html>';
							mail($to, $subject, $message, $headers);
							$datatext['msg']          	     = "Password sent Successfully.";
			}else{
				$datatext['msg']          	     = "Something Went wrong.";
			}
		}else {
				$datatext['results']        = false;
				$datatext['msg']          	     = "Invalid email.";
		}
		echo json_encode($datatext);
	}


	/****************************
	   Users Signup
	********************************/
	if ($method == "4") {
		$email    		= mysqli_real_escape_string($con, $_REQUEST['email']);
		$password 		= mysqli_real_escape_string($con, $_REQUEST['password']);
		$county    		= mysqli_real_escape_string($con, $_REQUEST['county']);
		$country    = mysqli_real_escape_string($con, $_REQUEST['country']);
		$dob    = mysqli_real_escape_string($con, $_REQUEST['dob']);

		$datatext            = array();
		$datatext['results'] = false;
	
		$chk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE `email`='$email'"));

		if (!$chk){

			$user_info = mysqli_query($con, "INSERT INTO user(`email`,`password`,`county`,`country`,`dob`) VALUES('$email','$password','$county','$country','$dob')");
			if ($user_info){
				$id=mysqli_insert_id($con);
				$show_info = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE `id`='$id'"));
				$datatext['results']    = true;
				$datatext['id']  		= $id;
				$datatext['email']   	= $show_info['email'];
				$datatext['county']    = $show_info['county'];
				$datatext['country']     = $show_info['country'];
				$datatext['msg']        = "Successfully registered";
		}
		}else {	
				$datatext['msg']  = "Email Already Registered.";
			
			}
		echo json_encode($datatext);
	}

	/****************************
	   Users login
	********************************/
	if ($method == "1") {
		
		$email    = mysqli_real_escape_string($con, $_REQUEST['email']);
		$password = mysqli_real_escape_string($con, $_REQUEST['password']);

		$datatext            = array();
		$datatext['results'] = false;
		$chk = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM user WHERE `email`='$email' and `password`='$password'"));
		if ($chk>0){ 
			$datatext['results']        = true;
			$datatext['id']          	= $chk['id'];
			$datatext['email']        	= $chk['email'];
			$datatext['country']        = $chk['country'];
			$datatext['county']      	= $chk['county'];
			$datatext['msg']          	     = "Login Successfully.";

		}else {
				$datatext['results']        = false;
				$datatext['msg']          	     = "Invalid email and password.";
		}
		echo json_encode($datatext);
	}

	/***********************************
	function => show Category List
	*******************************************/
	
	if($method=="2"){
		$datatext = array();
		$datatext['results']=false ;
		$tutor_info=mysqli_query($con,"SELECT * FROM category ORDER BY id DESC ");
		while($fetch_info = mysqli_fetch_array($tutor_info)){

				$cid=$fetch_info['id'];
				$tutor_info1=mysqli_query($con,"SELECT * FROM sub_category WHERE `cat_id`='$cid' ORDER BY id DESC ");
					while($fetch_info1 = mysqli_fetch_array($tutor_info1)){

							${"file" . $cid}[] = array("id"=>$fetch_info1['id'],"Name"=>$fetch_info1['name'],"img"=>$img_url.$fetch_info1['image']);
						}

			$datatext['results']=true;
			$arr[] = array("id"=>$fetch_info['id'],"Name"=>$fetch_info['name'],"img"=>$img_url.$fetch_info['img'],"sub_category"=>${"file" . $cid});
			$datatext['data'] = $arr;
		}	
		echo json_encode($datatext);	
	}

	/***********************************
	function => show Sub Category List
	*******************************************/
	
	if($method=="3"){

		$user_id 		        = mysqli_real_escape_string($con, $_REQUEST['user_id']);
		$sub_category_id 		= mysqli_real_escape_string($con, $_REQUEST['sub_category_id']);
		$datatext = array();
		$datatext['results']= false ;
		$tutor_info=mysqli_query($con,"SELECT * FROM image WHERE `sub_cat_id`='$sub_category_id' ORDER BY id DESC ");
		while($fetch_info = mysqli_fetch_array($tutor_info)){
			
			$image_id=$fetch_info['id'];


			$tutor_info_ch=mysqli_query($con,"SELECT * FROM image_status WHERE `user_id`='$user_id' and image_id='$image_id' ORDER BY id DESC ");
			$fetch_info_chk = mysqli_fetch_array($tutor_info_ch);
			if(!$fetch_info_chk){

					if($fetch_info['status']=='wiki'){

						$url=$fetch_info['image'];

					}else{
						$url=$img_url.$fetch_info['image'];
					}
					$arr[] = array("id"=>$fetch_info['id'],"img"=>$url);
					$datatext['results']= true ;
			}

			
			
		}	
		$datatext['data'] = $arr;
		echo json_encode($datatext);	
	}	

	/****************************
	  like image
	********************************/
	if ($method == "5") {
		$image_id    		= mysqli_real_escape_string($con, $_REQUEST['image_id']);
		$user_id 		= mysqli_real_escape_string($con, $_REQUEST['user_id']);

		$datatext            = array();
		$datatext['results'] = false;

		$tutor_info1=mysqli_query($con,"SELECT * FROM image WHERE `id`='$image_id' ");
		$tutor_info11 = mysqli_fetch_array($tutor_info1);
		$sub_cat_id=$tutor_info11['sub_cat_id'];

		$sub_cat_id_info1=mysqli_query($con,"SELECT * FROM sub_category WHERE `id`='$sub_cat_id' ");
		$sub_cat_id_info11 = mysqli_fetch_array($sub_cat_id_info1);
		$cat_id=$sub_cat_id_info11['cat_id'];

	
		$user_info = mysqli_query($con, "INSERT INTO image_status (`image_id`,`user_id`,`status`,`cat_id`,`sub_cat_id`) VALUES('$image_id','$user_id','like','$cat_id','$sub_cat_id')");
			if ($user_info){
				$id=mysqli_insert_id($con);
				$datatext['results']    = true;
				$datatext['like_id']  		= $id;
		}
		echo json_encode($datatext);
	}
	
	/****************************
	  unlike image
	********************************/
	if ($method == "6") {
		$image_id    		= mysqli_real_escape_string($con, $_REQUEST['image_id']);
		$user_id 		= mysqli_real_escape_string($con, $_REQUEST['user_id']);

		$datatext            = array();
		$datatext['results'] = false;

		$tutor_info1=mysqli_query($con,"SELECT * FROM image WHERE `id`='$image_id' ");
		$tutor_info11 = mysqli_fetch_array($tutor_info1);
		$sub_cat_id=$tutor_info11['sub_cat_id'];

		$sub_cat_id_info1=mysqli_query($con,"SELECT * FROM sub_category WHERE `id`='$sub_cat_id' ");
		$sub_cat_id_info11 = mysqli_fetch_array($sub_cat_id_info1);
		$cat_id=$sub_cat_id_info11['cat_id'];
	
		$user_info = mysqli_query($con, "INSERT INTO image_status (`image_id`,`user_id`,`status`,`cat_id`,`sub_cat_id`) VALUES('$image_id','$user_id','unlike','$cat_id','$sub_cat_id')");
			if ($user_info){
				$id=mysqli_insert_id($con);
				$datatext['results']    = true;
				$datatext['unlike_id']  		= $id;
		}
		echo json_encode($datatext);
	}

		/***********************************
	function => my like List
	*******************************************/
	
	if($method=="7"){

		$user_id 		= mysqli_real_escape_string($con, $_REQUEST['user_id']);
		$datatext = array();
		$datatext['results']=false ;
		$fetch_info10=mysqli_query($con,"SELECT * FROM image_status WHERE `user_id`='$user_id' and status='like'  ORDER BY id DESC ");
		while($fetch_info = mysqli_fetch_array($fetch_info10)){

				$image_id=$fetch_info['image_id'];
				$tutor_info1=mysqli_query($con,"SELECT * FROM image WHERE `id`='$image_id' ");
				$tutor_info11 = mysqli_fetch_array($tutor_info1);

				if($tutor_info11['status']=='wiki'){

						$url=$tutor_info11['image'];

					}else{
						$url=$img_url.$tutor_info11['image'];
					}
				
			$datatext['results']=true;
			$arr[] = array("id"=>$fetch_info['image_id'],"img"=>$url);
			$datatext['data'] = $arr;
		}	
		echo json_encode($datatext);	
	}

			/***********************************
	function => my unlike List
	*******************************************/
	
	if($method=="8"){

		$user_id 		= mysqli_real_escape_string($con, $_REQUEST['user_id']);
		$datatext = array();
		$datatext['results']=false ;
		$fetch_info10=mysqli_query($con,"SELECT * FROM image_status WHERE `user_id`='$user_id' and status='unlike'  ORDER BY id DESC ");
		while($fetch_info = mysqli_fetch_array($fetch_info10)){

				$image_id=$fetch_info['image_id'];
				$tutor_info1=mysqli_query($con,"SELECT * FROM image WHERE `id`='$image_id' ");
				$tutor_info11 = mysqli_fetch_array($tutor_info1);

				if($tutor_info11['status']=='wiki'){

						$url=$tutor_info11['image'];

					}else{
						$url=$img_url.$tutor_info11['image'];
					}
				
			$datatext['results']=true;
			$arr[] = array("id"=>$fetch_info['id'],"img"=>$url);
			$datatext['data'] = $arr;
		}	
		echo json_encode($datatext);	
	}

				/***********************************
	function => show profile
	*******************************************/
	
	if($method=="9"){

		$user_id 		= mysqli_real_escape_string($con, $_REQUEST['user_id']);
		$datatext = array();
		$datatext['results']=false ;
		$fetch_info10=mysqli_query($con,"SELECT * FROM user WHERE `id`='$user_id'");
		while($fetch_info = mysqli_fetch_array($fetch_info10)){

			$datatext['results']=true;
			$arr[] = array("id"=>$fetch_info['id'],"email"=>$fetch_info['email'],"county"=>$fetch_info['county'],"country"=>$fetch_info['country'],"dob"=>$fetch_info['dob']);
			
		}
		$datatext['data'] = $arr;	
		echo json_encode($datatext);	
	}

				/***********************************
	function => count 
	*******************************************/
	
	if($method=="10"){

		$user_id 		= mysqli_real_escape_string($con, $_REQUEST['user_id']);
		$datatext = array();
		$datatext['results']=false ;
		$fetch_info10=mysqli_query($con,"SELECT * FROM image_status WHERE `user_id`='$user_id' and status='like' ");
		$fetch_info = mysqli_num_rows($fetch_info10);

		$fetch_info101=mysqli_query($con,"SELECT * FROM image_status WHERE `user_id`='$user_id' and status='unlike'");
		$fetch_info1 = mysqli_num_rows($fetch_info101);

		$fetch_info22=mysqli_query($con,"SELECT * FROM image_status WHERE `user_id`='$user_id' and status='dontcare'");
		$fetch_info222 = mysqli_num_rows($fetch_info22);

		$fetch_info33=mysqli_query($con,"SELECT * FROM image_status WHERE `user_id`='$user_id' and status='dontknow'");
		$fetch_info333 = mysqli_num_rows($fetch_info33);

			$datatext['results']=true;
			$arr = array("like_image_count"=>$fetch_info,"unlike_image_count"=>$fetch_info1,"dontcare_image_count"=>$fetch_info222,"dontknow_image_count"=>$fetch_info333);
			
		$datatext['data'] = $arr;	
		echo json_encode($datatext);	
	}

		/****************************
	  dontcare_image image
	********************************/
	if ($method == "11") {
		$image_id    		= mysqli_real_escape_string($con, $_REQUEST['image_id']);
		$user_id 		= mysqli_real_escape_string($con, $_REQUEST['user_id']);

		$datatext            = array();
		$datatext['results'] = false;

		$tutor_info1=mysqli_query($con,"SELECT * FROM image WHERE `id`='$image_id' ");
		$tutor_info11 = mysqli_fetch_array($tutor_info1);
		$sub_cat_id=$tutor_info11['sub_cat_id'];

		$sub_cat_id_info1=mysqli_query($con,"SELECT * FROM sub_category WHERE `id`='$sub_cat_id' ");
		$sub_cat_id_info11 = mysqli_fetch_array($sub_cat_id_info1);
		$cat_id=$sub_cat_id_info11['cat_id'];
	
		$user_info = mysqli_query($con, "INSERT INTO image_status (`image_id`,`user_id`,`status`,`cat_id`,`sub_cat_id`) VALUES('$image_id','$user_id','dontcare','$cat_id','$sub_cat_id')");
			if ($user_info){
				$id=mysqli_insert_id($con);
				$datatext['results']    = true;
				$datatext['dontcare']  		= $id;
		}
		echo json_encode($datatext);
	}

			/****************************
	  dontknow_image image
	********************************/
	if ($method == "12") {
		$image_id    		= mysqli_real_escape_string($con, $_REQUEST['image_id']);
		$user_id 		= mysqli_real_escape_string($con, $_REQUEST['user_id']);

		$datatext            = array();
		$datatext['results'] = false;

		$tutor_info1=mysqli_query($con,"SELECT * FROM image WHERE `id`='$image_id' ");
		$tutor_info11 = mysqli_fetch_array($tutor_info1);
		$sub_cat_id=$tutor_info11['sub_cat_id'];

		$sub_cat_id_info1=mysqli_query($con,"SELECT * FROM sub_category WHERE `id`='$sub_cat_id' ");
		$sub_cat_id_info11 = mysqli_fetch_array($sub_cat_id_info1);
		$cat_id=$sub_cat_id_info11['cat_id'];
	
		$user_info = mysqli_query($con, "INSERT INTO image_status (`image_id`,`user_id`,`status`,`cat_id`,`sub_cat_id`) VALUES('$image_id','$user_id','dontknow','$cat_id','$sub_cat_id')");
			if ($user_info){
				$id=mysqli_insert_id($con);
				$datatext['results']    = true;
				$datatext['dontknow']  		= $id;
		}
		echo json_encode($datatext);
	}


			/****************************
	  reratedontcare_image image
	********************************/
	if ($method == "13") {
		$image_id    		= mysqli_real_escape_string($con, $_REQUEST['image_id']);
		$user_id 		= mysqli_real_escape_string($con, $_REQUEST['user_id']);
		$status 		= mysqli_real_escape_string($con, $_REQUEST['status']);

		$datatext            = array();
		$datatext['results'] = false;
	
		$user_info = mysqli_query($con, "UPDATE `image_status` SET status='$status' WHERE `image_id`='$image_id' AND `user_id`='$user_id' ");
			if ($user_info){
				$datatext['results'] = true;
		}
		echo json_encode($datatext);
	}

	/****************************
	 change password
	********************************/
	if ($method == "14") {
		$user_id    		= mysqli_real_escape_string($con, $_REQUEST['user_id']);
		$password 		    = mysqli_real_escape_string($con, $_REQUEST['password']);

		$datatext            = array();
		$datatext['results'] = false;
	
		$user_info = mysqli_query($con, "UPDATE `user` SET password='$password' WHERE `id`='$user_id' ");
			if ($user_info){
				$datatext['results'] = true;
		}
		echo json_encode($datatext);
	}
	
	
	/***********************************
	function => country
	*******************************************/
	
	if($method=="15"){

		$datatext = array();
		$datatext['results']=false ;
		$fetch_info10=mysqli_query($con,"SELECT * FROM countries ");
		while($fetch_info = mysqli_fetch_array($fetch_info10)){

			$datatext['results']=true;
			$arr[] = array("id"=>$fetch_info['id'],"name"=>$fetch_info['name']);
			
		}
		$datatext['data'] = $arr;	
		echo json_encode($datatext);	
	}

		/***********************************
	function => state
	*******************************************/
	
	if($method=="16"){

		$country_id 		= mysqli_real_escape_string($con, $_REQUEST['country_id']);
		$datatext = array();
		$datatext['results']=false ;
		$fetch_info10=mysqli_query($con,"SELECT * FROM states WHERE country_id='$country_id' ");
		while($fetch_info = mysqli_fetch_array($fetch_info10)){

			$datatext['results']=true;
			$arr[] = array("id"=>$fetch_info['id'],"name"=>$fetch_info['name']);
			
		}
		$datatext['data'] = $arr;	
		echo json_encode($datatext);	
	}	

		if($method=="17"){

		$user_id 		= mysqli_real_escape_string($con, $_REQUEST['user_id']);
		$status 		= mysqli_real_escape_string($con, $_REQUEST['status']);
		$datatext = array();
		$datatext['results']=false ;
		$fetch_info10=mysqli_query($con,"SELECT * FROM image_status WHERE `user_id`='$user_id' and status='$status'  ORDER BY id DESC ");
		while($fetch_info = mysqli_fetch_array($fetch_info10)){

				$image_id=$fetch_info['image_id'];
				$tutor_info1=mysqli_query($con,"SELECT * FROM image WHERE `id`='$image_id' ");
				$tutor_info11 = mysqli_fetch_array($tutor_info1);

				if($tutor_info11['status']=='wiki'){

						$url=$tutor_info11['image'];

					}else{
						$url=$img_url.$tutor_info11['image'];
					}
				
			$datatext['results']=true;
			$arr[] = array("id"=>$fetch_info['image_id'],"img"=>$url);
			$datatext['data'] = $arr;
		}	
		echo json_encode($datatext);	
	}


?>

