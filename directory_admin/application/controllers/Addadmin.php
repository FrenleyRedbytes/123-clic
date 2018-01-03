<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Addadmin extends CI_Controller {
	function __construct(){
	  		parent::__construct();
	    if(!$this->session->userdata('email')){
	     redirect('admin');
	 	}
	  	$this->load->model('adminmode');
	   	$this->load->database();
	}
	
	public function index(){
	   $data['res']=$this->adminmode->show_enquiry();
	   $this->load->view('admin/admin',$data);
	}
	
	public function add_admin(){   
	    	$this->form_validation->set_rules('name','name','required');
	    	$this->form_validation->set_rules('password','password','required');
	   		$this->form_validation->set_rules('email','email','required|valid_email|is_unique[admin.email]'); 	   
		if($this->form_validation->run()==FALSE){
		    $this->load->view('admin/header');
		    $this->load->view('admin/add_admin');
		    $this->load->view('admin/footer');
		}
		else{
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('image')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$img_data = $this->upload->data();
				$file_name = $img_data['file_name'];
			}
				$arr = array(
							'name' 	=> $this->input->post('name'),
							'image' => $file_name,
						    'password' 	=> $this->input->post('password'),
							'email' 	=> $this->input->post('email'),
						);
				$this->adminmode->insert_data('admin',$arr);
		}
	}
	
	
	function find_Data($id){
	 	$data['res']=$this->adminmode->find_enquiry($id);
	 	$this->load->view('admin/edit_admin',$data);
	}

	function update_enquiry(){
        	$file_name ="";
        	$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);				
		if ( ! $this->upload->do_upload('image')){
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{  
			$img_data = $this->upload->data();
			$file_name = $img_data['file_name'];
			if(!empty($file_name)){					
					$this->adminmode->update_image($this->input->post('id'),$file_name);
			}	
		}
			$this->adminmode->update_reg($this->input->post('id'),$this->input->post('name'),$this->input->post('email'));
	}

	function delete_Data($id){
		$this->adminmode->delete_enquiry($id);
  	}
	
	function profile(){
		
	    $data['res']=$this->adminmode->show_profile();
	    $this->load->view('admin/profile',$data);
	}

	function change_password(){
	    $data['res']=$this->adminmode->find_password();
	    $this->load->view('admin/edit_password',$data);
	}

 	function change_pass(){
	     $this->form_validation->set_rules ( "password", "Password", "required" );
         $this->form_validation->set_rules ( "newpassword", "New Password", "trim|required|matches[repassword]" );
         $this->form_validation->set_rules ( "repassword", "Confirm Password", "trim|required" );
	    if($this->form_validation->run()==FALSE){
	   		$this->load->view('admin/edit_password');
	    }
	   else{
	   	    $this->load->model('regmode');
	        $this->regmode->update_pass($this->input->post('newpassword'));			
	    }
	}
}	
	