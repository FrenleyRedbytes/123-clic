
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
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="current">Services</li>
                    </ul>
                </div>  <!-- End : Breadcrumbs -->
                <div class="page-header">   <!-- Start : Page Header -->
                    <div class="page-title">
                        <h3>Services</h3>
                    </div>
                </div>  <!-- End : Page Header -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-table"></i> services Details</div>                               
                                <div class="actions">
                                    <div class="btn-group">
                                        <a class="btn mini green" href="<?php echo base_url() ; ?>index.php/services/add_services">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Services 
                                        </a>
                                       </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                               <table class="table table-striped">
                   <tr><th>serv_id</th><th>spe_id</th><th>serv_title</th><th>serv_day</th><th>price</th><th>time</th><th>created_at</th><th>created_date</th><th>Action</th></tr>
                <?php
              echo "<br>";
              echo "<br>";
              echo "<br>";
            //print_r($res);
			foreach($res as $row){
            $data[] = $row;
              }
             //print_r($data);
			
			 
			 //die;
          foreach ($data as $row){?>
		  <tr>
		  
            <td><?php echo $row['serv_id']; ?></td>
			<td><?php echo $row['spe_id']; ?></td>
			<td><?php echo $row['serv_title']; ?></td>
			<td><?php echo $row['serv_day']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['time']; ?></td>
			<td><?php echo $row['created_at']; ?></td>
			<td><?php echo $row['created_date']; ?></td>
			
		    <td><a href="<?php echo base_url(); ?>index.php/services/find_Data/<?php echo $row['serv_id']; ?>">Edit</a>-||-<a href=""><a href="<?php echo base_url(); ?>index.php/services/delete_Data/<?php echo $row['serv_id']; ?>">Delete</a></td>
			</tr>
                  <?php }
           
              ?>
</table>
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
            <button type="button" class="btn pull-right" data-dismiss="modal">Close</button>
             <form class="form-horizontal row-border" id="validate-1" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" validate="validate">
            <h4 class="modal-title" id="myModalLabel">Specialist</h4>
            </div>
            <div class="modal-body">
              <label>Title</label>
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
            <button type="button" class="btn pull-right" data-dismiss="modal">Close</button>
             <form class="form-horizontal row-border" id="validate-1" enctype="multipart/form-data" action="category.php" method="POST" validate="validate">
            <h4 class="modal-title" id="myModalLabel">UPDATE</h4>
            </div>
             <div class="modal-body">
                <input type="hidden" name="id1" id="id2" placeholder="enter id" class="form-control" >
            </div>
                       <div class="modal-body">
               <label>Title</label>
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
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/jquery.blockUI.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/jquery.event.move.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/lodash.compat.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/respond.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/excanvas.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/breakpoints.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/touch-punch.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/DataTables/js/DT_bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/plugins.js"></script>
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
            var result= confirm("Are you really want delete this category?");
            if(result==true){
                $.ajax({
                    type:'POST',
                    url:'query.php',
                    data:'method=1&id='+id,
                    success:function(res){
                     location.reload(); 
                    }
                });
            }
     }
</script>
        </body>  

</html>
