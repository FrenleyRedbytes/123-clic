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
            <i class="fa fa-home"></i>Edit specialist
          </li>
        </ul>
      </div>
 -->      
 <div class="page-header">
        <div class="page-title">
          <h3 style="color: #850035;">View Service</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- <?php
            echo form_open('specialist/updateSpecialist');
            // foreach($res as $row_spe){
            ?> -->
             <div class="form-group has-success col-md-8">
             <input type="hidden" name="id" value="<?php echo $res->ser_as_specialist;?>">
              <label class="control-label" for="inputSuccess1"><font size="4">Sp&eacute;cialiste : </font></label>&nbsp;&nbsp;&nbsp;<font size="4"><?php echo ucfirst($res->brand_name);?></font>
              <!-- <select name="spe" class="form-control" >
              <option value="">Select Specialist</option>
              <?php          
              foreach($spe as $row_spe){
              ?>
              <option <?php if($res->spe_id==$row_spe->spr_id){ echo "selected";} ?> value="<?php echo $row_spe->spr_id;?>"><?php echo $row_spe->brand_name;?></option>
              <?php }?>
              </select>    -->   
          </div>
            <div class="form-group has-success col-md-8">
              <!-- <label class="control-label" for="inputSuccess1">Service-Detail<span style="color:red;">*</span></label><br> -->
              <div class="portlet-body">
                <table class="table" border="">
                  <tr style="background-color: #e6b53e;">
                    <th>Service</th>
                    <th>Modifier</th>
                  </tr>
                  <?php 
                  foreach ($ser as $row) {
                   ?>
                  <tr>
                    <td><?php echo ucfirst($row->ser_name); ?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>index.php/specialist/delete_spService/<?php echo $row->ser_as_specialist;?>">Supprimer</a>
                    </td>
                  </tr> 
                  <?php } 
                  ?>
                </table>
              </div>  
              <!-- <select id="tag" class="form-control pleft13 select2" name="ser[]" multiple>
                <option value="">Service-Detail</option>
                <?php          
                foreach($ser as $row_ser){
                ?>
                <option <?php if($res->ser_det_id==$row_ser->ser_detail_id){ echo "selected";} ?> value="<?php echo $row_ser->ser_detail_id;?>"><?php echo $row_ser->ser_name;?></option>
                <?php }?>
              </select>   -->    
          </div>
          <!-- <div class="form-group has-success col-md-6">
               <button class="btn btn-danger" name="add_category" type="submit">UPDATE</button><br/><br/>
          </div> -->
          
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
  </html>
  <script src="<?php echo base_url();?>assets/js/select2.js"></script>

  <script>
  $('.select2').select2();
</script>