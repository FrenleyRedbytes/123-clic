
<?php 
  include('header.php');
  include('sidebar.php'); 
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datetimepicker/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datetimepicker/jquery.timepicker.css"/>

<div id="content">
  <div class="container">
    <div class="crumbs">
      <ul id="breadcrumbs" class="breadcrumb">
        <li class="current">
          <i class="fa fa-home"></i>Ajouter vacance de l'employ&eacute;
        </li>
      </ul>
    </div>
    <div class="page-header">
      <div class="page-title">
        <h3>Ajouter vacance de l'employ&eacute;</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php
           echo form_open_multipart('Specialist1/add_worker_holliday');
        ?>
        <!-- <span style="color: red;"> <?php echo validation_errors(); ?></span> -->
      
      <div class="form-group  col-md-8">
                  <label class="control-label" for="inputSuccess1">Vacance<span style="color:red;">*</span></label>
                  <div class="input-group control-group after-add-more">
                  <div class="col-md-6">
          <input type="text" class="form-control" id="datepicker" name="day_leave_start[]" placeholder="Start Date" required="">
          </div>
          <div class="col-md-6">
          <input type="text" class="form-control" id="datepicker1" name="day_leave_end[]" placeholder="End Date" required="">
          </div>
          <div class="input-group-btn"> 
          <button class="btn btn-general add-more" type="button" style="margin-left: 19px;
          margin-top: -3px;color:black;"><i class="glyphicon glyphicon-plus"></i> Ajouter</button>
          </div>
          </div>
          </div>
          <div class="copy hide">
          <div class="control-group input-group" style="margin-top:10px">
          <div class="col-md-6">
          <input type="text" class="form-control" id="" name="day_leave_start[]" placeholder="Start Date">
          </div>
          <div class="col-md-6">
          <input type="text" class="form-control" id="" name="day_leave_end[]" placeholder="End Date">
          </div>
          <div class="input-group-btn"> 
          <button class="btn btn-danger remove" type="button" style="margin-left: -3px;
          margin-top: -3px;"><i class="glyphicon glyphicon-remove"></i> SUPPRIMER</button>
          </div>
          </div>
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
<script src="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/datetimepicker/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/datetimepicker/jquery.timepicker.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
  $(".add-more").click(function(){ 
  var html = $(".copy").html();
  $(".after-add-more").after(html);
  });
  $("body").on("click",".remove",function(){ 
  $(this).parents(".control-group").remove();
  });
  });


 $("#datepicker").datepicker();
 $("#datepicker1").datepicker();
 
</script>
 <script src="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
