<footer class="site-footer footer-map">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-12">
          <h2>A PROPOS DE 123-Clic</h2>
          <hr>
          <p class="about-lt">Gr&acirc;ce &agrave; 123-Clic vous pourrez g&eacute;rer votre emploi du temps directement sur votre PC ou t&eacute;l&eacute;phone mobile. Finis les pertes de temps ou les rendez vous non-honor&eacute;.</p>
          <a href="about.php" class="btn-primary-link more-detail"><i class="fa fa-hand-o-right"></i> Lire la suite</a>          
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <h2>CONTACT</h2>
          <hr>
            <p class="about-lt">
              Adresse: 
	    <br>315, Rue des Esparties 
	    <br>ZA Les Paluds
	    <br>13430 Eygui&egrave;res.
              <br>T&eacute;l&eacute;phone: 0442119979
              <br>Email: contact@123clic.fr
            </p>                      
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <h2>NEWSLETTER</h2>
          <hr>
          <form class="form-alt">
            <div class="form-group">
              <!-- <input type="text" placeholder="Name :-" required="" class="form-control"> -->
            </div>
            <div class="form-group">
              <input type="text" placeholder="Email :-" required="" class="form-control">
            </div>
            <div class="form-group">
              <!-- <textarea placeholder="Message :-" required="" class="form-control"></textarea> -->
            </div>
            <div class="form-group" style="float:right;">
              <button type="submit" class="btn-quote">SOUMETTRE</button>
            </div>
          </form>
        </div>

        
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <p class="text-xs-center">Copyright Â© 2017  All Rights Reserved. <a href="mentionlegal.php"> Mentions l&eacute;gales</a> <a href="CGU.php">CGU</a> <a href="confidentialite.php">Confidentialit&eacute;</a></p> 
        </div>
        <div><a href="#" class="scrollup">Scroll</a></div>
      </div>
    </div>
  </div>
</footer>
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
        <h4 class="modal-title" id="myModalLabel"> S'IDENTIFIER</h4>
      </div>
      <div class="modal-body">
        <div class="listing-login-form">
         <span id="txt_r_mobile_span" style="color: red"></span>
          <form id="frm1" name="form1">
            <div class="listing-form-field"> <i class="fa fa-user blue-1"></i>
              <input class="form-field bgwhite" type="email" id="email1" name="user_name" placeholder="Email" style="text-transform: none;">
            </div>
            <div class="listing-form-field"> <i class="fa fa-lock blue-1"></i>
              <input class="form-field bgwhite" type="password" id="password1" name="user_pass" placeholder="Mot de Passe">
            </div>
            <div class="listing-form-field clearfix margin-top-20 margin-bottom-20">
             
              <label for="checkbox-1-1"></label>
              <!-- <label class="checkbox-lable">Remember me</label> -->
              <a href="forgot.php">Mot de passe oubli&eacute;</a> </div>
            <div class="listing-form-field">
              <input class="form-field submit" name="Button1" type="button"  value="ENREGISTRER" onclick="Login();">
            </div>
          </form>
          <div class="bottom-links">
            <p>	Vous n'&ecirc;tes pas encore membre?<a href="#" onclick="hideshow();">Cr&eacute;er un nouveau compte</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>







<div class="modal fade" id="codepost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
        <h4 class="modal-title" id="myModalLabel"> Code Postal </h4>
      </div>
      <div class="modal-body">
        <div class="listing-login-form">
         <span id="txt_r_mobile_span" style="color: red"></span>
          <form id="frm1" name="form1">
            <div class="listing-form-field"> <i class="fa fa-user blue-1"></i>
              <input class="form-field bgwhite" type="text" id="zipuser" name="zipuser" placeholder="Code Postal" style="text-transform: none;">
            </div>
            
            <div class="listing-form-field">
              <input class="form-field submit" name="Button1" type="button"  value="RECHERCHER" onclick="codepost();">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>










