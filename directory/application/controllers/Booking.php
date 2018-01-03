<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	function __construct(){
	    	parent::__construct();
	    	date_default_timezone_set('Europe/Berlin');
		if(!$this->session->userdata('email')) {
	     	redirect('specialist_login');
	    }
	    	$this->load->model('Bookingmodel');
	    	$this->load->database();
	}

	function index(){
		$data['ser']=$this->Bookingmodel->show_servicelist($this->session->userdata('id'));
		
		$this->load->view('specialist/booking_calender',$data);	  
	}
	function booking_list(){
  		$data['list']=$this->Bookingmodel->showBookingList($this->session->userdata('id'));
  		// print_r($data);exit;
  		$this->load->view('specialist/booking_list',$data);   
	}

	function firstview($spe_id,$ser_id){
		$query = $this->db->query("SELECT * FROM service WHERE spe_id='$spe_id'and serv_title='$ser_id'");
		$result = $query->result_array();
		$service_time=$result['0']['time'];
		
		?>
			<div class="my_table">
			<div class="head_div">
			<span class="table_icon left"> <img src="<?php echo base_url();?>img/left1.png"> </span>
			<?php for($k=0;$k<3;$k++)
			{ 
			$hou=9;
			$j=0;
			?>
			<div class="head_part">
			<h3> <?php echo date('l',strtotime("+$k day"));echo "<br>"; ?> 
			<?php echo date('Y-m-d',strtotime("+$k day"));
			?>
			</h3>
			</div>
			<?php } ?>
			<span class="table_icon right"> <img src="<?php echo base_url();?>img/right1.png" onclick="right('<?php echo date('Y-m-d',strtotime("+2 day"));?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>')"> </span>
			</div>
			<div class="body_div">
			<?php for($k=0;$k<3;$k++){ 
			$hou=9;
			$j=0;
			?>
			<div class="body_row">
			<?php
			$sql123 = $this->db->query("SELECT * FROM specialist WHERE spr_id='$spe_id'");
			$sql1 = $sql123->row();
				$str_am=$sql1->shop_str_time_am;
				$en_am=$sql1->shop_en_time_am;
				$str_pm=$sql1->shop_str_time_pm;
				$en_pm=$sql1->shop_en_time_pm;
				$weekend=$sql1->weekend;
			for($i=0;$i<25;$i++){
				$start_time=$str_am;
				$start_time1=explode(':',$start_time);
				$end_time=$en_am;
				$end_time1=explode(':',$end_time);
				for($i=$start_time*60+$start_time1[1];$i<=$end_time*60+$end_time1[1];$i+=15){
				$show_new_time= floor($i/60) . ":" . ($i/60-floor($i/60))*60; 


			// if($i%2==0){ 
			$show_date=date('Y-m-d',strtotime("+$k day"));
			$time=$hou+$j.":00:00";
			$a = $this->db->query("SELECT * FROM worker WHERE spe_id='$spe_id'");
						$result1 = $a->result_array();
						$current_date=date('m/d/Y',strtotime("+$k day"));
						$worker_count1=0;
						$worker_work_service_count1=0;
						$add_booing_count=0;
						foreach ($result1 as $key) {
						$worker_id=$key['work_id'];
						$worker_holiday = $this->db->query("select * from worker_holiday where worker_id='$worker_id'");
						$worker_array = $worker_holiday->row();

						$query1 = "";
						if(!empty($worker_array->day_leave_start) || !empty($worker_array->day_leave_end)){
						$day_leave_start=$worker_array->day_leave_start;
						$day_leave_end=$worker_array->day_leave_end;
							$query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
							$worker_holiday1 = $this->db->query("select * from worker_holiday where worker_id='$worker_id' and  '$current_date' $query1 ");
						$worker_count=$worker_holiday1->num_rows();
						$worker_count1+=$worker_count;
						}						

						$worker_work_service = $this->db->query("select * from worker_service where worker_service_id='$worker_id' and service_id='$ser_id' ");
						$worker_work_service_count=$worker_work_service->num_rows();
						$worker_work_service_count1+=$worker_work_service_count;
						}	
						$total_availabel_worker=$worker_work_service_count1-$worker_count1;
						$current_date1=date('Y-m-d',strtotime("+$k day"));	

						$a=explode(':', $show_new_time);
						 if(strlen($a[0])==1 || strlen($a[1])==1){
						 		if(strlen($a[1])==1){
									$show_new_time=$show_new_time.'0';
						 		}else{
									$show_new_time=$show_new_time;
						 		}
						 		if(strlen($a[0])==1){
									$show_new_time='0'.$show_new_time;
						 		}else{
									$show_new_time=$show_new_time;
						 		}
								$showdata=$show_new_time.':00';//09:00:00
						 }
						 else{
								$showdata=$show_new_time.':00';						 	
						 }

						$add_booking = $this->db->query("select * from add_booking_new where spe_id='$spe_id' and service_id='$ser_id' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1' ");
						
						$add_booking_array = $add_booking->result_array();
						foreach ($add_booking_array as $key1) {
						if($key1['worker_id']!='0'){
						$add_booing_count+=count($key1['worker_id']);
						}
						}
						$add_booing_count;
						date_default_timezone_set('Asia/Calcutta'); 
                          $current_time=date('H:i:s');
                          $current_date_loop=date('m/d/Y',strtotime("+$k day"));
                          $current_date_show=date('m/d/Y');   

                           $loop_day=date('l',strtotime("+$k day"));
                           $database_day1=explode(',',$weekend);
                           $database_day=in_array($loop_day, $database_day1);

                          if(($total_availabel_worker<=$add_booing_count) || (($current_date_show==$current_date_loop) && ($showdata<$current_time)) || ($database_day) ){
			?>

			<div class="body_part">				
			<button type="button" style="background-color: gray;" onclick="bookedEntry(<?php echo $spe_id; ?>,<?php echo $ser_id; ?>);"> <?php echo$show_new_time; ?> </button>
			</div>
			<?php }else{ 
			?>
			<div class="body_part">
			<button type="button" onclick="valid('<?php echo date('l',strtotime("+$k day")); ?>','<?php echo date('Y-m-d',strtotime("+$k day")); ?>','<?php echo $showdata; ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>');"> <?php echo$show_new_time; ?> </button>
			</div>

			<?php } 
		}//for loop end

		$start_time=$str_pm;
		$start_time11=explode(':',$start_time);
		$end_time=$en_pm;
		$end_time11=explode(':',$end_time);

			for($i=$start_time*60+$start_time11[1];$i<=$end_time*60+$end_time11[1];$i+=15){
				$show_new_time= floor($i/60) . ":" . ($i/60-floor($i/60))*60;  
			// if($i%2==0){ 
			$show_date=date('Y-m-d',strtotime("+$k day"));
			$time=$hou+$j.":00:00";
			$a = $this->db->query("SELECT * FROM worker WHERE spe_id='$spe_id'");
						$result1 = $a->result_array();
						$current_date=date('m/d/Y',strtotime("+$k day"));
						$worker_count1=0;
						$worker_work_service_count1=0;
						$add_booing_count=0;
						foreach ($result1 as $key) {
						$worker_id=$key['work_id'];
						$worker_holiday = $this->db->query("select * from worker_holiday where worker_id='$worker_id'");
						$worker_array = $worker_holiday->row();

						$query1 = "";
						if(!empty($worker_array->day_leave_start) || !empty($worker_array->day_leave_end)){
						$day_leave_start=$worker_array->day_leave_start;
						$day_leave_end=$worker_array->day_leave_end;
							$query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
							$worker_holiday1 = $this->db->query("select * from worker_holiday where worker_id='$worker_id' and  '$current_date' $query1 ");
						$worker_count=$worker_holiday1->num_rows();
						$worker_count1+=$worker_count;
						}						

						$worker_work_service = $this->db->query("select * from worker_service where worker_service_id='$worker_id' and service_id='$ser_id' ");
						$worker_work_service_count=$worker_work_service->num_rows();
						$worker_work_service_count1+=$worker_work_service_count;
						}	
						$total_availabel_worker=$worker_work_service_count1-$worker_count1;
						$current_date1=date('Y-m-d',strtotime("+$k day"));	

						$a=explode(':', $show_new_time);
						if(strlen($a[0])==1 || strlen($a[1])==1){
						 		if(strlen($a[1])==1){
									$show_new_time=$show_new_time.'0';
						 		}else{
									$show_new_time=$show_new_time;
						 		}
						 		if(strlen($a[0])==1){
									$show_new_time='0'.$show_new_time;
						 		}else{
									$show_new_time=$show_new_time;
						 		}
								$showdata=$show_new_time.':00';//09:00:00
						 }
						 else{
								$showdata=$show_new_time.':00';						 	
						 }

						$add_booking = $this->db->query("select * from add_booking_new where spe_id='$spe_id' and service_id='$ser_id' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1' ");
						
						$add_booking_array = $add_booking->result_array();
						foreach ($add_booking_array as $key1) {
						if($key1['worker_id']!='0'){
						$add_booing_count+=count($key1['worker_id']);
						}
						}
						$add_booing_count;
		        	    date_default_timezone_set('Asia/Calcutta'); 
                          $current_time=date('H:i:s');
                          $current_date_loop=date('m/d/Y',strtotime("+$k day"));
                          $current_date_show=date('m/d/Y');   
                          $loop_day=date('l',strtotime("+$k day"));
                           $database_day1=explode(',',$weekend);
                           $database_day=in_array($loop_day, $database_day1);

                          if(($total_availabel_worker<=$add_booing_count) || (($current_date_show==$current_date_loop) && ($showdata<$current_time)) || ($database_day) ){
			?>
			<div class="body_part">
			<button type="button"  style="background-color: gray;" onclick="bookedEntry(<?php echo $spe_id; ?>,<?php echo $ser_id; ?>);"> <?php echo$show_new_time; ?> </button>
			</div>
			<?php }else{
			?>
			<div class="body_part">
			<button type="button" onclick="valid('<?php echo date('l',strtotime("+$k day")); ?>','<?php echo date('Y-m-d',strtotime("+$k day")); ?>','<?php echo $showdata; ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>');"> <?php echo$show_new_time; ?> </button>
			</div>

			<?php } 
		}//for loop end
			}
			?>                      
			</div>
			<?php } ?>                  
			</div>
			</div>
			<script type="text/javascript">
			$('.body_part button').on('click', function(){
			$('.body_part button').removeClass('active');
			$(this).addClass('active');
			})
			</script>
	<?php
	}
	function firstviewinsert($date_booking,$time_booking1,$spe_id,$service){

		$service_data = $this->db->query("SELECT * FROM service WHERE serv_title='$service'");
			$ser_ar = $service_data->row();
			$time_service=$ser_ar->time;
			$time_div=$time_service/15;
		
		$Start = $time_booking1;
		$this->session->set_userdata('time_show', $Start);
		$Minutes = 15;
		$abc=[];
		for($i=0;$i<$time_div;$i++){
			$abc[].=$Start;	
			 $Start=  date("H:i:s", strtotime($Start)+($Minutes*60));
		}
		$time_booking=implode(',',$abc);	

	    date_default_timezone_set("Asia/Calcutta");
	    $datetime = date('Y-m-d H:i:s');
		 $sql = "insert into add_booking_new(spe_id,service_id,date_booking,time_booking,cu_date)values('$spe_id','$service','$date_booking','$time_booking','$datetime')"; 
        $res = $this->db->query($sql);
	     $last_id = $this->db->insert_id();
	    if (!$res){
	        $data = array('chk' =>'false');     
	    }
	    else{   
	        $data = array('last_id'=>$last_id,'chk' =>'true');        
	    }
	    echo json_encode($data);
	}

	function showdetail($last_id){	
		$data['det']=$this->Bookingmodel->show_bookingdetail($last_id);

		$date_booking=$data['det'][0]['date_booking'];
		$time_booking=$data['det'][0]['time_booking'];
		$service_id=$data['det'][0]['service_id'];
		$data['wrk']=$this->Bookingmodel->show_workerlist($this->session->userdata('id'),$date_booking,$service_id,$time_booking);
		$this->load->view('specialist/showdetail',$data);	
	}

	function addbookingupdate(){
		$email=$this->input->post('email');
		$a=$this->Bookingmodel->check_user($email);
		if($a){		
			$email_to=$email;
			$mail   = base64_encode($email_to);
			$email_message = "Email: Your Booking has been accepted.Thank you for Booking.";
			$email_subject="Booking Accepted";
			@mail($email_to, $email_subject, $email_message);	
			$user_id=$a['0']['id'];

			$arr = array(
			'comment' 	=> $this->input->post('comment'),
			'last_id' =>$this->input->post('last_id'),
			);
			$this->Bookingmodel->insert_comment('comment',$arr);
			$this->Bookingmodel->update_worker($this->input->post('last_id'),
			$this->input->post('worker'),$user_id);
			$this->Bookingmodel->update_addbookingstatus($this->input->post('last_id'));
		}else{	
			$email_to=$email;
			$mail   = base64_encode($email_to);
			$email_message = "Your Booking has been accepted.Thank you for Booking.";
			$email_subject="Booking Accepted";
			@mail($email_to, $email_subject, $email_message);			
			$arr1 = array(
			'name' 	=> $this->input->post('name'),
			'mobile' =>$this->input->post('mobile'),
			'email'=>$this->input->post('email'),
			);
			$sql=$this->Bookingmodel->new_user('register',$arr1);
			$user_id = $this->db->insert_id();			
			if($sql){
					$arr = array(
					'comment' 	=> $this->input->post('comment'),
					'last_id' =>$this->input->post('last_id'),
					);
					$this->Bookingmodel->insert_comment('comment',$arr);
					$this->Bookingmodel->update_worker($this->input->post('last_id'),
					$this->input->post('worker'),$user_id);
					$this->Bookingmodel->update_addbookingstatus($this->input->post('last_id'));
					
			}else{
				echo "error";				
			}		
		}	
	}


	function rightside($id,$spe_id,$ser_id){
		if(isset($id) && !empty($id)){
			$query = $this->db->query("SELECT * FROM service WHERE spe_id='$spe_id'and serv_title='$ser_id'");
			$result = $query->result_array();
			$service_time=$result['0']['time'];
		?>
		<div class="head_div">
			<?php 
		    $date=strtotime("+0 day", strtotime($id));
		    $datee= date('Y-m-d',strtotime("-1 day"));
		   if ($datee==$id) { 
		    ?>
		     <span class="table_icon left"> <img src="<?php echo base_url(); ?>img/left1.png"> </span>
		     <?php } else{ ?>
		  <span class="table_icon left"> <img onclick="left('<?php echo date("Y-m-d", $date); ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>')" src="<?php echo base_url(); ?>img/left1.png"> </span>
		   <?php }
		   for($k=1;$k<=3;$k++)
		  { 
		      $hou=9;
		      $j=0;
		  ?>
		  <div class="head_part">
		    <h3> <?php 
		    $date=strtotime("+$k day", strtotime($id));
		    echo date('l',$date);echo "<br>"; ?><?php echo date("Y-m-d", $date); ?> </h3>
		  </div>
		  <?php } ?>
		  <span class="table_icon right"> <img src="<?php echo base_url(); ?>img/right1.png" onclick="right('<?php echo date("Y-m-d", $date); ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>')"> </span>
		</div>
		<div class="body_div">
		 <?php for($k=1;$k<=3;$k++){ 
		      $hou=9;
		      $j=0;
		  ?>
		  <div class="body_row">
		    <?php
		    $sql123 = $this->db->query("SELECT * FROM specialist WHERE spr_id='$spe_id'");
			$sql1 = $sql123->row();
					$str_am=$sql1->shop_str_time_am;
					$en_am=$sql1->shop_en_time_am;
					$str_pm=$sql1->shop_str_time_pm;
					$en_pm=$sql1->shop_en_time_pm;
					$weekend=$sql1->weekend;
		       for($i=0;$i<25;$i++){
					$start_time=$str_am;
					$start_time1=explode(':',$start_time);
					$end_time=$en_am;
					$end_time1=explode(':',$end_time);
					for($i=$start_time*60+$start_time1[1];$i<=$end_time*60+$end_time1[1];$i+=15){
					$show_new_time= floor($i/60) . ":" . ($i/60-floor($i/60))*60; 
		        // if($i%2==0){ 
						$date=strtotime("+$k day", strtotime($id));
						date('Y-m-d',$date);
						date('l',$date);
						$show_date=date('Y-m-d',$date);
						$time=$hou+$j.":00:00";
						$a = $this->db->query("SELECT * FROM worker WHERE spe_id='$spe_id'");
						$result1 = $a->result_array();
						$current_date=date('m/d/Y',$date);
						$worker_count1=0;
						$worker_work_service_count1=0;
						$add_booing_count=0;
						foreach ($result1 as $key) {
						$worker_id=$key['work_id'];
						$worker_holiday = $this->db->query("select * from worker_holiday where worker_id='$worker_id'");
						$worker_array = $worker_holiday->row();
						$query1 = "";
						if(!empty($worker_array->day_leave_start) || !empty($worker_array->day_leave_end)){
						$day_leave_start=$worker_array->day_leave_start;
						$day_leave_end=$worker_array->day_leave_end;
							$query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
							$worker_holiday1 = $this->db->query("select * from worker_holiday where worker_id='$worker_id' and  '$current_date' $query1 ");

						
						$worker_count=$worker_holiday1->num_rows();
						$worker_count1+=$worker_count;
						}
						$worker_work_service = $this->db->query("select * from worker_service where worker_service_id='$worker_id' and service_id='$ser_id' ");
						$worker_work_service_count=$worker_work_service->num_rows();
						$worker_work_service_count1+=$worker_work_service_count;
						}
						$total_availabel_worker=$worker_work_service_count1-$worker_count1;
						$current_date1=date('Y-m-d',$date);
						$a=explode(':', $show_new_time);
						if(strlen($a[0])==1 || strlen($a[1])==1){
						 		if(strlen($a[1])==1){
									$show_new_time=$show_new_time.'0';
						 		}else{
									$show_new_time=$show_new_time;
						 		}
						 		if(strlen($a[0])==1){
									$show_new_time='0'.$show_new_time;
						 		}else{
									$show_new_time=$show_new_time;
						 		}
								$showdata=$show_new_time.':00';//09:00:00
						 }
						 else{
								$showdata=$show_new_time.':00';						 	
						 }

						$add_booking = $this->db->query("select * from add_booking_new where spe_id='$spe_id' and service_id='$ser_id' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1' ");
						
						$add_booking_array = $add_booking->result_array();
						foreach ($add_booking_array as $key1) {
						if($key1['worker_id']!='0'){
						$add_booing_count+=count($key1['worker_id']);
						}
						}
						$add_booing_count;
						$loop_day=date('l',$date);
                           $database_day1=explode(',',$weekend);
                           $database_day=in_array($loop_day, $database_day1);
		        	    if(($total_availabel_worker<=$add_booing_count) || ($database_day)){
                          ?>
                          <div class="body_part">
                            <button type="button" style="background-color: gray;" disabled=""> <?php echo$show_new_time; ?> </button>
                          </div>
                          <?php }else{ ?>
                          <div class="body_part">
                            <button type="button" onclick="valid('<?php echo date('l',$date); ?>','<?php echo date('Y-m-d',$date); ?>','<?php echo$showdata; ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>');"> <?php echo$show_new_time; ?> </button>
                          </div>
                            <?php } 
                          }//for loop end

						$start_time=$str_pm;
						$start_time11=explode(':',$start_time);
						$end_time=$en_pm;
						$end_time11=explode(':',$end_time);

                          for($i=$start_time*60+$start_time11[1];$i<=$end_time*60+$end_time11[1];$i+=15){
					$show_new_time= floor($i/60) . ":" . ($i/60-floor($i/60))*60; 
		        // if($i%2==0){ 
						$date=strtotime("+$k day", strtotime($id));
						date('Y-m-d',$date);
						date('l',$date);
						$show_date=date('Y-m-d',$date);
						$time=$hou+$j.":00:00";
						$a = $this->db->query("SELECT * FROM worker WHERE spe_id='$spe_id'");
						$result1 = $a->result_array();
						$current_date=date('m/d/Y',$date);
						$worker_count1=0;
						$worker_work_service_count1=0;
						$add_booing_count=0;
						foreach ($result1 as $key) {
						$worker_id=$key['work_id'];
						$worker_holiday = $this->db->query("select * from worker_holiday where worker_id='$worker_id'");
						$worker_array = $worker_holiday->row();
						$query1 = "";
						if(!empty($worker_array->day_leave_start) || !empty($worker_array->day_leave_end)){
						$day_leave_start=$worker_array->day_leave_start;
						$day_leave_end=$worker_array->day_leave_end;
							$query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
							$worker_holiday1 = $this->db->query("select * from worker_holiday where worker_id='$worker_id' and  '$current_date' $query1 ");

						
						$worker_count=$worker_holiday1->num_rows();
						$worker_count1+=$worker_count;
						}
						$worker_work_service = $this->db->query("select * from worker_service where worker_service_id='$worker_id' and service_id='$ser_id' ");
						$worker_work_service_count=$worker_work_service->num_rows();
						$worker_work_service_count1+=$worker_work_service_count;
						}
						$total_availabel_worker=$worker_work_service_count1-$worker_count1;
						$current_date1=date('Y-m-d',$date);
						$a=explode(':', $show_new_time);
						if(strlen($a[0])==1 || strlen($a[1])==1){
						 		if(strlen($a[1])==1){
									$show_new_time=$show_new_time.'0';
						 		}else{
									$show_new_time=$show_new_time;
						 		}
						 		if(strlen($a[0])==1){
									$show_new_time='0'.$show_new_time;
						 		}else{
									$show_new_time=$show_new_time;
						 		}
								$showdata=$show_new_time.':00';//09:00:00
						 }
						 else{
								$showdata=$show_new_time.':00';						 	
						 }
						$add_booking = $this->db->query("select * from add_booking_new where spe_id='$spe_id' and service_id='$ser_id' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1' ");
						
						$add_booking_array = $add_booking->result_array();
						foreach ($add_booking_array as $key1) {
						if($key1['worker_id']!='0'){
						$add_booing_count+=count($key1['worker_id']);
						}
						}
						$add_booing_count;
						$loop_day=date('l',$date);
                           $database_day1=explode(',',$weekend);
                           $database_day=in_array($loop_day, $database_day1);
		        	    if(($total_availabel_worker<=$add_booing_count) || ($database_day)){
                          ?>
                          <div class="body_part">
                            <button type="button" style="background-color: gray;" disabled=""> <?php echo$show_new_time; ?> </button>
                          </div>
                          <?php }else{ ?>
                          <div class="body_part">
                            <button type="button" onclick="valid('<?php echo date('l',$date); ?>','<?php echo date('Y-m-d',$date); ?>','<?php echo$showdata; ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>');"> <?php echo$show_new_time; ?> </button>
                          </div>
                            <?php }
                          }//for loop end

		            }
		          ?>	      
		  </div>
		  <?php } ?>                  
		</div>
		<script type="text/javascript">
			$('.body_part button').on('click', function(){
			$('.body_part button').removeClass('active');
			$(this).addClass('active');
			})
			</script>
		<?php } 
		else{
			// echo 'calender';
		}

	}

	function leftside($id,$spe_id,$ser_id){
		if(isset($id) && !empty($id)){
			$query = $this->db->query("SELECT * FROM service WHERE spe_id='$spe_id'and serv_title='$ser_id'");
			$result = $query->result_array();
			$service_time=$result['0']['time'];
		?>
		<div class="head_div">
		<?php 
		$date=strtotime("-3 day", strtotime($id));
		$datee= date('Y-m-d',strtotime("0 day"));
		// $date=strtotime("-3 day", strtotime($_GET['date1']));
		$id;
		if ($datee>date("Y-m-d", $date)) {   
				// echo "string";
		?>
		<span class="table_icon left"> <img src="<?php echo base_url(); ?>img/left1.png"> </span>
		<?php } else{ ?>
		<span class="table_icon left"> <img onclick="left('<?php echo date("Y-m-d", $date); ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>')" src="<?php echo base_url(); ?>img/left1.png"> </span>
		<?php }
		for($k=2;$k>=0;$k--)
		{ 
		$hou=9;
		$j=0;
		?>
		<div class="head_part">
		<h3> <?php 
		$date=strtotime("-$k day", strtotime($id));
		echo date('l',$date);echo "<br>"; ?> <?php echo date("Y-m-d", $date); ?> </h3>
		</div>
		<?php } ?>
		<span class="table_icon right"> <img src="<?php echo base_url(); ?>img/right1.png" onclick="right('<?php echo date("Y-m-d", $date); ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>')"> </span>
		</div>
		<div class="body_div">
		<?php for($k=2;$k>=0;$k--)
		{ 
		$hou=9;
		$j=0;
		?>
		<div class="body_row">
		<?php
		$sql123 = $this->db->query("SELECT * FROM specialist WHERE spr_id='$spe_id'");
			$sql1 = $sql123->row();
					$str_am=$sql1->shop_str_time_am;
					$en_am=$sql1->shop_en_time_am;
					$str_pm=$sql1->shop_str_time_pm;
					$en_pm=$sql1->shop_en_time_pm;
					$weekend=$sql1->weekend;
		for($i=0;$i<25;$i++){
			$start_time=$str_am;
			$start_time1=explode(':',$start_time);
			$end_time=$en_am;
			$end_time1=explode(':',$end_time);
			for($i=$start_time*60+$start_time1[1];$i<=$end_time*60+$end_time1[1];$i+=15){
			$show_new_time= floor($i/60) . ":" . ($i/60-floor($i/60))*60;
		// if($i%2==0){ 
			$date12=strtotime("-$k day", strtotime($id));
            $show_date=date('Y-m-d',$date12);
            $time=$hou+$j.":00:00";
        	$a = $this->db->query("SELECT * FROM worker WHERE spe_id='$spe_id'");
						$result1 = $a->result_array();
						$current_date=date('m/d/Y',$date12);
						$worker_count1=0;
						$worker_work_service_count1=0;
						$add_booing_count=0;
						foreach ($result1 as $key) {
						$worker_id=$key['work_id'];
						$worker_holiday = $this->db->query("select * from worker_holiday where worker_id='$worker_id'");
						$worker_array = $worker_holiday->row();
						$query1 = "";
						if(!empty($worker_array->day_leave_start) || !empty($worker_array->day_leave_end)){
						$day_leave_start=$worker_array->day_leave_start;
						$day_leave_end=$worker_array->day_leave_end;
							$query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
							$worker_holiday1 = $this->db->query("select * from worker_holiday where worker_id='$worker_id' and  '$current_date' $query1 ");						
						$worker_count=$worker_holiday1->num_rows();
						$worker_count1+=$worker_count;
						}

						$worker_work_service = $this->db->query("select * from worker_service where worker_service_id='$worker_id' and service_id='$ser_id' ");
						$worker_work_service_count=$worker_work_service->num_rows();
						$worker_work_service_count1+=$worker_work_service_count;
						}
						$total_availabel_worker=$worker_work_service_count1-$worker_count1;
						$current_date1=date('Y-m-d',$date12);
						$a=explode(':', $show_new_time);
						 if(strlen($a[0])==1 || strlen($a[1])==1){
						 		if(strlen($a[1])==1){
									$show_new_time=$show_new_time.'0';
						 		}else{
									$show_new_time=$show_new_time;
						 		}
						 		if(strlen($a[0])==1){
									$show_new_time='0'.$show_new_time;
						 		}else{
									$show_new_time=$show_new_time;
						 		}
								$showdata=$show_new_time.':00';//09:00:00
						 }
						 else{
								$showdata=$show_new_time.':00';						 	
						 }

						$add_booking = $this->db->query("select * from add_booking_new where spe_id='$spe_id' and service_id='$ser_id' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1' ");
						
						$add_booking_array = $add_booking->result_array();
						foreach ($add_booking_array as $key1) {
						if($key1['worker_id']!='0'){
						$add_booing_count+=count($key1['worker_id']);
						}
						}
						$add_booing_count;

						date_default_timezone_set('Asia/Calcutta'); 
                          $current_time=date('H:i:s');
                          $current_date_loop=date('m/d/Y',$date12);
                          $current_date_show=date('m/d/Y'); 
                          
						$loop_day=date('l',$date12);
                           $database_day1=explode(',',$weekend);
                           $database_day=in_array($loop_day, $database_day1);
		        	    if(($total_availabel_worker<=$add_booing_count) || (($current_date_show==$current_date_loop) && ($showdata<$current_time)) || ($database_day) ){
		?>
		<div class="body_part">
		<button type="button" style="background-color: gray;" disabled=""> <?php echo$show_new_time; ?> </button>
		</div>
		<?php }else{ ?>
		<div class="body_part">
		<button type="button" onclick="valid('<?php echo date('l',$date12); ?>','<?php echo date('Y-m-d',$date12); ?>','<?php echo$showdata; ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>');"> <?php echo $show_new_time; ?> </button>
		</div>
		<?php	} 
	}// for loop end
	$start_time=$str_pm;
$start_time11=explode(':',$start_time);
$end_time=$en_pm;
$end_time11=explode(':',$end_time);
	for($i=$start_time*60+$start_time11[1];$i<=$end_time*60+$end_time11[1];$i+=15){
			$show_new_time= floor($i/60) . ":" . ($i/60-floor($i/60))*60;
		// if($i%2==0){ 
			$date12=strtotime("-$k day", strtotime($id));
            $show_date=date('Y-m-d',$date12);
            $time=$hou+$j.":00:00";
        	$a = $this->db->query("SELECT * FROM worker WHERE spe_id='$spe_id'");
						$result1 = $a->result_array();
						$current_date=date('m/d/Y',$date12);
						$worker_count1=0;
						$worker_work_service_count1=0;
						$add_booing_count=0;
						foreach ($result1 as $key) {
						$worker_id=$key['work_id'];
						$worker_holiday = $this->db->query("select * from worker_holiday where worker_id='$worker_id'");
						$worker_array = $worker_holiday->row();
						$query1 = "";
						if(!empty($worker_array->day_leave_start) || !empty($worker_array->day_leave_end)){
						$day_leave_start=$worker_array->day_leave_start;
						$day_leave_end=$worker_array->day_leave_end;
							$query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
							$worker_holiday1 = $this->db->query("select * from worker_holiday where worker_id='$worker_id' and  '$current_date' $query1 ");						
						$worker_count=$worker_holiday1->num_rows();
						$worker_count1+=$worker_count;
						}

						$worker_work_service = $this->db->query("select * from worker_service where worker_service_id='$worker_id' and service_id='$ser_id' ");
						$worker_work_service_count=$worker_work_service->num_rows();
						$worker_work_service_count1+=$worker_work_service_count;
						}
						$total_availabel_worker=$worker_work_service_count1-$worker_count1;
						$current_date1=date('Y-m-d',$date12);
						$a=explode(':', $show_new_time);
						if(strlen($a[0])==1 || strlen($a[1])==1){
						 		if(strlen($a[1])==1){
									$show_new_time=$show_new_time.'0';
						 		}else{
									$show_new_time=$show_new_time;
						 		}
						 		if(strlen($a[0])==1){
									$show_new_time='0'.$show_new_time;
						 		}else{
									$show_new_time=$show_new_time;
						 		}
								$showdata=$show_new_time.':00';//09:00:00
						 }
						 else{
								$showdata=$show_new_time.':00';						 	
						 }

						$add_booking = $this->db->query("select * from add_booking_new where spe_id='$spe_id' and service_id='$ser_id' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1' ");
						
						$add_booking_array = $add_booking->result_array();
						foreach ($add_booking_array as $key1) {
						if($key1['worker_id']!='0'){
						$add_booing_count+=count($key1['worker_id']);
						}
						}
						$add_booing_count;
						date_default_timezone_set('Asia/Calcutta'); 
                          $current_time=date('H:i:s');
                          $current_date_loop=date('m/d/Y',$date12);
                          $current_date_show=date('m/d/Y'); 
                          
						$loop_day=date('l',$date12);
                           $database_day1=explode(',',$weekend);
                           $database_day=in_array($loop_day, $database_day1);
		        	    if(($total_availabel_worker<=$add_booing_count) || (($current_date_show==$current_date_loop) && ($showdata<$current_time)) || ($database_day) ){
		?>
		<div class="body_part">
		<button type="button" style="background-color: gray;" disabled=""> <?php echo$show_new_time; ?> </button>
		</div>
		<?php }else{ ?>
		<div class="body_part">
		<button type="button" onclick="valid('<?php echo date('l',$date12); ?>','<?php echo date('Y-m-d',$date12); ?>','<?php echo$showdata; ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>');"> <?php echo $show_new_time; ?> </button>
		</div>
		<?php	} 
	}// for loop end
		}
		?>
		</div>
		<?php } ?>
		</div>
		<script type="text/javascript">
			$('.body_part button').on('click', function(){
			$('.body_part button').removeClass('active');
			$(this).addClass('active');
			})
			</script>
		<?php	} 
		else
		{
		// echo 'calender';
		}
	}

	function bookedEntry($spe_id,$ser_id){
		$datalist=$this->db->query("select * from add_booking_new a, register r,service_detail s where a.spe_id='$spe_id' and a.service_id='$ser_id' and r.id=a.user_id and s.ser_detail_id=a.service_id");
		$bookedEntry1 = $datalist->result();

		// print_r($bookedEntry1);die;

		foreach ($bookedEntry1 as $value) {

		echo '<tr>
                           <td class="center" class="numeric">'.$value->name.'</td>
                            <td class="center" class="numeric">'.$value->address.'</td>
                           <td class="center" class="numeric">'.$value->mobile.'</td>
                           <td class="center" class="numeric">'.$value->ser_name.'</td>
                           </tr>';
        }
  		// $this->load->view('specialist/booking_list',$data);  		
	}
}