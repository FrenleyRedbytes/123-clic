<?php
session_start();
  include 'db.php';
  if(isset($_POST['submit'])){
    $token_num=$_POST['token'];
    $token=base64_decode($token_num);
    $newpassword=$_POST['newpassword'];
    $confpassword=$_POST['confpassword'];

    $data=mysqli_query($con,"select * from register where new_pass='$token'");
    if($data_array=mysqli_fetch_array($data)){       
          if($newpassword==$confpassword){
            $data=mysqli_query($con,"update register set Password='$newpassword' where new_pass='$token'");
            header("location:confirmpass.php?token=$token_num&msg=0");
          }else{
            header("location:confirmpass.php?token=$token_num&msg=1");
          }
    }else{
        header("location:confirmpass.php?token=$token_num&msg=3");
    }
  }
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

.Specialist_block{
  width: 100%;
  background: none;
  padding: 10px 0px;
}

textarea.form-control{
  height: auto;
  width: 50%;
  margin: 0px auto;
  max-width: 50%;
  max-height: 300px;
}

.Specialist_block button{
  width: 200px !important;
}

 </style>

<div id="search-categorie-item">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="row">
          <div class="col-md-12 categories-heading bt_heading_3">
           <h1 style="color: #850035;">Password Changed</span></h1>
            <div class="blind line_1"></div>
            <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
            <div class="blind line_2"></div>
          </div>    	
          <?php
          if (isset($_GET['msg'])){
            if ($_GET['msg'] == "0"){
          ?>        
            <div class="alert alert-success alert-dismissable col-md-6" style="margin-left: 25%">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Password change successfully.
            </div> 
          <?php
          }else if ($_GET['msg'] == "1"){ ?>
            <div class="alert alert-warning alert-dismissable col-md-6" style="margin-left: 25%">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 Password and confirm password not match.
            </div> 
          <?php  }else{ ?>
              <div class="alert alert-warning alert-dismissable col-md-6" style="margin-left: 25%">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              Token number is wrong.
            </div>       
          <?php }
          }
          ?>
          <form method="post">
          <div class="Specialist_block">
          <div class="col-md-6">
          <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
          <!-- <input type="password" class="form-control" name="oldpassword" placeholder="Enter Old Password" style="margin-left: 67%;width: 74%;">
          <br> -->
          <input type="password" class="form-control" name="newpassword" placeholder="Enter New Password" style="margin-left: 67%;width: 74%;">
          <br>  
          <input type="password" class="form-control" name="confpassword" placeholder="Enter Confirm Password" style="margin-left: 67%;width: 74%;">         
          <div class="col-md-6">
            <button type="submit" name="submit" style="margin-left: 191%;margin-top: 5%;">Confirmer</button>
           </div>            
          </div>   
          </div>
          </form>
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