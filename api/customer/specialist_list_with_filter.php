<?php 
include('../constants.php');
#specialist listing api
$cat_id = $data['category_id'];
$sub_cat_id = $data['sub_category_id'];
$sub_cat_filter = 0;
$condition = '';
if(!empty($sub_cat_id)){
	$sub_cat_filter = $sub_cat_id;
	$condition = 'sp.cat_id="'.$cat_id.'" and sp.subcat_id="'.$sub_cat_filter.'"';
}else{
	$sub_cat_filter = 0;
	$condition = 'sp.cat_id="'.$cat_id.'"';
}
$lat = $data['lat'];
$long = $data['long'];
$maxDistance = 300;

$specialistListQuery = mysqli_query($con,"SELECT  sp.spr_id,sp.brand_name,sp.brand_logo,sp.contact_name,sp.contact_image,sp.address,sp.city_name,sp.disc,sp.contact,sp.email,
	sp.mon_from_am_time,
	sp.mon_to_am_time,
	sp.mon_from_pm_time,
	sp.mon_to_pm_time,
	sp.tue_from_am_time,
	sp.tue_to_am_time,
	sp.tue_from_pm_time,
	sp.tue_to_pm_time,
	sp.wed_from_am_time,
	sp.wed_to_am_time,
	sp.wed_from_pm_time,
	sp.wed_to_pm_time,
	sp.thu_from_am_time,
	sp.thu_to_am_time,
	sp.thu_from_pm_time,
	sp.thu_to_pm_time,
	sp.fri_from_am_time,
	sp.fri_to_am_time,
	sp.fri_from_pm_time,
	sp.fri_to_pm_time,
	sp.sat_from_am_time,
	sp.sat_to_am_time,
	sp.sat_from_pm_time,
	sp.sat_to_pm_time,
	sp.sun_from_am_time,
	sp.sun_to_am_time,
	sp.sun_from_pm_time,
	sp.sun_to_pm_time,
	sp.weekend,sp.zip_code,(6371 * ACOS( COS( RADIANS( $lat ) ) * COS( RADIANS( lat ) ) * COS( RADIANS( longt ) - RADIANS( $long ) ) + SIN( RADIANS( $lat ) ) * SIN( RADIANS( lat) ) ) ) AS distance  FROM `specialist` sp  WHERE $condition HAVING distance <=$maxDistance");

// echo "SELECT  sp.spr_id,sp.brand_name,sp.brand_logo,sp.contact_name,sp.contact_image,sp.address,sp.city_name,sp.disc,sp.contact,sp.disc,sp.email,sp.mon_from_am_time,sp.mon_to_am_time,sp.mon_from_pm_time,sp.mon_to_pm_time,sp.tue_from_am_time,sp.tue_to_am_time,sp.tue_from_pm_time,sp.tue_to_pm_time,sp.wed_from_am_time,sp.wed_to_am_time,sp.wed_from_pm_time,sp.wed_to_pm_time,sp.thu_from_am_time,sp.thu_to_am_time,sp.thu_from_pm_time,sp.thu_to_pm_time,sp.fri_from_am_time,sp.fri_to_am_time,sp.fri_from_pm_time,sp.fri_to_pm_time,sp.sat_from_am_time,sp.sat_to_am_time,sp.sat_from_pm_time,sp.sat_to_pm_time,sp.sun_from_am_time,sp.sun_to_am_time,sp.sun_from_pm_time,sp.sun_to_pm_time,sp.weekend,(6371 * ACOS( COS( RADIANS( $lat ) ) * COS( RADIANS( lat ) ) * COS( RADIANS( longt ) - RADIANS( $long ) ) + SIN( RADIANS( $lat ) ) * SIN( RADIANS( lat) ) ) ) AS distance  FROM `specialist` sp WHERE $condition HAVING distance <=$maxDistance";die;
//die;
$specialistDetails = array();
$bookingDetails = array();
$currentDate = date('Y-m-d');
$currentTime = date('H:i:s');
if(mysqli_num_rows($specialistListQuery) > 0){
	$datatext['status'] = true;
 	while($row = mysqli_fetch_array($specialistListQuery)){
		$specialist['specialist_id'] = $row['spr_id'];
		$specialist['specialist_brand_name'] = $row['brand_name'];
		$specialist['specialist_brand_logo'] = SPECIALIST_IMAGE_PATH.$row['brand_logo'];
		$specialist['specialist_contact_name'] = $row['contact_name'];
		$specialist['specialist_contact_image'] = $row['contact_image'];
		$specialist['specialist_address'] = $row['address'];
		$specialist['specialist_city_name'] = $row['city_name'];
		$specialist['specialist_disc'] = $row['disc'];
		$specialist['specialist_contact'] = $row['contact'];
		$specialist['specialist_email'] = $row['email'];

		$specialist['specialist_mon_from_am_time'] = $row['mon_from_am_time'];
		$specialist['specialist_mon_to_am_time'] = $row['mon_to_am_time'];
		$specialist['specialist_mon_from_pm_time']	= $row['mon_from_pm_time'];
		$specialist['specialist_mon_to_pm_time']	= $row['mon_to_pm_time'];

		$specialist['specialist_tue_from_am_time']	= $row['tue_from_am_time'];
		$specialist['specialist_tue_to_am_time']	= $row['tue_to_am_time'];
		$specialist['specialist_tue_from_pm_time']	= $row['tue_from_pm_time'];
		$specialist['specialist_tue_to_pm_time']	= $row['tue_to_pm_time'];

		$specialist['specialist_wed_from_am_time']	= $row['wed_from_am_time'];
		$specialist['specialist_wed_to_am_time']	= $row['wed_to_am_time'];
		$specialist['specialist_wed_from_pm_time']	= $row['wed_from_pm_time'];
		$specialist['specialist_wed_to_pm_time']	= $row['wed_to_pm_time'];

		$specialist['specialist_thu_from_am_time']	= $row['thu_from_am_time'];
		$specialist['specialist_thu_to_am_time']	= $row['thu_to_am_time'];
		$specialist['specialist_thu_from_pm_time']	= $row['thu_from_pm_time'];
		$specialist['specialist_thu_to_pm_time']	= $row['thu_to_pm_time'];

		$specialist['specialist_fri_from_am_time']	= $row['fri_from_am_time'];
		$specialist['specialist_fri_to_am_time']	= $row['fri_to_am_time'];
		$specialist['specialist_fri_from_pm_time']	= $row['fri_from_pm_time'];
		$specialist['specialist_fri_to_pm_time']	= $row['fri_to_pm_time'];

		$specialist['specialist_sat_from_am_time']	= $row['sat_from_am_time'];
		$specialist['specialist_sat_to_am_time']	= $row['sat_to_am_time'];
		$specialist['specialist_sat_from_pm_time']	= $row['sat_from_pm_time'];
		$specialist['specialist_sat_to_pm_time']	= $row['sat_to_pm_time'];

		$specialist['specialist_sun_from_am_time']	= $row['sun_from_am_time'];
		$specialist['specialist_sun_to_am_time']	= $row['sun_to_am_time'];
		$specialist['specialist_sun_from_pm_time']	= $row['sun_from_pm_time'];
		$specialist['specialist_sun_to_pm_time']	= $row['sun_to_pm_time'];

		$specialist['specialist_distance'] = number_format((float)$row['distance'], 1, '.', '').' km';


		$specialist['specialist_zip_code'] = $row['zip_code'];


		// get the latest booking available for a particular specialist starts here
		// SELECT SUBSTRING_INDEX(time_booking, ',', -1) AS last_time_of_booking FROM `add_booking_new`
		 $latestAvailableBookingQuery = mysqli_query($con,"SELECT ab.date_booking,ab.time_booking,ab.end FROM `add_booking_new` ab where ab.date_booking >='".$currentDate."' and ab.time_booking=SUBSTRING_INDEX(ab.time_booking, ',', -1) and ab.spe_id=".$row['spr_id']." and ab.status='1' order by ab.booking_id desc limit 1");

		 /*  echo "SELECT ab.date_booking,ab.time_booking FROM `add_booking_new` ab where ab.date_booking >='".$currentDate."' and ab.time_booking=SUBSTRING_INDEX(ab.time_booking, ',', -1) and ab.spe_id=".$row['spr_id']." and ab.status='1' order by ab.booking_id desc limit 1";die;*/

		   if(mysqli_num_rows($latestAvailableBookingQuery) > 0){
		   		// do not send request as booking is available for this date
		   		$bookingResult = mysqli_fetch_array($latestAvailableBookingQuery);
		   		$endDate = $bookingResult['end'];
		   		$splitTimeStamp = explode(" ",$endDate);
				$date = $splitTimeStamp[0];
				$time = $splitTimeStamp[1];
		   		// array_push($bookingDetails,array('Date'=>$date,'Time'=>$time));
		   		$specialist['specialist_availability_date'] = array('Date'=>$date,'Time'=>$time);
		   }else{
		   		// send available booking slots
		   		// array_push($bookingDetails,array('Date'=>$currentDate,'Time'=>$currentTime));
		   		$specialist['specialist_availability_date'] = array('Date'=>$currentDate,'Time'=>$currentTime);
		   }

		   


		// get the latest booking available for a particular specialist ends here


		if($specialist['specialist_id'] == '' || $specialist['specialist_id'] == null){
			$specialist['specialist_id'] = 'NA';
		}
		if($specialist['specialist_brand_name'] == '' || $specialist['specialist_brand_name'] == null){
			$specialist['specialist_brand_name'] = 'NA';
		}
		if($specialist['specialist_brand_logo'] == '' || $specialist['specialist_brand_logo'] == null){
			$specialist['specialist_brand_logo'] = 'NA';
		}
		if($specialist['specialist_contact_name'] == '' || $specialist['specialist_contact_name'] == null){
			$specialist['specialist_contact_name'] = 'NA';
		}
		if($specialist['specialist_contact_image'] == '' || $specialist['specialist_contact_image'] == null){
			$specialist['specialist_contact_image'] = 'NA';
		}
		if($specialist['specialist_address'] == '' || $specialist['specialist_address'] == null){
			$specialist['specialist_address'] = 'NA';
		}
		if($specialist['specialist_city_name'] == '' || $specialist['specialist_city_name'] == null){
			$specialist['specialist_city_name'] = 'NA';
		}
		if($specialist['specialist_disc'] == '' || $specialist['specialist_disc'] == null){
			$specialist['specialist_disc'] = 'NA';
		}
		if($specialist['specialist_contact'] == '' || $specialist['specialist_contact']== null){
			$specialist['specialist_contact'] = 'NA';
		}
		if($specialist['specialist_email'] == '' || $specialist['specialist_email'] == null){
			$specialist['specialist_email'] = 'NA';
		}




		if($specialist['specialist_mon_from_am_time'] == '' || $specialist['specialist_mon_from_am_time'] == null){
			$specialist['specialist_mon_from_am_time'] = 'NA';
		}
		if($specialist['specialist_mon_to_am_time'] == '' || $specialist['specialist_mon_to_am_time'] == null){
			$specialist['specialist_mon_to_am_time'] = 'NA';
		}
		if($specialist['specialist_mon_from_pm_time'] == '' || $specialist['specialist_mon_from_pm_time'] == null){
			$specialist['specialist_mon_from_pm_time'] = 'NA';
		}
		if($specialist['specialist_mon_to_pm_time'] == '' || $specialist['specialist_mon_to_pm_time'] == null){
			$specialist['specialist_mon_to_pm_time'] = 'NA';
		}



		if($specialist['specialist_tue_from_am_time'] == '' || $specialist['specialist_tue_from_am_time'] == null){
			$specialist['specialist_tue_from_am_time'] = 'NA';
		}
		if($specialist['specialist_tue_to_am_time'] == '' || $specialist['specialist_tue_to_am_time'] == null){
			$specialist['specialist_tue_to_am_time'] = 'NA';
		}
		if($specialist['specialist_tue_from_pm_time'] == '' || $specialist['specialist_tue_from_pm_time'] == null){
			$specialist['specialist_tue_from_pm_time'] = 'NA';
		}
		if($specialist['specialist_tue_to_pm_time'] == '' || $specialist['specialist_tue_to_pm_time'] == null){
			$specialist['specialist_tue_to_pm_time'] = 'NA';
		}



		if($specialist['specialist_wed_from_am_time'] == '' || $specialist['specialist_wed_from_am_time'] == null){
			$specialist['specialist_wed_from_am_time'] = 'NA';
		}
		if($specialist['specialist_wed_to_am_time'] == '' || $specialist['specialist_wed_to_am_time'] == null){
			$specialist['specialist_wed_to_am_time']= 'NA';
		}
		if($specialist['specialist_wed_from_pm_time'] == '' || $specialist['specialist_wed_from_pm_time'] == null){
			$specialist['specialist_wed_from_pm_time'] = 'NA';
		}
		if($specialist['specialist_wed_to_pm_time']== '' || $specialist['specialist_wed_to_pm_time'] == null){
			$specialist['specialist_wed_to_pm_time'] = 'NA';
		}



		if($specialist['specialist_thu_from_am_time'] == '' || $specialist['specialist_thu_from_am_time'] == null){
			$specialist['specialist_thu_from_am_time'] = 'NA';
		}
		if($specialist['specialist_thu_to_am_time'] == '' || $specialist['specialist_thu_to_am_time'] == null){
			$specialist['specialist_thu_to_am_time'] = 'NA';
		}
		if($specialist['specialist_thu_from_pm_time'] == '' || $specialist['specialist_thu_from_pm_time'] == null){
			$specialist['specialist_thu_from_pm_time'] = 'NA';
		}
		if($specialist['specialist_thu_to_pm_time'] == '' || $specialist['specialist_thu_to_pm_time'] == null){
			$specialist['specialist_thu_to_pm_time'] = 'NA';
		}




		if($specialist['specialist_fri_from_am_time'] == '' || $specialist['specialist_fri_from_am_time'] == null){
			$specialist['specialist_fri_from_am_time'] = 'NA';
		}
		if($specialist['specialist_fri_to_am_time'] == '' || $specialist['specialist_fri_to_am_time'] == null){
			$specialist['specialist_fri_to_am_time'] = 'NA';
		}
		if($specialist['specialist_fri_from_pm_time'] == '' || $specialist['specialist_fri_from_pm_time'] == null){
			$specialist['specialist_fri_from_pm_time'] = 'NA';
		}
		if($specialist['specialist_fri_to_pm_time'] == '' || $specialist['specialist_fri_to_pm_time'] == null){
			$specialist['specialist_fri_to_pm_time'] = 'NA';
		}




		if($specialist['specialist_sat_from_am_time'] == '' || $specialist['specialist_sat_from_am_time'] == null){
			$specialist['specialist_sat_from_am_time'] = 'NA';
		}
		if($specialist['specialist_sat_to_am_time'] == '' || $specialist['specialist_sat_to_am_time'] == null){
			$category['category_name'] = 'NA';
		}
		if($specialist['specialist_sat_from_pm_time'] == '' || $specialist['specialist_sat_from_pm_time'] == null){
			$specialist['specialist_sat_from_pm_time'] = 'NA';
		}
		if($specialist['specialist_sat_to_pm_time'] == '' || $specialist['specialist_sat_to_pm_time'] == null){
			$specialist['specialist_sat_to_pm_time'] = 'NA';
		}





		if($specialist['specialist_sun_from_am_time'] == '' || $specialist['specialist_sun_from_am_time'] == null){
			$specialist['specialist_sun_from_am_time'] = 'NA';
		}
		if($specialist['specialist_sun_from_am_time'] == '' || $specialist['specialist_sun_from_am_time'] == null){
			$specialist['specialist_sun_from_am_time'] = 'NA';
		}
		if($specialist['specialist_sun_from_pm_time'] == '' || $specialist['specialist_sun_from_pm_time']== null){
			$specialist['specialist_sun_from_pm_time'] = 'NA';
		}
		if($specialist['specialist_sun_to_pm_time'] == '' || $specialist['specialist_sun_to_pm_time'] == null){
			$specialist['specialist_sun_to_pm_time'] = 'NA';
		}

		if($specialist['specialist_zip_code'] == '' || $specialist['specialist_zip_code'] == null){
			$specialist['specialist_zip_code'] = 'NA';
		}

		array_push($specialistDetails,$specialist);
		
		$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'specialist_list',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'success',
				"Actual_Data_Received" => $json,
				"Data_Responded" => $specialistDetails
		);
		$logs->create_log($logParameters,'customer');
	}
	$datatext['message'] = "Successfully Listed";
	$datatext['details'] = $specialistDetails;
} else {
	$datatext['status'] = false;
	$datatext['message'] = "No Specialist List Found.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'specialist_list',
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