<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subcategory extends CI_Controller {
	function __construct(){
	  		parent::__construct();
	    if(!$this->session->userdata('email')){
	     redirect('admin');
	 	}
	  	$this->load->model('SubcategoryModel');
	   	$this->load->database();
	}
	
	public function index(){
	   $data['res']=$this->SubcategoryModel->show_enquiry();
	   $this->load->view('admin/subcategory',$data);
	}
	public function addSubcat(){
	   $data['cat']=$this->SubcategoryModel->show_category();
		    $this->load->view('admin/add_subcat',$data);
	}
	
	public function add_subcat(){   
	    	$this->form_validation->set_rules('subcat_name','subcat_name','required');	   			   
		if($this->form_validation->run()==FALSE){
			$data['cat']=$this->SubcategoryModel->show_category();
		    $this->load->view('admin/add_subcat',$data);
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
							'cat_id' 	=> $this->input->post('cat'),
						    'subcat_name' 	=> $this->input->post('subcat_name'),
						    'logos'		=> $file_name,
						    'logos1'    => $file_name1,
						);
			
				$this->SubcategoryModel->insert_data('subcategory',$arr);				
			}
				
	}
	function find_Data($id){
		$data['cat']=$this->SubcategoryModel->show_category();
	 	$data['res']=$this->SubcategoryModel->find_enquiry($id);
	 	$this->load->view('admin/edit_subcategory',$data);
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
			$this->SubcategoryModel->update_reg(
												$this->input->post('id'),
												$this->input->post('cat'),
												$this->input->post('subcat_name'),
												$file_name,
												$file_name1);
	}

	function delete_Data($id){
		$this->SubcategoryModel->delete_enquiry($id);
  	}
}