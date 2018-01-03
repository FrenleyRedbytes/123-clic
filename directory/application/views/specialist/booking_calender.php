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
.my_table{
  width: 100%; background: none;display: grid;
}
.head_div{
  width: 100%; background: none; text-align: center; position: relative;
}
.head_part{
  width: 30%; display: inline-block; position: relative;;
}
.head_part h3{
  text-align: center; font-size: 16px; margin: 10px 0px; color: #333; line-height: 25px
}
.body_div{
  width: 100%; background: none; text-align: center; padding: 10px 0px; border-top: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; overflow: auto; height: 220px;
}
.body_part{
  width: 100%; float: none; display: inline-block;
}
.body_part button{
  background: #95e8e1; border-radius: 5px !important; font-weight: bold !important; width: 125px !important; margin: 5px auto !important; display: block !important; padding: 10px 0px; border: none
}
.table_icon{
  width: 20px; height: 30px;  display: inline-block; position: absolute; top: 21px; cursor: pointer;
}
.table_icon img{
  width: 100%;
  display: block;
  margin: 0px auto;
}
.left{
  left:0px;
}
.right{
  right:0px;
}
.active{
  /*background-color: #f00 !important; color: #fff !important;*/
}
.body_row{
  width: 33%;
  background: none;
  float:left;
}
</style>
<?php 
  include('header.php');
  include('sidebar.php'); 
?> 
<link href='<?php echo base_url(); ?>assets/calender/fullcalendar.min.css' rel='stylesheet' />
<link href='<?php echo base_url(); ?>assets/calender/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datetimepicker/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datetimepicker/jquery.timepicker.css"/>
<div id="content"> 
  <div class="container"> 
      <div class="page-header">  
          <div class="page-title">
              <h3 style="color: #850035;margin-bottom: -10%">Ajouter une r&eacute;servation</h3>
          </div>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-table"></i>Ajouter une r&eacute;servation</div>
                <div class="actions">
                    <div class="btn-group">
                      <!--  <a class="btn mini green" href="<?php echo base_url() ; ?>index.php/booking">
                              <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Booking 
                          </a> -->
                       </div>
                </div>
            </div>
         <div class="portlet-body" >
                  <div class="container">
                     
                        <div class="portlet-body">
                          <div class="col-sm-12">
                          <div class="col-sm-12">
                          <div style="margin-left: 30%;">
                          <input type="hidden" name="date" id="date_show" value="">
                          <input type="hidden" name="time" id="time_show" value="">
                          <br>
                          <?php 
                          $spe_id=$this->session->userdata('id');
                          ?>
                          <h4 style="float: left;">Selectionner un service:&nbsp;&nbsp;&nbsp;</h4>
                          <select class="spel_select form-control" name="service" required="" style="width: 40%;margin-left: 15%;" onchange="calen(<?php echo $spe_id; ?>,this.value);">

                          <option value="">Selectionner un service</option>  
                          <?php          
                          foreach($ser as $serv){
                          ?>
                          <option value="<?php echo $serv['ser_detail_id'];?>"><?php echo $serv['ser_name'];?></option>
                          <?php }?>              
                          </select> 
                          </div><br><br>
                          </div>
                          <span id="demo" style="color: red;"></span>                            
                          <div class="col-xs-12" id="city" >     
                          <div>
                          <!-- <img style="margin-left: 28%;margin-top: 4%;" src="<?php echo base_url(); ?>img/calender.PNG" onclick="service_select();"> -->
                          <center><p  style="font-family: sans-serif;">
                          Le premier rendez vous disponible <b><font size="5"  style="color: black;">
                          <?php  date_default_timezone_set('Asia/Calcutta');
                          echo $date=date('d F Y'); echo "&nbsp;".$date=date('H:ia');?></font></b><br><br><br>
                          S&eacute;lectionnez le service pour v&eacute;rifier le calendrier.
                          </p></center>
                          </div>  
                          </div>
                          </div>
                        </div>
                  </div>
                </div>
      </div>
  </div>
 </div>
</div>  
<div class="modal fade" id="modalForm" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Rendez-vous r&eacute;serv&eacute;

              </h4>
              <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Fermer</span>
              </button>
          </div>
          <div class="modal-body">
              <p class="statusMsg"></p>
              <form role="form" id="frm1">
                 <table class="table table-bordered table-hover DynamicTable">
                      <thead>
                          <tr>
                              <th class="numeric">Nom</th>
                              <th class="numeric">Adresse</th>
                              <th class="numeric">Num&eacute;ro mobile</th>
                              <!-- <th class="numeric">Comment</th> -->
                              <th class="numeric">Service</th>
                              
                          </tr>
                      </thead>
                      <tbody id="databooked"> 
                         
                      </tbody>
                  </table>
              </form>
          </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
      </div>
  </div>
</div>
<?php include 'footer.php'; ?>

                  <script type="text/javascript">
                      function calen(spe_id,val){
                          $.ajax({                         
                          type: "GET",
                          url: '<?php echo base_url('index.php/booking/firstview');?>/'+spe_id+'/'+val,
                          success: function(data){
                          document.getElementById("demo").innerHTML = "";
                          // console.log(data);
                          $('#city').html(data);
                          }
                          });
                      }
                      function valid(day,date,time,spe_id,service){
                      $.ajax({
                      type: "GET",
                      url: '<?php echo base_url('index.php/booking/firstviewinsert');?>/'+date+'/'+time+'/'+spe_id+'/'+service,
                      success: function(data){
                        // console.log(data);
                      response1=JSON.parse(data);
                      var last_id=response1.last_id;
                      if(response1.chk=='true'){
                        window.location = '<?php echo base_url('index.php/booking/showdetail');?>/'+last_id
                      }else{
                        document.getElementById('demo').innerHTML="Something is wrong";
                      }
                      }
                      });
                      }
                      function right(date1,spe_id,ser_id){ 
                        $.ajax({
                        type: "GET",
                        url: '<?php echo base_url('index.php/booking/rightside');?>/'+date1+'/'+spe_id+'/'+ser_id,
                        success: function(data){
                        $('.my_table').html(data);
                        }
                        });
                      }  
                      function left(date1,spe_id,ser_id){
                        $.ajax({
                        type: "GET",
                         url: '<?php echo base_url('index.php/booking/leftside');?>/'+date1+'/'+spe_id+'/'+ser_id,
                        success: function(data){
                        
                        $('.my_table').html(data);
                        }
                        });
                      }  

                      function bookedEntry(spe_id,ser_id){
                        var a='<?php echo base_url('index.php/booking/bookedEntry');?>/'+spe_id+'/'+ser_id;
                        // console.log(a);
                        $.ajax({
                        type: "GET",
                         url: '<?php echo base_url('index.php/booking/bookedEntry');?>/'+spe_id+'/'+ser_id,
                        success: function(data){    
                        // console.log(data);                    
                        $('#modalForm').modal('show');
                        $('#databooked').html(data);
                        }
                        });
                      }
                  </script>
            <script type="text/javascript">
            $('.body_part button').on('click', function(){
            $('.body_part button').removeClass('active');
             $(this).addClass('active');
            })
            </script>
            <script type="text/javascript">
            $('.body_part button').on('click', function(){
            $('.body_part button').removeClass('active');
            $(this).addClass('active');
            })
            </script>