<!-- registration form -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
        <h4 class="modal-title" id="myModalLabel2">Nouveau compte</h4>
      </div>
      <div class="modal-body">
        <div class="listing-register-form">
        <span id="txt_r_mobile_span1" style="color: red"></span>
       
          <form name="form2">
            <div class="listing-form-field"> <i class="fa fa-user blue-1"></i>
              <input class="form-field bgwhite" id="name" type="text" name="user_name" placeholder="Nom*" style="text-transform: none;">
            </div>
	    <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>

              <input class="form-field bgwhite" id="adress" type="text" name="adress" placeholder="Adresse*" style="text-transform: none;">
            </div>
	    <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-map-marker" aria-hidden="true"></i>

              <input class="form-field bgwhite" id="zipcode" type="text" name="zipcode*" placeholder="Code Postal*" style="text-transform: none;">
            </div>
	    <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>

              <input class="form-field bgwhite" id="city" type="text" name="city" placeholder="Ville*" style="text-transform: none;">
            </div>
	    <div class="listing-form-field"> <i class="fa fa-mobile blue-1"></i>
              <input class="form-field bgwhite" id="mobile" type="text" name="mobile" placeholder="T&eacute;l&eacute;phone*"  onkeypress="javascript:return isNumbers(event)">
            </div>
         
	    
            <div class="listing-form-field"> <i class="fa fa-envelope blue-1"></i>
              <input class="form-field bgwhite" id="email2" type="email" name="user_email" placeholder="Email*" style="text-transform: none;">
            </div>
            <div class="listing-form-field"> <i class="fa fa-lock blue-1"></i>
              <input class="form-field bgwhite" id="password2" type="password" name="user_password" placeholder="Mot de passe*">
            </div>
            <div class="listing-form-field"> <i class="fa fa-lock blue-1"></i>
              <input class="form-field bgwhite" id="cpassword" type="password" name="user_confirm_password" placeholder="Confirmation Mot de Passe*">
            </div>
       

            
            <div class="listing-form-field clearfix margin-top-20 margin-bottom-20">
              <input type="checkbox" name="cbox1" id="checkbox-1-2" class="regular-checkbox"  onClick=Disab1(this.id); required="">
              <label for="checkbox-1-2"></label>
              <label class="checkbox-lable">J'accepte avec</label>
              <a href="termes.php">termes &amp; conditions</a> </div>
            <div class="listing-form-field">
              <input class="form-field submit" type="button" name="Button1" disabled="" value="create account" onclick="signup();">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> 
