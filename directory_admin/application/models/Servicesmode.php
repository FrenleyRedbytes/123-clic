<?php
class Servicesmode extends CI_Model
{
    function __construct()
	{
	   $this->load->database();
	}
	function show_enquiry()
	{
	     $query=$this->db->get('service');
		 return $query->result_array();
	}
	function show_specialist()
	{
	     $query=$this->db->get('specialist');
		 return $query->result_array();
	}
	function delete_enquiry($id)
	{
	   $query=$this->db->delete('service',array("serv_id"=>$id));
	    redirect('services');
	}

	function find_enquiry($id)
	{
	     $query=$this->db->get_where('service',array("serv_id"=>$id));
		 return $query->result_array();
	}

	function update_reg($serv_id,$spe_id,$service_title,$serv_day,$price,$time,$created_at,$created_date){
	$serv_day1=$this->input->post('service_day');
	$day=implode(',', $serv_day1);	
	$this->db->where("serv_id",$serv_id);
	$query=$this->db->update('service',
	array("spe_id"=>$spe_id,"serv_title"=>$service_title,"serv_day"=>$day,"price"=>$price,"time"=>$time));
	echo $data =$this->db->last_query();
	if($query)
	{	// echo "update suucess:";
	redirect('services');
	}
	}
		public function update_imagef($id,$file_name)
	{
		$this->db->where('spe_id',$id);
		$this->db->update('specialist',array('brand_logo'=>$file_name));
		//$this->db->_error_message();*/
	}
    
	public function update_images($id,$file_name1)
	{
		$this->db->where('spe_id',$id);
		$this->db->update('specialist',array('contact_image'=>$file_name1));
		//$this->db->_error_message();*/
	}
	
	function insert_data($table,$data)
	{
		$this->db->insert($table,$data);
		//return $this->db->insert_id();
		redirect('services');
	}

function show_workerlist()
	{
	     $query=$this->db->get('worker');
		 return $query->result_array();
	}



function worker_enquiry($id)
	{
	     $query=$this->db->get_where('worker',array("work_id"=>$id));
		 return $query->result_array();
	}
public function update_workreg($id,$first_name,$last_name,$address,$city,$mobile,$email)
	{
	
	$this->db->where("work_id",$id);
     $query=$this->db->update('worker',
	           array("first_name"=>$first_name,"last_name"=>$last_name,"address"=>$address,
"city"=>$city,"mobile"=>$mobile,"email"=>$email));
	   if($query)
	   {
	  // echo "update suucess:";
	    redirect('specialist/show_worker');
	   }
	}


public function update_workimage($id,$file_name)
	{
		$this->db->where('work_id',$id);
		$this->db->update('worker',array('image'=>$file_name));
		//$this->db->_error_message();*/
	}
function delete_workerenquiry($id)
	{
	   $query=$this->db->delete('worker',array("work_id"=>$id));
	    redirect('specialist/show_worker');
	}


}



?>