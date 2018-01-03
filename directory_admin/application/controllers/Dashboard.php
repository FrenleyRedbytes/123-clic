<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	function __construct(){
	  		parent::__construct();
	    if(!$this->session->userdata('email')) {
	       redirect('admin');
	    }
	  		$this->load->model('regmode');
	   		$this->load->database();
	}	
	
	public function index()
	{
		$this->load->view('admin/dashboard');
	}
	
	public function category()
	{
		$data['res']=$this->regmode->show_enquiry();
		$this->load->view('admin/category',$data);	   
	}

	public function add_category(){
	   $this->form_validation->set_rules('name','name','required');

	   	if($this->form_validation->run()==FALSE){			 
			  $this->load->view('admin/add_category');		
			}
			else{		        
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('userfile')){
					$error = array('error' => $this->upload->display_errors());
				}
				else{
					$img_data = $this->upload->data();
					$file_name = $img_data['file_name'];
				}
				if ( ! $this->upload->do_upload('userfile1')){
					$error1 = array('error' => $this->upload->display_errors());
				}
				else{
					$img_data1 = $this->upload->data();
					$file_name1 = $img_data1['file_name'];
				}
				$arr = array(
					'name' 	=> $this->input->post('name'),
					'logo'		=> $file_name,
					'logo1'		=> $file_name1,
				);
				// print_r($arr);
					$this->regmode->insert_data('category',$arr);
			}
	} 

	function find_Data($id){

	 	$data['res']=$this->regmode->find_enquiry($id);
	 	$this->load->view('admin/edit_category',$data);
	}

	function update_enquiry(){
			$file_name ="";
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('userfile'))
			{   
				 $file_name=$this->input->post('abc1');
			}
			else{   
					$img_data = $this->upload->data();
					$file_name = $img_data['file_name'];
			}	
			if (! $this->upload->do_upload('userfile1'))
			{   
				// $error1 = array('error' => $this->upload->display_errors());
				 $file_name1=$this->input->post('abc');
			}
			else{   
					$img_data1 = $this->upload->data();
					$file_name1 = $img_data1['file_name'];
			}	
			$this->regmode->update_reg($this->input->post('cat_id'),$this->input->post('icon'),$this->input->post('name'),$file_name,$file_name1);
	 }


  	function delete_Data($id){		
	          $this->regmode->delete_enquiry($id);
    }
  
  	function logout(){
	    $this->session->sess_destroy();
		redirect('admin');
	}
	
}
?>