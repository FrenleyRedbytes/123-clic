 <!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>Professionnel</title>
    <script src="<?php echo base_url(); ?>assets/plugins/common/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/fsquere/style.css"/>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>assets/fonts/open-sans/open-sans.css">   
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.html">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/style_default.css" rel="stylesheet" type="text/css"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-72x72-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-114x114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-144x144-precomposed.html">
</head>
<body class="login" style="background: #fff;">
     <div class="logo" style="color: #fff;">
     <img src="<?php echo base_url(); ?>img/logo.png" alt="logo" style="height: 67px; margin-left: 60px;"/>
    <div class="content">         
        <?php echo form_open('specialist_login/confirmforgtPassword'); ?>            
            <h3 class="form-title">Mot de passe oubli&eacute;</h3>
            <div class="alert alert-danger ">
                <button class="close" data-dismiss="alert"></button>
                <span><?php //if(issest($msg)) echo $msg; ?></span>
                <span id='message' style="color: red;"></span> 
            </div>            
            <div class="control-group">
                <label class="control-label" style="color: black;margin-left: -57%">Nouveau mot de passe</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fs-user-2"></i>
                        <input type="hidden" id="token" name="token" value="<?php echo $this->uri->segment(3); ?>">
                        <input class="form-control" id="password" type="text" placeholder="Enter Your password" name="password"/>
                    </div>
                </div>
            </div>       
            <div class="control-group">
                <label class="control-label" style="color: black;margin-left: -47%">Confirmer mot de passe</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fs-user-2"></i>
                        <input class="form-control" type="text" id="confirm_password" placeholder="Enter Your confirm password" name="conpassword"/>
                    </div>
                </div>
            </div>    
             
            <div class="form-actions">
                  <input type="button" class="btn green pull-left" name="btn_forget" value="Continue" style="margin-right: 20px;" onclick="confpass();">
            </div>
        </form>         
        <?php 
         echo form_close(); 
         echo validation_errors();   
        ?>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/common/jquery.blockUI.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/common/jquery.event.move.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/common/respond.min.js"></script>    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.html"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.initLogin();
        });
    </script>
     <script type="text/javascript">
                function confpass() {
                    var token = document.getElementById("token").value;
                    var pass = document.getElementById("password").value;
                    if(pass==''){
                    document.getElementById('message').innerHTML = 'Password should not blank.';
                    return false;
                    }
                    var cpass = document.getElementById("confirm_password").value;
                    if(cpass==''){
                    document.getElementById('message').innerHTML = 'Confirm password should not blank.';
                    return false;
                    }                    
                    if(pass!==cpass){
                    document.getElementById('message').innerHTML = 'Confirm password does not  match. ';
                    return false;
                    }
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/specialist_login/confirmforgtPassword/"+pass+"/"+token,
                        success: function (response){
                            console.log(response);
                            response1=JSON.parse(response);
                            if(response1.chk=='true'){
                                window.location = "<?php echo base_url(); ?>index.php/specialist_login";
                            }else{
                                document.getElementById('message').innerHTML="Token Not Match";
                            }
                        }
                    });
                }                
            </script>
</body>
</html>