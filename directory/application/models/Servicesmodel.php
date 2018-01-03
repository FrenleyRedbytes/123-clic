<?php
class Servicesmodel extends CI_Model
{
    function __construct(){
	   $this->load->database();
	}
//Data show Service
	function show_enquiry(){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->join('worker','worker.work_id=service.spe_id');
		// $this->db->join('worker','worker.work_id=service.wor_id');
	    $query=$this->db->get();
		 return $query->result_array();
	}
//Data show for dropdownlist
	function show_specialist(){
	     $query=$this->db->get('specialist');
		 return $query->result_array();
	}
//Data show for dropdownlist
	function show_workerlist($id){
		$query=$this->db->get_where('worker',array("spe_id"=>$id));
		 return $query->result_array();
	}
// Insert Service
	function insert_data($table,$data){
		$this->db->insert($table,$data);
		redirect('services');
	}
// Delete data 
	function delete_enquiry($id){
	   $query=$this->db->delete('service',array("serve_id"=>$id));
	    redirect('services');
	}
// server data fatch for edit
	function find_enquiry($id){
	     $query=$this->db->get_where('service',array("serve_id"=>$id));
		 return $query->result_array();
	}
// update DAta 
	function update_reg($serv_id,$spe_id,$service_title,$price,$time,$created_at,$created_date){
					$serv_day1=$this->input->post('service_day');
					$day=implode(',', $serv_day1);	
					$this->db->where("serve_id",$serv_id);
				$query=$this->db->update('service',array(
					   "spe_id"=>$spe_id,
					   // "wor_id"=>$wor_id,
					   "serv_title"=>$service_title,
					   // "serv_day"=>$day,
					   "price"=>$price,
					   "time"=>$time)
				);
			if($query){	
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