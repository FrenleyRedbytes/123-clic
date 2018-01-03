<html>
<head>
  <link href="<?php echo base_url(); ?>assets/css/select2-bootstrap.css" rel="stylesheet" media="screen" />
  <link href="<?php echo base_url(); ?>assets/css/select2.css" rel="stylesheet" media="screen" />
  <style type="text/css">
    .select2-search-choice-close
      {
        margin-top: -10%;
      }
  </style>
</head>  
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
        <h3 style="color: #850035;">Ajouter un service</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <?php
           echo form_open_multipart('specialist/add_serviceSpecialist');
         ?>
            <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Sp&eacute;cialiste<span style="color:red;">*</span></label>
              <select name="spe" class="form-control" required="">
              <option value="">Selectioinner un sp&eacute;cialiste</option>
              <?php          
              foreach($spe as $row_spe){
              ?>
              <option value="<?php echo $row_spe->spr_id;?>"><?php echo $row_spe->brand_name;?></option>
              <?php }?>
              </select>      
          </div>
          <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Service<span style="color:red;">*</span></label>
              <select id="tag" class="form-control pleft13 select2" name="ser[]" multiple required="">
               <?php          
              foreach($ser as $row_ser){
              ?>
              <option value="<?php echo $row_ser->ser_detail_id;?>"><?php echo $row_ser->ser_name;?></option>
              <?php }?>
              ?>
              </select>
              <span class="input-group-addon"><i class="icon-pencil" style="height: 36 px;"></i></span>
          </div>
          <div class="form-group has-success col-md-6">
               <button class="btn btn-danger" name="add_user" type="submit">AJOUTER</button><br/><br/>
          </div>
          <?php echo form_close();?>
            </div>
          </div>
        </div>
      </div>
      <a href="javascript:void(0);" class="scrollup">Scroll</a>
    </div>
  </div>
  <?php include('footer.php');?>
  </html>
  <script src="<?php echo base_url();?>assets/js/select2.js"></script>

  <script>
  $('.select2').select2();
</script>