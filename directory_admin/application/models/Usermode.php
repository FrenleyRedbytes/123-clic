<?php
class Usermode extends CI_Model{
    function __construct(){
	   $this->load->database();
	}

//show user detail....
	function show_enquiry(){
	     $query=$this->db->get('register');
		 return $query->result_array();
	}
// Data Show For user for EDIT...
	function find_enquiry($id){
	     $query=$this->db->get_where('register',array("id"=>$id));
		 return $query->result_array();
	}
	// Data Show For user...
	function showDetail($id){
	     $this->db->select('*');
        $this->db->from('register r');
        $this->db->where('r.id', $id);
        $query = $this->db->get();
        return $query->row();
        // print_r( $query->result());exit;
        // print_r( $query->result());exit;
	}
	// User Booking Data Show...
	function showBooking($id){
	     $this->db->select('*');
         $this->db->from('add_booking_new a');
         $this->db->join('specialist sp', 'sp.spr_id=a.spe_id', 'left');
         $this->db->join('service_detail s', 's.ser_detail_id=a.service_id', 'left');
         $this->db->where('a.user_id', $id);
         $query = $this->db->get();
         return $query->result();
        // print_r( $query->result());exit;
        // print_r( $query->result());exit;
	}
	function showFav($id){
	     $this->db->select('*');
         $this->db->from('favorite f');
         $this->db->join('specialist sp', 'sp.spr_id=f.spe_id', 'left');
         $this->db->where('f.user_id', $id);
         $query = $this->db->get();
         return $query->result();
        // print_r( $query->result());exit;
        // print_r( $query->result());exit;
	}
// Edit User
	function update_reg($id,$name,$mobile,$zip_code,$address,$city,$email){	
	  $this->db->where("id",$id);
      $query=$this->db->update('register',array("name"=>$name,"mobile"=>$mobile,"zip_code"=>$zip_code,"address"=>$address,"city"=>$city,"email"=>$email));
	   if($query){
	    redirect('user');
	   }
	}
// Delete User
    function delete_enquiry($id){
	   $query=$this->db->delete('register',array("id"=>$id));
	    redirect('user');
	}
	function insert_data($table,$data)
	{
		$this->db->insert($table,$data);
		//return $this->db->insert_id();
		redirect('user');
	}
}
?>