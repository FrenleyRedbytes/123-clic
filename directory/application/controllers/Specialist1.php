<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Specialist1 extends CI_Controller{
	function __construct(){
	    	parent::__construct();
		if(!$this->session->userdata('email')){
	     	redirect('admin');
	    }
	   		$this->load->model('specmode');
	   		$this->load->database();
	}
	
	public function index(){
	    $data['res']=$this->specmode->show_workerlist($this->session->userdata('id'));
	   $this->load->view('specialist/workerlist',$data);
	}	

	public function add_worker(){
			   $data['ser']=$this->specmode->show_service($this->session->userdata('id'));
			   $data['cat']=$this->specmode->show_category();
			  $this->load->view('specialist/add_worker',$data);
	} 
	function addWorker(){
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
				$serv_day1=$this->input->post('day');
				if (empty($serv_day1)) {
					$allday='';
				}else{
					
				$allday=implode(',', $serv_day1);
				}
				$user_id=$this->session->userdata('id');
                $arr = array(
					'first_name' 	=> $this->input->post('first_name'),
					'last_name' 	=> $this->input->post('last_name'),
					'spe_id'=>$user_id,
					'mobile' 	    => $this->input->post('mobile'),
					'email' 	    => $this->input->post('email'),
					'day' 	    	=> $allday,
					'mon_from_time_am' 	=> $this->input->post('mon_from_time_am'),
					'mon_to_time_am' 	=> $this->input->post('mon_to_time_am'),
					'mon_from_time_pm' 	=> $this->input->post('mon_from_time_pm'),
					'mon_to_time_pm' 	=> $this->input->post('mon_to_time_pm'),
					'tue_from_time_am' 	=> $this->input->post('tue_from_time_am'),
					'tue_to_time_am' 	=> $this->input->post('tue_to_time_am'),
					'tue_from_time_pm' 	=> $this->input->post('tue_from_time_pm'),
					'tue_to_time_pm' 	=> $this->input->post('tue_to_time_pm'),
					'wed_from_time_am' 	=> $this->input->post('wed_from_time_am'),
					'wed_to_time_am' 	=> $this->input->post('wed_to_time_am'),
					'wed_from_time_pm' 	=> $this->input->post('wed_from_time_pm'),
					'wed_to_time_pm' 	=> $this->input->post('wed_to_time_pm'),
					'thu_from_time_am' 	=> $this->input->post('thu_from_time_am'),
					'thu_to_time_am' 	=> $this->input->post('thu_to_time_am'),
					'thu_from_time_pm' 	=> $this->input->post('thu_from_time_pm'),
					'thu_to_time_pm' 	=> $this->input->post('thu_to_time_pm'),
					'fri_from_time_am' 	=> $this->input->post('fri_from_time_am'),
					'fri_to_time_am' 	=> $this->input->post('fri_to_time_am'),
					'fri_from_time_pm' 	=> $this->input->post('fri_from_time_pm'),
					'fri_to_time_pm' 	=> $this->input->post('fri_to_time_pm'),
					'sat_from_time_am' 	=> $this->input->post('sat_from_time_am'),
					'sat_to_time_am' 	=> $this->input->post('sat_to_time_am'),
					'sat_from_time_pm' 	=> $this->input->post('sat_from_time_pm'),
					'sat_to_time_pm' 	=> $this->input->post('sat_to_time_pm'),
					'sun_from_time_am' 	=> $this->input->post('sun_from_time_am'),
					'sun_to_time_am' 	=> $this->input->post('sun_to_time_am'),
					'sun_from_time_pm' 	=> $this->input->post('sun_from_time_pm'),
					'sun_to_time_pm' 	=> $this->input->post('sun_to_time_pm'),
					// // 'day_leave' 	=> $allday_leave,
					// 'day_leave_start' 	=> $this->input->post('day_leave_start'),
					// 'day_leave_end' 	=> $this->input->post('day_leave_end'),
					// 'join_date' 	=> $this->input->post('join_date'),
					// 'work_time' 	=> $this->input->post('work_time'),
				
					);
				$this->specmode->insert_data('worker',$arr);
				  $lastid = $this->db->insert_id();

				for($j=0; $j<count($_POST['service']); $j++){
					$service = $_POST['service'][$j];
					$sql = "INSERT INTO worker_service(worker_service_id,service_id) VALUES('$lastid','$service')";
					$this->db-> query($sql);
				}  
				for($i=0; $i < count($_POST['day_leave_start']); $i++){
					$day_leave_start1 = $_POST['day_leave_start'][$i];
					$day_leave_end1 = $_POST['day_leave_end'][$i];
					$sql = "INSERT INTO worker_holiday(worker_id,day_leave_start,day_leave_end) VALUES('$lastid','$day_leave_start1','$day_leave_end1')";
					$this->db-> query($sql);
				}  
				redirect('specialist1');
	}
	public function add_worker_holliday1(){
		$this->load->view('specialist/add_worker_holiday');	
	}
	public function add_worker_service($id){
		$data['da']=$this->specmode->show_service1($id);
		// print_r($data);exit;
		$this->load->view('specialist/add_worker_service',$data);	
	}
	public function add_worker_service1(){
		for($j=0; $j<count($_POST['service']); $j++){
					$service = $_POST['service'][$j];
					$id= $_POST['serv'];
					$sql = "INSERT INTO worker_service(worker_service_id,service_id) VALUES('$id','$service')";
					$this->db-> query($sql);
				}
				redirect('specialist1');	
	}
	public function add_worker_holliday(){

			for($i=0; $i < count($_POST['day_leave_start'])-1; $i++){
					$day_leave_start1 = $_POST['day_leave_start'][$i];
					 $day_leave_end1 = $_POST['day_leave_end'][$i];
					 $sql = "INSERT INTO worker_holiday(worker_id,day_leave_start,day_leave_end) VALUES('17','$day_leave_start1','$day_leave_end1')";
					
					$this->db->query($sql);
				}  		
				 	redirect('specialist1');
	}

	function work_Data($id){
		// echo $id;exit;
		$data['row']=$this->specmode->getServices($id);
		$data['ser']=$this->specmode->show_service($this->session->userdata('id'));
		$data['res']=$this->specmode->worker_enquiry($id);
		$data['cat']=$this->specmode->show_category($id);
		$data['worker_holiday']=$this->specmode->holiday($id);
		$data['subcat']=$this->specmode->show_subcategory($id);
		$data['service']=$this->specmode->service($id);
		$this->load->view('specialist/edit_workerlist',$data);
	}

	function update_workerlist(){                
			//$file_name ="";
			//$config['upload_path'] = './uploads/';
			//$config['allowed_types'] = 'gif|jpg|png';
			//$this->load->library('upload', $config);		
		//if ( ! $this->upload->do_upload('image')){
		//	$error = array('error' => $this->upload->display_errors());
		//}
		//else{    
		//		$img_data = $this->upload->data();
		//		$file_name = $img_data['file_name'];
		//	if(!empty($file_name)){
		//		$this->specmode->update_workimage($this->input->post('work_id'),$file_name);
		//	}
		//}
		
		$serv_day1=$this->input->post('day');
		
		$del=$this->specmode->editServices($this->input->post('work_id'));
		if($del){
			$id=$this->input->post('work_id');
			// echo count($_POST['service']);exit;
			for($j=0; $j<count($_POST['service']); $j++){
					$service = $_POST['service'][$j];
					$sql = "INSERT INTO worker_service(worker_service_id,service_id) VALUES('$id','$service')";
					$this->db-> query($sql);
				}
		}
		$allday=implode(',', $serv_day1);
		$this->specmode->update_workreg(
			$this->input->post('work_id'),
			$this->input->post('first_name'),
			$this->input->post('last_name'),
			//$this->input->post('address'),
			//$this->input->post('city'),
			$this->input->post('mobile'),
			$this->input->post('email'),
			//$this->input->post('cat'),
			//$this->input->post('subcat'),
			$allday,
			$this->input->post('mon_from_time_am'),
			$this->input->post('mon_to_time_am'),
			$this->input->post('mon_from_time_pm'),
			$this->input->post('mon_to_time_pm'),
			$this->input->post('tue_from_time_am'),
			$this->input->post('tue_to_time_am'),
			$this->input->post('tue_from_time_pm'),
			$this->input->post('tue_to_time_pm'),
			$this->input->post('wed_from_time_am'),
			$this->input->post('wed_to_time_am'),
			$this->input->post('wed_from_time_pm'),
			$this->input->post('wed_to_time_pm'),
			$this->input->post('thu_from_time_am'),
			$this->input->post('thu_to_time_am'),
			$this->input->post('thu_from_time_pm'),
			$this->input->post('thu_to_time_pm'),
			$this->input->post('fri_from_time_am'),
			$this->input->post('fri_to_time_am'),
			$this->input->post('fri_from_time_pm'),
			$this->input->post('fri_to_time_pm'),
			$this->input->post('sat_from_time_am'),
			$this->input->post('sat_to_time_am'),
			$this->input->post('sat_from_time_pm'),
			$this->input->post('sat_to_time_pm'),
			$this->input->post('sun_from_time_am'),
			$this->input->post('sun_to_time_am'),
			$this->input->post('sun_from_time_pm'),
			$this->input->post('sun_to_time_pm'),
			// 'day_leave' 	=> $allday_leave,
			$this->input->post('day_leave_start'),
			$this->input->post('day_leave_end')
			// 'join_date' 	=> $this->input->post('join_date'),
			// 'work_time' 	=> $this->input->post('work_time'),
			//$file_name
			);
	}

	function delete_workerdata($id){
		$this->specmode->delete_workerenquiry($id);
	}

	function del_worker_holliday1($id,$spe_id){
		$this->specmode->delete_worker($id,$spe_id);
	}
	function del_worker_service($id,$wid){
		$a=$this->specmode->del_worker_servic($id,$wid);
	}
			//------------------------------------------------edit profile -----------------

	function profile(){
	    $data['res']=$this->specmode->show_profile();
	    $this->load->view('specialist/profile',$data);
	}

	function change_password(){
	    $data['res']=$this->specmode->find_password();	    
	    $this->load->view('specialist/edit_password',$data);
	}
	function change_pass(){
	     $this->form_validation->set_rules ( "password", "Password", "required" );
         $this->form_validation->set_rules ( "newpassword", "New Password", "trim|required|matches[repassword]" );
         $this->form_validation->set_rules ( "repassword", "Confirm Password", "trim|required" );
	    if($this->form_validation->run()==FALSE){
		   $this->load->view('specialist/edit_password');
	    }
	    else{
	        $this->specmode->update_pass($this->input->post('newpassword'));			
	  	}
	}	

	function subcatdetail($cat_id){
			$data=$this->specmode->subCat($cat_id);
			// print_r($data);die;
		 foreach($data as $row)
            { 
       ?>
       <option value="<?php echo $row->subcat_id; ?>"><?php echo $row->subcat_name; ?></option>
        <?php }
	}	
}