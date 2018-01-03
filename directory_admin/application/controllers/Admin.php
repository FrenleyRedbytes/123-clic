<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('regmode');
		$this->load->database();
	}
	function index(){
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/index');
		}
		else{
			$result=$this->regmode->logindata($this->input->post('email') , $this->input->post('password'));
			if($result){
				$res=array(
					'email' => $result->email,
					'name' => $result->name
					);
			// print_r($res);
					$this->session->set_userdata($res);
					$this->load->view('admin/dashboard');
			}else{
				
				$this->load->view('admin/index');
			}
			}
	}
}