<SCRIPT LANGUAGE="JavaScript">
function Disab1(id) 
{
  if(document.form2.cbox1.checked) 
    {
        // alert('if in');
        document.form2.Button1.disabled=false
    }
    else {
        // alert('if out');
        document.form2.Button1.disabled=true
    }
}
</SCRIPT>
<!-- Profile form -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
        <h4 class="modal-title" id="myModalLabel2"> Modification des informations</h4>
      </div>
      <div class="modal-body">
        <div class="listing-register-form">
        <span id='abc' style="color: red"></span>
          <form>
	<?php 
              $id=$_SESSION['user_id'];
            $query = mysqli_query($con, "SELECT * from register where `id`='$id'");
            if($row = mysqli_fetch_array($query)){
          ?>
            <div class="listing-form-field"> <i class="fa fa-user blue-1"></i>
              <input class="form-field bgwhite" id="fname" value="<?php echo $row['name'];?>" type="text" name="name" placeholder="Votre Nom" >
            </div>
	  <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>
              <input class="form-field bgwhite" id="email" value="<?php echo $row['email'];?>" type="text" name="email" placeholder="Email" style="text-transform: none;">
            </div>
            <div class="listing-form-field"><i class="fa fa-mobile blue-1"></i>
              <input class="form-field bgwhite" id="phone" value="<?php echo $row['mobile'];?>" type="text" name="mobile" placeholder="Entrer Numero de telephone" onkeypress="javascript:return isNumbers(event)">
            </div>
	  <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>
              <input class="form-field bgwhite" id="address" value="<?php echo $row['address'];?>" type="text" name="address" placeholder="Adresse" style="text-transform: none;">
            </div>
	  <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-map-marker" aria-hidden="true"></i>
              <input class="form-field bgwhite" id="zipcode11" value="<?php echo $row['zip_code'];?>" type="text" name="zipcode" placeholder="Code Postal" style="text-transform: none;">
            </div>
	  <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>
              <input class="form-field bgwhite" id="city11" value="<?php echo $row['city'];?>" type="text" name="city" placeholder="Ville" style="text-transform: none;">
            </div>
	  <br>
	  <div class="listing-form-field">
              <input class="form-field submit" type="button" value="MODIFER MES INFORMATIONS" onclick="editProfile();">
            </div>
	  <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="profile1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
        <h4 class="modal-title" id="myModalLabel2"> Mes Informations</h4>
      </div>
      <div class="modal-body">
        <div class="listing-register-form">
        <span id='abc' style="color: red"></span>
          <form>
          <?php 
              $id=$_SESSION['user_id'];
            $query = mysqli_query($con, "SELECT * from register where `id`='$id'");
            if($row = mysqli_fetch_array($query)){
          ?>
            <div class="listing-form-field"> <i class="fa fa-user blue-1"></i>
              <input class="form-field bgwhite" id="fname" value="<?php echo $row['name'];?>" type="text" readonly >
            </div>
	  <div class="listing-form-field"> <i class="fa fa-user blue-1"></i>
              <input class="form-field bgwhite" id="email" value="<?php echo $row['email'];?>" type="text" readonly >
            </div>
            <div class="listing-form-field"><i class="fa fa-mobile blue-1"></i>
              <input class="form-field bgwhite" id="phone" value="<?php echo $row['mobile'];?>" type="text" readonly onkeypress="javascript:return isNumbers(event)">
            </div>
	  <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>
              <input class="form-field bgwhite" id="address" value="<?php echo $row['address'];?>" readonly>
            </div>
	  <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>
              <input class="form-field bgwhite" id="zipcode" value="<?php echo $row['zip_code'];?>" readonly>
            </div>
            <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-map-marker" aria-hidden="true"></i>
              <input class="form-field bgwhite" id="city" value="<?php echo $row['city'];?>" readonly>
            </div>
            <br>
            <div class="listing-form-field">
              <a href="#" onclick="hideshow1();">METTRE A JOUR MES INFORMATIONS.</a>
            </div>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts --> 
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/waypoints.js"></script> 
<script type="text/javascript" src="js/jquery_counterup.js"></script> 
<script type="text/javascript" src="js/jquery_custom.js"></script> 
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>  -->
<script>
    function isNumbers(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;
        return true;
    }    
   $(document).on("keypress", 'form', function (e) {
    var code = e.keyCode || e.which;
    console.log(code);
    if (code == 13) {
        console.log('Inside');
        e.preventDefault();
        return false;
    }
});
</script>
  <script type="text/javascript">
function Login() {
            var user = document.getElementById("email1").value;
                console.log(user);
            if(user==''){
              document.getElementById('txt_r_mobile_span').innerHTML = 'Username should not blank.';
              return false;
            }
            var atpos = user.indexOf("@");
            var dotpos = user.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=user.length) {
            document.getElementById('txt_r_mobile_span').innerHTML = 'Not a valid e-mail address.';
            return false;
            }

            var pass = document.getElementById("password1").value;
               console.log(pass);
            if(pass==''){
              document.getElementById('txt_r_mobile_span').innerHTML = 'Password should not blank.';
              return false;
            }           
      var data ='login_ajax.php?username='+user+'&password='+pass;
      console.log(data);
       $.ajax({
            type: "POST",
             url: 'login_ajax.php',    
            data: 'username='+user+'&password='+pass,       
          success: function (response) {
          console.log(response);
          if(response=='true'){
            window.location.reload(); 
          }
          else{
            document.getElementById('txt_r_mobile_span').innerHTML = 'Invalid Creatical.';
          }         
          }
          });
    }   




    function editProfile() {
            var name = document.getElementById("fname").value;
            if(name==''){
              document.getElementById('abc').innerHTML = 'Le nom doit etre indiqué.';
              return false;
            }
	     var email = document.getElementById("email").value;
            if(email==''){
              document.getElementById('abc').innerHTML = 'L email doit etre indiqué.';
              return false;
            } 
            var phone = document.getElementById("phone").value;
            if(phone==''){
              document.getElementById('abc').innerHTML = 'Le numéro doit etre indiqué.';
              return false;
            } 
	     var address = document.getElementById("address").value;
            if(address==''){
              document.getElementById('abc').innerHTML = 'L adresse doit etre indiqué.';
              return false;
            } 
           var city11 = document.getElementById("city11").value;
            if(city11==''){
              document.getElementById('abc').innerHTML = 'La ville doit etre indiquée.';
              return false;
            }
            var zipcode11 = document.getElementById("zipcode11").value;
            if(zipcode11==''){
              document.getElementById('abc').innerHTML = 'Le code postal doit etre indiqué.';
              return false;
            }
     $.ajax({
            type: "POST",
             url: 'profile_ajax.php',    
             data:'name='+name+'&email='+email+'&phone='+phone+'&address='+address+'&city='+city11+'&zipcode='+zipcode11,       
             success: function(response){
             response1=JSON.parse(response);
          if(response1.chk=='true'){
            document.getElementById('abc').innerHTML = 'Profile Update Successfully.';
            window.location.reload(); 
          }
          else{
            document.getElementById('abc').innerHTML = 'Profile Not Update.';
          } 
          }
        });
    }
  </script>
<script type="text/javascript">
function hideshow(){
    $('#register').modal('show');
    $('#login').modal('hide');
}
function hideshow1(){
    $('#profile').modal('show');
    $('#profile1').modal('hide');
}

$(document).ready(function(){

  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollup').fadeIn();
    } else {
      $('.scrollup').fadeOut();
    }
  });
  $('.scrollup').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });

  function signup() {
      
           var name = document.getElementById("name").value;
           // console.log(name);
            if(name==''){
              document.getElementById('txt_r_mobile_span1').innerHTML = 'Name should not blank.';
              return false;
            }
           var email = document.getElementById("email2").value;
                // console.log(email);
            if(email==''){
              document.getElementById('txt_r_mobile_span1').innerHTML = 'Email should not blank.';
              return false;
            }
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
            document.getElementById('txt_r_mobile_span1').innerHTML = 'Not a valid e-mail address.';
            return false;
            }

            var pass = document.getElementById("password2").value;
             // console.log(pass);
            if(pass==''){
              document.getElementById('txt_r_mobile_span1').innerHTML = 'Password should not blank.';
              return false;
            }     
            var cpass = document.getElementById("cpassword").value;
              // console.log(cpass);
            if(cpass==''){
              document.getElementById('txt_r_mobile_span1').innerHTML = 'Confirm Password should not blank.';
              return false;
            }
             if(pass!==cpass)
            {
              document.getElementById('txt_r_mobile_span1').innerHTML = 'Conform Password Not Match. ';
              return false;
            }
           
            var mobile = document.getElementById("mobile").value;
            if(mobile==''){
              document.getElementById('txt_r_mobile_span1').innerHTML = 'Mobile should not blank.';
              return false;
            } 
            var city = document.getElementById("city").value;
            if(city==''){
              document.getElementById('txt_r_mobile_span1').innerHTML = 'City should not blank.';
              return false;
            } 
       var adress = document.getElementById("adress").value;
            if(city==''){
              document.getElementById('txt_r_mobile_span1').innerHTML = 'Adress should not blank.';
              return false;
            } 
            var zipcode = document.getElementById("zipcode").value;
            if(zipcode==''){
              document.getElementById('txt_r_mobile_span1').innerHTML = 'Zipcode should not blank.';
              return false;
            } 

           
            var data ='signup_ajax.php?name='+name+'&email='+email+'&password='+pass+'&mobile='+mobile+'&city='+city+'&zipcode='+zipcode+'&adress='+adress;
            console.log(data);

     $.ajax({
            type: "POST",
             url: 'signup_ajax.php',    
            data: 'name='+name+'&email='+email+'&password='+pass+'&mobile='+mobile+'&city='+city+'&zipcode='+zipcode+'&adress='+adress,       
          success: function (response) {
           //console.log(response);  
          window.location.replace("<?php echo $page_retour;?>");
         //  window.location.reload();

          // if(response=='true'){
          //   window.location.reload(); 
          // }
          // else if(response=='FalseEmail'){
          //   console.log('hii');
          //   document.getElementById('txt_r_mobile_span1').innerHTML = 'Email Already Exists.';
          // } 
          // else if(response=='FasleInssert'){
          //   document.getElementById('txt_r_mobile_span1').innerHTML = 'Invalid Creatical.';
          // } 
                }
                
          });
    }

    

});
</script> 

