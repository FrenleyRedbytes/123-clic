<?php
 session_start();
 include 'db.php';
 

 ?>
<html lang="en" style="width:100%;overflow-x:hidden;">
<head>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php

include 'header.php';?>
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

    
    </head>
<body>
<!-- <div id="vfx_loader_block" style="display: none;">
  <div class="vfx-loader-item"> <img src="images/loading.gif" alt=""> </div>
</div> -->


     <?php
       include ('menu.php');
     ?>  

<div class="container">

  <div class="row" >
    <div class="col-md-12" style="margin-top: -0em !important;margin-left:3em;">
      <div class="row" style="margin-bottom:2em;">
        <?php 
          $radius = 300;
        $limit = 8;  

        if (isset($_GET["page"])) { 

          $page  = $_GET["page"]; 

        } else { 

          $page=1;


        };  
        

        $cat_id = $_GET['cat_id'];
        $subcat_id = $_GET['subcat_id'];
        $lat = $_POST['latitude_zip'];
        $long = $_POST['longitude_zip'];


        $start_from = ($page-1) * $limit;  
        $specialistQuery = '';    

        
         
      $specialistQuery = mysqli_query($con,"select s.*,(6371 * ACOS( COS( RADIANS( $lat) ) * COS( RADIANS( s.lat ) ) * COS( RADIANS( s.longt ) - RADIANS( $long ) ) + SIN( RADIANS( $lat ) ) * SIN( RADIANS( s.lat ) ) ) ) AS distance from specialist s where s.cat_id=$cat_id and s.subcat_id=$subcat_id and s.weekend!='weekend' HAVING distance <=$radius order by s.spr_id desc limit $start_from,$limit");

      $num_row = @mysqli_num_rows($specialistQuery);
          if($num_row >0){?>
               <div class="col-md-3">
          <h3 style="border-bottom: 5px solid #0e7a84;color:#504a4a;float:left;
               margin-left:0.5em;text-transform: none !important;padding-bottom: 0.1em;">
            Notre Specialiste
          </h3>
        </div> 
          <?php }else{

          }
        ?>
       
      </div>

       <div class="row" style="margin-bottom:1em;">
        <div class="col-md-12">
       <?php 
         // $specialistQuery = mysqli_query($con,"select c.* from category c where c.status='1'");
              
        

      $colours = array(1=>'#016891', 2=>'#c5074f', 3=>'#a59702', 4=>'#f26681', 5=>'#e6b53e', 6=>'#850035',7=>'#003564');
      
      if($num_row>0){
      while($specialistResult=mysqli_fetch_array($specialistQuery)){ 
        $rand = array_rand($colours);
        ?>
            <div class="col-md-3" style="margin-bottom:1em;">
              <div class="row">
                  <div class="col-md-4">
                      <a href="specialistListById.php?spe_id=<?php echo $specialistResult['spr_id'];?>&lat=<?php echo $specialistResult['lat'];?>&long=<?php echo $specialistResult['longt'];?>">
                          <div class="inside"  style="margin:auto;width: 180px;height:180px;border: 2px solid #5c4949 !important; border-radius: 7px !important;"><img src="../directory_admin/uploads/<?php echo $specialistResult['brand_logo'];?>">
                          </div>
                      </a>
                  </div>
              </div><br>
              <div class="row">
                <div class="col-md-4" style="text-transform:uppercase;width:75%;text-align:center;overflow:hidden;height:20px;">
                    <?php echo $specialistResult['brand_name'];?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4" style="width:75%;text-align:center;overflow:hidden;height:40px;font-size:13px;">
                    <div><?php echo $specialistResult['disc'];?></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4" style="width:75%;text-align:center;">
                    <input type="button" onclick="gotoPage('specialistListById.php',<?php echo $specialistResult['spr_id'];?>,<?php echo $specialistResult['lat'];?>,<?php echo $specialistResult['longt'];?>)" class="btn" style="background:<?php echo $colours[$rand];?>;color:#fff;border-radius:10px;" value="rendez-vous"/>
                </div>
              </div>
            </div>
        <?php 
          }
        } else{
          echo ' <div class="alert alert-success alert-dismissable col-md-6" style="margin-left: 25%">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              Nous n avons pas de professionnel sur ce secteur , voulez vous élargir la recherche .
            </div> ';
          }?>
          </div>
       </div>

  <!--pagination starts here-->

  <?php 

     /* $specialistPaginateQuery = mysqli_query($con,"select count(s.spr_id) from specialist s where s.weekend!='weekend'");
      $num_of_specialist = mysqli_fetch_array($specialistPaginateQuery);
      //print_r(count($num_of_specialist));die;
      $total_pages = ceil($num_of_specialist[0] / $limit);
      //echo $total_pages;die;
      $replaceLabel = '';

      if(count($num_of_specialist)>0){
          $pagLink = "<ul class='pagination'>";  
          for ($i=1; $i<=$total_pages; $i++) {                       
                            
                              if($i==$total_pages){
                                  $replaceLabel = 'Last';
                              }else{
                                  $replaceLabel = $i;
                              }
                              if($page==$i){
                                $pagLink .= "<li class='active'><a  style='color:#fff;background:#0e7a84;' href='index.php?page=".$i."'>".$replaceLabel."</a></li>"; 
                              }else{
                                $pagLink .= "<li ><a href='index.php?page=".$i."'>".$replaceLabel."</a></li>"; 
                              }                       
          };  
          echo $pagLink."</ul>"; 

      }*/
      
  ?>
  <!--pagination ends here-->
    </div>

  </div>

</div>

<?php
include ('footer.php');
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '<br>';
      }
      return $text;
}
 ?>
</body>
</html>

