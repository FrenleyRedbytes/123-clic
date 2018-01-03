<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>Corporate</title>
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
                <i class="fa fa-home"></i>Ajouter une r&eacute;servation
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Ajouter une r&eacute;servation</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                                <?php
	                               echo form_open('specialist/add_booking');
	                             ?>
                      <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Titre<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="title" required>
                       </div>
                     
                       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Booked_by<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="booked_by" required>
                       </div>
                        <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Booked_date<span style="color:red;">*</span></label>
                         <input type="date" class="form-control" id="inputSuccess1" name="booked_date" required>
                       </div>
					     <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Specialist_type<span style="color:red;">*</span></label>
                         <!--<input type="text" class="form-control" id="inputSuccess1" name="booked_date" required>-->
						 <select  class="form-control" id="inputSuccess1" name="specialist_type" required>
 
                                  <option value="mercedes">specialist_type</option>
                                  <option value="mercedes">Mercedes</option>
                                   <option value="audi">Audi</option>
                          </select>
                       </div>

                       <div class="form-group has-success col-md-6">
                          <button class="btn btn-danger" name="submit" type="submit">ADD</button><br/><br/>
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