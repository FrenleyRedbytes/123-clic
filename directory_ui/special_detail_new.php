<?php

	session_start();

	include 'db.php';

	$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");

	if(isset($_POST['submit'])){

		$last_id=$_POST['last_id'];
		$worker=$_POST['worker'];
		$comment=$_POST['comment'];    
		$upd_add=mysqli_query($con,"update add_booking_new set worker_id='$worker', color='#00A058' where booking_id='$last_id' ");
		
		if (!empty($comment)) {
			$ins_com=mysqli_query($con,"insert into comment (last_id,comment) values('$last_id','$comment')");
		}
		   
		header('location:index.php');
	}

	if(isset($_POST['delete'])){

		$last_id=$_POST['last_id'];    
		$del_com=mysqli_query($con,"delete from add_booking_new where booking_id='$last_id'");
		header('location:index.php');
	}
?>

<html lang="fr">
	


<head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php include 'header.php'; ?>
<style>   
#nav_menu_list ul li a{
	color: #fff; text-align: left;
font-size: 10px;
float: none;
width: 100%;
padding: 10px;
}
#nav_menu_list ul li a i{font-size: 25px;}
    .askemmy { 
        background: #fff url(chrome-extension://gllmlkidgbagkcikijiljllpdloelocn/logo_housefly_new.png) no-repeat right 5px bottom 5px;background-size: 45px;}   
    .askemmy {
        z-index: 10000;position: fixed;display: block;width: 350px;height: 145px;background-color: white;border-radius: 2px;box-shadow: rgb(133, 133, 133) 0px 0px 25px 1px;margin: 0 auto;text-align: center;margin-left: 35%;margin-top: 10%;} 
    .askemmy p#msg {
        font-size: 1.1em;font-weight: 600;margin-top: 31px;margin-bottom: 20px;}
    .askemmy .error-msg {color: #FF5600padding-top: 10px;}
    .askemmy .success-msg {color: green;padding-top: 10px;}  
    .askemmy input {padding: .5em .6emdisplay: inline-block;border: 1px solid #ccc;box-shadow: inset 0 1px 3px #ddd;border-radius: 4px;vertical-align: middle;-webkit-box-sizing: border-box;box-sizing: border-box;           line-height: normal;-webkit-appearance: textfield;cursor: auto;} 
    .askemmy input[type="submit"] {font-family: inherit;font-size: 100%;padding: .5em 1em;color: white;font-weight: 600;border: 1px solid #999;border: 0 rgba(0,0,0,0);background-color: rgba(31, 196, 255, .8);text-decoration: none;border-radius: 2px;display: inline-block;zoom: 1;line-height: normal;white-space: nowrap;vertical-align: middle;text-align: center;cursor: pointer;-webkit-user-drag: none;-webkit-user-select: none;user-select: none;-webkit-box-sizing: border-box;box-sizing: border-box;}   .askemmy .closebox {display: inline-block;height: 16px;width: 16px;position: absolute;right: 4px;           top: 4px;cursor: pointer;background: url(chrome-extension://gllmlkidgbagkcikijiljllpdloeloc           n/close_box.png)} 
    .pop-up-report {background: #fff url(chrome-extension://gllmlkidgbagkcikijiljllpdloelocn/logo_housefly_new.png) no-repeat right 5px bottom 5px;background-size: 45px;}      
    .pop-up-report {z-index: 10000;position: fixed;display: block;width: 400px;height: 200px;background-color: white;border-radius: 2px;box-shadow: rgb(133, 133, 133) 0px 0px 25px 1px;margin: 0 auto;text-align: left;margin-left: 35%;margin-top: 10%;padding-left:10px;padding-bottom:10px; padding-top:10px;font-family: Arial,sans-serif;font-size:13px;}  
    .pop-up-report textarea {width:380px;height:75px;padding: .5em .6em;display: inline-block;border: 1px solid #ccc;box-shadow: inset 0 1px 3px #ddd;border-radius: 4px;vertical-align: middle;-webkit-box-sizing: border-box;box-sizing: border-box;line-height: normal;-webkit-appearance: textarea;cursor: auto;}   
    .pop-up-report input[type="button"] {font-family: Arial,sans-serif;font-size: 100%;padding: .5em 1em;color: white;font-weight: 600;border: 1px solid #999;border: 0 rgba(0,0,0,0);background-color: rgba(31, 196, 255, .8);text-decoration: none;border-radius: 2px;display: inline-block;zoom: 1;line-height: normal;white-space: nowrap;vertical-align: middle;text-align: center;cursor: pointer;-webkit-user-drag: none;-webkit-user-select: none;user-select: none;-webkit-box-sizing: border-box;box-sizing: border-box;margin-top:5px;}        
    .pop-up-report select {background-color:rgb(221,221,221);border: 1px solid #DDD;border-radius: 4px 4px 4px 4px;height:25px;width:380px;padding: 3px;}     
    .pop-up-report select {align: center;text-align: center;}     
    .alert_message_mc {background: #fff url(chrome-extension://gllmlkidgbagkcikijiljllpdloelocn/logo_housefly_new.png) no-repeat right 5px bottom 5px;background-size: 45px;}    
    .alert_message_mc {z-index: 10000;position: fixed;display: block;width: 350px;height: 145px;            background-color: white;border-radius: 2px;box-shadow: rgb(133, 133, 133) 0px 0px 25px 1px; margin: 0 auto;text-align: center;margin-left: 35%;margin-top: 10%;}   
    .alert_message_mc p#msg {padding-top:60px;}     
    .alert_message_mc p{margin: auto;}       
    .alert_message_mc .error-msg {color: #FF5600;padding-top: 10px;}  
    .alert_message_mc .success-msg {color: green;padding-top: 10px;}   
    .alert_message_mc input {padding: .5em .6em;display: inline-block;border: 1px solid #ccc;           box-shadow: inset 0 1px 3px #ddd;border-radius: 4px;vertical-align: middle;-webkit-box-sizing: border-box;box-sizing: border-box;line-height: normal;-webkit-appearance: textfield;cursor: auto;}           .alert_message_mc input[type="submit"] {font-family: inherit;font-size: 100%;padding: .5em 1em;color: white;font-weight: 600;border: 1px solid #999;border: 0 rgba(0,0,0,0);background-color: rgba(31, 196, 255, .8);text-decoration: none;border-radius: 2px;display: inline-block;zoom: 1;line-height: normal;white-space: nowrap;vertical-align: middle;text-align: center;cursor: pointer;            -webkit-user-drag: none;-webkit-user-select: none;user-select: none;-webkit-box-sizing: border-box;box-sizing: border-box;}       
     .alert_message_mc .closebox {display: inline-block;height: 16px;width: 16px;position: absolute;right: 4px;top: 4px;cursor: pointer;background: url(chrome-extension://gllmlkidgbagkcikijiljllpdloelocn/close_box.png)}  

     #daysStyleFinal{
    		font-size:12px;
    		opacity:0.8;
    		font-family:Arial;
    		border-top: none !important;
    	}

		.table
		{
			
			border-bottom:2px solid #ccc;
			font-family:Arial;
			border-right:2px solid #ccc;
		    border-left:2px solid #ccc;
		    border-top:none !important;
		}
		.table>tbody>tr>td{
			border-top: 0px solid #fff !important;
		}     
  </style>
  <style type="text/css">
  
.directory_one{
  width: 100%; background: none;
}

.inside{
  width: 250px; background: #fff; border:2px solid #999; height: 250px; border-radius: 125px;
  overflow: hidden;
}

.inside img{
  width: 100%;
  display: block;
  margin: 0px auto;
  height: 100%;
}

.directory_one h2{
  font-size: 20px;
  text-align: center;
  margin: 10px 0px;
  color: #000;
}

</style>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/29/2/common.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/29/2/util.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/29/2/stats.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps/api/js/AuthenticationService.Authenticate?1shttp%3A%2F%2Flocalhost%2F123_CLIC%2Findex.php&amp;callback=_xdc_._kup6ee&amp;token=72873"></script>
    </head>

<body>
	<div id="vfx_loader_block" style="display: none;">
  		<div class="vfx-loader-item"> <img src="images/loading.gif" alt=""> </div>
	</div>
	
	<?php include ('menu_specialist.php'); ?>

	<?php 
		$last_id=$_GET['last_id'];

		$sql=mysqli_query($con,"select * from add_booking_new where booking_id='$last_id' ");
		$sql_data=mysqli_fetch_array($sql);
		$spe_id=$sql_data['spe_id'];
		$service_id=$sql_data['service_id'];
		$worker_id=$sql_data['worker_id'];

		$data1=mysqli_query($con,"select * from specialist where spr_id='$spe_id' ");
		$data_ar1=mysqli_fetch_array($data1);

		//$data2=mysqli_query($con,"select * from service where serve_id='$service_id' ");
		$data2=mysqli_query($con,"select * from service where serv_title='$service_id' ");
		$data_ar2=mysqli_fetch_array($data2);
		//$serv_id=$data_ar2['serve_id'];
		$service_price=$data_ar2['price'];
		$service_time=$data_ar2['time'];

		$data3=mysqli_query($con,"select * from worker where work_id='$worker_id' ");
		$data_ar3=mysqli_fetch_array($data3);

		//$data34=mysqli_query($con,"select * from service_detail where ser_detail_id='$serv_id' ");
		$data34=mysqli_query($con,"select * from service_detail where ser_detail_id='$service_id' ");
		$data_ar33=mysqli_fetch_array($data34);

		$worker_id_get1=mysqli_query($con,"select * from worker where spe_id='$spe_id' ");
		$service_worker_avl=[];
		$worker_without_holiday=[];
		$current_date=date('m/d/Y',strtotime($sql_data['date_booking']));
		$time_booking11=$sql_data['time_booking'];

		while($worker_id_array1=mysqli_fetch_array($worker_id_get1)){

			$worker12=$worker_id_array1['work_id'];
			$worker_service=mysqli_query($con,"select * from worker_service where worker_service_id='$worker12' and service_id='$service_id' ");
			$worker_id_with_service=mysqli_fetch_array($worker_service);
			$worker_id=$worker_id_with_service['worker_service_id'];
			$service_worker_avl[].=$worker_id_with_service['worker_service_id'];


			$worker_holiday=mysqli_query($con,"select * from worker_holiday where worker_id='$worker_id' ");
			$data1=mysqli_fetch_array($worker_holiday);  
			$query1 = "";

			if(!empty($data1['day_leave_start']) || !empty($data1['day_leave_end'])){

				$day_leave_start=$data1['day_leave_start'];
				$day_leave_end=$data1['day_leave_end'];
				$query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
				$worker_holiday1=mysqli_query($con,"select * from worker_holiday where worker_id='$worker12' and  '$current_date' $query1 ");
			}  

			$worker_id_without_hoiliday=mysqli_fetch_array($worker_holiday1);
			$worker_without_holiday[].=$worker_id_without_hoiliday['worker_id'];

		  }
  
		  $worker_available = array_diff($service_worker_avl, $worker_without_holiday);
		  $current_date11=date('Y-m-d',strtotime($sql_data['date_booking']));
		  $worker_id_get=mysqli_query($con,"select worker_id from add_booking_new where spe_id='$spe_id' and status='1' and date_booking='$current_date11' and time_booking='$time_booking11'" );
		  $add_booking_worker=[];
  
		  while($worker_id_array=mysqli_fetch_array($worker_id_get)){
			$add_booking_worker[].=$worker_id_array['worker_id'];
		  }

		  $result = array_diff($worker_available, $add_booking_worker);
		  $get_id=implode(',', $result);
		?>

		<!-- <div id="search-categorie-item">
		  <div class="container">
			<div class="row">
			  <div class="col-sm-12 text-center">
				<div class="row">
				  <div class="col-md-12 categories-heading bt_heading_3">
				   	<h1 style="color: #850035;">Détails du rendez-vous</span></h1>
					<div class="blind line_1"></div>
					<div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
					<div class="blind line_2"></div>
				  </div>
				  <div class="Specialist_block">
          			<form method="post">
						<div class="madicament_sec">
            				<div class="col-md-6">
              			 	  <div class="col-md-5">
								<span><img src="../directory_admin/uploads/<?php echo $data_ar1['brand_logo']; ?>" class="inside"></span>	
							  </div>
							  <div class="col-md-5">	
								<h2><?php echo $data_ar1['brand_name']; ?></h2>
								<ul>
									  <li><?php echo $data_ar1['disc']; ?></li>
									  <li><?php echo utf8_encode($data_ar1['address']); ?></li>
									  <li><?php echo utf8_encode($data_ar1['address_map']); ?></li>	  
									  <li> Tel: <?php echo $data_ar1['contact']; ?></li>
								</ul>
							  </div>	
							</div>
						</div>
						<h3> Service </h3>
						<p><?php echo ucfirst($data_ar33['ser_name']); ?></p>

						<p><select class="form-control" name="worker" style="width: 20%;margin-left: 40%;" >
            				<?php 
            
								if(empty($get_id)) {
								  echo '<option value="">Aucun employe</option>';
								}else{ 
								  echo '<option value="">Choix employé</option>';

								  $sql1=mysqli_query($con,"SELECT * from worker Where work_id IN ($get_id)");

								  while($worker_data=mysqli_fetch_array($sql1)) {?>

									<option value="<?php echo $worker_data['work_id']; ?>"><?php  echo $worker_data['first_name']; ?>&nbsp;<?php  echo $worker_data['last_name']; ?></option>
              				<?php  } }?>
          
						</select></p style="height: 83px;">
						
						<p><textarea class="form-control" id="exampleTextarea" name="comment" rows="8" placeholder="Vous pouvez saisir un commentaire pour le rendez-vous..." style="margin-top: 1%;"" ></textarea>
          				</p>

						<h3> Date et Heure: </h3>
						
						<p>
							<?php
							 echo $jour[date("w", strtotime($sql_data['date_booking']))]."&nbsp;"; $da=$sql_data['date_booking'];
							 echo date("d F Y", strtotime($da)); ?> à 
							 <?php
								  echo $time_show=$_SESSION['time_show'];
								  //date('h:i', strtotime($ti));
							  ?> 
						 </p>
							
            			<h3> Durée estimée: <?php echo $service_time; ?> min  /  Prix: <?php echo $service_price; ?>€ TTC</h3>
						                             
						<input type="hidden" name="last_id" value="<?php echo $last_id; ?>">
						<button type="submit" name="delete"> Annuler </button>
						<button type="submit" name="submit"> Confirmer </button>
           			 </form>
          			</div>
          			<hr>
				</div>
			  </div>
			</div>
		  </div>
		</div> -->

		<div class="container">
				<div class="row">
						<div class="col-md-12" style="margin-top: 2em !important;margin-left:3em;margin-bottom:1em;">
							<!-- <div class="col-md-4 col-md-offset-2">
									<div class="inside" style="width: 180px;height:180px;border: 2px solid #5c4949 !important; border-radius: 7px !important;">
										<img src="../directory_admin/uploads/008.jpg" />	
									</div>								
							</div>
							<div class="col-md-4">
								<input type="button" class="btn" style="background:#c5074f;color:#fff;border-radius:10px;" value="Annuler"/>
								<input type="button" class="btn" style="background:#016891;color:#fff;border-radius:10px;" value="Confirmer"/>
							</div> -->
							<div class="col-md-4 col-md-offset-2">
								<p>
									<div class="inside" style="text-align:center;width: 180px;height:180px;border: 2px solid #5c4949 !important; border-radius: 7px !important;">
										<img src="../directory_admin/uploads/manicure.jpg" />	
									</div>								
								</p>
								<p>
									<div>
											<label style="text-transform: uppercase;color:#0e7a84;">Medicement</label><br>
									In descriptive writing, the author does not tell the reader what was seen, felt, tested, smelled, or heard.  Rather, he describes.
									</div>
								</p>
								<p>Distance:2.3|Reviews:8</p>
							</div>
							<div class="col-md-4">
								<p>
								<address>
				 					<strong style="color:#0e7a84;">Votre de le reservation</strong>
				 					<br>
				 					<br />
				 					<span style="color:#c5074f;font-weight:bold;"> Addresse</span>
				 					<br />795 Folsom Ave, Suite 600
									San Francisco, CA 94107
									P: (123) 456-7890 
									<br />
									<span style="color:#c5074f;font-weight:bold;">
										Prestation Selectionne
 									</span>
 									<br>
 									795 Folsom Ave, Suite 600
									San Francisco, CA 94107
									<br />
									<span style="color:#c5074f;font-weight:bold;">
										Date et Heure:
									</span>
									<br>
									San Francisco, CA 94107
									<br />
									<span style="color:#c5074f;font-weight:bold;">
										Prix:
									</span>
									<br>
									San Francisco, CA 94107
								</address>
								</p>
								<p>
								<input type="button" class="btn" style="background:#c5074f;color:#fff;border-radius:10px;" value="Annuler"/>
								<input type="button" class="btn" style="background:#0e7a84;color:#fff;border-radius:10px;" onclick="gotoPage('index.php',<?php echo '1';?>)" value="Confirmer"/>
								</p>
							</div>
						</div>
				</div>

		</div>
							
<?php include ('footer.php'); ?>
							
</body>
							
</html>