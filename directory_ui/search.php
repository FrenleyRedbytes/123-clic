<?php 

include 'db.php'; 
session_start();
  $user_id=$_SESSION['user_id'];
  // if(isset($_POST['add_booking'])){
    
  // }

  //print_r($_POST);die;



?>
<html lang="en">
<head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php include 'header.php'; ?>
<style>  

#appointedColor{
  background:#95e8e1;
  color:#000;
} 
.table>tbody>tr>td
{
      border-top:none !important;
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
    <!-- <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps/api/js/AuthenticationService.Authenticate?1shttp%3A%2F%2Flocalhost%2F123_CLIC%2Findex.php&amp;callback=_xdc_._kup6ee&amp;token=72873"></script> -->
    </head>
<body>
<div id="vfx_loader_block" style="display: none;">
  <div class="vfx-loader-item"> <img src="images/loading.gif" alt=""> </div>
</div>
<?php
include ('menu_specialist.php');
 ?>

 <style>  
   
.madicament_sec{
  width: 100%; background: none; padding: 35px 0px; float: left; border-bottom: 1px solid #dadada;
}

.madicament_sec img{
  width: 100%; display: block; margin: 0px auto;
}

.madicament_sec h2{
  font-size: 22px;
  margin:10px 0px;
  color: #333;
  text-align: left;
}

.madicament_sec p{
  font-size: 15px;
  font-weight: bold;
  margin:10px 0px;
  color: #777;
  text-align: left;
}

.madicament_sec ul{
  margin: 0px auto;
  padding: 0px;
  list-style: none;
  text-align: left;
}

.madicament_sec li{
  float: none;
  display: inline-block;
  font-size: 12px;
  text-align: center;
  font-weight: bold;
  color: #777;
  border-left: 2px solid #777;
  padding: 5px 10px;
}

.madicament_sec li:first-child{
  border: none;
  padding-left: 0px;
}

.madicament_sec button{
  width: 180px !important;
  padding: 10px 0px !important;
  margin: 5px 0px !important;
  display: block !important;
}

.pic_outer{
  width: 140px;
  height: 140px;
  border-radius: 15px;
  vertical-align: middle;
  display: -webkit-inline-box;
  overflow: hidden;
}

.pic_outer img{
  max-width: 100%;
  display: block;
  margin: 0px auto;
  max-height: 100%;
}
.inside{
  width: 250px; background: #fff; border:2px solid #999; height: 250px; border-radius: 125px;
  overflow: hidden;
}

/* Add New Css */

.spel_select{
  width: 200px;
  display: block;
  -webkit-appearance: menulist-button;
  padding: 8px 5px;
  margin: 7px 0px;
}

.table-responsive{
  height: 250px;
  overflow-y: auto;
}

.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th{
  font-family: sans-serif;
  text-align: center;
    vertical-align: middle;
}

.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th{
  font-size: 15px;
}

.child_border{
  border-bottom: 1px solid #999;
    border-top: 1px solid #999;
}

.parent_div{
      border-right: 1px solid #999;
    border-top: 1px solid #999;
    border-left: 1px solid #999;
}

.main_table{
  width: 100%;
  height: 300px;
  overflow: auto;
  overflow-x: scroll;
}

/* Add New Css */

 </style>
<style type="text/css">
  
.my_table{
  width: 100%; background: none;
}

.head_div{
  width: 100%; background: none; text-align: center; position: relative;
}

.head_part{
  width: 30%; float: none; display: inline-block; position: relative;;
}

.head_part h3{
  text-align: center; font-size: 16px; margin: 10px 0px; color: #333; line-height: 25px
}

.body_div{
  width: 100%; background: none; text-align: center; padding: 10px 0px; border-top: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; overflow: auto; height: 220px;
}

.body_part{
  width: 100%; float: none; display: inline-block;
}

.body_part button{
  background: #95e8e1; border-radius: 5px !important; font-weight: bold !important; width: 125px !important; margin: 5px auto !important; display: block !important; padding: 10px 0px; border: none
}

.table_icon{
  width: 20px; height: 30px;  display: inline-block; position: absolute; top: 21px; cursor: pointer;
}

.table_icon img{
  width: 100%;
  display: block;
  margin: 0px auto;
}

.left{
  left:0px;
}

.right{
  right:0px;
}

.active{
  background-color: #f00 !important; color: #fff !important;
}

.body_row{
  width: 33%;
  background: none;
  float:left;
}
#daysStyle{
  font-size:12px;
  color:#000;
  word-wrap: break-word;min-width: 60px;max-width: 60px;
}

