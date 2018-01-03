<?php
class Specmode extends CI_Model{
	
    function __construct(){
	   $this->load->database();
	}
// Show Worker Data
	function show_workerlist($id){
		$query=$this->db->get_where('worker',array("spe_id"=>$id));
		 return $query->result_array();
	}
	function show_service($id){
	  $this->db->select('*');
      $this->db->from('service s');
      $this->db->join('service_detail sd', 'sd.ser_detail_id=s.serv_title', 'left');
      $this->db->where('s.spe_id', $id);
      $query = $this->db->get();
	  return $query->result();
	}
	function getServices($id){
		$this->db->select('*');
      $this->db->from('worker_service');
      $this->db->where('worker_service_id', $id);
      $query = $this->db->get();
	  return $query->result();
	}
	function editServices($id){
		// echo $id;
		$query=$this->db->delete('worker_service',array("worker_service_id"=>'$id'));
		return $query;
	}
	function show_service1($id){
	  $this->db->select('*');
      $this->db->from('worker_service s');
      $this->db->join('service_detail sd', 'sd.ser_detail_id=s.service_id');
      $this->db->where('s.worker_service_id', $id);
      $query = $this->db->get();
	  return $query->result();
	}
		// show subcategory
	function show_subcategory(){
		$query=$this->db->get('subcategory');
		return $query->result_array();
	}
		// show subcategory
	function holiday($id){
		$query=$this->db->get_where('worker_holiday',array("worker_id"=>$id));
		return $query->result_array();
	}
	function service($id){
	  $this->db->select('*');
      $this->db->from('worker_service s');
      $this->db->join('service_detail sd', 'sd.ser_detail_id=s.service_id');
      $this->db->where('s.worker_service_id', $id);
      $query = $this->db->get();
      // $a=$query->result();
      // print_r($a);exit;
	  return $query->result();
	}
// insert data 
	function insert_data($table,$data)
	{
		$this->db->insert($table,$data);
	}
	// // insert data  worker holiday
	// function insert_data_holiday($table,$data)
	// {
	// 	$this->db->insert($table,$data);
	// 	 redirect('specialist/edit_workerlist');
	// }
// DAta Fatch For Edit
	function worker_enquiry($id){
	     $query=$this->db->get_where('worker',array("work_id"=>$id));
		 return $query->result_array();
	}
// Show Category
	function show_category(){
		$query=$this->db->get('category');
		return $query->result_array();
	}
//
	function show_enquiry(){
		$query=$this->db->get('specialist');
	    return $query->result_array();
	}
//update Worker Image
	public function update_workimage($id,$file_name){
		$this->db->where('work_id',$id);
		$this->db->update('worker',array('image'=>$file_name));
	}
//UPdate Worker
	public function update_workreg($id,$first_name,$last_name,$mobile,$email,
			$allday,
			$mon_from_time_am,$mon_to_time_am,$mon_from_time_pm,$mon_to_time_pm,
			$tue_from_time_am,$tue_to_time_am,$tue_from_time_pm,$tue_to_time_pm,
			$wed_from_time_am,$wed_to_time_am,$wed_from_time_pm,$wed_to_time_pm,
			$thu_from_time_am,$thu_to_time_am,$thu_from_time_pm,$thu_to_time_pm,
			$fri_from_time_am,$fri_to_time_am,$fri_from_time_pm,$fri_to_time_pm,
			$sat_from_time_am,$sat_to_time_am,$sat_from_time_pm,$sat_to_time_pm,
			$sun_from_time_am,$sun_to_time_am,$sun_from_time_pm,$sun_to_time_pm,
			$day_leave_start,
			$day_leave_end){
		       $this->db->where("work_id",$id);
	           $query=$this->db->update('worker',array(
			    	'first_name'	=> $first_name,
			    	'last_name'		=> $last_name,
		            'mobile'        => $mobile,
			    'email'    =>  $email,
					'day'    	=> $allday,
					'mon_from_time_am' => $mon_from_time_am,
					'mon_to_time_am' 	=> $mon_to_time_am,
					'mon_from_time_pm' => $mon_from_time_pm,
					'mon_to_time_pm' 	=> $mon_to_time_pm,				
					'tue_from_time_am' => $tue_from_time_am,
					'tue_to_time_am' 	=> $tue_to_time_am,
					'tue_from_time_pm' => $tue_from_time_pm,
					'tue_to_time_pm' 	=> $tue_to_time_pm,				
					'wed_from_time_am' => $wed_from_time_am,
					'wed_to_time_am' 	=> $wed_to_time_am,
					'wed_from_time_pm' => $wed_from_time_pm,
					'wed_to_time_pm' 	=> $wed_to_time_pm,				
					'thu_from_time_am' => $thu_from_time_am,
					'thu_to_time_am' 	=> $thu_to_time_am,
					'thu_from_time_pm' => $thu_from_time_pm,
					'thu_to_time_pm' 	=> $thu_to_time_pm,				
					'fri_from_time_am' => $fri_from_time_am,
					'fri_to_time_am' 	=> $fri_to_time_am,
					'fri_from_time_pm' => $fri_from_time_pm,
					'fri_to_time_pm' 	=> $fri_to_time_pm,				
					'sat_from_time_am' => $sat_from_time_am,
					'sat_to_time_am' 	=> $sat_to_time_am,
					'sat_from_time_pm' => $sat_from_time_pm,
					'sat_to_time_pm' 	=> $sat_to_time_pm,				
					'sun_from_time_am' => $sun_from_time_am,
					'sun_to_time_am' 	=> $sun_to_time_am,
					'sun_from_time_pm' => $sun_from_time_pm,
					'sun_to_time_pm' 	=> $sun_to_time_pm,
					'day_leave_start' 	=> $day_leave_start,
				    'day_leave_end' 	=> $day_leave_end,       
		            ));	 
	             // echo $this->db->last_query();  	
	   if($query){	   	
	    redirect('specialist1');
	   }
	}
// delete worker
	function delete_workerenquiry($id)
	{
	   $query=$this->db->delete('worker',array("work_id"=>$id));
	    redirect('specialist1');
	}
	// delete worker holiday
	function delete_worker($id,$spe_id)
	{
	   $query=$this->db->delete('worker_holiday',array("hid"=>$id));
	    redirect('specialist1/work_Data/'.$spe_id);
	}
	// function del_worker_servic($id,$wid)
	// {
	//    $query=$this->db->delete('worker_service',array("work_service_id"=>$id));
	//     redirect('specialist1/work_Data/'.$wid);
	// }

