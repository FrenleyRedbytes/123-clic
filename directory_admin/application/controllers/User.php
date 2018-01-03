<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	function __construct(){
			parent::__construct();
		if(!$this->session->userdata('email')){
		  redirect('admin');
		}
			$this->load->model('usermode');
			$this->load->database();
	}
	
	public function index(){
		$data['res']=$this->usermode->show_enquiry();
		$this->load->view('admin/user',$data);
	}
	public function add_userr(){
		$this->load->view('admin/add_user');
	}
	
	public function add_user(){   
	    	$arr = array(
						'name'   	=> $this->input->post('name'),
					    'password' 	=> $this->input->post('password'),
						'mobile' 	=> $this->input->post('mobile'),
						'zip_code' 	=> $this->input->post('zip_code'),
						'address' 	=> $this->input->post('address'),
						'city' 		=> $this->input->post('city'),
						'email' 	=> $this->input->post('email'),
						);
				$this->usermode->insert_data('register',$arr);
	}
//edit 	
	function find_Data($id){
		$data['res']=$this->usermode->find_enquiry($id);
		$this->load->view('admin/edit_user',$data);
	}
	//showDetail
	function showDetail($id){
		// echo $id;die;
		$data['res']=$this->usermode->showDetail($id);
		$data['res1']=$this->usermode->showBooking($id);
		$data['res2']=$this->usermode->showFav($id);
		$this->load->view('admin/show_user',$data);
	}
	
	function update_enquiry(){
	     $this->usermode->update_reg(
	     	    $this->input->post('id'),
	     	    $this->input->post('name'),
	     	    $this->input->post('mobile'),
	     	    $this->input->post('zip_code'),
	     	    $this->input->post('address'),
	     	    $this->input->post('city'),
	     	    $this->input->post('email')
	     	    );
	 }

	function delete_Data($id){
		$this->usermode->delete_enquiry($id);
  	}
}