</style>
 <div class="container">
  <div class="row" >
    <div class="col-md-12" style="margin-top: 2em !important;">

       <?php 
     // $specialist_id = $_GET['spe_id'];
      $latDefault = $_POST['latitude'];
      $longDefault = $_POST['longitude'];
      $cat_id = $_POST['cat'];
      $subcat_id = $_POST['subcat'];
      $jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
  
    
        $radius = 300;
        $limit = 8;  

        if (isset($_GET["page"])) { 

          $page  = $_GET["page"]; 

        } else { 

          $page=1;


        };
        $start_from = ($page-1) * $limit;  
        $service_data = '';     
         
          /*function getLnt($zip){
                $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false";
                $result_string = file_get_contents($url);
                $result = json_decode($result_string, true);
                return $result['results'][0]['geometry']['location'];
          }

           $userQuery = mysqli_query($con,"select zip_code from register where email='".$_SESSION['email']."'");
           
            if(mysqli_num_rows($userQuery)==1){

                 $userZipcode = mysqli_fetch_array($userQuery);
                 
                 $getLatLong['result'] = getLnt($userZipcode['zip_code']);
                 
                 $lat = $getLatLong['result']['lat'];
                 $long = $getLatLong['result']['lng'];
                 
                 $service_data = mysqli_query($con,"SELECT ser.*,s.*,sd.*,(6371 * ACOS( COS( RADIANS( $lat ) ) * COS( RADIANS( s.lat ) ) * COS( RADIANS( s.longt ) - RADIANS( $long ) ) + SIN( RADIANS( $lat ) ) * SIN( RADIANS( s.lat ) ) ) ) AS distance FROM `service` ser inner join `specialist` s on ser.spe_id=s.spr_id inner join service_detail sd on ser.serv_title = sd.ser_detail_id  where ser.spe_id=$specialist_id HAVING distance <=$radius  ORDER BY distance desc limit $start_from,$limit");

                
            }else{
                 $service_data = mysqli_query($con,"SELECT ser.*,s.*,sd.*,(6371 * ACOS( COS( RADIANS( $latDefault ) ) * COS( RADIANS( s.lat ) ) * COS( RADIANS( s.longt ) - RADIANS( $longDefault ) ) + SIN( RADIANS( $latDefault ) ) * SIN( RADIANS( s.lat ) ) ) ) AS distance FROM `service` ser inner join `specialist` s on ser.spe_id=s.spr_id inner join service_detail sd on ser.serv_title = sd.ser_detail_id  where ser.spe_id=$specialist_id HAVING distance <=$radius  ORDER BY distance desc limit $start_from,$limit");
            }*/

          
      /*$service_data = mysqli_query($con,"SELECT ser.*,s.*,sd.*,(6371 * ACOS( COS( RADIANS( $latDefault ) ) * COS( RADIANS( s.lat ) ) * COS( RADIANS( s.longt ) - RADIANS( $longDefault ) ) + SIN( RADIANS( $latDefault ) ) * SIN( RADIANS( s.lat ) ) ) ) AS distance FROM `service` ser inner join `specialist` s on ser.spe_id=s.spr_id inner join service_detail sd on ser.serv_title = sd.ser_detail_id  HAVING distance <=$radius  ORDER BY distance desc limit $start_from,$limit");*/

     $service_data = mysqli_query($con,"SELECT s.*,(6371 * ACOS( COS( RADIANS( $latDefault ) ) * COS( RADIANS( s.lat ) ) * COS( RADIANS( s.longt ) - RADIANS( $longDefault ) ) + SIN( RADIANS( $latDefault ) ) * SIN( RADIANS( s.lat ) ) ) ) AS distance FROM `specialist` s  where s.cat_id=$cat_id and s.subcat_id=$subcat_id HAVING distance<=$radius ORDER BY distance desc");

     $num_row = mysqli_num_rows($service_data);


     // echo "SELECT s.*,(6371 * ACOS( COS( RADIANS( $latDefault ) ) * COS( RADIANS( s.lat ) ) * COS( RADIANS( s.longt ) - RADIANS( $longDefault ) ) + SIN( RADIANS( $latDefault ) ) * SIN( RADIANS( s.lat ) ) ) ) AS distance FROM `specialist` s  where s.cat_id=$cat_id and s.subcat_id=$subcat_id HAVING distance<=$radius ORDER BY distance desc";die;

      ?>

      
      
      <?php if($num_row>0){?>


        <div class="row">
              <div class="col-md-7" style="float:right;">
                  <table class="table" style="margin-bottom: 0px !important;width: 97% !important;">
                    <thead class="table-striped" style="color:#9a0440;font-weight:normal;">
                        <tr >
                        <?php for($i=0;$i<7;$i++){?>
                              <th>
                                  <strong style="font-size:14px;"><?php echo $jour[date('w',strtotime("+$i day"))];?></strong><br>
                                  <div id="daysStyle"><?php echo date('d M',strtotime("+$i day"));?></div>
                              </th>
                          <?php }?>
                      </tr>
                    </thead>
                  </table>
              </div>
      </div>
     <?php  

     while($service_data_row=mysqli_fetch_array($service_data)){

      $specialist_id = $service_data_row['spr_id'];
      
      $serviceQuery = mysqli_query($con,"SELECT ser.* FROM `service` ser  where ser.spe_id=$specialist_id and ser.status_service='1' ORDER BY ser.serve_id desc limit 1");


      while($actual_service  = @mysqli_fetch_array($serviceQuery)){
           $timeOfService = $actual_service['time'];
           $serviceId = $actual_service['serv_title'];
           $spe_id_from_db = $actual_service['spe_id'];

           $rand = array_rand($colours);
      ?>
          <div class="row">
          <div class="col-md-12" style="border-bottom:1px solid #ceb3b3;margin-bottom: 1em;padding-bottom: 1em;">
          <div class="col-md-2">
                  <img alt="Bootstrap Image Preview" style="width:200px;height:143px;margin-left: -2em;float:left;border: 2px solid #5c4949 !important; border-radius: 7px !important;" src="../directory_admin/uploads/<?php echo $service_data_row['brand_logo'];?>" />               
          </div>  
          <div class="col-md-3">   
                <p style="font-size:20px;text-transform:uppercase;"><strong><?php echo $service_data_row['brand_name'];?></strong></p>
                <p style="font-size:12px;"><?php echo $service_data_row['disc'];?></p>
                <p style="font-size:14px;">Distance :<?php 
                if(empty($service_data_row['distance'])){
                    echo '<span  title="Distance Will be displayed after login">-</span>';
                }else{
                  echo  number_format((float)$service_data_row['distance'], 1, '.', '').'km';
                }
                

                ?>&nbsp;|&nbsp;Reviews:8</p>
                <?php 
                    if(!isset($_SESSION['email'])){?>
                      <input  title="VOIR LE SALON" style="background:#0e7a84;color:#fff;" class="btn" type="button" data-toggle="modal" data-target="#login" value="VOIR LE SALON" /> 
                    <?php }else{?>
                        <p><input type="button" class="btn" class="btn" onclick1="gotoPage('special_detail_initial.php',<?php echo '1';?>)" style="background:#0e7a84;color:#fff;" value="VOIR LE SALON"/></p>
                 <?php
                    }
                 ?>
                
            
          </div>
          <div class="col-md-7" style="height: 142px;overflow-y: scroll;overflow-x: hidden;">
                 
              <!---->
                  
<?php for($k=0;$k<7;$k++){ 

  $hou=9;
  $j=0;
?>
  
<div class="col-md-1" style="margin-right:2.4em;">
  
<?php



  //Les plages d'ouvertures/fermetures sont calquées sur le lundi 
  $str_am=$service_data_row['mon_from_am_time'];
  $en_am=$service_data_row['mon_to_am_time'];
  $str_pm=$service_data_row['mon_from_pm_time'];  
  $en_pm=$service_data_row['mon_to_pm_time']; 
    

    
  $weekend=$service_data_row['weekend'];
  
  for($i=0;$i<25;$i++){
    
    $start_time=$str_am;
    $start_time1=explode(':',$start_time);
    $end_time=$en_am;
    $end_time1=explode(':',$end_time);
    
    for($i=$start_time*60+$start_time1[1];$i<=$end_time*60+$end_time1[1];$i+=$timeOfService){
        
        $show_new_time= floor($i/60) . ":" . ($i/60-floor($i/60))*60; 
        $current_date=date('m/d/Y',strtotime("+$k day"));
        $time=$hou+$j.":00:00";

      $a=mysqli_query($con,"select * from worker where spe_id='$specialist_id'"); 
      $sum=0;
      $sum1=0;
      $sum3=0;
      
      while($data=mysqli_fetch_array($a)){
        
        $worker=$data['work_id']; 
        
        $ser=mysqli_query($con,"select * from worker_service where worker_service_id='$worker' and service_id='$serviceId' ");
        $worker_id_with_service=mysqli_fetch_array($ser);
        $worker_id1=$worker_id_with_service['worker_service_id'];
        $num_rows1 = mysqli_num_rows($ser);
        $sum+=$num_rows1;
        
        $worker_holiday=mysqli_query($con,"select * from worker_holiday where worker_id='$worker_id1' ");
        $data1=mysqli_fetch_array($worker_holiday);
        $query1 = "";
                              
        if(!empty($data1['day_leave_start']) || !empty($data1['day_leave_end'])){
          
          $day_leave_start=$data1['day_leave_start'];
          $day_leave_end=$data1['day_leave_end'];
          $query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
          $worker_holiday1=mysqli_query($con,"select * from worker_holiday where worker_id='$worker_id1' and  '$current_date' $query1");
          $num_rows11 = mysqli_num_rows($worker_holiday1);
          $sum1+=$num_rows11;                              
        }  
      }
      
      //$sum1;
      //$sum1;
      $abc=$sum-$sum1;
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
            
      //$add_booking=mysqli_query($con,"select * from add_booking_new where spe_id='$spe_id' and service_id='$ser_id' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1' ");
      $add_booking=mysqli_query($con,"select * from add_booking_new where spe_id='$specialist_id' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1' ");
                            
      while($data3=mysqli_fetch_array($add_booking)){
        
        if($data3['worker_id']!='0'){
          $sum3+=count($data3['worker_id']);
        }
        
      } 
      
      //$sum3;

      date_default_timezone_set('Europe/Paris');
      
      $current_time=date('H:i:s');
      $current_date_loop=date('m/d/Y',strtotime("+$k day"));
      $current_date_show=date('m/d/Y');   

      $loop_day=date('l',strtotime("+$k day"));
      $database_day1=explode(',',$weekend);
      $database_day=in_array($loop_day, $database_day1);

      if(($abc<=$sum3) || (($current_date_show==$current_date_loop) && ($showdata<$current_time)) || ($database_day)){
?>

          <button  title="not available" disabled style="color:#000000;background:#ffffff;margin-bottom:0.5em;margin-top:0.5em;width: 5em;margin-left:-1em;margin-right:2em;" class="btn btn-default" type="button" > <?php echo $show_new_time; ?> </button>
                       
<?php     }else{ ?>

  <?php if (!isset($_SESSION['email'])) { ?>
             
        
                    <button id="appointedColor" title="available" style="margin-bottom:0.5em;margin-top:0.5em;width: 5em;margin-left:-1em;margin-right:2em;" class="btn btn-default" type="button" data-toggle="modal" data-target="#login"> <?php echo $show_new_time; ?> </button>
        
        
        <?php } else { ?>
          
                    <button id="appointedColor" title="available" style="margin-bottom:0.5em;margin-top:0.5em;width: 5em;margin-left:-1em;margin-right:2em;" class="btn btn-default" type="button" onclick1="valid('<?php echo date('l',strtotime("+$k day")); ?>','<?php echo date('Y-m-d',strtotime("+$k day")); ?>','<?php echo $showdata; ?>','<?php echo $specialist_id; ?>','<?php echo $serviceId; ?>');"> <?php echo $show_new_time; ?> </button>
        <?php  }  ?>
<?php } 

    }//for loop new

    $start_time=$str_pm;
    $start_time11=explode(':',$start_time);
    $end_time=$en_pm;
    $end_time11=explode(':',$end_time);
    
    for($i=$start_time*60+$start_time11[1];$i<=$end_time*60+$end_time11[1];$i+=$timeOfService){
      
        $show_new_time= floor($i/60) . ":" . ($i/60-floor($i/60))*60;  

      $current_date=date('m/d/Y',strtotime("+$k day"));
      $time=$hou+$j.":00:00";

      $a=mysqli_query($con,"select * from worker where spe_id='$specialist_id'"); 
      $sum=0;
      $sum1=0;
      $sum3=0;
                            
      while($data=mysqli_fetch_array($a)){
        
        $worker=$data['work_id']; 
        
        $ser=mysqli_query($con,"select * from worker_service where worker_service_id='$worker' and service_id='$serviceId' ");
        $worker_id_with_service=mysqli_fetch_array($ser);
        $worker_id1=$worker_id_with_service['worker_service_id'];
        $num_rows1 = mysqli_num_rows($ser);
        
        $sum+=$num_rows1;
        
        $worker_holiday=mysqli_query($con,"select * from worker_holiday where worker_id='$worker_id1' ");
        $data1=mysqli_fetch_array($worker_holiday);
        $query1 = "";
        
        if(!empty($data1['day_leave_start']) || !empty($data1['day_leave_end'])){
                                  
          $day_leave_start=$data1['day_leave_start'];
          $day_leave_end=$data1['day_leave_end'];
          $query1 = "BETWEEN '$day_leave_start' and '$day_leave_end'";
          $worker_holiday1=mysqli_query($con,"select * from worker_holiday where worker_id='$worker_id1' and  '$current_date' $query1 ");
          $num_rows11 = mysqli_num_rows($worker_holiday1);
          $sum1+=$num_rows11; 
        }  
            }
             
      $sum1;
      $sum1;
      $abc=$sum-$sum1;
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
            
      $add_booking=mysqli_query($con,"select * from add_booking_new where spe_id='$specialist_id' and service_id='$serviceId' and date_booking='$current_date1' and FIND_IN_SET('$showdata',time_booking) and status='1' ");
                            
      while($data3=mysqli_fetch_array($add_booking)){
        
        if($data3['worker_id']!='0'){
          $sum3+=count($data3['worker_id']);
        }
      } 
                              
      $sum3;   
      date_default_timezone_set('Europe/Paris'); 
      $current_time=date('H:i:s');
      $current_date_loop=date('m/d/Y',strtotime("+$k day"));
      $current_date_show=date('m/d/Y');   
      $loop_day=date('l',strtotime("+$k day"));
      $database_day1=explode(',',$weekend);
      $database_day=in_array($loop_day, $database_day1);

      if(($abc<=$sum3) || (($current_date_show==$current_date_loop) && ($showdata<$current_time)) || ($database_day)){
?>
  
        
          <button type="button" title="not available" disabled style="margin-bottom:0.5em;margin-top:0.5em;width: 5em;margin-left:-1em;margin-right:2em;" class="btn btn-default"> <?php echo$show_new_time; ?> </button>
        
<?php }else{ ?>
 <?php if (!isset($_SESSION['email'])) { ?>
              
                    <button id="appointedColor" title="available" style="margin-bottom:0.5em;margin-top:0.5em;width: 5em;margin-left:-1em;margin-right:2em;" type="button" class="btn btn-default" data-toggle="modal" data-target="#login" > <?php echo $show_new_time; ?> </button>
        
        
        
        <?php } else { ?>
        
                <button id="appointedColor" title="available" style="margin-bottom:0.5em;margin-top:0.5em;width: 5em;margin-left:-1em;margin-right:2em;" type="button" class="btn btn-default" onclick1="valid('<?php echo date('l',strtotime("+$k day")); ?>','<?php echo date('Y-m-d',strtotime("+$k day")); ?>','<?php echo $showdata; ?>','<?php echo $spe_id; ?>','<?php echo $ser_id; ?>');"> <?php echo $show_new_time; ?> </button>
        
        <?php  }  ?>


<?php } 
    }//for loop new
  }
?>
  
</div>
  
<?php } ?>
              <!---->               
                
</div>                  
          
        
        </div>

        </div>


      <?php }       

          }
        } else{
          echo ' <div class="alert alert-success alert-dismissable col-md-6" style="margin-left: 25%">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              Nous n avons pas de professionnel sur ce secteur , voulez vous élargir la recherche .
            </div> ';
          }?> 


        <!--pagination starts here-->


        <!--pagination ends here-->        
    </div>


  </div>
