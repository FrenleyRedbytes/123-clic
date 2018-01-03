<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>services</title>
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
                <i class="fa fa-home"></i>Edit services
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Edit services</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                              <?php
	                               echo form_open_multipart('services/update_enquiry');
	                             ?>
								 <table class="table table-striped">
                          <tr><th>serv_id</th><th>spe_id</th><th>serv_title</th><th>serv_day</th><th>price</th><th>time</th><th>created_at</th><th>created_date</th><th>Action</th></tr>
                             <?php
                                 echo "<br>";
                                 echo "<br>";
                                 echo "<br>";
                        //print_r($res);
                       foreach($res as $x)
                        {?>
                       <tr>
                      
                  
                         <td><input type="text" class="form-control" id="inputSuccess1" name="serv_id" value="<?php echo $x['serv_id'];?>"readonly></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="spe_id" value="<?php echo $x['spe_id'];?>" required></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="serv_title" value="<?php echo $x['serv_title'];?>"></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="serv_day" value="<?php echo $x['serv_day'];?>"></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="price" value="<?php echo $x['price'];?>" required></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="time" value="<?php echo $x['time'];?>"></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="created_at" value="<?php echo $x['created_at'];?>"  required></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="created_date" value="<?php echo $x['created_date'];?>"  required></td>
                     	 <td><button class="btn btn-danger" name="add_category" type="submit">UPDATE</button></td>
                     
                <?php

                 echo "</tr>";   
                 echo form_close();
       }
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