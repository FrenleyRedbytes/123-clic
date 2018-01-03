<?php
  session_start();
  
  include 'db.php';
  https://www.googleapis.com/geolocation/v1/geolocate?key=
  $cat_id=$_GET['cat_id'];
  $subcat_id=$_GET['subcat_id'];
  $user_id=$_SESSION['user_id'];
  $zipuser=$_POST['zipuser'];
  
  $latlong=mysqli_query($con,"select * from codepostal where zip_code='$zipuser' ");
	   			$data_lat=mysqli_fetch_array($latlong);
	   			$lat=$data_lat['lat'];
				$long=$data_lat['long'];
 
?>

<html lang="fr">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="specialist_new1.css" />
	
	<?php include 'header.php'; ?>
	
	<style>   

#nav_menu_list ul li a{color: #fff; text-align: left;
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
	
	<?php include ('menu.php'); ?>

	<div>
	  <div class="container">
		<div class="row">
		  <div class="col-sm-12 text-center">
			<div class="row" >
				
			  <div class="col-md-12 categories-heading bt_heading_3">
			   	<h1 style="color: #850035;margin-top: 2%;">Professionnel</span></h1>
				<div class="blind line_1"></div>
				<div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
				<div class="blind line_2"></div>
			  </div>
	
  <!--   // On rÈcupËre les coordonnÈs de toutes les villes pour calculer la distance
