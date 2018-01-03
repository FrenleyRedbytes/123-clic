<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>R&eacute;pertoire</title>
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
    <header class="header navbar navbar-fixed-top" role="banner"> 
        <div class="container"> 
            <ul class="nav navbar-nav">
                <li class="nav-toggle">
                    <a href="javascript:void(0);" title="">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
            <a class="navbar-brand" href="#"> 
              <img src="<?php echo base_url(); ?>img/logo.png" alt="Directory" style="width:60px;"/>
            </a>
            <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="       Toggle navigation">
                <i class="fa fa-bars" style="margin-left: 75%;"></i>
            </a>             
            <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm"> 
                <li><!-- <a href="#">Directory Dashboard</a> --></li>
            </ul>   
            <ul class="nav navbar-nav navbar-right">                 
                <li class="dropdown user" style="margin-left: 0%;">  
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                    <b style="background-color: #ddac29;padding: 7px;border-radius: 5px;
                    "><?php echo $this->session->userdata('name'); ?></b>&nbsp;<i class="fa fa-user" style="background-color: #c5475d;padding: 9px;border-radius: 50%"></i>
                    </a>
            <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/addadmin/profile">
                                <i class="fs-user"></i> Mon Profil
                            </a>
                        </li> 
						 <li>
                            <a href="<?php echo base_url(); ?>index.php/addadmin/change_password">
                                <i class="fa fa-power-off"></i> Changer Mot de Passe
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/dashboard/logout">
                                <i class="fa fa-power-off"></i> Se d&eacute;connecter
                            </a>
                        </li>						
                    </ul>
                </li>  
            </ul>  
        </div> 
    </header>