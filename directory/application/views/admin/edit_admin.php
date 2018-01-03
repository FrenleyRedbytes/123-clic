<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>admin</title>
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
                <i class="fa fa-home"></i>Edit admin
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Edit admin</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                              <?php
	                               echo form_open_multipart('addadmin/update_enquiry');
	                             ?>
								 <table class="table table-striped">
                            <tr><th>Id</th><th>name</th><th>image</th><th>email</th><th>Action</th></tr>
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
						 <td><p><img src="/directory/uploads/<?php echo $x['image']; ?>" alt="image"  height="50" width="50"/></p><p><input type="file"   name="image" /></p></td>
						 <td><input type="text" class="form-control" id="inputSuccess1" name="email" value="<?php echo $x['email'];?>"></td>
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