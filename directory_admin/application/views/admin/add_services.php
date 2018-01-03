<?php 
  include('header.php');
  include('sidebar.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <style type="text/css">
  @media only screen and (max-width: 800px) {
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
    <style type="text/css">
      .paginate_button{
        padding: 0px 10px;
      }
      .dataTables_filter{
        margin-top: -25px;
      }
      .page-header {
        padding-bottom: 0px;
        margin: 14px 1px 0px;
        border-bottom: 0px solid #eee;
      }
      /*.navbar .navbar-brand{
        margin-left: -90px !important;
      }*/
    </style>
    <script>
      $(document).ready(function() {
      $('#example').DataTable();
      } );
    </script>
  </head>
  <body>
      <div id="content">
        <!-- Start : Inner Page Content -->
        <div class="container">
          <!-- Start : Inner Page container -->
          <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
              <li class="current">
                <i class="fa fa-home"></i>Ajouter un service
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Ajouter un service</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                                <?php
	                                 echo form_open_multipart('specialist/add_specialist');
	                             ?>
                     
					    <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Specialist Brand Name<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="brand_name" required>
                       </div>
					   <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Specialist brand Logo<span style="color:red;">*</span></label>
                         <input type="file" class="form-control" id="inputSuccess1" name="brand_logo" required>
                       </div>
					    <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Specialist Contact Name<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="contact_name" required>
                       </div>
					                     
                       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Specialist Contact Image<span style="color:red;">*</span></label>
                         <input type="file" class="form-control" id="inputSuccess1" name="contact_image" required>
                       </div>
					    <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Specialist Email<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="email" required>
                       </div>
					    <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Specialist Password<span style="color:red;">*</span></label>
                         <input type="password" class="form-control" id="inputSuccess1" name="password" required>
                       </div>
					   <div>
                           <input type="hidden" class="form-control" id="inputSuccess1" name="created_by" required>
						</div>
                       <div class="form-group has-success col-md-6">
                          <button class="btn btn-danger" name="add_user" type="submit">AJOUTER</button><br/><br/>
                      </div>
                <?php
	       if(isset($res))
	         echo $res;
	      echo validation_errors(); ?>
	      <?php
	       echo form_close();
	      ?>
</div>
          </div>
        </div>
      </div>
      <a href="javascript:void(0);" class="scrollup">Scroll</a>
    </div>
  </div>
  <?php include('footer.php');?>
  </body>
  </html>