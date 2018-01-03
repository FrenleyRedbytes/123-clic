<?php 
include('constants.php');
#specialist listing api
$userId = $data['userId'];
//echo $userId;die;
$reservationListDetails = array();
$upcomingReservationDetails = array();
$passedReservationDetails = array();


$reservationListQuery = mysqli_query($con,"SELECT b.* from add_booking_new b where b.user_id=$userId and b.status='1' order by b.date_booking DESC");
$current_date_time = strtotime(date("Y-m-d H:i:s"));


//print_r($reservationListQuery);die;

if(mysqli_num_rows($reservationListQuery) > 0){

	while($total_reservation_array=mysqli_fetch_array($reservationListQuery)){
            $booking_id = $total_reservation_array['booking_id'];
            $dateOfBooking = $total_reservation_array['date_booking'];
            //echo $dateOfBooking;//die;
            $startTimeOfBooking = $total_reservation_array['start']; 
            $datetime = explode(" ",$startTimeOfBooking);
            //$date = $datetime[0];
            $timeOfBooking = $datetime[1];

                       
            $date_of_booking = strtotime($dateOfBooking." ".$timeOfBooking);

            $specialist_id = $total_reservation_array['spe_id'];
            $specialist_data_query = mysqli_query($con,"select * from specialist where spr_id='$specialist_id'");
            $specilaist_data = mysqli_fetch_array($specialist_data_query);

            $service_id = $total_reservation_array['service_id'];
            $service_data_query = mysqli_query($con,"select * from service where serv_title='$service_id' and spe_id='$specialist_id'");

            $service_data = mysqli_fetch_array($service_data_query);
            $service_name = $service_data['serv_title']; // id 
            $servicedetail_data_query = mysqli_query($con,"select * from service_detail where ser_detail_id='$service_name'");
            $servicedetail_data = mysqli_fetch_array($servicedetail_data_query);
            if($current_date_time  > $date_of_booking){
                  $passedReservationDetailsInside['reservation_id'] = $booking_id;
            	$passedReservationDetailsInside['reservation_date'] = $dateOfBooking;
            	$passedReservationDetailsInside['reservation_hour'] = $timeOfBooking;
            	$passedReservationDetailsInside['reservation_professionel'] = $specilaist_data['brand_name'];
                  $passedReservationDetailsInside['reservation_brand_logo'] = SPECIALIST_IMAGE_PATH.$specilaist_data['brand_logo'];
            	$passedReservationDetailsInside['reservation_address'] = $specilaist_data['address'];
            	$passedReservationDetailsInside['reservation_contact'] = $specilaist_data['contact'];
            	$passedReservationDetailsInside['reservation_service'] = $servicedetail_data['ser_name'];
            	$passedReservationDetailsInside['reservation_service_price'] = $service_data['price'];

            	array_push($passedReservationDetails,$passedReservationDetailsInside);

            } else if($current_date_time <= $date_of_booking){
                  $upcomingReservationDetailsInside['reservation_id'] = $booking_id;
            	$upcomingReservationDetailsInside['reservation_date'] = $dateOfBooking;
            	$upcomingReservationDetailsInside['reservation_hour'] = $timeOfBooking;
            	$upcomingReservationDetailsInside['reservation_professionel'] = $specilaist_data['brand_name'];
                  $upcomingReservationDetailsInside['reservation_brand_logo'] = SPECIALIST_IMAGE_PATH.$specilaist_data['brand_logo'];
            	$upcomingReservationDetailsInside['reservation_address'] = $specilaist_data['address'];
            	$upcomingReservationDetailsInside['reservation_contact'] = $specilaist_data['contact'];
            	$upcomingReservationDetailsInside['reservation_service'] = $servicedetail_data['ser_name'];
            	$upcomingReservationDetailsInside['reservation_service_price'] = $service_data['price'];

            	array_push($upcomingReservationDetails,$upcomingReservationDetailsInside);

            }
            $datatext['status'] = true;
			$datatext['message'] = "Successfully  Reservation Listed.";
			$reservationListDetails ['upcomingReservationDetails'] = $upcomingReservationDetails;
			$reservationListDetails ['passedReservationDetails'] = $passedReservationDetails;
			$logParameters = array(
				"Request_Remote_Address" => $remoteAddress,
				"Requested_Page" => 'my_reservation_list',
				"Request_Method" => $requestType,
				"Request_Sent_From" => $deviceType,
				"Requested_Date_Time" => date('Y-m-d h:i:s'),
				"Request_Status" => 'failed',
				"Actual_Data_Received" => $json,
				"Data_Responded" => $reservationListDetails
			);
			$logs->create_log($logParameters,'customer');
			$datatext['details'] = $reservationListDetails;
    }
} else {
	$datatext['status'] = false;
	$datatext['message'] = "No Reservation Found.";
	$logParameters = array(
			"Request_Remote_Address" => $remoteAddress,
			"Requested_Page" => 'my_reservations',
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