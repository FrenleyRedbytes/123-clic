<?php 
error_reporting(E_ALL); ini_set('display_errors', 1);
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
  include('db.php');
   if(!(isset($_SESSION['id'])))
   {
      header("location:index.php");
   }

   if(isset($_POST['add_category']))
     {
        $title=$_POST['name']; 
        $category=$_POST['category']; 
         $id=$_POST['id']; 
        $img=$_POST['img']; 
        $myimg = $_FILES["file"]["name"];
        if($myimg!=''){
          $path1 = "img/".$myimg;
         if (move_uploaded_file($_FILES["file"]["tmp_name"], $path1)) {
         } else {
                echo "Sorry, there was an error uploading your file."; exit;
         }

        }else{

          $path1 = $img;

        }
        
         $query = mysqli_query($con,"UPDATE `image` SET `name`='$title',`image`='$path1',`sub_cat_id`='$category' WHERE id='$id'");
             if($query)
                {
                   header("location:image.php");
                }
                else
                {
                   echo "try latter";
                }
       }
    $id1=$_GET['id'];
    $sql_con = mysqli_query($con,"SELECT * FROM image WHERE id='$id1' ");
    $row_con = mysqli_fetch_array($sql_con);
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>Cat&eacutegorie</title>
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
                <i class="fa fa-home"></i>Modifier une Cat&eacutegorie
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Modifier une Cat&eacutegorie</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" >

                      <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> S&eacutelectionner une Cat&eacutegorie<span style="color:red;">*</span></label>
                         <select class="form-control" name="category" required >
                         <?php  $sql_con1 = mysqli_query($con,"SELECT * FROM sub_category order by id desc");
                               $count = 0;
                               while($row_con1 = mysqli_fetch_array($sql_con1))
                               {
                                    if($row_con1['id']==$row_con['sub_cat_id']){
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
                         <label class="control-label" for="inputSuccess1">Nom de l'image<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="name" value="<?php echo $row_con['name'];?>" required>
                       </div>
                       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Image<span style="color:red;">*</span></label>
                         <input type="file" class="form-control" id="inputSuccess1" name="file" >
                       </div>

                       <div class="form-group has-success col-md-6">
                          <button class="btn btn-danger" name="add_category" type="submit">METTRE A JOUR</button><br/><br/>
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