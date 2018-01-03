<?php
class Regmode extends CI_Model
{
    function __construct()
	{
	   $this->load->database();
	}
	function show_enquiry()
	{
	     $query=$this->db->get('category');
		 return $query->result_array();
	}
	function delete_enquiry($id)
	{
	   $query=$this->db->delete('category',array("cat_id"=>$id));
	    redirect('dashboard/category');
	}
	function find_enquiry($id)
	{
	     $query=$this->db->get_where('category',array("cat_id"=>$id));
		 return $query->result_array();
	}
	function update_reg($id,$name)
	{
	
	 $this->db->where("cat_id",$id);
     $query=$this->db->update('category',
	           array("name"=>$name));
	   if($query)
	   {
	  // echo "update suucess:";
	    redirect('dashboard/category');
	   }
	}
		
	function logindata($email,$pass)
	{
	  $query= $this->db->get_where('admin',array("email"=>$email,"password"=>$pass));
	 if($query->num_rows()>0)
 	   {
	     $this->session->set_userdata('email',$email);
	     redirect('dashboard');
	   }
	   else
        redirect('admin');
	 }
    
	function insert_data($table,$data)
	{
		$this->db->insert($table,$data);
		//return $this->db->insert_id();
		redirect('dashboard/category');
	}
	
	function update_pass($newpass)
	{
	$email =  $this->session->userdata('email');
	$this->db->where("email",$email);
     $query=$this->db->update('admin',
	           array("password"=>$newpass));
	   if($query)
	   {
	  //echo "update suucess:";
	  //die;
	    redirect('addadmin');
	   }
	}
	public function update_image($id,$file_name)
	{
		$this->db->where('cat_id',$id);
		$this->db->update('category',array('logo'=>$file_name));
		//$this->db->_error_message();*/
	}	
}