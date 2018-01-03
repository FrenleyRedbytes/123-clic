<?php
class Usermode extends CI_Model
{
    function __construct()
	{
	   $this->load->database();
	}
	function show_enquiry()
	{
	     $query=$this->db->get('register');
		 return $query->result_array();
	}
	function delete_enquiry($id)
	{
	   $query=$this->db->delete('register',array("id"=>$id));
	    redirect('user');
	}
	function find_enquiry($id)
	{
	     $query=$this->db->get_where('register',array("id"=>$id));
		 return $query->result_array();
	}
	function update_reg($id,$name,$mobile,$email)
	{
	
	$this->db->where("id",$id);
     $query=$this->db->update('register',
	           array("name"=>$name,"mobile"=>$mobile,"email"=>$email));
	   if($query)
	   {
	  // echo "update suucess:";
	    redirect('user');
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
	   echo "problem in login";
        redirect('admin');
	   
	
	}
    function insert_reg($name,$userfile,$email,$pass)
    {
	
	  
	   
	  $query=$this->db->insert('admin',
	  array("name"=>$name,"image"=>$userfile,"email"=>$email,
	  "password"=>$pass));
	   if($query)
	   {
	    echo $data['res']= "Insert Successfully";
		die;
	   }
	   else
	      $data['res']= "problem in insertion";
	      $this->load->view('admin/header');
		  $this->load->view('admin/registerview',$data);
		  $this->load->view('admin/footer');
	}
	
	
	
	function insert_data($table,$data)
	{
		$this->db->insert($table,$data);
		//return $this->db->insert_id();
		redirect('user');
	}
}



?>