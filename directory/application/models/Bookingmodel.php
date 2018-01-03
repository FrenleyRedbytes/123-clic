<?php
class Bookingmodel extends CI_Model
{
   	function find_enquiry($number)
	{
		 $this->db->where("number",$number);
		 $query=$this->db->get('booking');
		 return $query->result_array();
	}
	function show_service()
	{
	     $query=$this->db->get('service');
		 return $query->result_array();
	}
	function show_worker()
	{
	     $query=$this->db->get('worker');
		 return $query->result_array();
	}
	function showBookingList($id){
		 $this->db->where('add_booking_new.spe_id',$id);
	  $this->db->from('add_booking_new');
	  $this->db->join('service','service.serv_title=add_booking_new.service_id');
	  $this->db->join('service_detail','service_detail.ser_detail_id=service.serv_title');
	  $query=$this->db->get();
	   return $query->result();  
 	}
//Data show for dropdownlist
	function show_servicelist($id1){
	$this->db->select('*');
    $this->db->from('service s'); 
    $this->db->join('service_detail sd', 'sd.ser_detail_id=s.serv_title', 'left');
    $this->db->where('s.spe_id',$id1);
    // $this->db->order_by('c.track_title','asc');         
    $query = $this->db->get();
	// $query=$this->db->get_where('service',array("spe_id"=>$id1));
	 return $query->result_array();
	}

	//Data show for dropdownlist
	function show_workerlist($spe_id,$date_booking,$service_id,$time_booking){
	// function show_workerlist($id1){
		$query = $this->db->query("SELECT * FROM worker WHERE spe_id='$spe_id'");
		$worker_detail = $query->result_array();
		$service_worker_avl=[];
		$worker_without_holiday=[];
		$current_date=date('m/d/Y',strtotime($date_booking));
		$time_booking11=$time_booking;

		foreach ($worker_detail as $key) {
		  $worker12=$key['work_id'];
		  $worker_holiday = $this->db->query("select * from worker_service where worker_service_id='$worker12' and service_id='$service_id'");
		  $worker_array = $worker_holiday->row();
		  $query1 = "";
		  $worker_service_id1='';
			if(!empty($worker_array->worker_service_id)){
		  		$worker_service_id1=$worker_array->worker_service_id;
		  		$service_worker_avl[].=$worker_service_id1;
					
		  		}
		$worker_holiday = $this->db->query("select * from worker_holiday where worker_id='$worker_service_id1' ");
		  $data1 = $worker_holiday->row();
        $query1 = "";
        if(!empty($data1->day_leave_start) || !empty($data1->day_leave_end)){
        	$day_leave_start=$data1->day_leave_start;
			$day_leave_end=$data1->day_leave_end;
			$query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
			$worker_holiday1 = $this->db->query("select * from worker_holiday where worker_id='$worker12' and  '$current_date' $query1 ");
			$worker_id_without_hoiliday=$worker_holiday1->row();
			if(!empty($worker_id_without_hoiliday->worker_id)){
				$worker_without_holiday[].=$worker_id_without_hoiliday->worker_id;
			}         
		}
	}
	$worker_available = array_diff($service_worker_avl, $worker_without_holiday);
	$current_date11=date('Y-m-d',strtotime($date_booking));
	$worker_id_get = $this->db->query("select worker_id from add_booking_new where spe_id='$spe_id' and status='1' and date_booking='$current_date11' and time_booking='$time_booking11'");
		$worker_id_array = $worker_id_get->result();
	$add_booking_worker=[];
	foreach ($worker_id_array as $key1) {		
        if(!empty($key1->worker_id)){
			$add_booking_worker[].=$key1->worker_id;
		}
	}
	$result = array_diff($worker_available, $add_booking_worker);
	$get_id=implode(',', $result);
	$query = $this->db->query("SELECT * from worker Where work_id IN ($get_id)");
		 return $query->result_array();
	}

	function insert_data($table,$data)
	{
		$this->db->insert($table,$data);
		$lastid=$this->db->insert_id();
		redirect("booking/comment/$lastid");
	}
	//add comment
	function insert_comment($table,$data)
	{
		$this->db->insert($table,$data);
		// redirect("booking/comment");
	}
	function check_user($email){
		$query=$this->db->get_where('register',array("email"=>$email));
		 return $query->result_array();
	}


	function new_user($table,$data)
	{
		$query=$this->db->insert($table,$data);
		return $query;
		// redirect("booking/comment");
	}

	function update_worker($lastid,$worker,$user_id)
	{	
	 $this->db->where("booking_id",$lastid);
     $query=$this->db->update('add_booking_new',
	           array("worker_id"=>$worker,"user_id"=>$user_id));
	   
	}
	// status 1
	function update_addbookingstatus($lastid)
	{	
	 $this->db->where("booking_id",$lastid);
     $query=$this->db->update('add_booking_new',
	           array("status"=>'1'));
	   if($query){
	    redirect("booking");
	   }
	}

	function show_bookingdetail($id){	
		
		$this->db->where('booking_id',$id);
		$this->db->from('add_booking_new');
		$this->db->join('specialist','specialist.spr_id=add_booking_new.spe_id');
		$this->db->join('service','service.serv_title=add_booking_new.service_id');
		$this->db->join('service_detail','service_detail.ser_detail_id=add_booking_new.service_id');
		// $this->db->join('worker','worker.work_id=service.wor_id');
	    $query=$this->db->get();
		 return $query->result_array();		
	}

	function get_record_where($table_name,$where){
        $query = $this->db->get_where($table_name, $where);
        if($query -> num_rows() > 0){
            foreach($query->result() as $v){
                $data[] = $v;
            }
            return $data;
        } else {
            return FALSE;
        }
    }
    

    function query($sql) {
       $query = $this->db->query($sql);
       if ($query->num_rows() > 0) {
           foreach ($query->result() as $v) {
               $data[] = $v;
           }
           return $data;
       }
   }

}
?>