<!-- <script>
  var map;
  var markersArray = [];

 function initMap()
{   
            var geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(41, 29);
            var myOptions = {
                zoom: 5,
                center: new google.maps.LatLng(51.508742,-0.120850),
                // mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("location-homemap-block"), myOptions);

            // add a click event handler to the map object
            google.maps.event.addListener(map, "click", function(event)
            {
                // place a marker
                placeMarker(event.latLng);
               
                var lat = event.latLng.lat();
                var log = event.latLng.lng();

                // $("#location-body").html("<span class='_a_2_1ft'><i class='fa fa-map-marker' aria-hidden='true'></i>"+event.latLng.lat()+" "+event.latLng.lng() +"</span>");

                 geocoder.geocode({
                    'latLng': event.latLng
                  }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                      if (results[0]) {
                        //alert(results[0].formatted_address);
                      }
                    }
                  });
                
                // display the lat/lng in your form's lat/lng fields
                // document.getElementById("latFld").value = event.latLng.lat();
                // document.getElementById("lngFld").value = event.latLng.lng();
            });
            
            $('#googleMap').on('shown.bs.modal', function(){
                initMap();
            });

        }
        function placeMarker(location) {
            // first remove all markers if there are any
            deleteOverlays();

            var marker = new google.maps.Marker({
                position: location, 
                map: map
            });

            // add marker in markers array
            markersArray.push(marker);

            //map.setCenter(location);
        }

        // Deletes all markers in the array by removing references to them
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
            markersArray.length = 0;
            }
        }
        function loadMap(){
            initMap();
        }
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPjlpNEpN3fLPM6F3eFk4XjXS31AU4AQ0&callback=initMap">
</script>

