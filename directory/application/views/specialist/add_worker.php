<?php 
  include('header.php');
  include('sidebar.php'); 
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datetimepicker/jquery.timepicker.css"/>
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
   <!--  <div class="crumbs">
      <ul id="breadcrumbs" class="breadcrumb">
        <li class="current">
          <i class="fa fa-home"></i>Add Worker
        </li>
      </ul>
    </div> -->
    <div class="page-header">
      <div class="page-title">
        <h3>Ajouter un employ&eacute;</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php
           echo form_open_multipart('specialist1/addWorker');
        ?>
        <span style="color: red;"> <?php echo validation_errors(); ?></span>
         <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1"> Selectionner un Service<span style="color:red;">*</span></label>
          <select id="tag" class="form-control pleft13 select2" name="service[]" multiple required="">
          <option>Liste des services</option>
          <?php
            foreach ($ser as $s) {
          ?>
          <option value="<?php echo $s->ser_detail_id; ?>"><?php echo $s->ser_name ;?></option>
          <?php } ?>
          </select>      
      </div>
   <!--   <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1">Selectionner une Cat&eacute;gorie<span style="color:red;">*</span></label>
          <select name="cat" class="form-control" onchange="getSubcategory(this.value);">
          <option value="">Liste des Cat&eacute;gories</option>
          <?php          
          foreach($cat as $row_spe){
          ?>
          <option value="<?php echo $row_spe['cat_id'];?>"><?php echo $row_spe['name'];?></option>
          <?php }?>
          </select>      
      </div>
      <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1">Selectionner une Sous-Cat&eacute;gorie</label>
          <select name="subcat" class="form-control" id="subcat">
              <option selected="selected" value="" >Liste des sous-cat&eacute;gories</option>
          </select>      
      </div>
        <script type="text/javascript">
        function getSubcategory(val){
            $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/specialist1/subcatdetail/"+val,
                success: function (response){
                    console.log(response);
                    $('#subcat').html(response);
                }
            });
        }
        </script>
	
	-->
      <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1">Horaire de travail par semaine<span style="color:red;">*</span></label>
          <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Monday" name="day[]" id="myCheck"  onclick="addbox();">Lundi</p>
                   <p class="row" id="area" style="display: none;">
                    <input name="mon_from_time_am" id="basicExample" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="mon_to_time_am" id="basicExample1" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text">&nbsp;&nbsp;
                    <input name="mon_from_time_pm" id="basicExample2" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="mon_to_time_pm" id="basicExample3" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text">
                    </p>
              </label>
          </div>
          <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Tuesday" name="day[]" id="myCheck1"  onclick="addbox1();">Mardi
                   </p>
                    <p class="row" id="area1" style="display: none;">
                    <input name="tue_from_time_am" id="basicExample4" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="tue_to_time_am" id="basicExample5" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text">&nbsp;&nbsp;
                    <input name="tue_from_time_pm" id="basicExample6" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="tue_to_time_pm" id="basicExample7"  placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text">
                    </p>
              </label>
          </div>
          <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Wednesday" name="day[]" id="myCheck2"  onclick="addbox2();">Mercredi
                   </p>
                    <p class="row" id="area2" style="display: none;">
                    <input name="wed_from_time_am" id="basicExample8" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="wed_to_time_am"  id="basicExample9" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text">&nbsp;&nbsp;
                    <input name="wed_from_time_pm" id="basicExample10" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="wed_to_time_pm" id="basicExample11" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text">
                    </p>
              </label>
          </div>
          <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Thursday" name="day[]" id="myCheck3"  onclick="addbox3();">Jeudi
                   </p>
                    <p class="row" id="area3" style="display: none;">
                    <input name="thu_from_time_am" id="basicExample12" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="thu_to_time_am" id="basicExample13" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text">&nbsp;&nbsp;
                    <input name="thu_from_time_pm" id="basicExample14" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="thu_to_time_pm" id="basicExample15" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text">
                    </p>
              </label>
          </div>
            <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Friday" name="day[]" id="myCheck4"  onclick="addbox4();">Vendredi
                   </p>
                    <p class="row" id="area4" style="display: none;">
                    <input name="fri_from_time_am" id="basicExample16" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="fri_to_time_am" id="basicExample17" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text">&nbsp;&nbsp;
                    <input name="fri_from_time_pm" id="basicExample18" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="fri_to_time_pm" id="basicExample19" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text">
                    </p>
              </label>
          </div>
            <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Saturday" name="day[]" id="myCheck5"  onclick="addbox5();">Samedi
                   </p>
                    <p class="row" id="area5" style="display: none;">
                    <input name="sat_from_time_am" id="basicExample20" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="sat_to_time_am" id="basicExample21" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text">&nbsp;&nbsp;
                    <input name="sat_from_time_pm" id="basicExample22" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="sat_to_time_pm" id="basicExample23" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text">
                    </p>
              </label>
          </div>
            <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Sunday" name="day[]" id="myCheck6"  onclick="addbox6();">Dimanche
                   </p>
                    <p class="row" id="area6" style="display: none;">
                    <input name="sun_from_time_am" id="basicExample24" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="sun_to_time_am" id="basicExample25" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text">&nbsp;&nbsp;
                    <input name="sun_from_time_pm" id="basicExample26" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text">
                    &nbsp;&nbsp;
                    <input name="sun_to_time_pm" id="basicExample27" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text">
                    </p>
              </label>
          </div>      
      </div>  
      <!-- <div class="form-group has-success col-md-8">
          <div>
          <label class="control-label" for="inputSuccess1">Holiday<span style="color:red;">*</span></label></div>
          <div class="col-md-6">
          <input type="text" class="form-control" id="datepicker" name="day_leave_start" placeholder="Start Date">
          </div>
          <div class="col-md-6">
          <input type="text" class="form-control" id="datepicker1" name="day_leave_end" placeholder="End Date">
          </div>
      </div> -->
      <div class="form-group has-success col-md-10">
          <label class="control-label" for="inputSuccess1">Vacances de l'employ&eacute;<span style="color:red;">*</span></label>
          <div class="wrap" id="div0">
        <div class="col-md-10 copy" >
          <div class="col-md-5">
            <input type="text" class="form-control datepicker" id="datepicker0" name="day_leave_start[]" placeholder="Date de d&eacute;but">
          </div>
          <div class="col-md-5">
            <input type="text" class="form-control datepicker" id="datepickers0" name="day_leave_end[]" placeholder="Date de fin">
          </div> 
          <div class="col-md-2">
            <button onclick="add()"  id="new_link_0" class="btn btn-general add-more" type="button" style="margin-left: 19px;margin-top: -3px;color:black;"><i class="glyphicon glyphicon-plus"></i> AJOUTER</button>
          </div>                 
        </div>       
      </div>
      </div>
      <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1"> Nom de l'employ&eacute;<span style="color:red;">*</span></label>
          <input type="text" class="form-control" id="inputSuccess1" name="first_name" required>
      </div>
      <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1"> Pr&eacute;nom de l'employ&eacute;<span style="color:red;">*</span></label>
          <input type="text" class="form-control" id="inputSuccess1" name="last_name" required>
      </div>
     <!-- <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1"> Adresse<span style="color:red;">*</span></label>
          <input type="text" class="form-control" id="inputSuccess1" name="address" required>
      </div>

      <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1">Ville<span style="color:red;">*</span></label>
          <input type="text" class="form-control" id="inputSuccess1" name="city" required>
      </div>
      -->
      <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1"> Num&eacute;ro de mobile<span style="color:red;"></span></label>
          <input type="text" class="form-control" id="inputSuccess1" name="mobile" >
      </div>
      <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1"> Email<span style="color:red;"></span></label>
          <input type="email" class="form-control" id="inputSuccess1" name="email" >
      </div>   
      <!-- <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1"> Worker Join Date<span style="color:red;">*</span></label>
          <input type="text" class="form-control" id="datepicker3" name="join_date" required>
      </div> -->
     <!--  <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1"> Worker working Time<span style="color:red;">*</span></label>
          <input type="text" class="form-control" id="basicExample28" name="work_time" required>
      </div> 
      <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1"> Image employ&eacute;<span style="color:red;">*</span></label>
          <input type="file" class="form-control" id="inputSuccess1" name="image" required>
      </div>-->
      <div>
          <input type="hidden" class="form-control" id="inputSuccess1" name="created_by" required>
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
<script src="<?php echo base_url();?>assets/js/select2.js"></script>
<script>
  $('.select2').select2();
