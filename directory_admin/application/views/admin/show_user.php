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
  <div class="container">
    <<!-- div class="crumbs">
      <ul id="breadcrumbs" class="breadcrumb">
        <li class="current">
          <i class="fa fa-home"></i>Add Admin
        </li>
      </ul>
    </div> -->
    <div class="page-header">
      <div class="page-title">
        <h3 style="color: #850035;">Voir d&eacute;tail client</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
       
          <div class="form-group has-success col-md-8">
          <div class="form-group has-success col-md-4">
              <label class="control-label" for="inputSuccess1">Nom</label></div>
               <div class="form-group has-success col-md-4">
              <?php echo $res->name;?></div>
          </div>
         <div class="form-group has-success col-md-8">
          <div class="form-group has-success col-md-4">
              <label class="control-label" for="inputSuccess1">Adresse</label></div>
              <div class="form-group has-success col-md-4">
              <?php echo $res->address;?></div>
          </div>
          <div class="form-group has-success col-md-8">
          <div class="form-group has-success col-md-4">
              <label class="control-label" for="inputSuccess1">Num&eacute;ro mobile</label></div>
              <div class="form-group has-success col-md-4">
              <?php echo $res->mobile;?></div>
          </div>
          <div class="form-group has-success col-md-8">
          <div class="form-group has-success col-md-4">
              <label class="control-label" for="inputSuccess1">Favoris</label></div>
              <div class="form-group has-success col-md-4">
               <?php 
                  foreach ($res2 as $r1) { ?>
                  <?php  echo ucfirst($r1->brand_name) ."<br>";
                   echo "<br/>"; ?>
                  <?php } ?>
              </div>
          </div>
      </div>
      </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="fa fa-table"></i>D&eacute;tail des r&eacute;servations du client</div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-bordered table-hover DynamicTable">
                                    <thead>
                                        <tr>
                                            <th class="numeric">Nom du sp&eacute;cialiste</th>
                                            <th class="numeric">Service</th>
                                            <th class="numeric">Date de r&eacute;servation</th>
                                            <th class="numeric">Heure de r&eacute;servation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php  
                                   foreach ($res1 as $r) {

                                  ?>
                                      <tr id='trrow".$row_con['id']."' > 
                                        <td class="center" class="numeric"><?php echo $r->brand_name;?></td>
                                        <td class="center" class="numeric"><?php echo $r->ser_name;?></td>
                                        <td class="center" class="numeric"><?php echo $r->date_booking;?></td>
                                        <td class="center" class="numeric"><?php echo $r->time_booking;?></td>
                                        
                                      </tr>
                                  <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  <!-- End : Inner Page container -->
            <a href="javascript:void(0);" class="scrollup">Scroll</a>
        </div>  <!-- End : Inner Page Content -->
    <?php include('footer.php');?>

