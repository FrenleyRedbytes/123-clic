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
                <i class="fa fa-home"></i>Add Corporate User
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Add Corporate User</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" >

                      <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Corporate Name<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="name" required>
                       </div>

                       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Corporate Email<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="email" required>
                       </div>
                       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Corporate Password<span style="color:red;">*</span></label>
                         <input type="password" class="form-control" id="inputSuccess1" name="password" required>
                       </div>


                       <div class="form-group has-success col-md-6">
                          <button class="btn btn-danger" name="add_category" type="submit">ADD</button><br/><br/>
                      </div>
                </form>

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