</script>
<script type="text/javascript">

 $('#basicExample').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample1').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample2').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample3').timepicker({ 'timeFormat': 'H:i:s' }); 

 $('#basicExample4').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample5').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample6').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample7').timepicker({ 'timeFormat': 'H:i:s' });

 $('#basicExample8').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample9').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample10').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample11').timepicker({ 'timeFormat': 'H:i:s' }); 

 $('#basicExample12').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample13').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample14').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample15').timepicker({ 'timeFormat': 'H:i:s' });

 $('#basicExample16').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample17').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample18').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample19').timepicker({ 'timeFormat': 'H:i:s' }); 

 $('#basicExample20').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample21').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample22').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample23').timepicker({ 'timeFormat': 'H:i:s' });

 $('#basicExample24').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample25').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample26').timepicker({ 'timeFormat': 'H:i:s' });
 $('#basicExample27').timepicker({ 'timeFormat': 'H:i:s' });
 // $('#basicExample28').timepicker();

function addbox() {
    if (document.getElementById('myCheck').checked) {
        document.getElementById('area').style.display = 'block';
    } else {
        document.getElementById('basicExample').value = '';        
        document.getElementById('basicExample1').value = '';        
        document.getElementById('basicExample2').value = '';        
        document.getElementById('basicExample3').value = '';        
        document.getElementById('area').style.display = 'none';
    }
}
function addbox1() {
    if (document.getElementById('myCheck1').checked) {
        document.getElementById('area1').style.display = 'block';
    } else {
        document.getElementById('basicExample4').value = '';        
        document.getElementById('basicExample5').value = '';        
        document.getElementById('basicExample6').value = '';        
        document.getElementById('basicExample7').value = '';      
        document.getElementById('area1').style.display = 'none';
    }
}
function addbox2() {
    if (document.getElementById('myCheck2').checked) {
        document.getElementById('area2').style.display = 'block';
    } else {
        document.getElementById('basicExample8').value = '';        
        document.getElementById('basicExample9').value = '';        
        document.getElementById('basicExample10').value = '';        
        document.getElementById('basicExample11').value = '';  
        document.getElementById('area2').style.display = 'none';
    }
}
function addbox3() {
    if (document.getElementById('myCheck3').checked) {
        document.getElementById('area3').style.display = 'block';
    } else {
        document.getElementById('basicExample12').value = '';        
        document.getElementById('basicExample13').value = '';        
        document.getElementById('basicExample14').value = '';        
        document.getElementById('basicExample15').value = ''; 
        document.getElementById('area3').style.display = 'none';
    }
}
function addbox4() {
    if (document.getElementById('myCheck4').checked) {
        document.getElementById('area4').style.display = 'block';
    } else {
        document.getElementById('basicExample16').value = '';        
        document.getElementById('basicExample17').value = '';        
        document.getElementById('basicExample18').value = '';        
        document.getElementById('basicExample19').value = ''; 
        document.getElementById('area4').style.display = 'none';
    }
}
function addbox5() {
    if (document.getElementById('myCheck5').checked) {
        document.getElementById('area5').style.display = 'block';
    } else {
        document.getElementById('basicExample20').value = '';        
        document.getElementById('basicExample21').value = '';        
        document.getElementById('basicExample22').value = '';        
        document.getElementById('basicExample23').value = ''; 
        document.getElementById('area5').style.display = 'none';
    }
}
function addbox6() {
    if (document.getElementById('myCheck6').checked) {
        document.getElementById('area6').style.display = 'block';
    } else {
        document.getElementById('basicExample24').value = '';        
        document.getElementById('basicExample25').value = '';        
        document.getElementById('basicExample26').value = '';        
        document.getElementById('basicExample27').value = ''; 
        document.getElementById('area6').style.display = 'none';
    }
}  
</script>
<script type="text/javascript">


var i=1;
 function add(){
    $('#div0').append('<div class="col-md-10 copy" ><div class="col-md-5"><input type="text" class="form-control datepicker" id="datepicker'+i+'" name="day_leave_start[]" placeholder="Start Date" style="margin-top: 3%;"></div><div class="col-md-5"><input type="text" class="form-control datepicker" id="datepickers'+i+'" name="day_leave_end[]" placeholder="End Date" style="margin-top: 3%;"></div><div class="col-md-2"><button class="btn btn-danger remove" type="button" style="margin: 3px 6px;"><i class="glyphicon glyphicon-remove"></i> Remove</button></div></div>');

    i++;
   
}
$("body").on("click",".remove",function(){ 
  $(this).parents(".copy").remove();
  });
$('body').on('focus',".datepicker", function(){
  // console.log('hii');
    $(this).datepicker();
});
</script>
 <script src="http://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>

