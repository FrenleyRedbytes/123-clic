<?php
session_start();
  include 'db.php';
  $cat_id=$_GET['cat_id'];
  $subcat_id=$_GET['subcat_id'];
  $user_id=$_SESSION['user_id'];

  if(isset($_POST['add_booking'])){
    $spe_id=$_POST['spe_id'];
    $date_booking=$_POST['date'];
    $service=$_POST['service'];
    $time_booking=$_POST['time'];
    date_default_timezone_set("Asia/Calcutta");
    $datetime = date('Y-m-d H:i:s');
    $res = mysqli_query($con, "insert into add_booking_new(user_id,spe_id,service_id,date_booking,time_booking,cu_date)values('$user_id','$spe_id','$service','$date_booking','$time_booking','$datetime')");
    $last_id=mysqli_insert_id($con);

    if (!$res){
      header('location:specialist_new1.php?cat_id=2&subcat_id=6&msg=1');
    }
    else{
      header("location:specialist_comment_new.php?last_id=$last_id");
    }
  }
?>

<html lang="en">
<head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php include 'header.php'; ?>
<style>   
#nav_menu_list ul li a{color: #fff; text-align: center; font-size: 10px;}
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
include ('menu.php');
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

</style>

<div >
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="row">
          <div class="col-md-12 categories-heading bt_heading_3">
           <h1 style="color: #850035;">Specialist</span></h1>
            <div class="blind line_1"></div>
            <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
            <div class="blind line_2"></div>
          </div>
          <?php 
              $data1=mysqli_query($con,"select * from specialist where cat_id='$cat_id' and subcat_id='$subcat_id' ");
              while($data_ar1=mysqli_fetch_array($data1)){
           ?>
           <form method="POST">
                     <div class="madicament_sec">
            <div class="col-md-7">
              <div class="col-md-5">
                <span class="pic_outer"><img src="../directory_admin/uploads/<?php echo $data_ar1['brand_logo']; ?>" class="inside"></span>
              </div>
              <div class="col-md-7" id="search-categorie-item">
               <h2><?php echo $data_ar1['brand_name']; ?>&nbsp;
                <?php
                $spr_id=$data_ar1['spr_id'];
                $data11=mysqli_query($con,"select * from favorite where spe_id='$spr_id' and user_id='$user_id' ");
                if($dat_ar=mysqli_fetch_array($data11)){
                ?>
                <a href="favorite.php?fav_did=<?php echo $spr_id; ?>&cat_id=<?php echo $cat_id;?>&subcat_id=<?php echo $subcat_id;?>"><i class="fa fa-heart" aria-hidden="true" style="color: red"></i></a>
                <?php }else{ ?>
                <a href="favorite.php?fav_iid=<?php echo $spr_id; ?>&cat_id=<?php echo $cat_id;?>&subcat_id=<?php echo $subcat_id;?>">
                <i class="fa fa-heart" aria-hidden="true"></i>
                </a>
                <?php } ?>
                </h2>
                <p>Abc</p>
                <ul>
                  <li> Distance : 2.3 km </li>
                  <li> Reviews : 08 </li>
                </ul>
                <input type="hidden" name="spe_id" value="<?php echo $data_ar1['spr_id']; ?>">
                <input type="hidden" name="date" id="date_show" value="">
                <input type="hidden" name="time" id="time_show" value="">
                <select class="spel_select" name="service" required="">
                <option value="">Select Service</option>
                <?php 
                $chk1 = mysqli_query($con, "SELECT * FROM `service` where spe_id='$spr_id'");
                while ($c1 = mysqli_fetch_array($chk1)){
                ?>
                  <option value="<?php echo $c1['serve_id']; ?>"><?php echo $c1['serv_title']; ?></option>
                  <?php } ?>
                </select> 
                <button type="submit" name="add_booking">Montrer les détails</button>
              </div>
            </div>
              <div class="col-md-5">
                <div class="col-xs-12">
           
             <div class="my_table">
                <div class="head_div">
                  <span class="table_icon left"> <img src="images/left1.png"> </span>
                   <?php for($k=0;$k<3;$k++)
                  { 
                      $hou=9;
                      $j=0;
                  ?>
                  <div class="head_part">
                    <h3> <?php echo date('l',strtotime("+$k day"));echo "<br>"; ?> <?php echo date('Y-m-d',strtotime("+$k day"));?> </h3>
                  </div>
                  <?php } ?>

                  <span class="table_icon right"> <img src="images/right1.png" onclick="right('<?php echo date('Y-m-d',strtotime("+2 day"));?>')"> </span>
                </div>
                <div class="body_div">
                 <?php for($k=0;$k<3;$k++)
                  { 
                      $hou=9;
                      $j=0;
                  ?>
                  <div class="body_row">
                    <?php
                       for($i=0;$i<25;$i++){
                        if($i%2==0){ ?>
                          <div class="body_part">
                            <button type="button" onclick="valid('<?php echo date('l',strtotime("+$k day")); ?>','<?php echo date('Y-m-d',strtotime("+$k day")); ?>','<?php echo$hou+$j; ?>');"> <?php echo$hou+$j; ?> </button>
                          </div>
                          <?php }else{ ?>
                          <div class="body_part">
                            <button type="button" onclick="valid('<?php echo date('l',strtotime("+$k day")); ?>','<?php echo date('Y-m-d',strtotime("+$k day")); ?>','<?php echo$hou+$j.":30"; ?>');"> <?php echo$hou+$j.':30'; ?> </button>
                          </div>
                          <?php $j++;
                              }
                            }
                          ?>                      
                  </div>
                  <?php } ?>                  
                </div>
              </div>
                </div>
              </div>
          </div>
          </form>
          <?php } ?>          
          <hr>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include ('footer.php');
 ?>
 <script type="text/javascript">
    $('.body_part button').on('click', function(){
      $('.body_part button').removeClass('active');
      $(this).addClass('active');
  })
 </script>
</body>
</html>

                  <script type="text/javascript">
                  function valid(val1,val2,val3){
                    document.getElementById('date_show').value=val2;
                    document.getElementById('time_show').value=val3;
                  }

                  function right(date1){
                    console.log(date1);
                    $.ajax({
                      type: "GET",
                      url: 'ajax_calender.php?date1='+date1,
                      success: function(data){
                        $('.my_table').html(data);
                      }
                   });
                  }  
                  function left(date1){
                    console.log(date1);
                    $.ajax({
                      type: "GET",
                      url: 'ajax_leftcalender.php?date1='+date1,
                      success: function(data){
                        $('.my_table').html(data);
                      }
                   });
                  }  
                  </script>
