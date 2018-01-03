<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller {
	function __construct(){
	    parent::__construct();
		if(!$this->session->userdata('email')){
	    	redirect('specialist_login');
	    }
	    	$this->load->model('servicesmode');
	    	$this->load->database();
	}
	
	public function index(){
  $data['res']=$this->servicesmode->show_enquiry($this->session->userdata('id'));
  // print_r($data);exit;
     $this->load->view('specialist/services',$data);      
 }
	
	public function add_services(){
			$data_spe['res_spe']=$this->servicesmode->show_specialist();
			 $data_spe['cat']=$this->servicesmode->show_cat($this->session->userdata('id'));
		
			
			$data_spe['res']=$this->servicesmode->show_serviceSpecialist($this->session->userdata('id'));
			$data_spe['ser']=$this->servicesmode->showService();
			$data_spe['res_wor']=$this->servicesmode->show_workerlist($this->session->userdata('id'));
			$this->load->view('specialist/add_services',$data_spe);
		
	} 
	function addServices(){
		date_default_timezone_set('Asia/Calcutta');
			$date=date('d.m.y h:i');
			// for($i=0; $i < count($this->input->post('ser')); $i++){
			 $id=$this->session->userdata('id');
		     $price= $this->input->post('price');
		     $time	= $this->input->post('time');
		     $ser = $this->input->post('ser');
		     $created_date	= $date;
			 $data['res']=$this->servicesmode->checkService($this->session->userdata('id'),$ser);
			 if ($data) {
			 	// echo"dlt then insert";exit;
			 $data['res']=$this->servicesmode->dltService($this->session->userdata('id'),$ser);
			 $data['res1']=$this->servicesmode->insertService($id,$price,$time,$ser);
			 }
			 else{
			 	// echo"insert";exit;
			 $data['res1']=$this->servicesmode->insertService($id,$price,$time,$ser);
			 }
		}
		function update_enquiry(){ 
			$id=$this->session->userdata('id');    
	       $ser=$this->input->post('ser'); 
		   $price= $this->input->post('price');
		   $time= $this->input->post('time');
		   $data['res']=$this->servicesmode->checkService($id,$ser);
		 if ($data) {
			 $data['res']=$this->servicesmode->dltService($id,$ser);
			 $data['res1']=$this->servicesmode->updateService($id,$price,$time,$ser);
			 }
			 else{
			 $data['res1']=$this->servicesmode->updateService($id,$price,$time,$ser);
			 }
        }	 
	function find_Data($id){
	  $data['spe']=$this->servicesmode->show_service($id);
	  $data['ser']=$this->servicesmode->showService();
	  $this->load->view('specialist/edit_services',$data);
	 }
	function delete_sp($id){
		$this->servicesmode->delete_sp($id);
    }
	
	function delete_Data($id){
		$this->servicesmode->delete_enquiry($id);
    }
	
	public function add_booking(){
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

	$arr = array(
	'title' 	    => $this->input->post('title'),
	'booked_by' 	=> $this->input->post('booked_by'),
	'booked_date' 	=> $this->input->post('booked_date'),

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

function subcatdetail($cat_id){
			$data=$this->servicesmode->subCat($cat_id);
			// print_r($data);die;
		 foreach($data as $row)
            { 
       ?>
       <option value="<?php echo $row->subcat_id; ?>"><?php echo $row->subcat_name; ?></option>
        <?php }
	}	
	function serviceDetail($id){
			$data=$this->servicesmode->getService($id);
			// print_r($data);die;
		 foreach($data as $row)
            { 
       ?>
       <option value="<?php echo $row->ser_detail_id; ?>"><?php echo $row->ser_name; ?></option>
        <?php }
	}	
}