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
          <i class="fa fa-home"></i>Add services
        </li>
      </ul>
    </div> -->
    <div class="page-header">
      <div class="page-title">
        <h3>Ajouter un service</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php
          echo form_open('services/addServices');
        ?>
        <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1">Titre du Service<span style="color:red;">* Si un service que vous souhaitez n'est pas dans la liste, merci de nous contacter au 06.80.56.82.69 ou pro@123-clic.fr</span></label>
            <select class="form-control pleft13 " name="ser">
               <?php 	$speid=$this->session->userdata('id');
	  global $con;
	  $con = mysqli_connect("localhost","root","","sayso");
		
		$resultat = mysqli_query($con,"SELECT * FROM specialist WHERE spr_id='$speid' ");
	$sql_data=mysqli_fetch_array($resultat);
	echo $sql_data['cat_id']; 
				
                   foreach ($ser as $s) {
//if($s->cat_id==$catid['cat_id']){
                ?>
                <option value="<?php echo $s->ser_detail_id; ?>"><?php echo $s->ser_name;  ?></option>
                <?php }
		 
		?> 
              </select>
              <span class="input-group-addon"><i class="icon-pencil" style="height: 36 px;"></i></span>
          </div>
        <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1"> Prix<span style="color:red;">*</span></label>
            <input type="text" class="form-control" id="inputSuccess1" name="price" required>
        </div> 
        <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1"> Temps<span style="color:red;">*</span></label>
            <select class="form-control" name="time" required="">
              <option value="">Selectionner le temps du service</option>
              <option value="15">15</option>
              <option value="30">30</option>
              <option value="45">45</option>
              <option value="60">60</option>
              <option value="75">75</option>
              <option value="90">90</option>
            </select>
        </div>
      </div>
    </div>					 
         <div class="form-group has-success col-md-6">
            <button class="btn btn-danger" name="add_user" type="submit">AJOUTER</button><br/><br/>
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
