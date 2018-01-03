<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_specialist extends CI_Controller {
	function __construct(){
	  		parent::__construct();
	  		date_default_timezone_set('Europe/Berlin');
	    if(!$this->session->userdata('email')){
	    	redirect('specialist_login');
	  }
	  		$this->load->model('specmode');
	   		$this->load->database();
	}
	public function specialist(){
		$data['list']=$this->specmode->showBookingDetail($this->session->userdata('id'));
		if(empty($data['list'])){
			date_default_timezone_set('Asia/Calcutta');
            $datee=date('Y-m-d');
            $date_time=date(DATE_ISO8601, strtotime($datee));
            $list[] = array('id' =>'','title' =>'No Record','start' =>$date_time);
            $data['list_json']=json_encode($list);
			 $data['res']=$this->specmode->show_bookinglist($this->session->userdata('id'));
			 $this->load->view('specialist/dashboard_specialist',$data);	
		
		}else{
		foreach ($data['list'] as $key ) {
				$date_time=$key->date_booking.' '.$key->time_booking;
				$date_time=date(DATE_ISO8601, strtotime($date_time));
				$list[] = array('id' =>$key->booking_id,'title' =>$key->ser_name,'start' =>$date_time );
				$data['list_json']=json_encode($list);
				$data['res']=$this->specmode->show_bookinglist($this->session->userdata('id'));	
			}
			$this->load->view('specialist/dashboard_specialist',$data);
		}
	}
    function update_bookingstatus(){
    	$a=$this->input->get('aid');
    	$data=$this->specmode->selectUser($a);
    	// print_r($data);exit;
    	$email_to=$data->email;
        $mail   = base64_encode($email_to);
        $email_message = "Email: Your Booking has been accepted.Thank you for Booking.";
        $email_subject="Booking Accepted";
        @mail($email_to, $email_subject, $email_message);
		 $data=$this->specmode->update_status('1',$a);
		 redirect('dashboard_specialist/specialist');
	}
	function update_bookingstatus1(){
    	$a=$this->input->get('did');
    	$data=$this->specmode->selectUser($a);
    	// print_r($data);exit;
    	$email_to=$data->email;
        $mail   = base64_encode($email_to);
        $email_message = "Email: Your Booking has been cancled because of some reason.Thank you for Booking.";
        $email_subject="Booking Cancled";
        @mail($email_to, $email_subject, $email_message); 
		 $data=$this->specmode->deleteBooking($a);
		 // redirect('dashboard_specialist/specialist');
	}
    function logout(){
	    $this->session->sess_destroy();
		redirect('specialist_login');		
	}
}