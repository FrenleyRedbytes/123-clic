<?php
 session_start();
  include 'db.php';
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
<?php include('menu.php');?>
<div id="breadcrum-inner-block">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="breadcrum-inner-header">
          <h1>BESOIN D'AIDE</h1>
      </div>
    </div>
  </div>
</div>
<div id="about-company">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12 v-center">
        <div class="about-heading-title bt_heading_3">
          <h1>Besoin d'aide <span>123-Clic</span></h1>
          <div class="blind line_1"></div>
          <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
          <div class="blind line_2"></div>
        </div>
        <p class="inner-secon-tl">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing. <br>
          <br>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12 user-lt-above"> <img src="images/about-user.png" alt="about-user"> </div>
    </div>
  </div>
</div>
<div id="featured-service-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-power-off"></i> </div>
          <h3>Design</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been dummy text.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-send"></i> </div>
          <h3>Personnalisation facile</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been dummy text.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-map-marker"></i> </div>
          <h3>Recherchez un professionnel</h3>
          <p>Grace à 123-Clic vous pouvez retrouver un professionnel ou que vous soyez, et prendre rendez vous directement</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-money"></i> </div>
          <h3>Economisez de l'Argent</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been dummy text.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-paint-brush"></i> </div>
          <h3>Un interface facile</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been dummy text.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-comment"></i> </div>
          <h3>Soutien professionnel</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been dummy text.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="pricing-item-block" class="white_bg_block">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="col-md-12 pricing-heading-title bt_heading_3">
          <h1>Tarifs <span>Pack</span></h1>
          <div class="blind line_1"></div>
          <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
          <div class="blind line_2"></div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="price-table-feature-block">
              <h1>Basic</h1>
              <hr>
              <p>Free <span>$24</span> Per Month</p>
              <div class="vfx-pl-seperator"> <span><i class="fa fa-caret-down"></i></span> </div>
              <div class="vfx-price-list-item">
                <h2>Limited Number</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>One Agent for All</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>Mail Communication</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-btn">
                <button class="purchase-btn"><i class="fa fa-unlock-alt"></i> Purchase Now</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="price-table-feature-block active">
              <h1>Premium</h1>
              <hr>
              <p>Free <span>$49</span> Per Month</p>
              <div class="vfx-pl-seperator"> <span><i class="fa fa-caret-down"></i></span> </div>
              <div class="vfx-price-list-item">
                <h2>Unlimited Number</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>One Agent for All</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>Mail Communication</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-btn">
                <button class="purchase-btn"><i class="fa fa-unlock-alt"></i> Purchase Now</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="price-table-feature-block">
              <h1>Plus</h1>
              <hr>
              <p>Free <span>$99</span> Per Month</p>
              <div class="vfx-pl-seperator"> <span><i class="fa fa-caret-down"></i></span> </div>
              <div class="vfx-price-list-item">
                <h2>Unlimited Number</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>Unlimited Number</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>Personal Training</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-btn">
                <button class="purchase-btn"><i class="fa fa-unlock-alt"></i> Purchase Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="vfx-counter-block">
  <div class="vfx-item-container-slope vfx-item-bottom-slope vfx-item-left-slope"></div>
  <div class="container">
    <div class="vfx-item-counter-up">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-file"></i></div>
            <div id="count-1" class="vfx-coutter-item count_number vfx-item-count-up">496</div>
            <div class="counter_text">Listings</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-users"></i></div>
            <div id="count-2" class="vfx-coutter-item count_number vfx-item-count-up">245</div>
            <div class="counter_text">Users</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-th"></i></div>
            <div id="count-3" class="vfx-coutter-item count_number vfx-item-count-up">96</div>
            <div class="counter_text">Categories</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup last-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-th-list"></i></div>
            <div id="count-4" class="vfx-coutter-item count_number vfx-item-count-up">274</div>
            <div class="counter_text">Listings Types</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php');?>
</body>
</html>