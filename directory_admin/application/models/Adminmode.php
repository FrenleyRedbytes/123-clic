<?php
class Adminmode extends CI_Model{
    function __construct(){
	   $this->load->database();
	}
// Data Fatch admin
	function show_enquiry()
	{
	     $query=$this->db->get('admin');
		 return $query->result_array();
	}
//Add Admin
	function insert_data($table,$data){
		$this->db->insert($table,$data);
		redirect('addadmin');
	}
//Show dt fro edit AC to ADmin ID
	function find_enquiry($id)
	{
	     $query=$this->db->get_where('admin',array("id"=>$id));
		 return $query->result_array();
	}
//udate admin part 
	function update_reg($id,$name,$email)
	{
	
	 $this->db->where("id",$id);
     $query=$this->db->update('admin',
	           array("name"=>$name,"email"=>$email));
	   if($query)
	   {
	  // echo "update suucess:";
	    redirect('addadmin');
	   }
	}
//udate admin part image
	public function update_image($id,$file_name)
	{
		$this->db->where('id',$id);
		$this->db->update('admin',array('image'=>$file_name));
		//$this->db->_error_message();*/
	}
//Delete Admin
	function delete_enquiry($id){
	   $query=$this->db->delete('admin',array("id"=>$id));
	   redirect('addadmin');
	}
// --------------------------------------------------------------------------------------	
	function show_profile()	{
	    $email =  $this->session->userdata('email');	   
	   $query = $this->db->query("SELECT * FROM admin WHERE  email ='$email' ");
	   return $query->result_array();	 
	}
	
	function find_password(){
	   $email =  $this->session->userdata('email');
	   $query = $this->db->query("SELECT * FROM admin WHERE  email ='$email' ");
	   return $query->result_array();
	}
		
}

?>