$req = "SELECT * FROM specialist WHERE cat_id='$cat_id' and subcat_id='$subcat_id'";
$resultat = mysql_query($req) or die(mysql_error());
while ($row = mysql_fetch_array($resultat)) {
 
$latitude2 = $row['Latitude'];
$longitude2 = $row['Longitude'];
 
$formule = "(6366*acos(cos(radians($lat))*cos(radians($latitude2))*cos(radians($longitude2) -radians($longitude2))+sin(radians($lat))*sin(radians($latitude2))))";
 
 
 $formule2 = 111.13384* rad2deg(acos((sin(deg2rad($lat))*sin(deg2rad($latitude2))) + (cos(deg2rad($lat))*cos(deg2rad($latitude2))*cos(deg2rad($long-$longitude2)))));
 
 
echo $formule;
 if($formule<30){
$requete = "SELECT * FROM specialist WHERE spe_id=$row['spe_id'] ";
mysql_query ($requete) ;}

}-->
		
			  <?php	
				
 

		
	

				$data1=mysqli_query($con,"select * from specialist where cat_id='$cat_id' and subcat_id='$subcat_id' and zip_code='$zipuser'");
                $num_row=mysqli_num_rows($data1);

           		if($num_row>0){
              		while($data_ar1=mysqli_fetch_array($data1)){
                		$spe_id=$data_ar1['spr_id'];
           	  ?>
	   
           				<form method="POST" action="submit_specialist.php" id="frm1">
                     	  <div class="madicament_sec">
            				<div class="col-md-6">
              			 	  <div class="col-md-5">
                				<span class="pic_outer"><img src="../directory_admin/uploads/<?php echo $data_ar1['brand_logo']; ?>" class="inside"></span>
              				  </div>
              				  <div class="col-md-7" id="search-categorie-item" style="padding: 0 0px 60px 0;">
								  <h2>
									<?php echo $data_ar1['brand_name'];?>
									&nbsp;
									<?php
										$spr_id=$data_ar1['spr_id'];
										$data11=mysqli_query($con,"select * from favorite where spe_id='$spr_id' and user_id='$user_id' ");
						
										$data_favorite=mysqli_query($con,"SELECT count(user_id) AS ctrfavorite FROM favorite WHERE spe_id='$spe_id'");
										$array_favorite=mysqli_fetch_array($data_favorite);

										$ctrfavorite=$array_favorite['ctrfavorite'];

										if($dat_ar=mysqli_fetch_array($data11)){
									?>
											<a href="favorite.php?fav_did=<?php echo $spr_id; ?>&cat_id=<?php echo $cat_id;?>&subcat_id=<?php echo $subcat_id;?>"><i class="fa fa-heart" aria-hidden="true" style="color: red"></i></a>
									<?php }else{ ?>
											<a href="favorite.php?fav_iid=<?php echo $spr_id; ?>&cat_id=<?php echo $cat_id;?>&subcat_id=<?php echo $subcat_id;?>">
											<i class="fa fa-heart" aria-hidden="true"></i>
											</a>
									<?php } ?>
								  </h2>
								  <p><?php echo $data_ar1['disc']; ?></p>
								  <ul>
									  
									 <li> <?php echo $lat;  ?></li> <li> <?php echo $long;  ?></li>
									<li><?php echo $data_ar1['address'];  ?></li>
									<li><?php echo $data_ar1['zip_code'];  ?></li>
									<li><?php echo $data_ar1['city_name'];  ?></li>
									  <li>  <?php echo $ctrfavorite; ?> </li>
								  </ul>
								  <input type="hidden" name="date" id="date_show<?php echo $spe_id; ?>" >
								  <input type="hidden" name="time" id="time_show<?php echo $spe_id; ?>" >
								  <input type="hidden" name="spe_id" id="spe_id<?php echo $spe_id; ?>" >
								  <input type="hidden" name="service_id" id="service_id<?php echo $spe_id; ?>"  >
								  <input type="hidden" name="cat" value="<?php echo $cat_id; ?>">
								  <input type="hidden" name="subcat" value="<?php echo $subcat_id; ?>">
								  
								  
								  <select class="spel_select" name="service" required="" onchange="calen(<?php echo $spe_id; ?>,this.value);">
									<option value="">Selectionner un service</option>
									<?php 
										$chk1 = mysqli_query($con, "SELECT * FROM `service` where spe_id='$spe_id' group by serv_title");

										while ($c1 = mysqli_fetch_array($chk1)){
										  $ser_detail_id=$c1['serv_title'];
										  $chk11 = mysqli_query($con, "SELECT * FROM `service_detail` where ser_detail_id='$ser_detail_id'");
										  $c2 = mysqli_fetch_array($chk11);
									?>
										  <option value="<?php echo $c2['ser_detail_id']; ?>"><?php echo $c2['ser_name']; ?></option>
									<?php } ?>
								  </select> 
								  	

								  <!-- <button type="submit" name="add_booking">Montrer les d√©tails</button> -->
              				</div>
            			</div>
              			<div class="col-md-6">
            				<span id="demo<?php echo $spe_id; ?>" style="color: red;"></span>
                			<div class="col-xs-12" id="city<?php echo $spe_id; ?>" >       
                    			<!-- <img src="images/calender.PNG" onclick="service_select(<?php echo $spe_id; ?>);"> -->
                    			<center><p  style="font-family: sans-serif;">
									<?php  
										$current_day=strtolower(date('D'));
										$current_time=date('H:i:s');
										$current_hour=date('H');
										$current_minute=date('i');
										$current_date=date('Y-m-d');

										$data_workinghours=mysqli_query($con,"SELECT * FROM specialist where spr_id='$spe_id'");
										$array_workinghours=mysqli_fetch_array($data_workinghours);

										$start_am=$array_workinghours[$current_day.'_from_am_time'];
										$end_am=$array_workinghours[$current_day.'_to_am_time'];
										$start_pm=$array_workinghours[$current_day.'_from_pm_time'];
										$endpm=$array_workinghours[$current_day.'_to_pm_time'];

										$data_service=mysqli_query($con,"SELECT min(time) AS time FROM service WHERE spe_id='$spe_id'");
										$array_service=mysqli_fetch_array($data_service);

										$minservicetime=$array_service['time'];

										$data_lastbooking=mysqli_query($con,"SELECT min(start) AS booking FROM add_booking_new WHERE spe_id='$spe_id' AND start>now() order by booking_id DESC");
										$array_lastbooking=mysqli_fetch_array($data_lastbooking);

										$lastbooking=$array_lastbooking['booking'];

										$result = 1;

										if ($current_time<$start_am) {
											$current_hour = date("H", strtotime($start_am));
										}
										elseif (($current_time>$end_am) AND ($current_time<$start_pm)) {
											$current_hour = date("H", strtotime($start_pm));
										}

										do{
											$ctr = 1;
											//break;
											do{
												if ((strtotime($current_hour.':00:00')>strtotime($current_time)) AND ($ctr==1)){
													$firstfreebooking=$current_hour.':00:00';
												}
												elseif ((strtotime($current_hour.':15:00')>strtotime($current_time)) AND ($ctr==2)){
													$firstfreebooking=$current_hour.':15:00';
												}
												elseif ((strtotime($current_hour.':30:00')>strtotime($current_time)) AND ($ctr==3)){
													$firstfreebooking=$current_hour.':30:00';
												}
												elseif ((strtotime($current_hour.':45:00')>strtotime($current_time)) AND ($ctr==4)){
													$firstfreebooking=$current_hour.':45:00';
												}
												else {
													break;
												}	

												$sqlquery = "SELECT count(booking_id) AS isbooked FROM add_booking_new WHERE spe_id='$spe_id' AND date_booking='$current_date' AND time(start)='$firstfreebooking'";
												$data_result=mysqli_query($con,$sqlquery);
												$array_result=mysqli_fetch_array($data_result);

												$result=$array_result['isbooked'];

												if ($result==0) {
													break;
												}	

												$ctr++;

											} while ($ctr<5);

											//break;

											if ($result>0) {
												if ($current_hour<$endpm) {
													$current_hour = $current_hour + 1;
												}
												else {
													$current_hour = $start_am;
													//$current_date = strtotime(date("Y-m-d", strtotime($current_date)) . " +1 day");
													$current_date = date("Y-m-d", strtotime($current_date)." +1 day");
												}
											}

										} while ($result>0);	

										$current_date=date('d/m/Y',strtotime($current_date));

										/*if ((strtotime($current_time)>strtotime($start_am)) AND (strtotime($current_time)<strtotime($end_am))){
											$info='RDV matin';	
										}
										elseif ((strtotime($current_time)>strtotime($start_pm)) AND (strtotime($current_time)<strtotime($endpm))){
											$info='RDV apr√®s midi';
										}
										else {
											$info='Ferm√©';
										}*/
									?>
									Premier rendez-vous disponible le<b><font size="5"  style="color: #850035;">
									<?php  date_default_timezone_set('Europe/Paris');
									  //echo $date=date('Y-m-d');
									  //echo $date=strtolower(date('D'));
									  //echo $ctr.' / '.$current_hour.' / '.$current_date.' / '.$result.' / '.$firstfreebooking.' / '.$sqlquery;
									  echo $current_date; ?></font> a <font size="5"  style="color: #850035;"><?php echo $firstfreebooking; ?>
									  </font></b><br><br><br>
									  Selectionnez le service pour v&eacute;rifier le calendrier.
								</p></center>
                			</div>
            			</div>
          				</div>
         			 </form>
          		<?php } }else{ 
						echo ' <div class="alert alert-success alert-dismissable col-md-6" style="margin-left: 25%">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  			No record founds.
								</div> ';
				} ?>          
          		<hr>
			</div>
		  </div>
		</div>
	  </div>
	</div>

	<?php include ('footer.php'); ?>
 
	<script type="text/javascript">
    	$('.body_part button').on('click', function(){
      		$('.body_part button').removeClass('active');
      		$(this).addClass('active');
  		})
 	</script>
