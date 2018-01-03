<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {

	function __construct()
	{
	   parent::__construct();
	   $this->load->model('regmode');
	   $this->load->database();
	}
	
	function index()
	{
	  $this->form_validation->set_rules('email','email','required');
	  $this->form_validation->set_rules('password','password','required');
	    if($this->form_validation->run()==FALSE)
		{
	   $this->load->view('admin/header');
	   $this->load->view('admin/index');
	   $this->load->view('admin/footer');
	   }
	   else {
	        $this->regmode->logindata($this->input->post('email'),md5($this->input->post('password')));		
	  }
	}
}	
?>