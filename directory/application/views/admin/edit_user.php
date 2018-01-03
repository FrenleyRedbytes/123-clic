i<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>User</title>
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
                <i class="fa fa-home"></i>Edit User
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Edit User</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                              <?php
	                               echo form_open_multipart('user/update_enquiry');
	                             ?>
								<table>
                               <tr><th>ID</th><th>Name</th><th>Mobile</th><th>Email</th></tr>
                             <?php
                                 echo "<br>";
                                 echo "<br>";
                                 echo "<br>";
                        //print_r($res);
                       foreach($res as $x)
                        {?>
                       <tr>
                      
                  
                         <td><input type="text" class="form-control" id="inputSuccess1" name="id" value="<?php echo $x['id'];?>"readonly></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="name" value="<?php echo $x['name'];?>" required></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="mobile" value="<?php echo $x['mobile'];?>" required></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="email" value="<?php echo $x['email'];?>" required></td>
                         
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