<?php
class Specialist_login_model extends CI_Model
{
   function logindata($email,$pass)
	{
		echo $email;
		echo $pass;
	  $query= $this->db->get_where('specialist',array("email"=>$email,"password"=>$pass));
	  print_r($query->row());
	   if($query->num_rows()>0)
 	   {
	     $this->session->set_userdata('email',$email);
	     redirect('Specialist_view');
	   }
	   else
	   echo "problem in login";
        redirect('specialist_login');
	   
	
	}
}

?>