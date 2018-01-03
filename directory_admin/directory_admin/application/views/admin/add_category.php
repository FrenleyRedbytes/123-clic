<?php 
  include('header.php');
  include('sidebar.php'); 
?>
<div id="content">
  <div class="container">
    <!-- <div class="crumbs">
      <ul id="breadcrumbs" class="breadcrumb">
        <li class="current">
          <i class="fa fa-home"></i>Add Category
        </li>
      </ul>
    </div> -->
    <div class="page-header">
      <div class="page-title">
        <h3 style="color: #850035;">Add Category</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <?php
           echo form_open_multipart('dashboard/add_category');
         ?>
            <div class="form-group has-success col-md-8">
               <label class="control-label" for="inputSuccess1"> Category Name<span style="color:red;">*</span></label>
               <input type="text" class="form-control" id="inputSuccess1" name="name" required>
             </div>
              <div class="form-group has-success col-md-8">
                 <label class="control-label" for="inputSuccess1">Category web image<span style="color:red;">*</span></label>
                 <input type="file" class="form-control"  name="userfile" required>
               </div>
               <div class="form-group has-success col-md-8">
                 <label class="control-label" for="inputSuccess1">Category app image<span style="color:red;">*</span></label>
                 <input type="file" class="form-control"  name="userfile1" required>
               </div>
               <div class="form-group has-success col-md-6">
                  <button class="btn btn-danger" name="add_category" type="submit">ADD</button><br/><br/>
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