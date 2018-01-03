<?php
class Servicesmode extends CI_Model
{
    function __construct(){
	   $this->load->database();
	}
//Data show Service
	function show_enquiry($id){
  // echo $id;
  $this->db->select('*');
  $this->db->from('service ser');
  $this->db->join('service_detail s','s.ser_detail_id=ser.serv_title');
  $this->db->where('ser.spe_id',$id);
     $query=$this->db->get();
   return $query->result();
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
	    $this->db->select('*');
		$this->db->from('service s');
		$this->db->join('worker','worker.work_id=s.wor_id');
		$this->db->where('s.wor_id',$id);
	    $query=$this->db->get();
		 $a= $query->row();
	    return $a;
	}
	function show_service($id){
      $this->db->select('*');
	  $this->db->from('service s');
	  $this->db->join('service_detail','service_detail.ser_detail_id=s.serv_title');
	  
	  $this->db->where('s.serve_id',$id);
	     $query=$this->db->get();
   return $query->row();
 }
 function showService2($id,$id2){

	$this->db->select('*');
	$this->db->from('service_detail');
	$this->db->where('cat_id',$id);

	    $query=$this->db->get();

		return $query->row();


}
function showService(){
$query=$this->db->get('service_detail');
 return $query->result();
}
	function delete_sp($id){
	   $query=$this->db->delete('service',array("serve_id"=>$id));
	    redirect('services');
	}
// update DAta 
	function update_reg($spe,$ser,$price,$time){
  // echo "spe".$spe;
  // echo "service".$ser;
  // echo "price".$price;
  // echo "time".$time;exit;
     $this->db->where("serve_id",$spe);
    $query=$this->db->update('service',array(
        "serv_title"=>$ser,
        "price"=>$price,
        "time"=>$time)
    );
   // if($query){ 
   // redirect('services');
   // }
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
	function show_serviceSpecialist($id)
	{
		$this->db->select('*');
		$this->db->from('service_as_specialist ss');
		$this->db->where('ss.spe_id',$id);
		$this->db->join('service_detail s','s.ser_detail_id=ss.ser_det_id','left');
	    $query=$this->db->get();
		return $query->result();
	}
function show_cat(){
	$query=$this->db->get('category');
	return $query->result();
	
	
}



function show_cat2($id){
$this->db->select('*');
$this->db->from('specialist');
$this->db->where('spr_id',$id);
	$query=$this->db->get();
		    $a= $query->row();
	return $a;
	
	
	}
	
function subCat($id){
	$query=$this->db->get_where('subcategory',array("cat_id"=>$id));
	return $query->result();
}
function getService($id){
	$query=$this->db->get_where('service_detail',array("sub_cat_id"=>$id));
	return $query->result();
}
function checkService($spe_id,$ser){
	$query=$this->db->get_where('service',array("spe_id"=>$spe_id,"serv_title"=>$ser));
	return $query->result();
}
function dltService($spe_id,$ser){
	 $query=$this->db->delete('service',array("spe_id"=>$spe_id,"serv_title"=>$ser));
	   
}
function insertService($spe_id,$price,$time,$ser){
	$data = array(
        'spe_id' => $spe_id,
        'price' => $price,
        'time' => $time,
        'serv_title' => $ser,
        );
        $ret=$this->db->insert('service', $data);
	    //print_r($ret);
	    redirect('services');
}
function updateService($spe_id,$price,$time,$ser){
	$val = array(
        'price' => $price,
        'time' => $time,
        'serv_title' => $ser,
        );
        $this->db->set($val);
		$this->db->where('spe_id',$spe_id);
		$this->db->update('service',$val);
		$result =  $this->db->affected_rows(); 
	    redirect('services');
}
}