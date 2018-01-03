<?php
 session_start();
  include 'db.php';
  $user_id=$_SESSION['user_id'];
 ?>
<html lang="en" style="width:100%;overflow-x:hidden;">
<head>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include 'header.php'; ?>
<style>   
.nav-tabs>li>a {
  borde:none !important;
  color:#fff;
}
.nav-tabs>li>a:hover {
  borde:none !important;
  color:#fff;
}
#buttonReservation{
    height: 37px;
    width: 41%; 
    font-weight:bold; 
}
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
<?php
include ('menu_specialist.php');
 ?>

<!-- <div id="search-categorie-item">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="row">
          <div class="col-md-12 categories-heading bt_heading_3">
           <h1 style="color: #850035;">Mes rendez-vous</span></h1>
            <div class="blind line_1"></div>
            <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
            <div class="blind line_2"></div>
          </div>
          <div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Rendez-vous futur</a></li>
    <li><a data-toggle="tab" href="#menu1">Rendez-vous pass&eacute;</a></li>
  </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <p><table class="table">
            <thead>
              <tr>
                <th>Date de r&eacute;servation</th>                
               <th>Heure</th>
                
                <th>Professionnel</th>
		<th>Adresse</th>
		<th>Tel</th>
                <th>Service</th>
                <th>Prix</th>
              </tr>
            </thead>
            <?php 
            date_default_timezone_set('Asia/Calcutta');
            $current_time_chk= strtotime(date("Y-m-d H:i:s"));
            $data=mysqli_query($con,"select * from add_booking_new where user_id='$user_id' and status='1' order by date_booking");
            while($data_array=mysqli_fetch_array($data)){
            $date=$data_array['date_booking'];
            $time1=$data_array['time_booking'];
            $chk_date=strtotime($date." ".$time1);
            $spe_id=$data_array['spe_id'];
            $spe_data=mysqli_query($con,"select * from specialist where spr_id='$spe_id'");
            $spe_data1=mysqli_fetch_array($spe_data);
            $service_id=$data_array['service_id'];
            $service_data=mysqli_query($con,"select * from service where serv_title='$service_id' and spe_id='$spe_id'");
            $service_data1=mysqli_fetch_array($service_data);
            $ser_name=$service_data1['serv_title'];
            $servicedet_data=mysqli_query($con,"select * from service_detail where ser_detail_id='$ser_name'");
            $servicedet_data1=mysqli_fetch_array($servicedet_data);

           if($current_time_chk<=$chk_date){
            // if($date>=$datee){
            ?>
            <tbody>          
              <tr class="success">                
                <td><?php echo $date ?></td>         
		<td><?php echo $time1 ?></td>  
                <td><?php echo $spe_data1['brand_name']; ?></td>
		 <td><?php echo $spe_data1['address']; ?></td>
		  <td><?php echo $spe_data1['contact']; ?></td>
                <td><?php echo $servicedet_data1['ser_name']; ?></td>
                <td><?php echo $service_data1['price'];?></td>
              </tr>      
            </tbody>
            <?php }
            }         
            ?>
            </table></p>
        </div>
      <div id="menu1" class="tab-pane fade">
          <p><table class="table">
            <thead>
              <tr>
                <th>Date de r&eacute;servation</th>         
		<th>Heure</th>
                
                <th>Professionnel</th>
		<th>Adresse</th>
		<th>Tel</th>
                <th>Service</th>
                <th>Prix</th>
              </tr>
            </thead>
            <?php 
            date_default_timezone_set('Asia/Calcutta');
            $current_time_chk= strtotime(date("Y-m-d H:i:s"));
            $data=mysqli_query($con,"select * from add_booking_new where user_id='$user_id' order by date_booking ");
            while($data_array=mysqli_fetch_array($data)){
            $date=$data_array['date_booking'];
            $time1=$data_array['time_booking'];            
            $chk_date=strtotime($date." ".$time1);

            $spe_id=$data_array['spe_id'];
            $spe_data=mysqli_query($con,"select * from specialist where spr_id='$spe_id'");
            $spe_data1=mysqli_fetch_array($spe_data);

            $service_id=$data_array['service_id'];
            $service_data=mysqli_query($con,"select * from service where serv_title='$service_id' and spe_id='$spe_id'");

            $service_data1=mysqli_fetch_array($service_data);
            $ser_name=$service_data1['serv_title'];
            $servicedet_data=mysqli_query($con,"select * from service_detail where ser_detail_id='$ser_name'");
            $servicedet_data1=mysqli_fetch_array($servicedet_data);
            if($current_time_chk>=$chk_date){
            // if($date<$datee){
              ?>
            <tbody>          
              <tr class="success">
                 <td><?php echo $date ?></td>    
		 <td><?php echo $time1 ?></td>   
                <td><?php echo $spe_data1['brand_name']; ?></td>
		 <td><?php echo $spe_data1['address']; ?></td>
		  <td><?php echo $spe_data1['contact']; ?></td>
                <td><?php echo $servicedet_data1['ser_name']; ?></td>
                <td><?php echo $service_data1['price'];?></td>
              </tr>      
            </tbody>
            <?php }
            }         
            ?>
            </table></p>
      </div>
    </div>
