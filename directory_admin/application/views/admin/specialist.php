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
    </style>
    <script>
      $(document).ready(function() {
      $('#example').DataTable();
      } );
    </script>
  </head>
  <body>
    <div id="content" style="padding: 0px 20px;">  
      <!-- <div class="container">  -->
        <div class="crumbs">    
          <ul id="breadcrumbs" class="breadcrumb">
            <li>
              <i class="fa fa-home"></i>
              <a href="dashboard.php">ACCUEIL</a>
            </li>
            <li class="current">Professionnel</li>
          </ul>
        </div>
        <div class="page-header">   
          <div class="page-title">
            <h3 style="color: #850035;">Professionnel</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="portlet box blue">
              <div class="portlet-title">
                  <div class="caption"><i class="fa fa-table"></i> D&eacute;tail du professionnel</div>
                  <div class="actions">
                      <div class="btn-group">
                          <a class="btn mini green" href="<?php echo base_url() ; ?>index.php/specialist/add_specialist">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>Ajouter un professionnel
                          </a>
                      </div>
                  </div>
              </div>
              <div class="portlet-body">
                <table id="example" class="table table-striped table-bordered" cellspacing="0">
                  <thead>
                      <tr>
                        <th>Cat&eacute;gorie 1 </th>
			  <th>Cat&eacute;gorie 2</th>
                        <th>Nom de l'enseigne</th>
                        <th>Image de l'enseigne</th>
                        <th>Nom du contact</th>
                        <th>Image du contact</th>
                        <th>Code postal</th>
		    <th>Email</th>
		    <th>Numero</th>
                        <th>Modifier</th>
                      </tr>
                      </thead>
                      <tfoot>
                        <th>Cat&eacute;gorie</th>
			  <th>Cat&eacute;gorie 2</th>
                        <th>Nom de l'enseigne</th>
                        <th>Image de l'enseigne</th>
                        <th>Nome du contact</th>
                        <th>Image du contact</th>
                        <th>Code postal</th>
		    <th>Email</th>
		    <th>Numero</th>
                        <th>Modifier</th>
                      </tr>
                      </tfoot>
                      <tbody>
                  <?php
                  foreach($res as $row){
                  $data[] = $row;
                  }
                  foreach ($data as $row){ 
		?>
                  <tr>
                      <td><?php echo $row['name']; ?><br><?php echo $row['subcat_name']; ?></td>
		      
		             <td><?php echo $row['cat2_id']; ?><br><?php echo $row['subcat2_id']; ?></td>
                      <td><?php echo $row['brand_name']; ?></td>
                      <td><img src="/directory_admin/uploads/<?php echo $row['brand_logo']; ?>" alt="image"  height="50" width="50"/>
                      </td>
                      <td><?php echo $row['contact_name']; ?></td>
                      <td><img src="/directory_admin/uploads/<?php echo $row['contact_image']; ?>" alt="image"  height="50" width="50"/></td>
		  <td><?php echo $row['zip_code']; ?></td>
                      <td><?php echo $row['email']; ?></td>
		  <td><?php echo $row['contact']; ?></td>
                      <td>
                        <a href="<?php echo base_url(); ?>index.php/specialist/find_Data/<?php echo $row['spr_id']; ?>">Modifier</a>-||-
                        <a href="<?php echo base_url(); ?>index.php/specialist/delete_Data/<?php echo $row['spr_id']; ?>">Supprimer</a>-||-
                        <a href="<?php echo base_url(); ?>index.php/specialist/showData/<?php echo $row['spr_id']; ?>">Voir Detail</a>
                      </td>
                  </tr>
                  <?php } ?>
               </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <!-- </div> -->
    </div>    
  </body>
</html>
<?php include('footer.php');?>