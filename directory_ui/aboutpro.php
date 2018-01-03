<?php
 session_start();
  include 'db.php';
  $user_id=$_SESSION['user_id'];
 ?>

<html lang="en" style="width:100%;overflow-x:hidden;">
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
          <h1>A propos de nous</h1>
          <a href="index.php">Accueil</a> <i class="fa fa-circle"></i> <a href="about.php"><span>A propos de nous</span></a> </div>
      </div>
    </div>
  </div>
</div>
<div id="about-company">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12 v-center">
        <div class="about-heading-title bt_heading_3">
          <h1>A propos de <span>123-Clic</span></h1>
          <div class="blind line_1"></div>
          <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
          <div class="blind line_2"></div>
        </div>
        <p class="inner-secon-tl">Gr&acirc;ce &agrave; 123-Clic vous pourrez g&eacute;rer votre emploi du temps directement sur votre PC ou t&eacute;l&eacute;phone mobile. Finis les pertes de temps ou les rendez vous non-honor&eacute;. <br>
          <br>
          Gr&acirc;ce &agrave; 123-Clic vos clients prennent rendez-vous en 3 clics depuis leur ordinateur, tablette et smartphone. Param&eacute;trez votre agenda et gardez le controle sur votre emploie du temps en g&eacute;rant les rendez-vous. Avec 123-Clic c'est simple et &eacute;fficace pour vous et vos clients, il faut seulement que celui ci clic sur la plage horaire qu'il d&eacute;sire. Ensuite 123-Clic ce charge de confirmer et d'envoyer une relance 24h avant le rendez-vous. Finis les oublies de vos clients. Recevez ensuite tous les d&eacute;tails des rendez-vous et soyez inform&eacute; en temps r&eacute;el</p>
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
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-calendar"></i> </div>
          <h3>Votre agenda toujours accessible</h3>
          <p>Gagnez du temps en organisant directement votre agenda, ne ratez plus de rendez-vous pour indisponibilit&eacute; ou si vous etes occup&eacute;.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-mobile"></i> </div>
          <h3>Un interface facile &agrave; gerer</h3>
          <p>G&eacute;rer votre agenda facilement directement sur le PC, ou de chez vous directement sur votre t&eacute;l&eacute;phone mobile.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-laptop"></i> </div>
          <h3>D&eacute;veloppez votre client&egrave;le et votre visibilt&eacute; sur le web.</h3>
          <p>Grace &agrave; 123-Clic vous augmentez votre visibilt&eacute; sur le web. Avec plus de 20 millions de recherches par mois, ne laissez pas passer vos futurs clients.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-line-chart"></i> </div>
          <h3>Une baisse des rendez-vous non-honor&eacute;s</h3>
          <p>Grace &agrave; la relance des clients, d&egrave;s la prise de rendez-vous 123-Clic envoit un mail de confirmation &agrave; votre client et un mail de relance 24h avant le rendez vous.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-user-plus"></i> </div>
          <h3>Renouvelez votre client&egrave;le</h3>
          <p>Grace &agrave; 123-Clic renouvelez votre client&egrave;le, trouv&eacute; de nouveau patient en restant joignable tout les jours de la semaine.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-item-fearured">
          <div class="svt-spec-service-icon hi-icon-effect-8"> <i class="hi-icon fa fa-plus"></i> </div>
          <h3>Apporter un nouveau service pour vos client.</h3>
          <p>Grace &agrave; 123-Clic apportez un nouveau service &agrave; vos client en donnant la possibilit&eacute; de connaitre vos horaires de disponibilit&eacute; ainsi de prendre rendez-vous directement.</p>
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
          <h1>Tarif <span>Pack</span></h1>
          <div class="blind line_1"></div>
          <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
          <div class="blind line_2"></div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="price-table-feature-block">
              <h1>Basic</h1>
              <hr>
              <p>Prix <span>39€</span> Par mois</p>
              <div class="vfx-pl-seperator"> <span><i class="fa fa-caret-down"></i></span> </div>
              <div class="vfx-price-list-item">
                <h2>Votre agenda en ligne</h2>
                <p>Un acc&egrave;s &agrave; votre agenda depuis votre ordinateur, tablette et smartphone.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>Mail de relance</h2>
                <p>Envois de mail de relance ou confirmation de rendez-vous &agrave; vos clients.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>Sans engagement</h2>
	      <p>Vous pouvez arr&ecirc;ter votre contrat quand vous le souhaitez.</p>
              </div>
              <div class="vfx-price-btn">
                <button class="purchase-btn"><i class="fa fa-unlock-alt"></i> Achetez maintenant</button>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="price-table-feature-block active">
              <h1>Premium</h1>
              <hr>
              <p>Prix <span>89€</span> Par mois</p>
              <div class="vfx-pl-seperator"> <span><i class="fa fa-caret-down"></i></span> </div>
              <div class="vfx-price-list-item">
                <h2>Votre agenda en ligne</h2>
                <p>Un acc&egrave;s &agrave; votre agenda depuis votre ordinateur, tablette et smartphone 24/24 et 7/7.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>Mail de relance</h2>
                <p>Envois de mail de relance ou confirmation de rendez-vous &agrave; vos clients.</p>
              </div>
	    <div class="vfx-price-list-item">
                <h2>Pop Up de relance</h2>
                <p>Envois de Pop Up de relance ou confirmation de rendez-vous &agrave; vos clients 12h pour &eacute;viter les oublies de vos clients</p>
              </div>
	    <div class="vfx-price-list-item">
                <h2>SMS de relance</h2>
                <p>Envois de SMS de relance ou confirmation de rendez-vous &agrave; vos clients 24h avant pour &eacute;viter les oublies de vos clients</p>
              </div>
	    <div class="vfx-price-list-item">
                <h2>100% des services sans frais</h2>
                <p>Vous pouvez utiliser tous les services de 123-Clic sans frais.</p>
              </div>
              <div class="vfx-price-list-item">
                <h2>Sans engagement</h2>
                <p>Vous pouvez arr&ecirc;ter votre contrat quand vous le souhaitez.</p>
              </div>
              <div class="vfx-price-btn">
                <button class="purchase-btn"><i class="fa fa-unlock-alt"></i> Acheter maintenant</button>
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
            <div id="count-1" class="vfx-coutter-item count_number vfx-item-count-up">3000</div>
            <div class="counter_text">Clients</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-users"></i></div>
            <div id="count-2" class="vfx-coutter-item count_number vfx-item-count-up">300</div>
            <div class="counter_text">Professionnels</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-th"></i></div>
            <div id="count-3" class="vfx-coutter-item count_number vfx-item-count-up">15</div>
            <div class="counter_text">Categories</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="vfx-item-countup last-countup">
            <div class="vfx-item-black-top-arrow"><i class="fa fa-th-list"></i></div>
            <div id="count-4" class="vfx-coutter-item count_number vfx-item-count-up">10000</div>
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