<?php 
error_reporting(E_ALL); ini_set('display_errors', 1);
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   if(!(isset($_SESSION['id'])))
   {
      header("location:index.php");
   }
   
include('db.php'); 

    if(isset($_POST['update']))
        {
        $id1=$_POST['id1'];
        $title1=$_POST['title1'];
        $date1=$_POST['date1'];
        $description1=$_POST['description1'];
        $myimg = $_FILES["file"]["name"];
        $path1 = "img/".$myimg;
         if (move_uploaded_file($_FILES["file"]["tmp_name"], $path1)) {
         } else {
             echo "Sorry, there was an error uploading your file.";
         }
            $query = mysqli_query($con,"UPDATE `category` SET `name`='$title1',`description`='$description1',`img`='$path1',`date`='$date1' WHERE id='$id1'");
         if($query)
            {
               //header("location:user.php");
            }
            else{
                 echo "try latter";
            }
         }

            if(isset($_POST['delete']))
            {

            
              
              $cnt=count($_POST['chkbox']);
             for($i=0;$i<$cnt;$i++)
              {
                 $del_id=$_POST['chkbox'][$i];
                 $query="delete from image where id='$del_id'";
                 mysqli_query($con,$query);
              }
            }
 ?>
 <style type="text/css">@media only screen and (max-width: 800px) {
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
         <?php include('header.php');
               include('sidebar.php'); ?>            
       <!-- End : Side bar -->
        <div id="content">  <!-- Start : Inner Page Content -->
            <div class="container"> <!-- Start : Inner Page container -->
                <div class="crumbs">    <!-- Start : Breadcrumbs -->
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="dashboard.php">ACCUEIL</a>
                        </li>
                        <li class="current">Image</li>
                    </ul>
                </div>  <!-- End : Breadcrumbs -->
                <div class="page-header">   <!-- Start : Page Header -->
                   <form action="wiki.php" method="POST" enctype="multipart/form-data" >
                   
                      <div class="form-group has-success col-md-4">
                         <label class="control-label" for="inputSuccess1"> S&eacutelectionner une Sous-Cat&eacutegorie<span style="color:red;">*</span></label>
                         <select class="form-control" name="sub_category" required >
                         <?php  $sql_con = mysqli_query($con,"SELECT * FROM sub_category order by id desc");
                               $count = 0;
                               while($row_con = mysqli_fetch_array($sql_con))
                               {
                                    echo"<option value='".$row_con['id']."'>".$row_con['name']."</option>";
                               }
                          ?>
                                
                         </select>
                      </div>
                      <div class="form-group has-success col-md-4">
                         <label class="control-label" for="inputSuccess1">Nom<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" id="inputSuccess1" name="name" required>
                      </div>
                       <div class="form-group has-success col-md-3" style="margin: 2%;">
                          <button class="btn btn-danger" name="add_category" type="submit">Ajouter une Image de Wikip&eacutedia</button><br/><br/>
                      </div>
                  </form>

                </div>  <!-- End : Page Header -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-table"></i>Image</div>

                               

                                <div class="actions">
                                    <div class="btn-group">
                                        <a class="btn mini green" href="add_image.php" >
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter une Image
                                        </a>
                                       </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                            <form action="" method="post">
                                <table class="table table-bordered table-hover DynamicTable">
                                    <thead>
                                        <tr>
                                            <th class="numeric">Description</th>
                                            <th class="numeric">Sous-Catégorie</th>
                                            <th class="numeric">Image</th>
                                           <th class="numeric">
                                           
                                              <input class='btn btn-danger' type="submit" name="delete" value="delete"/>
                                            
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php  $sql_con = mysqli_query($con,"SELECT * FROM image order by id desc");
                               $count = 0;
                               while($row_con = mysqli_fetch_array($sql_con))
                               { 
                                $count=$count+1;
                                $cid=$row_con['sub_cat_id'];
                                $sql_cat = mysqli_query($con,"SELECT * FROM sub_category WHERE `id`='$cid'");
                                $row_cat = mysqli_fetch_array($sql_cat);

                              ?>
                               <tr id='trrow".$row_con['id']."' >
                                 <td class="center" class="numeric"><?php echo $row_con['name'];?></td>
                                 <td class="center" class="numeric"><?php echo $row_cat['name'];?></td>
                                  <td class="center" class="numeric"><img src="<?php echo $row_con['image'];?>" style="width:50px;height:50px;"></td>
                                  <td class="numeric">
                                   <input type="checkbox" name="chkbox[]"  value="<?php echo $row_con['id'];?>" />


                                  </td>
                               </tr>
                               <?php }?>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  <!-- End : Inner Page container -->
            <a href="javascript:void(0);" class="scrollup">Scroll</a>
        </div>  <!-- End : Inner Page Content -->
    </div>  <!-- End : container -->
    <!-- =====modal box===== -->

      <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn pull-right" data-dismiss="modal">Fermer</button>
             <form class="form-horizontal row-border" id="validate-1" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" validate="validate">
            <h4 class="modal-title" id="myModalLabel">Cat&eacutegorie</h4>
            </div>
            <div class="modal-body">
              <label>Titre</label>
                <input type="text" name="title" id="title" placeholder="enter Title" class="form-control" required >
            </div>
            <div class="modal-body">
              <label>Description</label>
                <input type="text" name="description" id="description" placeholder="enter description" class="form-control" required >
            </div>
             <div class="modal-body">
              <label>Image</label>
                   <input type="file" name="file" id="myfile" placeholder="upload img" class="form-control" required >
            </div>
             <div class="modal-body">
              <label>Date </label>
                <input type="date" name="date" id="date" placeholder="Enter Date Captured"  class="form-control" required>
             </div>
         <div class="modal-footer">
             <input type="submit" value="Submit" name="user" class="btn"/>
        </div>
    </form>
    </div>
  </div>
</div>
      <!-- =====modal box===== -->

      <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="btn pull-right" data-dismiss="modal">Fermer</button>
             <form class="form-horizontal row-border" id="validate-1" enctype="multipart/form-data" action="category.php" method="POST" validate="validate">
            <h4 class="modal-title" id="myModalLabel">METTRE A JOUR</h4>
            </div>
             <div class="modal-body">
                <input type="hidden" name="id1" id="id2" placeholder="enter id" class="form-control" >
            </div>
                       <div class="modal-body">
              <label>Titre</label>
                <input type="text" name="title1" id="title2" placeholder="enter Title" class="form-control" required >
            </div>
            <div class="modal-body">
              <label>Description</label>
                <input type="text" name="description1" id="description2" placeholder="enter description" class="form-control" required >
            </div>
           <!--  <div class="modal-body">
                <img src="" id="imgid" style='width:50px;height:50px;'>
            </div> -->
             <div class="modal-body">
              <label> <img src="" id="imgid" style='width:50px;height:50px;'></label>
                  <input type="file" name="file" id="myfile" placeholder="upload img" class="form-control" required >
            </div>

             <div class="modal-body">
              <label>Date </label>
                <input type="date" name="date1" id="date2" placeholder="Enter Date Captured"  class="form-control" required>
            </div>
            <div class="modal-footer">
               <input type="submit" value="Submit" name="update" class="btn"/>
        </div>
         </form>
    </div>
  </div>
</div>
      <!-- =====end modal box===== -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="assets/plugins/common/jquery.blockUI.js"></script>
    <script type="text/javascript" src="assets/plugins/common/jquery.event.move.js"></script>
    <script type="text/javascript" src="assets/plugins/common/lodash.compat.js"></script>
    <script type="text/javascript" src="assets/plugins/common/respond.min.js"></script>
    <script type="text/javascript" src="assets/plugins/common/excanvas.js"></script>
    <script type="text/javascript" src="assets/plugins/common/breakpoints.js"></script>
    <script type="text/javascript" src="assets/plugins/common/touch-punch.min.js"></script>
    <script type="text/javascript" src="assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/plugins/DataTables/js/DT_bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/plugins.js"></script>
    <script>
        $(document).ready(function(){
            App.init();
            DataTabels.init();
        });        
    </script>
    <script>
     function edit_user(id){
            jQuery.ajax({
                  type:'POST',
                  url:'query.php',
                  data:'method=18&id='+id,
                  success:function(res){
                       $('#edit_user').modal("show");
                      var jsonData = JSON.parse(res);
                      console.log(jsonData);
                      document.getElementById('id2').value =jsonData.edit_user.id1;
                      document.getElementById('title2').value =jsonData.edit_user.title1;
                      document.getElementById('description2').value =jsonData.edit_user.description1;
                      document.getElementById('date2').value = jsonData.edit_user.date1;
                      document.getElementById("imgid").src   = jsonData.edit_user.dateimg;
                      document.getElementById('myfile').value= jsonData.edit_user.dateimg;
                     // myfile
                      
                  }
              });
      }
     function delete_user(id){
            var result= confirm("Are you really want delete this sub category?");
            if(result==true){
                $.ajax({
                    type:'POST',
                    url:'query.php',
                    data:'method=2&id='+id,
                    success:function(res){
                     location.reload(); 
                    }
                });
            }
     }
</script>
        </body>  

</html>
