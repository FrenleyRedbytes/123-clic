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
    <script type="text/javascript">
    function getSubcat(val) {
         $.ajax({
              type: "POST",
              url: "<?php echo base_url(); ?>index.php/Specialist/detailview",
              data: "subcat=" + val,
              success: function(response) {
                console.log(response);
                  $('#subcat').html(response);
              }
          });
    }
    </script>
  </head>
  <body>

<div id="content">
  <div class="container">
      <!-- <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
          <li class="current">
            <i class="fa fa-home"></i>Edit specialist
          </li>
        </ul>
      </div>
 -->      
 <div class="page-header">
        <div class="page-title">
          <h3 style="color: #850035;">Modifier un service</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
            echo form_open_multipart('specialist/updateService');
            
            ?>
             <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Selectionner une cat&eacute;gorie<span style="color:red;">*</span></label>
              <select name="cat" class="form-control"  onchange="getSubcat(this.value)" >
              <option value="">Selectionner une Cat&eacute;gorie</option>
              <?php          
              foreach($cat as $row_spe){
              ?>
              <option <?php if($res->cat_id==$row_spe['cat_id']){ echo "selected";} ?> value="<?php echo $row_spe['cat_id'];?>"><?php echo $row_spe['name'];?></option>
              <?php }?>
              </select>      
          </div>
            <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Selectionner une Sous-Cat&eacute;gorie<span style="color:red;">*</span></label>
              <select name="subcat" class="form-control" id="subcat">
                <option value="">Selectionner une Sous-Cat&eacute;gorie</option>
                <?php          
                foreach($subcat as $row_spe1){
                ?>
                <option <?php if($res->sub_cat_id==$row_spe1['subcat_id']){ echo "selected";} ?> value="<?php echo $row_spe1['subcat_id'];?>"><?php echo $row_spe1['subcat_name'];?></option>
                <?php }?>
              </select>      
          </div>
            <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Service<span style="color:red;">*</span></label>
            <input type="hidden" class="form-control" id="inputSuccess1" name="ser_id" value="<?php echo $res->ser_detail_id;?>" >
             <input type="text" class="form-control" id="inputSuccess1" name="service" value="<?php echo $res->ser_name;?>" >
          </div>
          <div class="form-group has-success col-md-6">
               <button class="btn btn-danger" name="add_category" type="submit">METTRE A JOUR</button><br/><br/>
          </div>
          
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
  </body>
  </html>