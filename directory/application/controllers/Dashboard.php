<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
function __construct()
	{
	  parent::__construct();
	   if(!$this->session->userdata('email'))
	  {
	     redirect('admin');
	  }
	  $this->load->model('regmode');
	   $this->load->database();
	}
	
	
	public function index()
	{
		$this->load->view('admin/dashboard');
	}
	public function specialist()
	{
		$this->load->view('specialist/dashboard_specialist');
	}
	
	public function category()
	{
		//$this->load->view('admin/category');
		
		
	   $this->load->view('admin/header');
	   $data['res']=$this->regmode->show_enquiry();
	   $this->load->view('admin/category',$data);
	   $this->load->view('admin/footer');
	   
	}
	
	
	public function add_category()
	{
		
	   // $this->form_validation->set_rules('name','name','required');
		
		//$this->load->view('admin/add_category');
		{
	   
	   $this->form_validation->set_rules('name','name','required');
	  
	   
	   
			if($this->form_validation->run()==FALSE)
			{
			  $this->load->view('admin/header');
			  $this->load->view('admin/add_category');
			  $this->load->view('admin/footer');
			}
			else
			{
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('userfile'))
				{
					$error = array('error' => $this->upload->display_errors());
					//print_r($error);
				}
				else
				{
					$img_data = $this->upload->data();
					$file_name = $img_data['file_name'];
					$arr = array(
								'name' 	=> $this->input->post('name'),
							    'logo'		=> $file_name,
								
							);
					$this->regmode->insert_data('category',$arr);
				}
			} 
		 
		}
		
		
	}
	
	
	public function user()
	{
		$this->load->view('admin/user');
	}
	function find_Data($id)
	{
	 $this->load->view('admin/header');
	 $data['res']=$this->regmode->find_enquiry($id);
	 $this->load->view('admin/edit_category',$data);
	 $this->load->view('admin/footer');
	}
	function update_enquiry()
	 {
	 	
		         $file_name ="";
		         $config['upload_path'] = './uploads/';
				
		       	$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
                
				if ( ! $this->upload->do_upload('logo'))
				{   
                    $error = array('error' => $this->upload->display_errors());
			     }else
				{     

					$img_data = $this->upload->data();
					$file_name = $img_data['file_name'];
					if(!empty($file_name)){
					
					$this->regmode->update_image($this->input->post('cat_id'),$file_name);
					}
			     }
          
				
			$this->regmode->update_reg($this->input->post('cat_id'),$this->input->post('name'));
	
	 }
  function delete_Data($id)
         {
		
	          $this->regmode->delete_enquiry($id);
         }
  
  function logout()
	{
	    $this->session->sess_destroy();
		redirect('admin');
		
	}
	
}
?>