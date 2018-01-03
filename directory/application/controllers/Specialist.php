<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Specialist extends CI_Controller {
function __construct()
	{
	    parent::__construct();
		if(!$this->session->userdata('email'))
	  {
	     redirect('admin');
	  }
	    $this->load->model('specmode');
	    $this->load->database();
	}
	
	public function index()
	{
	   $data['res']=$this->specmode->show_enquiry();
	   $this->load->view('admin/specialist',$data);	   
	}
	
	public function add_specialist()
	{
	   $this->form_validation->set_rules('brand_name','brand_name','required');
	   $this->form_validation->set_rules('contact_name','contact_name','required');
	   $this->form_validation->set_rules('email','email','required|valid_email');
	   $this->form_validation->set_rules('password','password','required');
	   	if($this->form_validation->run()==FALSE)
			{
			  $this->load->view('admin/header');
			  $this->load->view('admin/add_specialist');
			  $this->load->view('admin/footer');
			}
			else
			{		        
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('brand_logo'))
				{
					$error = array('error' => $this->upload->display_errors());
					//print_r($error);
				}
				else
				{
					$img_data = $this->upload->data();
					$file_name = $img_data['file_name'];
				}
				if ( ! $this->upload->do_upload('contact_image'))
				{
					$error = array('error' => $this->upload->display_errors());
					////print_r($error);
				}
				else
				{
					$img_data1 = $this->upload->data();
					$file_name1 = $img_data1['file_name'];
				}
						$arr = array(
								'brand_name' 	=> $this->input->post('brand_name'),
								'contact_name' 	=> $this->input->post('contact_name'),
								'email' 	=> $this->input->post('email'),
								'password'	=> $this->input->post('password'),
								'brand_logo'		=> $file_name,
								'contact_image'		=> $file_name1,
							);
					$this->specmode->insert_data('specialist',$arr);
				}
			} 
		 
		
	
	
	
	
	function find_Data($id)
	{
	 $this->load->view('admin/header');
	 $data['res']=$this->specmode->find_enquiry($id);
	 $this->load->view('admin/edit_specialist',$data);
	 $this->load->view('admin/footer');
	}
	function update_enquiry()
	{
                 //die("kkfsdd");

	            $file_name ="";
	            $file_name1 ="";
		        $config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('brand_logo'))
				{
					 //die("kkfsddmukurur");			
					$error = array('error' => $this->upload->display_errors());
					//print_r($error);
				}
				else
				{     

					$img_data = $this->upload->data();
					$file_name = $img_data['file_name'];
					if(!empty($file_name)){
					
					$this->specmode->update_imagef($this->input->post('spe_id'),$file_name);
					}
			     }
				 
				 
				 if ( ! $this->upload->do_upload('contact_image'))
				{
					$error = array('error' => $this->upload->display_errors());
					////print_r($error);
				}
				else
				{
					$img_data1 = $this->upload->data();
					$file_name1 = $img_data1['file_name'];
					if(!empty($file_name1)){
					
					$this->specmode->update_images($this->input->post('spe_id'),$file_name1);
					}
				}
		 
		 
		
		 $this->specmode->update_reg($this->input->post('spe_id'),$this->input->post('brand_name'),$this->input->post('contact_name'),$this->input->post('email'));
	    
	 }
	     
	 
	 function delete_Data($id)
	{
	$this->specmode->delete_enquiry($id);
    }
	
public function add_booking()
	{
		//echo"hello";
		//die;
	   
	  
	   $this->form_validation->set_rules('title','title','required');
	   $this->form_validation->set_rules('booked_by','booked_by','required');
	   $this->form_validation->set_rules('booked_date','booked_date','required');
	   
	      if($this->form_validation->run()==FALSE)
			{
			  $this->load->view('admin/header');
			  $this->load->view('admin/add_booking');
			  $this->load->view('admin/footer');
			}
			   else{ 
			                //echo  $this->input->post('specialist_type');
							//die;
			      
				           $arr = array(
								'title' 	    => $this->input->post('title'),
								'booked_by' 	=> $this->input->post('booked_by'),
								'booked_date' 	=> $this->input->post('booked_date'),
							  'specialist_type' 	=> $this->input->post('specialist_type'),
							);
					$this->specmode->insert_data('add_booking',$arr);
				}
				}


 public function show_worker()
	{
		
	   $this->load->view('admin/header');
	   $data['res']=$this->specmode->show_workerlist();
	   $this->load->view('admin/workerlist',$data);
	   $this->load->view('admin/footer');
	   
	}

public function add_worker()
	{
	   
	   $this->form_validation->set_rules('first_name','first_name','required');
	   $this->form_validation->set_rules('last_name','last_name','required');
	   $this->form_validation->set_rules('address','address','required');
	   $this->form_validation->set_rules('city','city','required');
	   $this->form_validation->set_rules('mobile','mobile','required');
	   $this->form_validation->set_rules('email','email','required');
	   $this->form_validation->set_rules('join_date','join_date','required');
	   $this->form_validation->set_rules('work_time','work_time','required');
	   
			if($this->form_validation->run()==FALSE)
			{
			  $this->load->view('admin/header');
			  $this->load->view('admin/add_worker');
			  $this->load->view('admin/footer');
			}
			else
			{   
		        
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('image'))
				{
					$error = array('error' => $this->upload->display_errors());
					//print_r($error);
				}
				else
				{
					$img_data = $this->upload->data();
					$file_name = $img_data['file_name'];
				}

					           $arr = array(
								'first_name' 	=> $this->input->post('first_name'),
								'last_name' 	=> $this->input->post('last_name'),
								'address' 	    => $this->input->post('address'),
								'city'	        => $this->input->post('city'),
								'mobile' 	    => $this->input->post('mobile'),
								'email' 	    => $this->input->post('email'),
								'join_date' 	=> $this->input->post('join_date'),
								'work_time' 	=> $this->input->post('work_time'),
								'image'		    => $file_name,
								);
					$this->specmode->insert_data('worker',$arr);
				}
			} 
		 

	function work_Data($id)
	{
	   $this->load->view('admin/header');
	   $data['res']=$this->specmode->worker_enquiry($id);
	   $this->load->view('admin/edit_workerlist',$data);
	   $this->load->view('admin/footer');
	}

function update_workerlist()
	{
                 //die("kkfsdd");

	            $file_name ="";
	            $config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);			
				
				if ( ! $this->upload->do_upload('image'))
				{
					 //die("kkfsddmukurur");			
					$error = array('error' => $this->upload->display_errors());
					//print_r($error);
				}
				else
				{     

					$img_data = $this->upload->data();
					$file_name = $img_data['file_name'];
					if(!empty($file_name)){
					
					$this->specmode->update_workimage($this->input->post('work_id'),$file_name);
					}
			     }

		   $this->specmode->update_workreg($this->input->post('work_id'),$this->input->post('first_name'),$this->input->post('last_name'),$this->input->post('address'),$this->input->post('city'),
		 	$this->input->post('mobile'),$this->input->post('email'));
	    
	 }
	     
 function delete_workerdata($id)
	{
	$this->specmode->delete_workerenquiry($id);
    }



	
}	
?>	
	