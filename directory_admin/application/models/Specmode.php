<?php
class Specmode extends CI_Model{
    function __construct(){
	   $this->load->database();
	}
// Data Show .......
function show_enquiry(){
		$this->db->select('*');
		$this->db->from('specialist a');
		$this->db->join('category sp','sp.cat_id=a.cat_id','left');
		$this->db->join('subcategory sub','sub.subcat_id=a.subcat_id','left');
		$query=$this->db->get();
		return $query->result_array();
	}
	
	//worker Data Show .......
	function showListOfWorker($id){
		// echo $id;exit;
		$this->db->select('*');
		$this->db->from('worker');
		$this->db->where('spe_id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	//service Data Show .......
	function showListOfService($id){
		// echo $id;exit;
		$this->db->select('*');
		$this->db->from('service s');
		$this->db->join('service_detail sd','sd.ser_detail_id=s.serv_title','left');
		$this->db->where('s.spe_id',$id);
		$this->db->group_by('s.serv_title');
		$query=$this->db->get();
		return $query->result();
	}
	//Booking Data Show .......
	function showListOfBooking($id){
		// echo $id;exit;
		$this->db->select('*');
		$this->db->from('add_booking_new a');
		$this->db->join('service_detail sd','sd.ser_detail_id=a.service_id','left');
		$this->db->where('a.spe_id',$id);
		$query=$this->db->get();
		return $query->result();
	}
//  Specialist Insert
	function insert_data($table,$data){
		$this->db->insert($table,$data);		
		redirect('specialist');
	}
	//  Service Insert
	function insert_service($cat,$sub,$name){
		$data = array(
        'cat_id' => $cat,
        'sub_cat_id' => $sub,
        'ser_name' => $name
        );
        $ret=$this->db->insert('service_detail', $data);
	    //print_r($ret);
	    return $ret;
	}
// select data for edit
	function find_enquiry($id)
	{
	     $query=$this->db->get_where('specialist',array("spr_id"=>$id));
		 return $query->result_array();
	}
// detail subcategory acording to category
	function find_enquiry1($id){
		$query=$this->db->get_where('subcategory',array("cat_id"=>$id));
	 		return $query->result_array();
	}

// Delete  Specialist
	function delete_enquiry($id){
	    $query=$this->db->delete('specialist',array("spr_id"=>$id));
	    redirect('specialist');
	}
// Update Specialist	
	function update_reg($id,$cat,$subcat,$cat2,$subcat2,$brand_name,$contact_name,$email,$contact,$address,$disc,$address_map,$lat,$longt,$city,$zip,$monfam,$montoam,$monfpm,$montopm,$tuefam,$tuetoam,$tuefpm,$tuetopm,$wedfam,$wedtoam,$wedfpm,$wedtopm,$thufam,$thutoam,$thufpm,$thutopm,$frifam,$fritoam,$frifpm,$fritopm,$satfam,$sattoam,$satfpm,$sattopm,$sunfam,$suntoam,$sunfpm,$suntopm,$week){
		$this->db->where("spr_id",$id);
     	$query=$this->db->update('specialist',array("cat_id"=>$cat,"subcat_id"=>$subcat,"cat2_id"=>$cat2,"subcat2_id"=>$subcat2,"brand_name"=>$brand_name,"contact_name"=>$contact_name,"email"=>$email,"contact"=>$contact,"address"=>$address,"disc"=>$disc,"address_map"=>$address_map,"lat"=>$lat,"longt"=>$longt,"city_name"=>$city,"zip_code"=>$zip,"mon_from_am_time"=>$monfam,"mon_to_am_time"=>$montoam,"mon_from_pm_time"=>$monfpm,"mon_to_pm_time"=>$montopm,"tue_from_am_time"=>$tuefam,"tue_to_am_time"=>$tuetoam,"tue_from_pm_time"=>$tuefpm,"tue_to_pm_time"=>$tuetopm,"wed_from_am_time"=>$wedfam,"wed_to_am_time"=>$wedtoam,"wed_from_pm_time"=>$wedfpm,"wed_to_pm_time"=>$wedtopm,"thu_from_am_time"=>$thufam,"thu_to_am_time"=>$thutoam,"thu_from_pm_time"=>$thufpm,"thu_to_pm_time"=>$thutopm,"fri_from_am_time"=>$frifam,"fri_to_am_time"=>$fritoam,"fri_from_pm_time"=>$frifpm,"fri_to_pm_time"=>$fritopm,"sat_from_am_time"=>$satfam,"sat_to_am_time"=>$sattoam,"sat_from_pm_time"=>$satfpm,"sat_to_pm_time"=>$sattopm,"sun_from_am_time"=>$sunfam,"sun_to_am_time"=>$suntoam,"sun_from_pm_time"=>$sunfpm,"sun_to_pm_time"=>$suntopm,"weekend"=>$week));
	   if($query)  {
	    redirect('specialist');
	   }
	}
// Update Specialist For Brand Logo
		public function update_imagef($id,$file_name){
		$this->db->where('spr_id',$id);
		$this->db->update('specialist',array('brand_logo'=>$file_name));
	}
// Update Specialist For Contact Image
	public function update_images($id,$file_name1){
		$this->db->where('spr_id',$id);
		$this->db->update('specialist',array('contact_image'=>$file_name1));
	}

	//------------------------------------edit profil 
	function show_profile()
	{
	    $email =  $this->session->userdata('email');	   
	   $query = $this->db->query("SELECT * FROM specialist WHERE email ='$email' ");
	   return $query->result_array();
	 
	} 

	function find_password()
	{
	   $email =  $this->session->userdata('email');
	   $query = $this->db->query("SELECT * FROM specialist WHERE email ='$email' ");
	   return $query->result_array();
	}
	
	function show_category(){
		$query=$this->db->get('category');
		return $query->result_array();
	}	
	function show_subcategory(){
		$query=$this->db->get('subcategory');
		return $query->result_array();
	}
	// Data Show service .......
	function show_service(){
		$this->db->select('*');
		$this->db->from('service_detail s');
		$this->db->join('category sp','sp.cat_id=s.cat_id','left');
		$this->db->join('subcategory sub','sub.subcat_id=s.sub_cat_id','left');
		$query=$this->db->get();
		return $query->result();
	}

	// Delete Service
	function deleteService($id){
	    $query=$this->db->delete('service_detail',array("ser_detail_id"=>$id));
	    return $query;
	}
	function editService($id)
	{
	     $query=$this->db->get_where('service_detail',array("ser_detail_id"=>$id));
		 return $query->row();
	}
	function updateService($id,$cat,$sub,$ser)
	{
	    $val = array("cat_id"=>$cat,"sub_cat_id"=>$sub,"ser_name"=>$ser);
		//print_r($val);die;
		//echo "update sub_category set cat_id=$cat , sub_cat_name=$subcat where sub_id=$sid"; die;
		$this->db->set($val);
		$this->db->where('ser_detail_id',$id);
		$this->db->update('service_detail',$val);
		$result =  $this->db->affected_rows(); 
		//print_r($result);die;
		return $result;
	}
	function show_serAsSpecialist(){
			$this->db->select('*');
			$this->db->from('service_as_specialist s');
			$this->db->join('specialist sp','sp.spr_id=s.spe_id','left');
		    $this->db->join('service_detail sd','sd.ser_detail_id=s.ser_det_id','left');
			$query=$this->db->get();
			return $query->result();
		}
	function show_specialist(){
			$this->db->select('*');
			$this->db->from('specialist');
			$query=$this->db->get();
			return $query->result();
	}
	function show_service_detail(){
			$this->db->select('*');
			$this->db->from('service_detail');
			$query=$this->db->get();
			return $query->result();
	}
	function add_serviceSpecialist($spe,$ser){
			$data = array(
	        'spe_id' => $spe,
	        'ser_det_id' => $ser
	        );
        $ret=$this->db->insert('service_as_specialist', $data);
	    //print_r($ret);
	    return $ret;
	}
	function deleteSp($id){
	    $query=$this->db->delete('service_as_specialist',array("ser_as_specialist"=>$id));
	    return $query;
	}
	function editSp($id){
			$this->db->select('*');
			$this->db->from('service_as_specialist');
			$this->db->where('ser_as_specialist',$id);
			$query=$this->db->get();
			return $query->row();
	}
}
?>