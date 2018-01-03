
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>Category</title>
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
                <i class="fa fa-home"></i>Edit Category
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Edit Category</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" >

                      <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Select Category<span style="color:red;">*</span></label>
                         <select class="form-control" name="category" required >
                         <?php  $sql_con1 = mysqli_query($con,"SELECT * FROM category order by id desc");
                               $count = 0;
                               while($row_con1 = mysqli_fetch_array($sql_con1))
                               {
                                    if($row_con1['id']==$row_con['cat_id']){
                                      echo"<option selected  value='".$row_con1['id']."'>".$row_con1['name']."</option>";
                                    }else{
                                    echo"<option  value='".$row_con1['id']."'>".$row_con1['name']."</option>";
                                    }
                               }
                          ?>
                                
                         </select>
                       </div>

                      <input type="hidden" class="form-control" id="inputSuccess1" name="img" value="<?php echo $row_con['image'];?>" required>
                      <input type="hidden" class="form-control" id="inputSuccess1" name="id" value="<?php echo $row_con['id'];?>" required>
                      <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Sub Category Name<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="name" value="<?php echo $row_con['name'];?>" required>
                       </div>
                       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Sub Category Image<span style="color:red;">*</span></label>
                         <input type="file" class="form-control" id="inputSuccess1" name="file" >
                       </div>

                       <div class="form-group has-success col-md-6">
                          <button class="btn btn-danger" name="add_category" type="submit">UPDATE</button><br/><br/>
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