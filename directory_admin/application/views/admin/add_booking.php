<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>Entreprise</title>
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
                <i class="fa fa-home"></i>Ajouter une R&eacuteservation
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Ajouter une R&eacuteservation</h3>
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
                         <label class="control-label" for="inputSuccess1">R&eacuteserv&eacute par<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="booked_by" required>
                       </div>
                        <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Date de R&eacuteservation<span style="color:red;">*</span></label>
                         <input type="date" class="form-control" id="inputSuccess1" name="booked_date" required>
                       </div>
					     <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Cat&eacutegorie du Professionnel<span style="color:red;">*</span></label>
                         <!--<input type="text" class="form-control" id="inputSuccess1" name="booked_date" required>-->
						 <select  class="form-control" id="inputSuccess1" name="specialist_type" required>
 
                                  <option value="mercedes">Cat&eacutegorie du Professionnel</option>
                                  <option value="mercedes">Mercedes</option>
                                   <option value="audi">Audi</option>
                          </select>
                       </div>

                       <div class="form-group has-success col-md-6">
                          <button class="btn btn-danger" name="submit" type="submit">AJOUTER</button><br/><br/>
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