<script>

    $(".modal-content #closeMap").click(function(){
        $('#googleMap').modal('hide');
    });


</script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF1q5AP0SmQY7s35Hj-T9HCiOWoXc5ODw&libraries=places&callback=initAutocomplete"
        async defer></script>
<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        //street_number: 'short_name',
        //route: 'long_name',
        locality: 'long_name',
        //administrative_area_level_1: 'short_name',
        //country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('autocomplete')

              ),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);

        
       zipuser = new google.maps.places.Autocomplete(
            (document.getElementById('zipuser')

              ),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        zipuser.addListener('place_changed', fillInZipAddress);
      }

      function initZipAutocomplete() {

       zipuser = new google.maps.places.Autocomplete(
            (document.getElementById('zipuser')

              ),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        zipuser.addListener('place_changed', fillInZipAddress);
      }



      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        var lat = place.geometry.location.lat(),
        lng = place.geometry.location.lng();




        $("#latitude").val(lat);
        $("#longitude").val(lng);

        var place_zip = zipuser.getPlace();
        var lat = place_zip.geometry.location.lat(),
        lng = place_zip.geometry.location.lng();

        $("#latitude_zip").val(lat);
        $("#longitude_zip").val(lng);

        console.log("Latitude:"+lat);
        console.log("Longitude:"+lng);


        /*for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }*/
      }

      function fillInZipAddress() {
        // Get the place details from the autocomplete object.
      /*  var place = autocomplete.getPlace();
        var lat = place.geometry.location.lat(),
        lng = place.geometry.location.lng();*/


        var place_zip = zipuser.getPlace();
        var lat = place_zip.geometry.location.lat(),
        lng = place_zip.geometry.location.lng();

        $("#latitude_zip").val(lat);
        $("#longitude_zip").val(lng);


        console.log("Latitude Zip Search:"+lat);
        console.log("Longitude Zip Search:"+lng);


        /*for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }*/
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {

            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            console.log("Geolocation:"+geolocation);
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            
            
            
            autocomplete.setBounds(circle.getBounds());
          });
        } 
      }

       function geolocateZip() {

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {

            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            console.log("Geolocation:"+geolocation);
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            
            zipuser.setBounds(circle.getBounds());
          });
        } 
      }
    </script>


<script>
var baseUrl = 'http://182.72.44.11/123-clic/directory_ui/';
  function checkUserLoginOrNot(){
    
  }

  function gotoPage(page=null,id=null,lat=null,long=null){
//      window.location.href = baseUrl+page+'?spe_id='+id+'&lat='+lat+'&long='+long;
        window.location.href = baseUrl+page+'?spe_id='+id;
  }
 /* $(".close").click(function(){
      window.location.href = baseUrl;
  });*/
</script>

