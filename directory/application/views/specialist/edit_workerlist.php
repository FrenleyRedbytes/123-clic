<?php 
  include('header.php');
  include('sidebar.php'); 
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datetimepicker/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datetimepicker/jquery.timepicker.css"/>
<link href="<?php echo base_url(); ?>assets/css/select2-bootstrap.css" rel="stylesheet" media="screen" />
    <link href="<?php echo base_url(); ?>assets/css/select2.css" rel="stylesheet" media="screen" />
<div id="content">
  <div class="container">
   <!--  <div class="crumbs">
      <ul id="breadcrumbs" class="breadcrumb">
        <li class="current">
          <i class="fa fa-home"></i>Edit Worklist
        </li>
      </ul>
    </div> -->
    <div class="page-header">
      <div class="page-title">
        <h3>Modifier un employ&eacute;</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php
           echo form_open_multipart('specialist1/update_workerlist');
          
           foreach($res as $x)
        {
        ?>
          <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Selectionner un service<span style="color:red;">*</span></label>
            <select id="tag" class="form-control pleft13 select2" name="service[]" multiple required="">
              <option>Liste des services</option>
              <?php
                foreach ($ser as $s) {
                    $chk=0;
                  foreach ($row as $row_data) {

                            if($row_data->service_id==$s->ser_detail_id){
                                $chk=1;
                            }
                      ?>
                      <?php
                  }
              ?>
                <option <?php if($chk==1){ echo'selected'; } ?>  value="<?php echo $s->ser_detail_id; ?>"><?php echo $s->ser_name ;?></option>
              
              <?php } ?>
            </select>      
        </div>
        <!--  <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Selectionner une Cat&eacute;gorie<span style="color:red;">*</span></label>
              <select name="cat" class="form-control" onchange="getSubcategory(this.value);">
              <option value="">Liste des Cat&eacute;gories</option>
              <?php          
              foreach($cat as $row_spe){
              ?>
              <option <?php if($x['cat_id']==$row_spe['cat_id']){ echo "selected"; } ?> value="<?php echo $row_spe['cat_id'];?>"><?php echo $row_spe['name'];?></option>
              <?php }?>
              </select>      
          </div>
          <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1">Selectionner une sous-cat&eacute;gorie<span style="color:red;">*</span></label>
          <select name="subcat" class="form-control" id="subcat">
              <option selected="selected" value="" >Liste des sous-cat&eacute;gories</option>
              <?php          
              foreach($subcat as $row_spe1){
              ?>
              <option <?php if($x['cat_id']==$row_spe1['subcat_id']){ echo "selected"; } ?> value="<?php echo $row_spe1['subcat_id'];?>"><?php echo $row_spe1['subcat_name'];?></option>
              <?php }?>
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
          <?php $arr=explode(',',$x['day']); ?>
           <div class="form-group has-success col-md-8">
          <label class="control-label" for="inputSuccess1">Heure de travail par semaine<span style="color:red;">*</span></label>
          <div class="checkbox">
              <label>
                   <p>
                   <input type="checkbox" value="Monday" name="day[]" id="myCheck" <?php if(in_array('Monday',$arr)){?> checked  <?php }?> onclick="addbox();">Lundi
                   </p>
                   <p class="row" id="area" 
                    <?php if($x['mon_from_time_am']=="" and $x['mon_to_time_am']=="" and $x['mon_from_time_pm']=="" and $x['mon_to_time_pm']=="" ){ 
                    echo "style='display: none;'";
                    }
                    ?>
                    >
                    <input name="mon_from_time_am" id="basicExample" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['mon_from_time_am']; ?>">
                    &nbsp;&nbsp;
                    <input name="mon_to_time_am" id="basicExample1" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['mon_to_time_am']; ?>">&nbsp;&nbsp;
                    <input name="mon_from_time_pm" id="basicExample2" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['mon_from_time_pm']; ?>">
                    &nbsp;&nbsp;
                    <input name="mon_to_time_pm" id="basicExample3" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['mon_to_time_pm']; ?>">
                    </p>
              </label>
          </div>
          <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Tuesday" name="day[]" <?php if(in_array('Tuesday',$arr)){ echo'checked';}?> id="myCheck1"  onclick="addbox1();">Mardi
                   </p>
                    <p class="row" id="area1" <?php if($x['tue_from_time_am']=="" and $x['tue_to_time_am']=="" and $x['tue_from_time_pm']=="" and $x['tue_to_time_pm']=="" ){ 
                    echo "style='display: none;'";
                    }
                    ?>>
                    <input name="tue_from_time_am" id="basicExample4" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['tue_from_time_am']; ?>">
                    &nbsp;&nbsp;
                    <input name="tue_to_time_am" id="basicExample5" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['tue_to_time_am']; ?>">&nbsp;&nbsp;
                    <input name="tue_from_time_pm" id="basicExample6" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['tue_from_time_pm']; ?>">
                    &nbsp;&nbsp;
                    <input name="tue_to_time_pm" id="basicExample7"  placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['tue_to_time_pm']; ?>">
                    </p>
              </label>
          </div>
          <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Wednesday" name="day[]" <?php if(in_array('Wednesday',$arr)){ echo'checked';}?> id="myCheck2"  onclick="addbox2();">Mercredi
                   </p>
                    <p class="row" id="area2" <?php if($x['wed_from_time_am']=="" and $x['wed_to_time_am']=="" and $x['wed_from_time_pm']=="" and $x['wed_to_time_pm']=="" ){ 
                    echo "style='display: none;'";
                    }
                    ?>>
                    <input name="wed_from_time_am" id="basicExample8" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['wed_from_time_am']; ?>">
                    &nbsp;&nbsp;
                    <input name="wed_to_time_am"  id="basicExample9" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['wed_to_time_am']; ?>">&nbsp;&nbsp;
                    <input name="wed_from_time_pm" id="basicExample10" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['wed_from_time_pm']; ?>">
                    &nbsp;&nbsp;
                    <input name="wed_to_time_pm" id="basicExample11" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['wed_to_time_pm']; ?>">
                    </p>
              </label>
          </div>
          <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Thursday" name="day[]" <?php if(in_array('Thursday',$arr)){ echo'checked';}?> id="myCheck3"  onclick="addbox3();">Jeudi
                   </p>
                    <p class="row" id="area3" <?php if($x['thu_from_time_am']=="" and $x['thu_to_time_am']=="" and $x['thu_from_time_pm']=="" and $x['thu_to_time_pm']=="" ){ 
                    echo "style='display: none;'";
                    }
                    ?>>
                    <input name="thu_from_time_am" id="basicExample12" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['thu_from_time_am']; ?>">
                    &nbsp;&nbsp;
                    <input name="thu_to_time_am" id="basicExample13" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['thu_to_time_am']; ?>">&nbsp;&nbsp;
                    <input name="thu_from_time_pm" id="basicExample14" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['thu_from_time_pm']; ?>">
                    &nbsp;&nbsp;
                    <input name="thu_to_time_pm" id="basicExample15" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['thu_to_time_pm']; ?>">
                    </p>
              </label>
          </div>
            <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Friday" name="day[]" <?php if(in_array('Friday',$arr)){ echo'checked';}?> id="myCheck4"  onclick="addbox4();">Vendredi
                   </p>
                    <p class="row" id="area4" <?php if($x['fri_from_time_am']=="" and $x['fri_to_time_am']=="" and $x['fri_from_time_pm']=="" and $x['fri_to_time_pm']=="" ){ 
                    echo "style='display: none;'";
                    }
                    ?>>
                    <input name="fri_from_time_am" id="basicExample16" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['fri_from_time_am']; ?>">
                    &nbsp;&nbsp;
                    <input name="fri_to_time_am" id="basicExample17" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['fri_to_time_am']; ?>">&nbsp;&nbsp;
                    <input name="fri_from_time_pm" id="basicExample18" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['fri_from_time_pm']; ?>">
                    &nbsp;&nbsp;
                    <input name="fri_to_time_pm" id="basicExample19" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['fri_to_time_pm']; ?>">
                    </p>
              </label>
          </div>
            <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Saturday" name="day[]" <?php if(in_array('Saturday',$arr)){ echo'checked';}?> id="myCheck5"  onclick="addbox5();">Samedi
                   </p>
                    <p class="row" id="area5" <?php if($x['sat_from_time_am']=="" and $x['sat_to_time_am']=="" and $x['sat_from_time_pm']=="" and $x['sat_to_time_pm']=="" ){ 
                    echo "style='display: none;'";
                    }
                    ?>>
                    <input name="sat_from_time_am" id="basicExample20" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['sat_from_time_am']; ?>">
                    &nbsp;&nbsp;
                    <input name="sat_to_time_am" id="basicExample21" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['sat_to_time_am']; ?>">&nbsp;&nbsp;
                    <input name="sat_from_time_pm" id="basicExample22" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['sat_from_time_pm']; ?>">
                    &nbsp;&nbsp;
                    <input name="sat_to_time_pm" id="basicExample23" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['sat_to_time_pm']; ?>">
                    </p>
              </label>
          </div>
            <div class="checkbox">
              <label>
                   <p style="">
                   <input type="checkbox" value="Sunday" name="day[]" <?php if(in_array('Sunday',$arr)){ echo'checked';}?> id="myCheck6"  onclick="addbox6();">Dimanche
                   </p>
                    <p class="row" id="area6" <?php if($x['sun_from_time_am']=="" and $x['sun_to_time_am']=="" and $x['sun_from_time_pm']=="" and $x['sun_to_time_pm']=="" ){ 
                    echo "style='display: none;'";
                    }
                    ?>>
                    <input name="sun_from_time_am" id="basicExample24" placeholder="From AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['sun_from_time_am']; ?>">&nbsp;&nbsp;
                    <input name="sun_to_time_am" id="basicExample25" placeholder="To AM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['sun_to_time_am']; ?>">&nbsp;&nbsp;
                    <input name="sun_from_time_pm" id="basicExample26" placeholder="From PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['sun_from_time_pm']; ?>">             &nbsp;&nbsp;
                    <input name="sun_to_time_pm" id="basicExample27" placeholder="To PM" class="form-control" style="width: 120px;float: left;" type="text" value="<?php echo $x['sun_to_time_pm']; ?>">
                    </p>
              </label>
          </div>      
      </div>
<!--             <div class="form-group has-success col-md-8">
                <div>
                   <label class="control-label" for="inputSuccess1">Holiday<span style="color:red;">*</span></label></div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="datepicker" name="day_leave_start" value="<?php echo $x['day_leave_start']; ?>">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="datepicker1" name="day_leave_end" value="<?php echo $x['day_leave_end']; ?>">
                </div>
            </div>  -->           
            <div class="form-group has-success col-md-8">
                <label class="control-label" for="inputSuccess1"> Nom de l'employ&eacute;<span style="color:red;">*</span></label>
                 <input type="text" class="form-control" id="inputSuccess1" name="first_name" value="<?php echo $x['first_name']; ?>">
            </div>
            <div class="form-group has-success col-md-8">
                <label class="control-label" for="inputSuccess1"> Pr&eacute;nom de l'employ&eacute;<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="inputSuccess1" name="last_name" value="<?php echo $x['last_name']; ?>">
            </div>
            <!--<div class="form-group has-success col-md-8">
                <label class="control-label" for="inputSuccess1"> Adresse<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="inputSuccess1" name="address" value="<?php echo $x['address']; ?>">
            </div>
            <div class="form-group has-success col-md-8">
                <label class="control-label" for="inputSuccess1">Ville<span style="color:red;">*</span></label>
               <input type="text" class="form-control" id="inputSuccess1" name="city" value="<?php echo $x['city']; ?>">
            </div>-->
            <div class="form-group has-success col-md-8">
                <label class="control-label" for="inputSuccess1"> Num&eacute;ro de mobile<span style="color:red;"></span></label>
                <input type="text" class="form-control" id="inputSuccess1" name="mobile" value="<?php echo $x['mobile']; ?>">
            </div>
            <div class="form-group has-success col-md-8">
                <label class="control-label" for="inputSuccess1"> Email<span style="color:red;"></span></label>
                <input type="email" class="form-control" id="inputSuccess1" name="email" value="<?php echo $x['email']; ?>" >
            </div>   
            <!--  <div class="form-group has-success col-md-8">
                  <label class="control-label" for="inputSuccess1"> Worker Join Date<span style="color:red;">*</span></label>
                  <input type="date" class="form-control" id="inputSuccess1" name="join_date" value="<?php echo $x['join_date']; ?>">
            </div>
            <div class="form-group has-success col-md-8">
                  <label class="control-label" for="inputSuccess1"> Worker working Time<span style="color:red;">*</span></label>
                  <input type="time" class="form-control" id="inputSuccess1" name="work_time" value="<?php echo $x['work_time']; ?>">
            </div> -->
            <!--<div class="form-group has-success col-md-8">
               <label class="control-label" for="inputSuccess1"> Image<span style="color:red;">*</span></label>
               <input type="file" class="form-control" id="inputSuccess1" name="image" value="<?php echo $x['image']; ?>"><img src="/directory/uploads/<?php echo $x['image']; ?>" style="height:50px;width:50px;">
            </div>-->
               <input type="hidden" class="form-control" id="inputSuccess1" name="work_id" value="<?php echo $x['work_id']; ?>">
            </div>
            <div class="form-group has-success col-md-6">
                <button class="btn btn-danger" name="update" type="submit" style="margin-left: 20px">METTRE A JOUR</button><br/><br/>
            </div>
            <div>                     
                <?php

                 echo "</tr>";   
                 echo form_close();
       
?>            </div>
          </div>
          <div class="col-md-12" style="width: 92%;">
            <h3><u>Vacance de l'employ&eacute;</u>
            <a style="float: right; font-size: 20px;color: white" class="btn mini green" href="<?php echo base_url() ; ?>index.php/specialist1/add_worker_holliday1/<?php echo $x['work_id']; ?>">
            Ajouter vacance</a></h3>
            
            <table class="table table-striped">
              <thead>
                <tr>
                <th>Date de d&eacute;but</th>
                <th>Date de fin</th>
                <th>Modification</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                foreach($worker_holiday as $holiday){
              ?>
                  <tr>
                  <td><?php echo $holiday['day_leave_start'];?></td>
                  <td><?php echo $holiday['day_leave_end'];?></td>
                  <td>
                    <a href="<?php echo base_url() ; ?>index.php/specialist1/del_worker_holliday1/<?php echo $holiday['hid']; ?>/<?php echo $x['work_id']; ?>" class="btn btn-danger">SUPPRIMER</a>
                  </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
         <!--  <div class="col-md-12" style="width: 92%;">
            <h3><u>Services</u>
            <a style="float: right; font-size: 20px;color: white" class="btn mini green" href="<?php echo base_url() ; ?>index.php/specialist1/add_worker_service/<?php echo $x['work_id']; ?>">
            Add Services</a>
            </h3>
            <table class="table table-striped">
              <thead>
                <tr>
                <th>Service</th>
                <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                foreach($service as $serv){
              ?>
                  <tr>
                  <td><?php echo $serv->ser_name;?></td>
                  <td>
                    <a href="<?php echo base_url() ; ?>index.php/specialist1/del_worker_service/<?php echo $serv->work_service_id; ?>/<?php echo $x['work_id']; ?>" class="btn btn-danger">Delete</a>
                  </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div> -->
          <?php } ?>
        </div>
      </div>
      <a href="javascript:void(0);" class="scrollup">Scroll</a>
    </div>
  </div>
  <?php include('footer.php');?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datetimepicker/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/datetimepicker/jquery.timepicker.js"></script>
<script type="text/javascript">


 $("#datepicker").datepicker();
 $("#datepicker1").datepicker();

 $('#basicExample').timepicker();
 $('#basicExample1').timepicker();
 $('#basicExample2').timepicker();
 $('#basicExample3').timepicker(); 

 $('#basicExample4').timepicker();
 $('#basicExample5').timepicker();
 $('#basicExample6').timepicker();
 $('#basicExample7').timepicker();

 $('#basicExample8').timepicker();
 $('#basicExample9').timepicker();
 $('#basicExample10').timepicker();
 $('#basicExample11').timepicker(); 

 $('#basicExample12').timepicker();
 $('#basicExample13').timepicker();
 $('#basicExample14').timepicker();
 $('#basicExample15').timepicker();

 $('#basicExample16').timepicker();
 $('#basicExample17').timepicker();
 $('#basicExample18').timepicker();
 $('#basicExample19').timepicker(); 

 $('#basicExample20').timepicker();
 $('#basicExample21').timepicker();
 $('#basicExample22').timepicker();
 $('#basicExample23').timepicker();

 $('#basicExample24').timepicker();
 $('#basicExample25').timepicker();
 $('#basicExample26').timepicker();
 $('#basicExample27').timepicker();
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
<script src="<?php echo base_url();?>assets/js/select2.js"></script>
<script>
  $('.select2').select2();
</script>