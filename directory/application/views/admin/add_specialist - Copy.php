gbh<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>Professionnel</title>
    </head>
    <body>
      <!-- Start : Side bar -->
      <?php 
         include('header.php');
         include('sidebar.php'); 
         ?>
      <!-- End : Side bar -->
      <div id="content">
        <!-- Start : Inner Page Content -->
        <div class="container">
          <!-- Start : Inner Page container -->
          <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
              <li class="current">
                <i class="fa fa-home"></i>Ajouter un Professionnel
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Ajouter un Professionnel</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                                <?php
	                                 echo form_open_multipart('specialist/add_specialist');
	                             ?>
                     
					    <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Nom Professionnel<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="brand_name" required>
                       </div>
					       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Logo du Professionnel<span style="color:red;">*</span></label>
                         <input type="file" class="form-control" id="inputSuccess1" name="brand_logo" required>
                       </div>
					    <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Nom du Contact Professionnel<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="contact_name" required>
                       </div>
					                     
                       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Image du Contact Professionnel<span style="color:red;">*</span></label>
                         <input type="file" class="form-control" id="inputSuccess1" name="contact_image" required>
                       </div>
					    <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Email du Professionnel<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="email" required>
                       </div>
					    <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Mot de Passe du Porfessionnel<span style="color:red;">*</span></label>
                         <input type="password" class="form-control" id="inputSuccess1" name="password" required>
                       </div>
					   <div>
                           <input type="hidden" class="form-control" id="inputSuccess1" name="created_by" required>
						</div>
                       <div class="form-group has-success col-md-6">
                          <button class="btn btn-danger" name="add_user" type="submit">Ajouter</button><br/><br/>
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