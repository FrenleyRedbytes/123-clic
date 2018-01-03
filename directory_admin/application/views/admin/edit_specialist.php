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



<script src="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datetimepicker/jquery.timepicker.css"/>
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
    <script type="text/javascript">
    function getSubcat2(val) {
         $.ajax({
              type: "POST",
              url: "<?php echo base_url(); ?>index.php/Specialist/detailview2",
              data: "subcat2=" + val,
              success: function(response) {
                console.log(response);
                  $('#subcat2').html(response);
              }
          });
    }
    </script>

    <script>
      $(document).ready(function() {
      $('#example').DataTable();
      } );
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
          <h3 style="color: #850035;">Modifier un Professionnel</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
            echo form_open_multipart('specialist/update_enquiry');
            foreach($res as $x){
            ?>
             <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Selectionner une Cat&eacute;gorie<span style="color:red;">*</span></label>
              <select name="cat" class="form-control"  onchange="getSubcat(this.value)" >
              <option value="">Selectionner une Cat&eacute;gorie</option>
              <?php          
              foreach($cat as $row_spe){
              ?>
              <option <?php if($x['cat_id']==$row_spe['cat_id']){ echo "selected";} ?> value="<?php echo $row_spe['cat_id'];?>"><?php echo $row_spe['name'];?></option>
              <?php }?>
              </select>      
          </div>
           <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Selectionner une Sous-Cat&eacute;gorie<span style="color:red;">*</span></label>
              <select name="subcat" class="form-control" id="subcat">
                 <option value="">Selectionner une sous Cat&eacute;gorie</option>
              <?php          
              foreach($subcat as $row_spe){
              ?>
              <option <?php if($x['subcat_id']==$row_spe['subcat_id']){ echo "selected";} ?> value="<?php echo $row_spe['subcat_id'];?>"><?php echo $row_spe['subcat_name'];?></option>
              <?php }?>     

              </select>      
          </div>
	  
	   <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Selectionner une cat&eacute;gorie 2<span style="color:red;">*</span></label>
              <select name="cat2" class="form-control" required="" onchange="getSubcat2(this.value)" >
              <option value="">Selectionner une cat&eacute;gorie </option>
              <?php          
              foreach($cat2 as $row_spe){
              ?>
              <option <?php if($x['cat2_id']==$row_spe['cat_id']){ echo "selected";} ?> value="<?php echo $row_spe['cat_id'];?>"><?php echo $row_spe['name'];?></option>
	
              <?php }?>
              </select>      
          </div>
           <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Selectionner une sous-cat&eacute;gorie 2<span style="color:red;">*</span></label>
              <select name="subcat2" class="form-control" id="subcat2">
              <option value="">Selectionner une sous cat&eacute;gorie</option> 
  <?php          
              foreach($subcat2 as $row_spe){
              ?>
              <option <?php if($x['subcat2_id']==$row_spe['subcat_id']){ echo "selected";} ?> value="<?php echo $row_spe['subcat_id'];?>"><?php echo $row_spe['subcat_name'];?></option>
              <?php }?>  	      
              </select>      
          </div>
	  
	  
            <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Nom de l'enseigne<span style="color:red;">*</span></label>
            <input type="hidden" class="form-control" id="inputSuccess1" name="spe_id" value="<?php echo $x['spr_id'];?>" >
             <input type="text" class="form-control" id="inputSuccess1" name="brand_name" value="<?php echo $x['brand_name'];?>" >
          </div>
          <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Téléphone<span style="color:red;">*</span></label>
             <input type="text" class="form-control" id="tbNumbers" onkeypress="javascript:return isNumber(event)" name="contact" value="<?php echo $x['contact'];?>" required>
          </div>
            <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Adresse<span style="color:red;">*</span></label>
             <textarea type="text" class="form-control" value="<?php echo $x['address'];?>" name="address" required><?php echo $x['address'];?></textarea>
          </div>
          <div class="form-group has-success col-md-8" style="margin-left: -1%;">
            <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Lundi <span style="color:red;">*</span></label>
            </div>
	    
	    
            <div class="form-group has-success col-md-8">
              <select name="shop_start_time_mon_am" placeholder="From AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['mon_from_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['mon_from_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['mon_from_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                            </select>
		
              <select name="shop_end_time_mon_am" placeholder="To AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['mon_to_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['mon_to_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['mon_to_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
              
              </select>
	       <select name="shop_start_time_mon_pm" placeholder="From PM" class="form-control" style="width: 160px;float: left;">
	         <option <?php if(''==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['mon_from_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                </select>
		
              <select name="shop_end_time_mon_pm" placeholder="To PM" class="form-control" style="width: 160px;float: left;">
	        
		
		
		
                
              </select>
            </div>
            </div>
	    
	    
	    
           <div class="form-group has-success col-md-8" style="margin-left: -1%;">
            <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Mardi<span style="color:red;">*</span></label>
            </div>
	    
	    
	        <div class="form-group has-success col-md-8">
              <select name="shop_start_time_tue_am" placeholder="From AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['tue_from_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['tue_from_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['tue_from_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                            </select>
		
              <select name="shop_end_time_tue_am" placeholder="To AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['tue_to_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['tue_to_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['tue_to_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
              
              </select>
	       <select name="shop_start_time_tue_pm" placeholder="From PM" class="form-control" style="width: 160px;float: left;">
	         <option <?php if(''==$x['tue_from_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['tue_from_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                </select>
		
              <select name="shop_end_time_tue_pm" placeholder="To PM" class="form-control" style="width: 160px;float: left;">  
	      <option <?php if(''==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="6:30">6:30</option>
                <option <?php if('7:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['tue_to_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                
              </select>
            </div>
            </div>
	    
	    
	    
           <div class="form-group has-success col-md-8" style="margin-left: -1%;">
            <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Mercredi<span style="color:red;">*</span></label>
            </div>
	    
	        <div class="form-group has-success col-md-8">
              <select name="shop_start_time_wed_am" placeholder="From AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['wed_from_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['wed_from_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['wed_from_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                            </select>
		
              <select name="shop_end_time_wed_am" placeholder="To AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['wed_to_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['wed_to_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['wed_to_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
              
              </select>
	       <select name="shop_start_time_wed_pm" placeholder="From PM" class="form-control" style="width: 160px;float: left;">
	         <option <?php if(''==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['wed_from_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                </select>
		
              <select name="shop_end_time_wed_pm" placeholder="To PM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="6:30">6:30</option>
                <option <?php if('7:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['wed_to_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                
              </select>
            </div>
            </div>
	    
	    
	    
           <div class="form-group has-success col-md-8" style="margin-left: -1%;">
            <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Jeudi <span style="color:red;">*</span></label>
            </div>
	    
	        <div class="form-group has-success col-md-8">
              <select name="shop_start_time_thu_am" placeholder="From AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['thu_from_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['thu_from_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['thu_from_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                            </select>
		
              <select name="shop_end_time_thu_am" placeholder="To AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['thu_to_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['thu_to_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['thu_to_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
              
              </select>
	       <select name="shop_start_time_thu_pm" placeholder="From PM" class="form-control" style="width: 160px;float: left;">
	         <option <?php if(''==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['thu_from_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                </select>
		
              <select name="shop_end_time_thu_pm" placeholder="To PM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="6:30">6:30</option>
                <option <?php if('7:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['thu_to_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                
              </select>
            </div>
            </div>
	    
	    
	    
           <div class="form-group has-success col-md-8" style="margin-left: -1%;">
            <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1"> Vendredi<span style="color:red;">*</span></label>
            </div>
	    
	    
	    
	        <div class="form-group has-success col-md-8">
              <select name="shop_start_time_fri_am" placeholder="From AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['fri_from_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['fri_from_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['fri_from_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                            </select>
		
              <select name="shop_end_time_fri_am" placeholder="To AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['fri_to_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['fri_to_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['fri_to_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
              
              </select>
	       <select name="shop_start_time_fri_pm" placeholder="From PM" class="form-control" style="width: 160px;float: left;">
	         <option <?php if(''==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['fri_from_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                </select>
		
              <select name="shop_end_time_fri_pm" placeholder="To PM" class="form-control" style="width: 160px;float: left;"> 
	      <option <?php if(''==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="6:30">6:30</option>
                <option <?php if('7:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['fri_to_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                
              </select>
            </div>
            </div>
	    
	    
	    
           <div class="form-group has-success col-md-8" style="margin-left: -1%;">
            <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Samedi<span style="color:red;">*</span></label>
            </div>
	    
	        <div class="form-group has-success col-md-8">
              <select name="shop_start_time_sat_am" placeholder="From AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['sat_from_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['sat_from_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['sat_from_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                            </select>
		
              <select name="shop_end_time_sat_am" placeholder="To AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['sat_to_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['sat_to_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['sat_to_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
              
              </select>
	       <select name="shop_start_time_sat_pm" placeholder="From PM" class="form-control" style="width: 160px;float: left;">
	         <option <?php if(''==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['sat_from_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                </select>
		
              <select name="shop_end_time_sat_pm" placeholder="To PM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="6:30">6:30</option>
                <option <?php if('7:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['sat_to_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                
              </select>
            </div>
            </div>
	    
	    
	    
           <div class="form-group has-success col-md-8" style="margin-left: -1%;">
            <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Dimanche<span style="color:red;">*</span></label>
            </div>
	    
	    
	        <div class="form-group has-success col-md-8">
              <select name="shop_start_time_sun_am" placeholder="From AM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['sun_from_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['sun_from_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['sun_from_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                            </select>
		
              <select name="shop_end_time_sun_am" placeholder="To AM" class="form-control" style="width: 160px;float: left;">
	      <option <?php if(''==$x['sun_to_am_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['sun_to_am_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['sun_to_am_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
              
              </select>
	       <select name="shop_start_time_sun_pm" placeholder="From PM" class="form-control" style="width: 160px;float: left;">
	       <option <?php if(''==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?>  value="6:30">6:30</option>
                <option <?php if('7:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['sun_from_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                </select>
		
              <select name="shop_end_time_sun_pm" placeholder="To PM" class="form-control" style="width: 160px;float: left;">
	        <option <?php if(''==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="">NA</option>
                <option <?php if('6:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="6:00">6:00</option>
                <option <?php if('6:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="6:30">6:30</option>
                <option <?php if('7:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="7:00">7:00</option>
                <option <?php if('7:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="7:30">7:30</option>
                <option <?php if('8:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="8:00">8:00</option>
                <option <?php if('8:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="8:30">8:30</option>
                <option <?php if('9:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="9:00">9:00</option>
                <option <?php if('9:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="9:30">9:30</option>
                <option <?php if('10:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="10:00">10:00</option>
                <option <?php if('10:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="10:30">10:30</option>
                <option <?php if('11:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:00</option>
                <option <?php if('11:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="11:30">11:30</option>
                <option <?php if('12:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="12:00">12:00</option>
                <option <?php if('12:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="12:30">12:30</option>
                <option <?php if('13:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="13:00">13:00</option>
                <option <?php if('13:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="13:30">13:30</option>
                <option <?php if('14:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="14:00">14:00</option>
                <option <?php if('14:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="14:30">14:30</option>
                <option <?php if('15:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="15:00">15:00</option>
                <option <?php if('15:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="15:30">15:30</option>
                <option <?php if('16:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="16:00">16:00</option>
                <option <?php if('16:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="16:30">16:30</option>
                <option <?php if('17:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="17:00">17:00</option>
                <option <?php if('17:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="17:30">17:30</option>
                <option <?php if('18:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="18:00">18:00</option>
                <option <?php if('18:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="18:30">18:30</option>
                <option <?php if('19:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="19:00">19:00</option>
                <option <?php if('19:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="19:30">19:30</option>
                <option <?php if('20:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="20:00">20:00</option>
                <option <?php if('20:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="20:30">20:30</option>
                <option <?php if('21:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="21:00">21:00</option>
                <option <?php if('21:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="21:30">21:30</option>
                <option <?php if('22:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="22:00">22:00</option>
                <option <?php if('22:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="22:30">22:30</option>
                <option <?php if('23:00'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="23:00">23:00</option>
                <option <?php if('23:30'==$x['sun_to_pm_time']){ echo 'selected'; } ?> value="23:30">23:30</option>
                
              </select>
            </div>
            </div>
	    
    
        
          <div class="form-group has-success col-md-8">
            <?php 
              $weekend=explode(',',$x['weekend']);
              // print_r($weekend);
            ?>
             <label class="control-label" for="inputSuccess1">Week-end<span style="color:red;">*</span></label><br>
             <label class="radio-inline"><input type="checkbox" <?php if(in_array('Monday', $weekend)){ echo 'checked'; } ?> value="Monday" name="weekend[]">&nbsp;Lundi</label>
              <label class="radio-inline"><input type="checkbox" <?php if(in_array('Tuesday', $weekend)){ echo 'checked'; } ?> value="Tuesday" name="weekend[]">&nbsp;Mardi</label>
              <label class="radio-inline"><input type="checkbox" <?php if(in_array('Wednesday', $weekend)){ echo 'checked'; } ?> value="Wednesday" name="weekend[]">&nbsp;Mercredi</label>
              <label class="radio-inline"><input type="checkbox" <?php if(in_array('Thrusday', $weekend)){ echo 'checked'; } ?> value="Thrusday" name="weekend[]">&nbsp;Jeudi</label>
              <label class="radio-inline"><input type="checkbox" <?php if(in_array('Friday', $weekend)){ echo 'checked'; } ?> value="Friday" name="weekend[]">&nbsp;Vendredi</label>
              <label class="radio-inline"><input type="checkbox" <?php if(in_array('Saturday', $weekend)){ echo 'checked'; } ?> value="Saturday" name="weekend[]">&nbsp;Samedi</label>
              <label class="radio-inline"><input type="checkbox" <?php if(in_array('Sunday', $weekend)){ echo 'checked'; } ?> value="Sunday" name="weekend[]">&nbsp;Dimanche</label>
          </div>
          <div class="form-group has-success col-md-8">
             <label class="control-label" for="inputSuccess1">Ville<span style="color:red;">*</span></label>
              <input type="text" value="<?php echo $x['city_name'];?>" class="form-control" id="inputSuccess1" name="city" required>
          </div>
          <div class="form-group has-success col-md-8">
             <label class="control-label" for="inputSuccess1">Code Postal<span style="color:red;">*</span></label>
              <input type="text" class="form-control" value="<?php echo $x['zip_code'];?>" id="inputSuccess1" name="zip" required>
          </div>
            <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Description<span style="color:red;">*</span></label>
             <textarea type="text" class="form-control" value="<?php echo $x['disc'];?>" name="disc" required><?php echo $x['disc'];?></textarea>
          </div>
          <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Localisation<span style="color:red;">*</span></label>
                         <input id="searchInput" class="controls" type="text" placeholder="Enter a location">
                        <div id="map" style="height: 188px;"></div>
                        <ul id="geoData">
                        <span id="location"></span>
                        <span id="postal_code"></span>
                        <span id="country"></span>
                        <span id="lat"></span>                                    
                        </ul>
                         <input type="text" class="form-control" id="mylocation" name="address_map" placeholder="Location Name" required value="<?php echo $x['address_map'];?>">
                         <input type="text" class="form-control" id="mylatitde" name="lat" placeholder="Latitude" required value="<?php echo $x['lat'];?>">
                         <input type="text" class="form-control" id="mylongtitude" name="longt" placeholder="Longitude" required value="<?php echo $x['longt'];?>">
          </div>
          <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Image enseigne<span style="color:red;">*</span></label>
            <input type="file" class="form-control" id="inputSuccess1" name="brand_logo" value="/directory_admin/uploads/<?php echo $x['brand_logo']; ?>">
          </div>
          <div class="form-group has-success col-md-8">
             <label class="control-label" for="inputSuccess1"> Nom du contact professionnel<span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="inputSuccess1" name="contact_name" value="<?php echo $x['contact_name'];?>">
          </div>
          <div class="form-group has-success col-md-8">
             <label class="control-label" for="inputSuccess1">Image contact professionnel<span style="color:red;">*</span></label>
             <input type="file" class="form-control" id="inputSuccess1" name="contact_image" value="/directory/uploads/<?php echo $x['contact_image']; ?>">
          </div>
          <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1"> Email professionnel<span style="color:red;">*</span></label>
           <input type="text" class="form-control" id="inputSuccess1" name="email" value="<?php echo $x['email'];?>" readonly>
          </div>        
          <div>
              <input type="hidden" class="form-control" id="inputSuccess1" name="created_by" required>
          </div>
          <div class="form-group has-success col-md-6">
               <button class="btn btn-danger" name="add_category" type="submit">METTRE A JOUR</button><br/><br/>
          </div>
          
          <?php 
            }
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
  <script> 

 $('#basicExample24').timepicker();
 $('#basicExample25').timepicker();
 $('#basicExample26').timepicker();
 $('#basicExample27').timepicker();
  function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;
        return true;
    }
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -33.8688, lng: 151.2195},
      zoom: 13
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        // alert(place.geometry);
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));    
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        //Location details
        // for (var i = 0; i < place.address_components.length; i++) {
        //     if(place.address_components[i].types[0] == 'postal_code'){
        //         document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
        //     }
        //     if(place.address_components[i].types[0] == 'country'){
        //         document.getElementById('country').innerHTML = place.address_components[i].long_name;
        //     }
        // }
        // alert(place.geometry.location.lat());

        document.getElementById('mylocation').value=place.formatted_address;
        document.getElementById('mylatitde').value=place.geometry.location.lat();
        document.getElementById('mylongtitude').value=place.geometry.location.lng();

        // document.getElementById('location').innerHTML = place.formatted_address;
        // document.getElementById('lat').innerHTML = place.geometry.location.lat();
        // document.getElementById('lon').innerHTML = place.geometry.location.lng();
    });
}
</script>
 <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap&key=AIzaSyCA6lklAzTIeJvbpnGVuLwztXCXgZTq5W0" async defer></script>