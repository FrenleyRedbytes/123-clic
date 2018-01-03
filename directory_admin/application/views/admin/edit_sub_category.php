<?php 
  include('header.php');
  include('sidebar.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <style type="text/css">
  @media only screen and (max-width: 800px) {
    #unseen table td:nth-child(2), 
    #unseen table th:nth-child(2) {display: none;}
  }
  @media only screen and (max-width: 640px) {
      #unseen table td:nth-child(4),
      #unseen table th:nth-child(4),
      #unseen table td:nth-child(7),
      #unseen table th:nth-child(7),
      #unseen table td:nth-child(8),
      #unseen table th:nth-child(8){display: none;}
  }
  td {
  word-wrap:break-word!important;
  }
</style>
    <style type="text/css">
      .paginate_button{
        padding: 0px 10px;
      }
      .dataTables_filter{
        margin-top: -25px;
      }
      .page-header {
        padding-bottom: 0px;
        margin: 14px 1px 0px;
        border-bottom: 0px solid #eee;
      }
      /*.navbar .navbar-brand{
        margin-left: -90px !important;
      }*/
    </style>
    <script>
      $(document).ready(function() {
      $('#example').DataTable();
      } );
    </script>
  </head>
  <body>
<div id="content">
        <!-- Start : Inner Page Content -->
        <div class="container">
          <div class="page-header">
            <div class="page-title">
              <h3 style="color: #850035;">Modifier une sous-cat&eacute;gorie</h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" >

                      <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> Selectionner Cat&eacute;gorie<span style="color:red;">*</span></label>
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
                         <label class="control-label" for="inputSuccess1">Nom de la sous-cat&eacute;gorie<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="name" value="<?php echo $row_con['name'];?>" required>
                       </div>
                       <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Image de la sous-cat&eacute;gorie<span style="color:red;">*</span></label>
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
