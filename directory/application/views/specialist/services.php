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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<div id="content"> 
  <div class="container"> 
      <div class="page-header">  
          <div class="page-title">
              <h3 style="color: #850035;margin-bottom: -10%">Service</h3>
          </div>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-table"></i>Details des services </div>
                <div class="actions">
                    <div class="btn-group">
                       <a class="btn mini green" href="<?php echo base_url() ; ?>index.php/services/add_services">
                              <i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un service 
                          </a>
                       </div>
                </div>
            </div>
             <div class="portlet-body" >
                  <table id="example" class="table table-striped table-bordered" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Titre</th>
                      <th>Prix</th>
                      <th>Temps</th>
                      <th>Modification</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Titre</th>
                      <th>Prix</th>
                      <th>Temps</th>
                      <th>Modification</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php             
                    foreach($res as $row){
                    ?>
                    <tr>
                      <td><?php echo $row->ser_name; ?></td>
                      <td><?php echo $row->price; ?></td>
                      <td><?php echo $row->time; ?></td>
                      <td><a href="<?php echo base_url(); ?>index.php/services/find_Data/<?php echo $row->serve_id; ?>">Modifier</a>-||-<a href="<?php echo base_url(); ?>index.php/services/delete_Data/<?php echo $row->serve_id; ?>">Supprimer</a></td>
                    </tr>
                <?php }  ?>
                </tbody>
                </table>
              </div>
      </div>
  </div>
 </div>
</div>  
<?php include 'footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
      $(document).ready(function() {
      $('#example').DataTable();
      } );
</script>
