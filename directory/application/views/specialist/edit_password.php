
 <style type="text/css">@media only screen and (max-width: 800px) {
  #unseen table td:nth-child(2), 
  #unseen table th:nth-child(2) {display: none;}
}
@media only screen and (max-width: 640px) {
  #unseen table td:nth-child(4),
  #unseen table th:nth-child(4),
  #unseen table td:nth-child(7),
  #unseen table th:nth-child(7),
  #unseen table td:nth-child(8),
  #unseen table th:nth-child(8){display: none;}
}
td {
    word-wrap:break-word!important;
}
    </style>
         <?php include('header.php');
               include('sidebar.php'); ?>            
       <!-- End : Side bar -->
        <div id="content">  <!-- Start : Inner Page Content -->
            <div class="container"> <!-- Start : Inner Page container -->
                <!-- <div class="crumbs">
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="current">Specialist</li>
                    </ul> 
                </div> -->
                <div class="page-header">   <!-- Start : Page Header -->
                    <div class="page-title">
                        <h3>Professionnel</h3>
                    </div>
                </div>  <!-- End : Page Header -->
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group has-success col-md-8">
              <div class="alert alert-danger ">
              <button class="close" data-dismiss="alert"></button>
              <span><?php //if(issest($msg)) echo $msg; ?></span>
              <span id='message' style="color: red;"></span> 
              </div> 
              </div>
              <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Entrer ancien mot de passe<span style="color:red;">*</span></label>
              <input type="password" class="form-control" id="oldpassword" name="password">
              </div>
              <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Entrer nouveau mot de passe<span style="color:red;">*</span></label>
              <input type="password" class="form-control" id="password" name="newpassword">
              </div>
              <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1"> Entrer nouveau mot de passe<span style="color:red;">*</span></label>
              <input type="password" class="form-control" id="confirm_password" name="repassword" >
              </div>					   
              <div class="form-group has-success col-md-6">
              <button class="btn btn-danger" name="add_user" type="button" onclick="add();">AJOUTER</button><br/><br/>
              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  <!-- End : Inner Page container -->
            <a href="javascript:void(0);" class="scrollup">Scroll</a>
        </div>  <!-- End : Inner Page Content -->
    </div>  <!-- End : container -->
    <!-- =====modal box===== -->

      <!-- =====end modal box===== -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/jquery.blockUI.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/jquery.event.move.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/lodash.compat.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/respond.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/excanvas.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/breakpoints.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/touch-punch.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/DataTables/js/DT_bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/plugins.js"></script>
    <script>
        $(document).ready(function(){
            App.init();
            DataTabels.init();
        });        
    </script>
<script type="text/javascript">
                function add() {
                    var oldpass = document.getElementById("oldpassword").value;
                    if(oldpass==''){
                    document.getElementById('message').innerHTML = 'Old password should not blank.';
                    return false;
                    }
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
                        url: "<?php echo base_url(); ?>index.php/Specialist1/change_pass/"+oldpass+"/"+pass,
                        success: function (response){
                           response1=JSON.parse(response);
                            if(response1.chk=='true'){
                                window.location = "<?php echo base_url(); ?>index.php/Specialist1/change_password";
                            }else{
                                document.getElementById('message').innerHTML="Old password is wrong";
                            }
                        }
                    });
                }                
            </script>
        </body>  

</html>
  