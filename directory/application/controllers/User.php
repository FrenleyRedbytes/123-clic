<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
function __construct()
	{
	  parent::__construct();
	  if(!$this->session->userdata('email'))
	  {
	     redirect('admin');
	  }
	  $this->load->model('usermode');
	   $this->load->database();
	}
	
	public function index()
	{
		//$this->load->view('admin/category');
		
		
	   $this->load->view('admin/header');
	   $data['res']=$this->usermode->show_enquiry();
	   $this->load->view('admin/user',$data);
	   $this->load->view('admin/footer');
	   
	}
	
	public function add_user()
	{   
	    $this->form_validation->set_rules('name','name','required');
	    $this->form_validation->set_rules('password','password','required');
	    $this->form_validation->set_rules('mobile','mobile','required');
	    $this->form_validation->set_rules('email','email','required');
	 
	   
			if($this->form_validation->run()==FALSE)
			{
			  $this->load->view('admin/header');
			  $this->load->view('admin/add_user');
			  $this->load->view('admin/footer');
			}
			else
			{
				
					$arr = array(
								'name'   	=>     $this->input->post('name'),
							    'password' 	=> $this->input->post('password'),
								'mobile' 	=> $this->input->post('mobile'),
								'email' 	=> $this->input->post('email'),
							);
					$this->usermode->insert_data('register',$arr);
				}
			
		 
		}
		
		
	
	
	
	
	function find_Data($id)
	{
	 $this->load->view('admin/header');
	 $data['res']=$this->usermode->find_enquiry($id);
	 $this->load->view('admin/edit_user',$data);
	 $this->load->view('admin/footer');
	}
	function update_enquiry()
	 {
	     $this->usermode->update_reg($this->input->post('id'),$this->input->post('name'),$this->input->post('mobile'),$this->input->post('email'));
	 }
	 function delete_Data($id)
	{
	$this->usermode->delete_enquiry($id);
  }
	
	
}	
?>	
	