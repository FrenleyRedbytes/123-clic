<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>specialist</title>
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
                <i class="fa fa-home"></i>Edit specialist
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Edit specialist</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                              <?php
	                               echo form_open_multipart('specialist/update_workerlist');
	                             ?>
								 <table class="table table-striped">
                          <tr><th>work_id</th><th>First_name</th><th>Last_name</th><th>Address</th><th>City</th><th>Mobile</th><th>Email</th><th>Image</th><th>Action</th></tr>
                             <?php
                                 echo "<br>";
                                 echo "<br>";
                                 echo "<br>";
                        //print_r($res);
                       foreach($res as $x)
                        {?>
                       <tr>
                      
                  
          <td><input type="text" class="form-control" id="inputSuccess1" name="work_id" value="<?php echo $x['work_id'];?>"readonly></td>
				<td><input type="text" class="form-control" id="inputSuccess1" name="first_name" value="<?php echo $x['first_name'];?>" required></td>
			<td><input type="text" class="form-control" id="inputSuccess1" name="last_name" value="<?php echo $x['last_name'];?>" required></td>
      <td><input type="text" class="form-control" id="inputSuccess1" name="address" value="<?php echo $x['address'];?>" required></td>
      <td><input type="text" class="form-control" id="inputSuccess1" name="city" value="<?php echo $x['city'];?>" required></td>
      <td><input type="text" class="form-control" id="inputSuccess1" name="mobile" value="<?php echo $x['mobile'];?>" required></td>
			<td><input type="text" class="form-control" id="inputSuccess1" name="email" value="<?php echo $x['email'];?>"></td>
						 <td><p><img src="/directory/uploads/<?php echo $x['image']; ?>" alt="image"  height="50" width="50"/></p><p><input type="file"  class="form-control" id="inputSuccess1" name="image"></p></td>
						
                     
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