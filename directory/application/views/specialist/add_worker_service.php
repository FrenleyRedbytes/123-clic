
<?php 
  include('header.php');
  include('sidebar.php'); 
?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="<?php echo base_url(); ?>assets/css/select2-bootstrap.css" rel="stylesheet" media="screen" />
<link href="<?php echo base_url(); ?>assets/css/select2.css" rel="stylesheet" media="screen" />
<style type="text/css">
    .select2-search-choice-close
      {
        margin-top: -10%;
      }
</style>
<div id="content">
  <div class="container">
    <div class="crumbs">
      <ul id="breadcrumbs" class="breadcrumb">
        <li class="current">
          <i class="fa fa-home"></i>Ajouter un service pour l'employ&eacute;
        </li>
      </ul>
    </div>
    <div class="page-header">
      <div class="page-title">
        <h3>Ajouter un service pour l'employ&eacute;</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php
           echo form_open('Specialist1/add_worker_Service1');
        ?>
        <!-- <span style="color: red;"> <?php echo validation_errors(); ?></span> -->
      
      <div class="form-group  col-md-8">
        <label class="control-label" for="inputSuccess1">Service<span style="color:red;">*</span></label>
          <select id="tag" class="form-control pleft13 select2" name="service[]" multiple required="">
          <option>Selectionner un service</option>
          <?php 
            foreach($da as $s) { 
          ?>
          <option value="<?php echo $s->ser_detail_id; ?>"><?php echo $s->ser_name ;?></option>
          <input type="hidden" name="serv" value="<?php echo $s->worker_service_id;?>">
          <?php } ?>
          </select> 
      </div>
      <div class="form-group has-success col-md-6">
          <button class="btn btn-danger" name="add_user" type="submit">AJOUTER</button><br/><br/>
      </div>
      <?php
      if(isset($res))
      echo $res;
      // echo validation_errors(); 
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
  <!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
<!-- <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/js/select2.js"></script>
<script>
  $('.select2').select2();
</script>
