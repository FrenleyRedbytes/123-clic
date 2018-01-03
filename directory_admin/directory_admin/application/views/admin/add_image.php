<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>Sub Category</title>
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
                <i class="fa fa-home"></i>Add Image
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Add Image</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" >

                      <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Select Sub Category<span style="color:red;">*</span></label>
                         <select class="form-control" name="category" required >
                         <?php  $sql_con = mysqli_query($con,"SELECT * FROM sub_category order by id desc");
                               $count = 0;
                               while($row_con = mysqli_fetch_array($sql_con))
                               {
                                    echo"<option value='".$row_con['id']."'>".$row_con['name']."</option>";
                               }
                          ?>
                                
                         </select>
                       </div>
                       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Image Discription<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="name" required>
                       </div>
                       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Image<span style="color:red;">*</span></label>
                         <input type="file" class="form-control" id="inputSuccess1" name="file" required>
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