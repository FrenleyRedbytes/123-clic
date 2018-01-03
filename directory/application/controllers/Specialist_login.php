<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Specialist_login extends CI_Controller{

	  function __construct(){
        parent::__construct();
	      $this->load->model('Specialist_login_model');
	      $this->load->database();
  	}
	
	 function index(){
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('password','password','required');
      if($this->form_validation->run()==FALSE){
        $this->load->view('specialist/index');
      }
      else{          
            $result=$this->Specialist_login_model->logindata($this->input->post('email'),$this->input->post('password'));
          if($result){
          $res=array(
          'id'=>$result->spr_id,
          'email' => $result->email,
          'name' => $result->contact_name
          );
          // print_r($res);
          $this->session->set_userdata($res);
          redirect('dashboard_specialist/specialist');
          }
          else
          {
            
            $this->load->view('specialist/index');
          }
      }
    }
    function forget(){
       $this->load->view('specialist/forget');
    }
    function forgtPassword(){
        $new_password = mt_rand(100000, 999999);
        $token=base64_encode($new_password);
        $email=$this->input->post('email');
        $result=$this->Specialist_login_model->forgetPassword($this->input->post('email'));
        if ($result) {
        $to = $this->input->post('email');
        $sql = "update specialist set new_token='$new_password' where email='$email'";
         $this->db->query($sql);
        $subject = 'Password Reset';
        $headers = "From: " . strip_tags('noreply@123click.com') . "\r\n";
        $headers.= "MIME-Version: 1.0\r\n";
        $headers.= "Content-Type: text/html; charset=UTF-8\r\n";
        $message = '<h4>123 clicl</h4>
        <p>Click on the link below to reset your password</p>
        <a href="http://www.etango.fr/directory/index.php/specialist_login/forget1/'.$token.'">Click here..</a>';
        mail($to, $subject, $message, $headers);
        $this->load->view('specialist/index');  
        }else{
          $data['msg']="Wrong email ";
          $this->load->view('specialist/forget',$data);  
        }
    }

    function forget1(){
      $this->load->view('specialist/checkForgetPassword');
    }

    function confirmforgtPassword($pass,$token){
        $new_token=base64_decode($token);
        $result=$this->Specialist_login_model->conforgetPassword($new_token);
        if($result){   
          $sql = "update specialist set password='$pass',new_token='0' where new_token='$new_token'";
          $this->db->query($sql);
          $data = array('data'=>$sql,'chk' =>'true');        
        }else{
          $data = array('chk' =>'false');
        }
        echo json_encode($data);
    }
} 