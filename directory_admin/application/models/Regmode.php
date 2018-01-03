<?php
class Regmode extends CI_Model
{
    function __construct()
	{
	   $this->load->database();
	}
// function for login 
	function logindata($email,$pass){
			$query= $this->db->get_where('admin',array("email"=>$email,"password"=>$pass));
			$ret=$query->row();
			return $ret;
		// if($query->num_rows()>0){
		// 	$this->session->set_userdata('email',$email);
		// 	redirect('dashboard');
		// }
		// else
		// 	echo "problem in login";
		// 	redirect('admin');
	}
// Category Detail	
	function show_enquiry()
	{
	    $query=$this->db->get('category');
		return $query->result_array();
	}

// INSERT CATEGORY
	function insert_data($table,$data){
		$this->db->insert($table,$data);
		redirect('dashboard/category');
	}

//EDIT CATEGORY A/C CAT_ID
	function find_enquiry($id){
	     $query=$this->db->get_where('category',array("cat_id"=>$id));
		 return $query->result_array();
	}
	function update_reg($id,$icon,$name,$file_name,$file_name1){	
		 $this->db->where("cat_id",$id);
	     $query=$this->db->update('category',array("icon"=>$icon,"name"=>$name,"logo"=>$file_name,"logo1"=>$file_name1));
	     // echo $sql = $this->db->last_query();die;
	    if($query){
			 redirect('dashboard/category');
	  	}
	}
// delete category
	function delete_enquiry($id)
	{
	   $query=$this->db->delete('category',array("cat_id"=>$id));
	    redirect('dashboard/category');
	}

// ----------------------------------------------------------------------------------------------
	
	function update_pass($newpass){
			$email =  $this->session->userdata('email');
			$this->db->where("email",$email);
			$query=$this->db->update('admin',array("password"=>$newpass));
		if($query){
			redirect('addadmin');
		}
	}
	
}

?>