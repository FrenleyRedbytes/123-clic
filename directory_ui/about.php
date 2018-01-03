
<?php
 session_start();
  include 'db.php';
  $user_id=$_SESSION['user_id'];
 ?>
<html lang="en">
	<head>
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
          <h1>A PROPOS DE NOUS</h1>
          <a href="index.php">ACCUEIL</a> <i class="fa fa-circle"></i> <a href="about.php"><span>A PROPOS...</span></a> </div>
      </div>
    </div>
  </div>
</div>
<div id="about-company">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12 v-center">
        <div class="about-heading-title bt_heading_3">
          <h1>A PROPOS DE <span>123-CLIC</span></h1>
          <div class="blind line_1"></div>
          <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
          <div class="blind line_2"></div>
        </div>
        <p class="inner-secon-tl">Gr&acirc;ce &agrave; 123-Clic finis les pertes de temps pour trouver un professionnel, il vous suffit de vous connecter et le tour est jou&eacute;. Vous &ecirc;tes connect&eacute; en direct avec les professionnels pr&egrave;s de vous afin de connaitre leur disponibilit&eacute; et r&eacute;server votre rendez-vous directement en ligne.<br>
          <br>
          N'h&eacute;sitez plus cr&eacute;er directement votre compte et profitez des avantages de ce site Web et Application 123-Clic!! Fini les rendez-vous oubli&eacute;s ou les horaires mal not&eacute;s, recevez un SMS et Popup de confirmation avec toutes les informations utile &agrave; savoir. Et suivez l'historique de tous vos rendez-vous pass&eacute; ou futur.</p>
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
          <h3>123 Clic pour trouver votre professionnel</h3>
          <p>Trouvez votre professionnel en 123 Clic!!</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-send"></i> </div>
          <h3>Prenez RDV directement en ligne</h3>
          <p>Prenez RDV directement depuis votre PC ou mobile.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-map-marker"></i> </div>
          <h3>Recevez les alertes sur votre mobile</h3>
          <p>Restez inform&eacute; sur toutes les infos utiles pour votre RDV.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-money"></i> </div>
          <h3>Acceder a votre espace client</h3>
          <p>Suivez tous vos RDV pass&eacute; ou futur!! Et &agrave; votre profil.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-paint-brush"></i> </div>
          <h3>Gerez vos RDV sur votre mobile</h3>
          <p>Confirmez ou annulez vos RDV sur votre mobile.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-comment"></i> </div>
          <h3>Soyez avertis des offres flash</h3>
          <p>Recevez directement les offres flash sur votre mobile.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--<div id="pricing-item-block" class="white_bg_block">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="col-md-12 pricing-heading-title bt_heading_3">
          <h1>Prix des <span>Packs</span></h1>
          <div class="blind line_1"></div>
          <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
          <div class="blind line_2"></div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="price-table-feature-block">
              <h1>Pack Basic</h1>
              <hr>
              <p>Offre <span>29&euro;</span> /mois</p>
              <div class="vfx-pl-seperator"> <span><i class="fa fa-caret-down"></i></span> </div>
              <div class="vfx-price-list-item">
                <h2>Nombre d'employ&eacute; limit&eacute;</h2>
                <p>Vous pouvez g&eacute;rer l'agenda d'une seul personne.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>One Agent for All</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>Popup d'alerte</h2>
                <p>Vous disposez seulement des Popup pour avertir vos clients des rendez-vous &agrave; venir.</p>
              </div>
              <div class="vfx-price-btn">
                <button class="purchase-btn"><i class="fa fa-unlock-alt"></i> Acheter Maintenant</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="price-table-feature-block active">
              <h1>Pack Premium</h1>
              <hr>
              <p>Offre <span>49&euro;</span> /mois</p>
              <div class="vfx-pl-seperator"> <span><i class="fa fa-caret-down"></i></span> </div>
              <div class="vfx-price-list-item">
                <h2>Jusqu'à 4 employ&eacute;s</h2>
                <p>Vous pourrez g&eacute;rer jusqu'&agrave; 4 employ&eacute;s .</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>One Agent for All</h2>
                <p>Our company offers best pricing options for field agents and companies.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>Popup et SMS d'alerte</h2>
                <p>Vous disposez de popup et SMS en illimit&eacute;s pour avertir vos clients des rendez-vous &agrave; venir.</p>
              </div>
              <div class="vfx-price-btn">
                <button class="purchase-btn"><i class="fa fa-unlock-alt"></i> Acheter Maintenant</button>
              </div>
            </div>
          </div><div class="col-md-4 col-sm-4 col-xs-12">
            <div class="price-table-feature-block">
              <h1>Pack Plus</h1>
              <hr>
              <p>Offre <span>99&euro;</span> /mois</p>
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
                <button class="purchase-btn"><i class="fa fa-unlock-alt"></i> Acheter Maintenant</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
-->
<div class="vfx-counter-block">
  <div class="vfx-item-container-slope vfx-item-bottom-slope vfx-item-left-slope"></div>
  <div class="container">
    <div class="vfx-item-counter-up">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-file"></i></div>
            <div id="count-1" class="vfx-coutter-item count_number vfx-item-count-up">15</div>
            <div class="counter_text">Categories</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-users"></i></div>
            <div id="count-2" class="vfx-coutter-item count_number vfx-item-count-up">5000</div>
            <div class="counter_text">Professionnels</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-th"></i></div>
            <div id="count-3" class="vfx-coutter-item count_number vfx-item-count-up">3000</div>
            <div class="counter_text">Utilisateurs</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup last-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-th-list"></i></div>
            <div id="count-4" class="vfx-coutter-item count_number vfx-item-count-up">200000</div>
            <div class="counter_text">Visites par mois</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php');?>
</body>
</html>