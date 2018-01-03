
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
                <div class="crumbs">    <!-- Start : Breadcrumbs -->
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="current">Specialist</li>
                    </ul>
                </div>  <!-- End : Breadcrumbs -->
                <div class="page-header">   <!-- Start : Page Header -->
                    <div class="page-title">
                        <h3>Specialist</h3>
                    </div>
                </div>  <!-- End : Page Header -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="portlet box blue"> -->
                            <!--<div class="portlet-title">
                                <div class="caption"><i class="fa fa-table"></i> Admin Details</div>                               
                                <div class="actions">
                                    <div class="btn-group">
                                        <a class="btn mini green" href="<?php //echo base_url() ; ?>index.php/addadmin/add_admin">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i> 
                                        </a>
                                       </div>
                                </div>
                            </div>
                            <div class="portlet-body">-->
                            
				 
				 
				              <?php
	                                 echo form_open_multipart('specialist1/change_pass');
	                           ?>
                     
					  
             <div class="form-group has-success col-md-8">
                         <span id='message' style="color: red;"></span>
                         <?php if(isset($msg))
                         echo $msg; ?>
                         </div>
               <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Enter Old Password<span style="color:red;">*</span></label>
                         <input type="password" class="form-control" id="inputSuccess1" name="password" required>
                         </div>
              <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Enter New Password<span style="color:red;">*</span></label>
                         <input type="password" id="password" class="form-control" id="inputSuccess1" name="newpassword" required>
                       </div>
              <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Enter New RePassword<span style="color:red;">*</span></label>
                         <input type="password" id="confirm_password" class="form-control" id="inputSuccess1" name="repassword" required>
                       </div>
                        <script type="text/javascript">
                              function confpass() {
                                var pass = document.getElementById("password").value;
                                console.log(pass);
                                if(pass==''){
                                document.getElementById('message').innerHTML = 'Password should not blank.';
                                return false;
                                }
                                var cpass = document.getElementById("confirm_password").value;
                                console.log(cpass);
                                if(cpass==''){
                                document.getElementById('message').innerHTML = 'Confirm password should not blank.';
                                return false;
                                }                    
                                if(pass!==cpass){
                                document.getElementById('message').innerHTML = 'Confirm password does not  match. ';
                                return false;
                                }
                                 $.ajax({
                                  type: "GET",
                                  url: '<?php echo base_url('index.php/specialist1/change_pass');?>/'+pass,
                                  success: function(data){
                                    // $('#size').html(data);
                                  },
                                         });
                              }                
                        </script>
					   <div class="form-group has-success col-md-6">
                          <button onclick="confpass();" class="btn btn-danger" name="add_user" type="button">ADD</button><br/><br/>
                      </div>
					  <?php
	                   echo form_close();
		                echo validation_errors();
	                  ?>
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
    <script>
     function edit_user(id){
            jQuery.ajax({
                  type:'POST',
                  url:'query.php',
                  data:'method=18&id='+id,
                  success:function(res){
                       $('#edit_user').modal("show");
                      var jsonData = JSON.parse(res);
                      console.log(jsonData);
                      document.getElementById('id2').value =jsonData.edit_user.id1;
                      document.getElementById('title2').value =jsonData.edit_user.title1;
                      document.getElementById('description2').value =jsonData.edit_user.description1;
                      document.getElementById('date2').value = jsonData.edit_user.date1;
                      document.getElementById("imgid").src   = jsonData.edit_user.dateimg;
                      document.getElementById('myfile').value= jsonData.edit_user.dateimg;
                     // myfile
                      
                  }
              });
      }
     function delete_user(id){
            var result= confirm("Are you really want delete this category?");
            if(result==true){
                $.ajax({
                    type:'POST',
                    url:'query.php',
                    data:'method=1&id='+id,
                    success:function(res){
                     location.reload(); 
                    }
                });
            }
     }
</script>
        </body>  


</html>