	function subCat($cat_id){
		 $this->db->where('cat_id',$cat_id);
	     $query=$this->db->get('subcategory');
		 return $query->result();
	}
//------------------------------------edit profil 
	function show_profile(){
	    $email =  $this->session->userdata('email');	   
	   $query = $this->db->query("SELECT * FROM specialist WHERE email ='$email' ");
	   return $query->result_array();	 
	} 

	function find_password(){
	   $email =  $this->session->userdata('email');
	   $query = $this->db->query("SELECT * FROM specialist WHERE email ='$email' ");
	   return $query->result_array();
	}
	function check_password($oldpas){
	   $email =  $this->session->userdata('email');
	   $query = $this->db->query("SELECT * FROM specialist WHERE email ='$email' and password='$oldpas' ");
	   return $query->row();
	}
	function update_pass($newpass)
	{
	$email =  $this->session->userdata('email');
	$this->db->where("email",$email);
     $query=$this->db->update('specialist',
	           array("password"=>$newpass));
	   if($query)
	   {
	  //echo "update suucess:";
	  //die;
	    redirect('dashboard_specialist/specialist');
	   }
	}
	function show_bookinglist($id){
      $this->db->select('*');
      $this->db->from('add_booking_new a');
      $this->db->join('specialist sp', 'sp.spr_id=a.spe_id', 'left');
      $this->db->join('service s', 's.serv_title=a.service_id', 'left');
      $this->db->join('service_detail sd', 'sd.ser_detail_id=s.serv_title', 'left');
      $this->db->join('register r', 'r.id=a.user_id', 'left');
      $this->db->where('a.spe_id', $id);
      $this->db->where('a.status', '0');
      $this->db->order_by("booking_id", "desc");
      $query = $this->db->get();
      $a= $query->result();	
      return $a;
      // print_r($a);exit;
    }
    function showBookingDetail($id){
      $this->db->select('*');
      $this->db->from('add_booking_new a');
      $this->db->where('a.spe_id',$id);
      $this->db->join('specialist sp', 'sp.spr_id=a.spe_id', 'left');
      $this->db->join('service s', 's.serv_title=a.service_id', 'left');
      $this->db->join('service_detail sd', 'sd.ser_detail_id=s.serv_title', 'left');
      $this->db->join('register r', 'r.id=a.user_id', 'left');
      $this->db->where('a.status', '1');
      $query = $this->db->get();
      $a= $query->result();	
      return $a;
      // print_r($a);exit;
    }
	public function update_status($val,$a){
	  // echo $id;exit;
	  $this->db->set('status',$val);
	  $this->db->where('booking_id',$a);
	  $this->db->update('add_booking_new');
	  $result=$this->db->affected_rows();
	  $this->db->set('status',$val);
	  $this->db->where('last_id',$a);
	  $this->db->update('comment');
	  $result=$this->db->affected_rows();
	  return $result;
	 }
	  public function deleteBooking($a){
	  $query=$this->db->delete('add_booking_new',array("booking_id"=>$a));
	      if($query)
	   {
	   	redirect('dashboard_specialist/specialist');
	   }
	 }
	  function selectUser($a){
      $this->db->select('*');
      $this->db->from('add_booking_new a');
      $this->db->join('register r', 'r.id=a.user_id', 'left');
      $this->db->where('a.booking_id',$a);
      $query = $this->db->get();
      $sql= $query->row();	
      return $sql;
      // print_r($sql);exit;
    }
}