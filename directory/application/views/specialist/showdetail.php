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
.Specialist_block{
  width: 100%;
  background: none;
  padding: 10px 0px;
}
textarea.form-control{
  height: auto;
  width: 50%;
  margin: 0px auto;
  max-width: 50%;
  max-height: 300px;
}
.Specialist_block button{
  width: 200px !important;
}
.Specialist_block img{
  width: 200px;
  height: 200px;
  border-radius: 50%;
  display: block;
  margin: 0px auto;
}
.Specialist_block h2{
  text-align: center;
  font-size: 27px;
  margin:15px 0px;
}
.Specialist_block ul{
  margin: 0px auto;
  padding: 0px;
  list-style: none;
}
.Specialist_block li{
  font-size: 15px;
  text-align: center;
  float: none;
  line-height: 30px;
  color: #333;
}
.Specialist_block h3{
  text-align: center;
  font-size: 20px;
  margin:10px 0px;
  margin-top: 30px;
}
.Specialist_block p{
  text-align: center;
  font-size: 15px;
  margin:10px 0px;
}
</style>
<?php 
  include('header.php');
  include('sidebar.php'); 
?> 
<div id="content"> 
  <div class="container"> 
      <div class="page-header">  
          <div class="page-title">
              <!-- <h3 style="color: #850035;margin-bottom: -10%">Booking Detail</h3> -->
          </div>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-table"></i>Booking Detail</div>
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
                            <?php foreach($det as $data_ar1){ ?>
                              <div class="Specialist_block">
                              <?php echo form_open_multipart('booking/addbookingupdate'); ?>
                              <span><img src="/directory_admin/uploads/<?php echo $data_ar1['brand_logo']; ?>" class="inside"></span>
                              <h2><?php echo $data_ar1['brand_name']; ?></h2>
                              <ul>
                              <li><?php echo $data_ar1['disc']; ?></li>
                              <li><?php echo $data_ar1['address']; ?></li>
                              <li> Tel: <?php echo $data_ar1['contact']; ?></li>
                              </ul>
                              <h3> Presantation Selectionne </h3>
                              <p><?php echo ucfirst($data_ar1['ser_name']); ?></p>
                              <p>
                              <input type="hidden" name="last_id" value="<?php echo $data_ar1['booking_id']; ?>">
                                 <select class="spel_select form-control" name="worker" style="width: 50%;margin-left: 25%;">
                                <option value="">Select Worker</option>  
                                <?php          
                                foreach($wrk as $serv){
                                ?>
                                <option value="<?php echo $serv['work_id'];?>"><?php echo $serv['first_name'];?>&nbsp;<?php echo $serv['last_name'];?></option>
                                <?php }?>             
                                </select>  
                              </p>
                              <p>
                              <textarea class="form-control" id="exampleTextarea" name="comment" rows="8" placeholder="Please Type here text..." style="margin-top: 1%;" ></textarea>
                              </p>
                              <p>
                              <input class="form-control" type="text" placeholder="Enter user name" id="exampleTextarea" name="name" rows="8" style="margin-top: 1%;width: 50%;
                              margin-left: 25%;
                              " required="">
                              </p>
                              <p>
                              <input class="form-control"  type="text" placeholder="Enter Mobile Number" id="exampleTextarea" name="mobile" rows="8" style="margin-top: 1%;width: 50%;
                              margin-left: 25%;
                              " required="">
                              </p>
                              <p>
                              <input class="form-control"  type="email" placeholder="Enter Email" id="exampleTextarea" name="email" rows="8" style="margin-top: 1%;width: 50%;
                              margin-left: 25%;
                              " required="">
                              </p>

                              <h3> Date et Heure: </h3>
                              <p> <?php
                              echo date("l", strtotime($data_ar1['date_booking']))."&nbsp;";
                              $da=$data_ar1['date_booking'];
                              echo date("d F Y", strtotime($da)); ?> on 
                              <?php
                              echo $this->session->userdata('time_show');
                              ?> 
                              </p>
                              <h3> Prix: <?php echo $data_ar1['price'];?>$ttc </h3>
                              <p> <?php
                              echo date("l", strtotime($data_ar1['date_booking']))."&nbsp;";
                              $da=$data_ar1['date_booking'];
                              echo date("d F Y", strtotime($da)); ?> on 
                              <?php
                              echo $this->session->userdata('time_show');
                              ?> 
                              </p>
                              <!-- <form method="post"> -->
                               
                              <p align="center">
                              <a href="<?php echo base_url(); ?>index.php/booking/"> <button type="button" class="btn btn-primary"> Annuler </button></a>
                             <button type="submit" class="btn btn-primary" name="add_booking"> Confirmer </button>
                              </p>
                              <?php echo form_close();?>
                              <!-- </form> -->
                              </div> 
                              <?php } ?> 
                            </div>                           
                        </div>
                    </div>
                  </div>
                </div>
      </div>
  </div>
 </div>
</div>  
<?php include 'footer.php'; ?>
