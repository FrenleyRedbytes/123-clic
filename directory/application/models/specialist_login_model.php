<?php
class Specialist_login_model extends CI_Model{
	
    function logindata($email,$pass){
			$query= $this->db->get_where('specialist',array("email"=>$email,"password"=>$pass));
			$ret=$query->row();
			return $ret;
	  		 //print_r($query->row());die;
	   //  if($query->num_rows()>0){
	   //   	$this->session->set_userdata('email',$email);
	   //   	redirect('Specialist_view');
	   //  }
	   // else
		  //   echo "problem in login";
	   //      redirect('specialist_login');
	}
	function forgetPassword($email){
		$query= $this->db->get_where('specialist',array("email"=>$email));
			$ret=$query->row();
			return $ret;
	}
	function conforgetPassword($pass){
		$query= $this->db->get_where('specialist',array("new_token"=>$pass));
			$ret=$query->row();
			return $ret;
	}
}
 ?>