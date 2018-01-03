<?php
session_start();
  include 'db.php';
  $cat_id=$_GET['cat_id'];
  $subcat_id=$_GET['subcat_id'];
  $user_id=$_SESSION['user_id'];
?>
<html lang="en">
<head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
  font-size: 25px;
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
  font-size: 15px;
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
  margin: 15px 0px !important;
  display: block !important;
}

.pic_outer{
  width: 220px;
  height: 220px;
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
  margin: 14px 0px;
}

.table-responsive{
  height: 250px;
  overflow-y: auto;
}

/* Add New Css */

 </style>

<div id="search-categorie-item">
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
          <div class="madicament_sec">
            <div class="col-md-6">
              <div class="col-md-6">
                <span class="pic_outer"><img src="../directory_admin/uploads/<?php echo $data_ar1['brand_logo']; ?>" class="inside"></span>
              </div>
              <div class="col-md-6">
                <h2>Hair creatif&nbsp;
                <?php
                $spr_id=$data_ar1['spr_id'];
                $data11=mysqli_query($con,"select * from favorite where spe_id='$spr_id' and user_id='$user_id' ");
                ?>
                
                <i class="fa fa-heart" aria-hidden="true"></i>
                
                </h2>
                <p>Abc</p>
                <ul>
                  <li> Distance : 2.3 km </li>
                  <li> Reviews : 08 </li>
                </ul>
                <select class="spel_select">
                  <option> 1 </option>
                  <option> 2 </option>
                  <option> 3 </option>
                </select>
                <a href="specialist-comment.php?id=<?php echo $data_ar1['spr_id']; ?>" style="float:left;"><button>Montrer les détails</button></a>
              </div>
            </div>
              <div class="col-md-6">
                <div class="col-xs-12">
                  <div class="table-responsive">
                    <table  class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>DATE</th>
                          <th>LUNDI 01/04</th>  
                          <th>MARDI 02/04</th>
                          <th>MERCREDI 03/04</th>
                          <th>JEUDI 04/04</th>
                          <th>VENDREDI 05/04</th>
                          <th>SAMEDI 06/04</th>
                          <th>DIMANCHE 07/04</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>HEURE</td>
                          <td>09h00</td>
                          <td>09h00</td>
                          <td>09h00</td>
                          <td>09h00</td>
                          <td>09h00</td>
                          <td>09h00</td>
                          <td>09h00</td>
                        </tr>
                        <tr>
                          <td>HEURE</td>
                          <td>10h00</td>
                          <td>10h00</td>
                          <td>10h00</td>
                          <td>10h00</td>
                          <td>10h00</td>
                          <td>10h00</td>
                          <td>10h00</td>
                        </tr>
                        <tr>
                          <td>HEURE</td>
                          <td>14h00</td>
                          <td>14h00</td>
                          <td>14h00</td>
                          <td>14h00</td>
                          <td>14h00</td>
                          <td>14h00</td>
                          <td>14h00</td>
                        </tr>
                        <tr>
                          <td>HEURE</td>
                          <td>15h00</td>
                          <td>15h00</td>
                          <td>15h00</td>
                          <td>15h00</td>
                          <td>15h00</td>
                          <td>15h00</td>
                          <td>15h00</td>
                        </tr>
                        <tr>
                          <td>HEURE</td>
                          <td>16h00</td>
                          <td>16h00</td>
                          <td>16h00</td>
                          <td>16h00</td>
                          <td>16h00</td>
                          <td>16h00</td>
                          <td>16h00</td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!--end of .table-responsive-->
                </div>
              </div>
          </div>
          <div class="madicament_sec">
            <div class="col-md-6">
              <div class="col-md-6">
                <span class="pic_outer"><img src="../directory_admin/uploads/<?php echo $data_ar1['brand_logo']; ?>" class="inside"></span>
              </div>
              <div class="col-md-6">
                <h2>Hair creatif&nbsp;
                <?php
                $spr_id=$data_ar1['spr_id'];
                $data11=mysqli_query($con,"select * from favorite where spe_id='$spr_id' and user_id='$user_id' ");
                ?>
                
                <i class="fa fa-heart" aria-hidden="true"></i>
                
                </h2>
                <p>Abc</p>
                <ul>
                  <li> Distance : 2.3 km </li>
                  <li> Reviews : 08 </li>
                </ul>
                <select class="spel_select">
                  <option> 1 </option>
                  <option> 2 </option>
                  <option> 3 </option>
                </select>
                <a href="specialist-details.php?id=<?php echo $data_ar1['spr_id']; ?>" style="float:left;"><button>Montrer les détails</button></a>
              </div>
            </div>
              <div class="col-md-6">
                <div class="col-xs-12">
                  <div class="table-responsive">
                   
                    <table>
 <tr>
 <?php for($i=0;$i<7;$i++){ ?>
  <th>
   <?php
    echo date('Y-m-d',strtotime("+$i day")); 
   ?>
  </th>
  <?php } ?>
 </tr>
 <tr>
 <?php 
  $selectedTime = "8:30";
  $endTime = strtotime("+30 minutes", strtotime($selectedTime));
  echo date('h:i', $endTime);
 ?> 
 </tr>
</table>
                  </div><!--end of .table-responsive-->
                </div>
              </div>
          </div>
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
</body>
</html>