</body>

</html>

<script type="text/javascript">

function calen(spe_id,val){

  $.ajax({
  type: "GET",
  url: 'ajax_calender1.php?spe_id='+spe_id+'&ser_id='+val,
  success: function(data){
  document.getElementById("demo"+spe_id).innerHTML = "";
  $('#city'+spe_id).html(data);
  }
  });
}

function service_select(spe_id){
  document.getElementById("demo"+spe_id).innerHTML = "Please select service first.";  
}

function valid(day,date,time,spe_id,service){  
 
  $.ajax({
  type: "GET",
  url: 'submit_specialist.php?date='+date+'&time='+time+'&spe_id='+spe_id+'&service_id='+service,
  success: function(data){
    // console.log(data);
      response1=JSON.parse(data);
      var last_id=response1.last_id;
      if(response1.chk=='true'){
          window.location = "special_detail_new.php?last_id="+last_id;
      }else{
          document.getElementById('demo').innerHTML="Something is wrong";
      }
  }
  });
  //$('#frm1').submit();
}


function right(date1,spe_id,ser_id){   
  $.ajax({
  type: "GET",
  url: 'ajax_calender.php?date1='+date1+'&spe_id='+spe_id+'&ser_id='+ser_id,
  success: function(data){
    
  $('.my_table').html(data);
  }
  });
}  

function left(date1,spe_id,ser_id){
  $.ajax({
  type: "GET",
  url: 'ajax_leftcalender.php?date1='+date1+'&spe_id='+spe_id+'&ser_id='+ser_id,
  success: function(data){
    
  $('.my_table').html(data);
  }
  });
}  
</script>
