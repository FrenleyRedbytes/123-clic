<footer class="site-footer footer-map">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-12">
          <h2>A PROPOS DE</h2>
          <hr>
          <p class="about-lt">Gr&acirc;ce &agrave; 123-Clic finis les pertes de temps pour trouver un professionnel, il vous suffit de vous connecter et le tour est jou&eacute;.</p>
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
            <div class="form-group" style="margin-left: 73%">
              <button type="submit" class="btn-quote">SOUMETTRE</button>
            </div>
          </form>
        </div>
        <!-- <div class="col-md-4 col-sm-6 col-xs-12">
          <h2>Contact US</h2>
          <hr>
          <ul class="widget-news-simple">
            <li>
              <div class="news-text-thum">
                <h6><a href="listing_detail.php">Hello Directory Listing</a></h6>
                <p>Phasellus ut condimentum diam, eget tempus lorem...</p>
                <div>Price: $117</div>
              </div>
            </li>          
          </ul>
        </div> -->
<!-- 
        <div class="col-md-3 col-sm-6 col-xs-12">
          <h2>Useful links</h2>
          <hr>
          <ul class="use-slt-link">
            <li><a href="#"><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Privacy &amp; Policy</a></li>
            <li><a href="#"><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Payment Method</a></li>
            <li><a href="#"><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Sitemap</a></li>
            <li><a href="#"><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Support</a></li>
            <li><a href="#"><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Terms &amp; Condition</a></li>
          </ul>
        </div> -->
        
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <p class="text-xs-center">Copyright © 2017  All Rights Reserved.</p>
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
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
<!-- registration form -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel2">Nouveau compte</h4>
      </div>
      <div class="modal-body">
        <div class="listing-register-form">
        <span id="txt_r_mobile_span1" style="color: red"></span>
       
           <form name="form2">
            <div class="listing-form-field"> <i class="fa fa-user blue-1"></i>
              <input class="form-field bgwhite" id="name" type="text" name="user_name" placeholder="Nom Pr&eacute;nom*" style="text-transform: none;">
            </div>
	    	     <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>

              <input class="form-field bgwhite" id="adress" type="text" name="adress" placeholder="Adresse*" style="text-transform: none;">
            </div>
	    <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-map-marker" aria-hidden="true"></i>

              <input class="form-field bgwhite" id="zipcode" type="text" name="Code Postal*" placeholder="Code Postal*" style="text-transform: none;">
            </div>
	       <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>

              <input class="form-field bgwhite" id="city" type="text" name="city" placeholder="Ville*" style="text-transform: none;">
            </div>
	         <div class="listing-form-field"> <i class="fa fa-mobile blue-1"></i>
              <input class="form-field bgwhite" id="mobile" type="text" name="mobile" placeholder="T&eacute;l&eacute;phone"  onkeypress="javascript:return isNumbers(event)">
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
              <a href="termes.php" onclick="open('termes.php','popup','scrollbars=1,resizable=1,height=560,width=770')">termes &amp; conditions</a> </div>
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
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel2"> Mon Profil</h4>
      </div>
      <div class="modal-body">
        <div class="listing-register-form">
        <span id='abc' style="color: red"></span>
          <form>
            <div class="listing-form-field"> <i class="fa fa-user blue-1"></i>
              <input class="form-field bgwhite" id="fname" type="text" name="name" placeholder="Enter name">
            </div>
            <div class="listing-form-field"><i class="fa fa-mobile blue-1"></i>
              <input class="form-field bgwhite" id="phone" type="text" name="mobile" placeholder="Enter Mobile Number" onkeypress="javascript:return isNumbers(event)">
            </div>
           
            <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>

              <input class="form-field bgwhite" id="city11" type="text" name="city" placeholder="City" style="text-transform: none;">
            </div>
            <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-map-marker" aria-hidden="true"></i>

              <input class="form-field bgwhite" id="zipcode11" type="text" name="zipcode" placeholder="zipcode" style="text-transform: none;">
            </div>
             <div class="listing-form-field">
              <input class="form-field submit" type="button" value="Update Profile" onclick="editProfile();">
            </div>
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
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel2"> Mon Profil</h4>
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
            <div class="listing-form-field"><i class="fa fa-mobile blue-1"></i>
              <input class="form-field bgwhite" id="phone" value="<?php echo $row['mobile'];?>" type="text" readonly onkeypress="javascript:return isNumbers(event)">
            <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-building" aria-hidden="true"></i>

              <input class="form-field bgwhite" value="<?php echo $row['city'];?>" readonly>
            </div>
            <div class="listing-form-field"> <!-- <i class="fa fa-envelope blue-1"></i> --><i class="fa fa-map-marker" aria-hidden="true"></i>

              <input class="form-field bgwhite" id="zipcode11" value="<?php echo $row['zipcode'];?>" readonly>
            </div>
            <br>
            <div class="listing-form-field">
              <a href="#" onclick="hideshow1();">Mettre &agrave; jour mon profil.</a>
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> 
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
            if(adress==''){
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
           console.log(response);  
            window.location.reload();

          // if(response=='true'){
          //   window.location.reload(); 
          // }
          // else if(response=='FalseEmail'){
          //   console.log('hii');
          //   document.getElementById('txt_r_mobile_span1').innerHTML = 'Email Already Exists.';
          // } 
          // else if(response=='FasleInsert'){
          //   document.getElementById('txt_r_mobile_span1').innerHTML = 'Invalid Creatical.';
          // } 
                }
          });
    }  

    function editProfile() {
            var name = document.getElementById("fname").value;
            if(name==''){
              document.getElementById('abc').innerHTML = 'Name should not blank.';
              return false;
            }
            var phone = document.getElementById("phone").value;
            if(phone==''){
              document.getElementById('abc').innerHTML = 'phone should not blank.';
              return false;
            } 
           var city11 = document.getElementById("city11").value;
            if(city11==''){
              document.getElementById('abc').innerHTML = 'City should not blank.';
              return false;
            }
            var zipcode11 = document.getElementById("zipcode11").value;
            if(zipcode11==''){
              document.getElementById('abc').innerHTML = 'Zipcode should not blank.';
              return false;
            }
     $.ajax({
            type: "POST",
             url: 'profile_ajax.php',    
             data:'name='+name+'&phone='+phone+'&city='+city11+'&zipcode='+zipcode11,       
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
});
</script> 