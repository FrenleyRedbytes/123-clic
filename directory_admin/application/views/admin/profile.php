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
<?php 
  include('header.php');
  include('sidebar.php');
?>            
<div id="content">  
  <div class="container"> 
      <div class="crumbs">    
          <ul id="breadcrumbs" class="breadcrumb">
              <li>
                  <i class="fa fa-home"></i>
                  <a href="dashboard.php">Tableau de Bord</a>
              </li>
              <li class="current">Administrateur</li>
          </ul>
      </div>  
      <div class="page-header">  
          <div class="page-title">
              <h3>Administrateur</h3>
          </div>
      </div>  
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-table"></i> D&eacutetail de l'administrateur</div>                               
                <div class="actions">
                    <div class="btn-group">
                        
                       </div>
                </div>
            </div>
            <div class="portlet-body">
              <table class="table table-striped">
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Image</th>
                  <th>Email</th>
                </tr>
              <?php
              foreach($res as $row){
              $data[] = $row;
              }
              foreach ($data as $row){?>
		            <tr>
            		  <td><?php echo $row['id']; ?></td>
            			<td><?php echo $row['name']; ?></td>
            			<td><img src="/directory_admin/uploads/<?php echo $row['image']; ?>" alt="image"  height="50" width="50"/></td>
            			<td><?php echo $row['email']; ?></td>      
  		          </tr>
              <?php }  ?>
              </table>
         </div>
         </div>
      </div>
    </div>
   </div> 
      <a href="javascript:void(0);" class="scrollup">Scroll</a>
  </div> 
</div>  
<?php include 'footer.php'; ?>