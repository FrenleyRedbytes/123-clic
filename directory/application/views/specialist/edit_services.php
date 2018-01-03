<html>
<head>
  
  <style type="text/css">
    .has-success .input-group-addon{
        padding:0px;
        border:none;
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
          <i class="fa fa-home"></i>Edit services
        </li>
      </ul>
    </div> -->
    <div class="page-header">
      <div class="page-title">
        <h3>Modifier un service</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php
           echo form_open('services/update_enquiry');
        ?>
        <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1">Titre du Service<span style="color:red;">*</span></label>
          <input type="hidden" class="form-control" id="inputSuccess1" value="<?php echo $spe->serve_id ;?>" name="spe">
            <select class="form-control pleft13 " name="ser">
               <?php 
                    echo $spe->serv_title;
                  foreach ($ser as $s) {
                ?>
                <option <?php if($spe->serv_title==$s->ser_detail_id){ echo "selected"; } ?> value="<?php echo $s->ser_detail_id;?>"><?php echo $s->ser_name;?></option>
                <?php } ?> 
              </select>
              <span class="input-group-addon"><i class="icon-pencil" style="height: 36 px;"></i></span>
          </div>
        <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1"> Prix<span style="color:red;">*</span></label>
            <input type="text" class="form-control" id="inputSuccess1" value="<?php echo $spe->price ;?>" name="price" required>
        </div> 
        <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1"> Temps<span style="color:red;">*</span></label>
            <select class="form-control" name="time" required="">
              <option value="">Selectionner temps du service</option>
              <option <?php if($spe->time=='15'){ echo "selected"; } ?> value="15">15</option>
              <option <?php if($spe->time=='30'){ echo "selected"; } ?> value="30">30</option>
              <option <?php if($spe->time=='45'){ echo "selected"; } ?> value="45">45</option>
              <option <?php if($spe->time=='60'){ echo "selected"; } ?> value="60">60</option>
              <option <?php if($spe->time=='75'){ echo "selected"; } ?> value="75">75</option>
              <option <?php if($spe->time=='90'){ echo "selected"; } ?> value="90">90</option>
            </select>
        </div>
      </div>
    </div>           
         <div class="form-group has-success col-md-6">
            <button class="btn btn-danger" name="add_user" type="submit">Modifier</button><br/><br/>
        </div>
        <?php
        
        echo validation_errors();
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


<script type="text/javascript">
        function getService(id){
          alert(id);
          $.ajax({
          type: "GET",
          url: '<?php echo base_url('index.php/services/ajax_service');?>/'+id,
            console.log(id);
          success: function(data){
            $('#service').html(data);
          },
        });
        }
  </script>
