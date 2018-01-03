<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Specialist extends CI_Controller {
	function __construct(){
	    	parent::__construct();
	    	date_default_timezone_set('Europe/Berlin');
		if(!$this->session->userdata('email')){
	    	redirect('admin');
	  	}
	    	$this->load->model('specmode');
	    	$this->load->database();
	}
	
	public function index(){
	   $data['res']=$this->specmode->show_enquiry();
	   $this->load->view('admin/specialist',$data);	   
	}
	public function showData($id){
	   $data['res']=$this->specmode->showListOfWorker($id);
	   $data['res1']=$this->specmode->showListOfService($id);
	   $data['res2']=$this->specmode->showListOfBooking($id);
	   $this->load->view('admin/showSpecialist',$data);	   
	}
	
	public function detailview(){
		$subcat=$this->input->post('subcat');
		$data['subcatid']=$this->specmode->find_enquiry1($subcat);
		echo '<option value="">Select Sub-Category</option>';
		foreach($data['subcatid'] as $row_spe){?>             
              <option value="<?php echo $row_spe['subcat_id'];?>"><?php echo $row_spe['subcat_name'];?></option>
       <?php }
	}
		public function detailview2(){
		$subcat2=$this->input->post('subcat2');
		$data['subcat2id']=$this->specmode->find_enquiry1($subcat2);
		echo '<option value="">Select Sub-Category</option>';
		foreach($data['subcat2id'] as $row_spe){?>             
              <option value="<?php echo $row_spe['subcat_id'];?>"><?php echo $row_spe['subcat_name'];?></option>
       <?php }
	}
	public function add_specialist(){
	   // $this->form_validation->set_rules('brand_name','brand_name','required');
	   // $this->form_validation->set_rules('contact_name','contact_name','required');
	   // $this->form_validation->set_rules('email','email','required|valid_email|is_unique[specialist.email]');
	   $this->form_validation->set_rules('password','password','required');
	   	if($this->form_validation->run()==FALSE){
	   		$data['cat']=$this->specmode->show_category();
	   		$data['subcat']=$this->specmode->show_subcategory();
			$data['cat2']=$this->specmode->show_category();
	   		$data['subcat2']=$this->specmode->show_subcategory();
			  $this->load->view('admin/add_specialist',$data);
			}
			else{		        
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('brand_logo')){
					$error = array('error' => $this->upload->display_errors());
				}
				else{
					$img_data = $this->upload->data();
					$file_name = $img_data['file_name'];
				}
				if ( ! $this->upload->do_upload('contact_image')){
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				}
				else{
					$img_data1 = $this->upload->data();
					$file_name1 = $img_data1['file_name'];
				}
					$weekend=implode(',',$this->input->post('weekend'));
					$arr = array(
								'cat_id' 	=> $this->input->post('cat'),
								'subcat_id' 	=> $this->input->post('subcat'),
								'cat2_id' 	=> $this->input->post('cat2'),
								'subcat2_id' 	=> $this->input->post('subcat2'),
								'brand_name' 	=> $this->input->post('brand_name'),
								'contact' 	=> $this->input->post('contact'),
								'address' 	=> $this->input->post('address'),
								'disc' 	=> $this->input->post('disc'),
								'address_map' 	=> $this->input->post('address_map'),
								'lat' 	=> $this->input->post('lat'),
								'longt' 	=> $this->input->post('longt'),
								'contact_name' 	=> $this->input->post('contact_name'),
								'email' 	=> $this->input->post('email'),
								'password'	=> $this->input->post('password'),
								'city_name'	=> $this->input->post('city'),
								'zip_code'	=> $this->input->post('zip'),
								'brand_logo'		=> $file_name,
								'contact_image'		=> $file_name1,
								'mon_from_am_time' 	=> $this->input->post('shop_start_time_mon_am'),
								'mon_to_am_time' 	=> $this->input->post('shop_end_time_mon_am'),
								'mon_from_pm_time' 	=> $this->input->post('shop_start_time_mon_pm'),
								'mon_to_pm_time' 	=> $this->input->post('shop_end_time_mon_pm'),
								'tue_from_am_time' 	=> $this->input->post('shop_start_time_tue_am'),
								'tue_to_am_time' 	=> $this->input->post('shop_end_time_tue_am'),
								'tue_from_pm_time' 	=> $this->input->post('shop_start_time_tue_pm'),
								'tue_to_pm_time' 	=> $this->input->post('shop_end_time_tue_pm'),
								'wed_from_am_time' 	=> $this->input->post('shop_start_time_wed_am'),
								'wed_to_am_time' 	=> $this->input->post('shop_end_time_wed_am'),
								'wed_from_pm_time' 	=> $this->input->post('shop_start_time_wed_pm'),
								'wed_to_pm_time' 	=> $this->input->post('shop_end_time_wed_pm'),
								'thu_from_am_time' 	=> $this->input->post('shop_start_time_thu_am'),
								'thu_to_am_time' 	=> $this->input->post('shop_end_time_thu_am'),
								'thu_from_pm_time' 	=> $this->input->post('shop_start_time_thu_pm'),
								'thu_to_pm_time' 	=> $this->input->post('shop_end_time_thu_pm'),
								'fri_from_am_time' 	=> $this->input->post('shop_start_time_fri_am'),
								'fri_to_am_time' 		=> $this->input->post('shop_end_time_fri_am'),
								'fri_from_pm_time' 	=> $this->input->post('shop_start_time_fri_pm'),
								'fri_to_pm_time' 		=> $this->input->post('shop_end_time_fri_pm'),
								'sat_from_am_time' 	=> $this->input->post('shop_start_time_sat_am'),
								'sat_to_am_time' 		=> $this->input->post('shop_end_time_sat_am'),
								'sat_from_pm_time' 	=> $this->input->post('shop_start_time_sat_pm'),
								'sat_to_pm_time' 		=> $this->input->post('shop_end_time_sat_pm'),
								'sun_from_am_time' 	=> $this->input->post('shop_start_time_sun_am'),
								'sun_to_am_time' 	=> $this->input->post('shop_end_time_sun_am'),
								'sun_from_pm_time' 	=> $this->input->post('shop_start_time_sun_pm'),
								'sun_to_pm_time' 	=> $this->input->post('shop_end_time_sun_pm'),
								'weekend' 	=> $weekend,
								
							);
					$this->specmode->insert_data('specialist',$arr);
				}
	} 
	
	function find_Data($id){
		$data['cat']=$this->specmode->show_category();
		$data['subcat']=$this->specmode->show_subcategory();
		$data['cat2']=$this->specmode->show_category();
		$data['subcat2']=$this->specmode->show_subcategory();
		$data['res']=$this->specmode->find_enquiry($id);
	 	$this->load->view('admin/edit_specialist',$data);
	}

	function update_enquiry()
	{
        $file_name ="";
        $file_name1 ="";
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);		
		if ( ! $this->upload->do_upload('brand_logo')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{     
			$img_data = $this->upload->data();
			$file_name = $img_data['file_name'];
			if(!empty($file_name)){			
				$this->specmode->update_imagef($this->input->post('spe_id'),$file_name);
			}
	    }		 
		if ( ! $this->upload->do_upload('contact_image')){
				$error = array('error' => $this->upload->display_errors());
		}
		else{
			$img_data1 = $this->upload->data();
			$file_name1 = $img_data1['file_name'];
			if(!empty($file_name1)){
			$this->specmode->update_images($this->input->post('spe_id'),$file_name1);
			}
		}
			$weekend=implode(',',$this->input->post('weekend'));
			$this->specmode->update_reg($this->input->post('spe_id'),$this->input->post('cat'),$this->input->post('subcat'),$this->input->post('cat2'),$this->input->post('subcat2'),$this->input->post('brand_name'),$this->input->post('contact_name'),$this->input->post('email'),$this->input->post('contact'),$this->input->post('address'),$this->input->post('disc'),$this->input->post('address_map'),$this->input->post('lat'),$this->input->post('longt'),$this->input->post('city'),$this->input->post('zip'),$this->input->post('shop_start_time_mon_am'),$this->input->post('shop_end_time_mon_am'),$this->input->post('shop_start_time_mon_pm'),$this->input->post('shop_end_time_mon_pm'),$this->input->post('shop_start_time_tue_am'),$this->input->post('shop_end_time_tue_am'),$this->input->post('shop_start_time_tue_pm'),$this->input->post('shop_end_time_tue_pm'),$this->input->post('shop_start_time_wed_am'),$this->input->post('shop_end_time_wed_am'),$this->input->post('shop_start_time_wed_pm'),$this->input->post('shop_end_time_wed_pm'),$this->input->post('shop_start_time_thu_am'),$this->input->post('shop_end_time_thu_am'),$this->input->post('shop_start_time_thu_pm'),$this->input->post('shop_end_time_thu_pm'),$this->input->post('shop_start_time_fri_am'),$this->input->post('shop_end_time_fri_am'),$this->input->post('shop_start_time_fri_pm'),$this->input->post('shop_end_time_fri_pm'),$this->input->post('shop_start_time_sat_am'),$this->input->post('shop_end_time_sat_am'),$this->input->post('shop_start_time_sat_pm'),$this->input->post('shop_end_time_sat_pm'),$this->input->post('shop_start_time_sun_am'),$this->input->post('shop_end_time_sun_am'),$this->input->post('shop_start_time_sun_pm'),$this->input->post('shop_end_time_sun_pm'),$weekend);
	    
	}
	     
	function delete_Data($id){
		$this->specmode->delete_enquiry($id);
    }	
    function show_service(){
		$data['ser']=$this->specmode->show_service();
		 $this->load->view('admin/show_service',$data);	
    }
    function service(){
		$data['cat']=$this->specmode->show_category();
		 $this->load->view('admin/service',$data);	
    }
    function add_service(){
		$data['cat']=$this->specmode->show_category();
		 $this->load->view('admin/service',$data);	
		 $result=$this->specmode->insert_service($this->input->post('cat'),$this->input->post('subcat'),$this->input->post('service'));
		 redirect('specialist/show_service');
    }	
    function deleteService($id){
		$this->specmode->deleteService($id);
     	redirect('specialist/show_service');	
    }
    function editService($id){
		$data['cat']=$this->specmode->show_category();
		$data['subcat']=$this->specmode->show_subcategory();
		$data['res']=$this->specmode->editService($id);
		$this->load->view('admin/edit_service',$data);
    }
    function updateService(){
		$data['res']=$this->specmode->updateService($this->input->post('ser_id'),$this->input->post('cat'),$this->input->post('subcat'),$this->input->post('service'));
		redirect('specialist/show_service');
		
	}
    function serAsSpecialist(){
		$data['ser']=$this->specmode->show_serAsSpecialist();
		 $this->load->view('admin/serAsSpecialist',$data);	
    }
    function add_serAsSpecialist(){
		$data['spe']=$this->specmode->show_specialist();
		$data['ser']=$this->specmode->show_service_detail();
		 $this->load->view('admin/add_serAsSpecialist',$data);	
    }
    function add_serviceSpecialist(){
    	for($i=0; $i < count($this->input->post('ser')); $i++){
    		 $i."<br>";
		     $spe = $this->input->post('spe')."<br>";
		     $ser = $this->input->post('ser')[$i]."<br>";
		     $sql = "INSERT INTO service_as_specialist(spe_id,ser_det_id) VALUES('$spe','$ser')";
		     $this-> db-> query($sql);
		    }			
    	redirect('specialist/serAsSpecialist');
    }
    function delete_sp($id){
		$this->specmode->deleteSp($id);
     	redirect('specialist/serAsSpecialist');	
    }
    function edit_sp($id){
		$data['res']=$this->specmode->editSp($id);
		$data['spe']=$this->specmode->show_specialist();
		$data['ser']=$this->specmode->show_service_detail();
		$this->load->view('admin/editSp',$data);
    }
    function updateSpecialist(){
    	 $id=$this->input->post('id');
		for($i=0; $i < count($this->input->post('ser')); $i++){
		    $spe = $this->input->post('spe')."<br>";
		    $ser = $this->input->post('ser')[$i]."<br>";
		    $sql = "update service_as_specialist set spe_id=$spe,ser_det_id=$ser where ser_as_specialist=$id ";
		     $this->db->query($sql);
		    }			
    	redirect('specialist/serAsSpecialist');
		
	}
}