</div>          
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="container">
    <div class="col-md-12 col-md-offset-2" style="margin-top: 2em !important;margin-bottom:1em;">
        <div class="row">
           <div class="col-md-11">
             <div class="col-md-4" style="margin-right:-0.2em;">
                <h3 style="border-bottom: 1px solid #0e7a84;font-size: 20px;color:#0e7a84;text-transform: none !important;width: 8.5em;font-weight:bold;">
                Mes Reservations
                </h3>               
             </div> 
             <div class="col-md-7" style="margin-top: 0.7em;"> 
              <button class="btn btn-default" id="buttonReservation" type="button" style="margin-right: 1em;background:#003564;color:#fff;">MES RDV A VENIR</button>
              <button class="btn btn-default" id="buttonReservation" type="button" style="background:#c5074f;color:#fff;">MES RDV A PASSES</button>
             </div>
           </div>
        </div><br>
        <div class="row">
          <div class="col-md-3" style="margin-left: 1em;">
            <!-- <button class="btn btn-default" style="background:#e0dbdc6e;border: 2px solid #e0dbdc6e;"></button> -->
            <a href="addReservation.php"><img src="images/add_btn.png" style="width:30px;height:30px;"/></a>
            <span style="font-weight:bold;color: #121111;font-size: 14px;">Ajouter un RDV Perso</span>
          </div>
        </div><br>
        <div class="row">
            <div class="col-md-11">
              <div class="col-md-2">
               <img style="text-align:center;width: 100px;height:100px;border: 2px solid #5c4949 !important; border-radius: 7px !important;" src="../directory_admin/uploads/manicure.jpg" />
              </div>
              <div class="col-md-5">
                  <address>
                    <strong style="color:#9a0440;font-size:20px;">L & C Coifferue</strong>
                    <p style="font-size:14px;">Reservation le:12/07/2017 a 14H30</p>
                   </address> 
              </div>
              <div class="col-md-3">
                  <button class="btn btn-default" style="float:right;width:100%;background:#333;height:37px;color: #dcd2d2;
    font-weight: bold;
    font-size: 11px;">ANNULER LE RENDEZ VOUS</button>
              </div>
            </div>
            <div class="col-md-9"><hr style="width:100%;margin-left: 1em;border:1px solid #e0d1d161;" /></div>
        </div>
        <div class="row">
            <div class="col-md-11">
              <div class="col-md-2">
               <img style="text-align:center;width: 100px;height:100px;border: 2px solid #5c4949 !important; border-radius: 7px !important;" src="../directory_admin/uploads/manicure.jpg" />
              </div>
              <div class="col-md-5">
                  <address>
                    <strong style="color:#9a0440;font-size:20px;">L & C Coifferue</strong>
                    <p style="font-size:14px;">Reservation le:12/07/2017 a 14H30</p>
                   </address> 
              </div>
              <div class="col-md-3">
                  <button class="btn btn-default" style="float:right;width:100%;background:#333;height:37px;color: #dcd2d2;
    font-weight: bold;
    font-size: 11px;">ANNULER LE RENDEZ VOUS</button>
              </div>
            </div>
            <div class="col-md-9"><hr style="width:100%;margin-left: 1em;border:1px solid #e0d1d161;" /></div>
        </div>

    </div>
</div>
<?php
include ('footer.php');
 ?>
</body>
</html>