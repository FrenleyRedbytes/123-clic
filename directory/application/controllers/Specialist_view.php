<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specialist_view extends CI_Controller{
	function __construct(){
	  		parent::__construct();
	    if(!$this->session->userdata('email')){
	    	redirect('specialist_login');
	  	}	
	   		$this->load->database();
	}

	function index(){
	  $this->load->view('specialist/dashboard_specialist');
    }	
 }
?>