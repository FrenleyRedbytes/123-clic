
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>Directory</title>
    
    <!--[if lt IE 9]> <script src="assets/plugins/common/html5shiv.js" type="text/javascript"></script> <![endif]-->
    <script src="<?php echo base_url(); ?>assets/plugins/common/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="assets/plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/fsquere/style.css"/>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>assets/fonts/open-sans/open-sans.css">
    
    <!-- For Plugins -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/zurbResTable/responsive-tables.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/footable/css/footable.core.css" />
    
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/style_default.css" rel="stylesheet" type="text/css"/>
    
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-72x72-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-114x114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-144x144-precomposed.html">

</head>

<body>

    <header class="header navbar navbar-fixed-top" role="banner">  <!-- Start: Header and Nav Bar -->

        <div class="container"> <!-- Start: Nav Bar Container -->

            <ul class="nav navbar-nav"> <!-- Start: Mobile Menu toggle -->
                <li class="nav-toggle">
                    <a href="javascript:void(0);" title="">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>   <!-- End Mobile Menu toggle -->

            <a class="navbar-brand" href="#">  <!-- Start: Logo -->
              <img src="<?php echo base_url(); ?>img/logo.png" alt="Directory" style="width: 100px;height: auto;margin-left: 33px;"/>
            </a>    <!-- End Logo -->

            <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
                <i class="fa fa-bars"></i>
            </a>    <!-- End : Desktop Main Menu Toggler -->
            
            <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm"> <!-- Start : Top Left Drop down -->
                <li><a href="#">Directory Dashboard</a></li>
            </ul>   <!-- End : Top Left Drop down -->

            <ul class="nav navbar-nav navbar-right">    <!-- Start : Top Right Drop down Menu -->
               
                <li class="dropdown user">  <!-- Start : User Drop Down -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <img class="userImg" src="assets/images/demo/avatar-1.jpg"> -->Welcome
                        <span class="username">Admin</span>
                        <i class="fa fa-angle-down small"></i>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/addadmin/profile">
                                <i class="fs-user"></i> My Profile
                            </a>
                        </li> 

                        <li>
                            <a href="<?php echo base_url(); ?>index.php/dashboard/logout">
                                <i class="fa fa-power-off"></i> Log Out
                            </a>
                        </li>
						
						 <li>
                            <a href="<?php echo base_url(); ?>index.php/addadmin/change_password">
                                <i class="fa fa-power-off"></i> Password Change
                            </a>
                        </li>
						
                    </ul>
                </li>   <!-- End : User Drop Down -->

            </ul>   <!-- End : Top Right Drop down Menu -->

        </div>  <!-- End Nav Bar Container -->

    </header>   <!-- End Header and Nav Bar -->

    <div id="container">    <!-- Start : container -->