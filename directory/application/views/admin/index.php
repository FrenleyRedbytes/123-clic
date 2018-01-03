<!DOCTYPE html>
<html lang="en"> 
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>Admin</title>

    <!--[if lt IE 9]> <script src="assets/plugins/common/html5shiv.js" type="text/javascript"></script> <![endif]-->
    <script src="<?php echo base_url(); ?>assets/plugins/common/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.css" />
    <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="assets/plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/fsquere/style.css"/>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>assets/fonts/open-sans/open-sans.css">
    
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.html">

    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/style_default.css" rel="stylesheet" type="text/css"/>
    
    <!-- <link rel="icon" type="image/png" href="assets/images/favicon.ico"> -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-72x72-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-114x114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-144x144-precomposed.html">

</head>

<!-- <body class="login" style="background:url('assets/images/images.jpg');"> -->
<body class="login" style="background: #fff;">
     <div class="logo" style="
    color: #fff;">
    <!---<img src="<?php echo base_url(); ?>/img/sayso_logo.png" alt="logo" style="
        width: 216px;
    height: auto;
    margin-left: 33px;"/>-->

    
    <div class="content">   <!-- BEGIN LOGIN -->
        
        <!---<form class="form-vertical login-form" method="POST" action="dashboard">-->
		<?php echo form_open('admin'); ?>
            
            <h3 class="form-title">Login to your account</h3>
            <div class="alert alert-danger ">
                <button class="close" data-dismiss="alert"></button>
                <span><?php //echo $msg; ?>.</span>
            </div>
            
            <div class="control-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label">Username</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fs-user-2"></i>
                        <input class="form-control" type="text" placeholder="Username" name="email"/>
                    </div>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fs-locked"></i>
                        <input class="form-control" type="password"  name="password"/>
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <!-- <label class="checkbox">
                     <a href=""  name="btn_login1"><i class="fs-checkmark-2"></i> Are You Merchant?? </a>
                     <a href=""  name="btn_login2"><i class="fs-checkmark-2"></i> Are You User??  </a>
                </label> -->
                <input type="submit" class="btn green pull-left" name="btn_login" value=" Login" style="
                    margin-right: 20px;
                ">
                           <!--  <input type="submit" class="btn green pull-left" name="btn_login1" value="Merchant" style="
                    margin-right: 2px;
                ">
                    <input type="submit" class="btn green pull-left" name="btn_login2" value="User"> -->
               </div>
        </form> <!-- END LOGIN FORM --> 
		
   <?php echo form_close(); 
   echo validation_errors();
   
   ?>
    </div>
    <!-- END LOGIN -->
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
</body>
</html>