</div>
<?php
include ('footer.php');
 ?>
</body>
</html>
<script type="text/javascript">
function calen(spe_id,val){
  $.ajax({
  type: "GET",
  url: 'ajax_calender1.php?spe_id='+spe_id+'&ser_id='+val,
  success: function(data){
  // console.log(data);
  document.getElementById("demo"+spe_id).innerHTML = "";
  $('#city'+spe_id).html(data);
  }
  });
}
function service_select(spe_id){
  document.getElementById("demo"+spe_id).innerHTML = "Please select service first.";
}
function valid(day,date,time,spe_id,service){
  // document.getElementById('date_show'+spe_id).value=date;
  // document.getElementById('time_show'+spe_id).value=time;  
  // document.getElementById('spe_id'+spe_id).value=spe_id;
  // document.getElementById('service_id'+spe_id).value=service;
  // console.log(date);
  // console.log(time);
  // console.log(spe_id);
  // console.log(service);
  
 /* $.ajax({
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
  });*/

  $.ajax({
  type: "GET",
  url: 'submit_specialist.php?date='+date+'&time='+time+'&spe_id='+spe_id+'&service_id='+service,
  success: function(data){
  // console.log(data);
      response1=JSON.parse(data);
      var last_id=response1.last_id;
      if(response1.chk=='true'){
          window.location = "special_detail_initial.php";
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
    // console.log(data);
  $('.my_table').html(data);
  }
  });
}  

function left(date1,spe_id,ser_id){
  $.ajax({
  type: "GET",
  url: 'ajax_leftcalender.php?date1='+date1+'&spe_id='+spe_id+'&ser_id='+ser_id,
  success: function(data){
    // console.log(data);
  $('.my_table').html(data);
  }
  });
}  
</script>