<?php
  include('header.php');
  include('sidebar.php'); 
?>  
<link href='<?php echo base_url(); ?>assets/calender/fullcalendar.min.css' rel='stylesheet' />
<link href='<?php echo base_url(); ?>assets/calender/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datetimepicker/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datetimepicker/jquery.timepicker.css"/>

<style type="text/css">
  
.my_table{
  width: 100%; background: none;
}

.head_div{
  width: 100%; background: none; text-align: center; position: relative;
}

.head_part{
  width: 30%; float: none; display: inline-block; position: relative;;
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
  background-color: #f00 !important; color: #fff !important;
}

.body_row{
  width: 33%;
  background: none;
  float:left;
}

</style>
<div id="content">
    <div class="container">
<br><br>
        <div class="row">
            <?php echo form_open_multipart('booking/addcomment'); ?>
            <div class="col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="fa fa-table"></i>Add Comment</div>
                        <div class="actions">
                            <div class="btn-group">
                                <!-- <button class="btn btn-group" type="button" onclick="showdiv();">Add Booking</button> -->
                            </div>
                        </div>
                    </div>                    
                    <div class="portlet-body">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                <br>
                <?php $lastid=$this->uri->segment(3); ?>

                <h4 style="float: left;">Select Worker:</h4>
                <input type="hidden" name="lastid" value="<?php echo $lastid; ?>">
                <select class="spel_select form-control" name="worker" required="" style="width: 40%;margin-left: 15%;">
                <option value="">Select Worker</option>  
                <?php          
                foreach($wrk as $serv){
                ?>
                <option value="<?php echo $serv['work_id'];?>"><?php echo $serv['first_name'];?>&nbsp;<?php echo $serv['last_name'];?></option>
                <?php }?>             
                </select> 
                            </div>
                            <hr>
                            <div class="col-sm-12"> 
                             <h4>Comment:</h4> 
                            <textarea class="form-control" id="exampleTextarea" name="comment" rows="8" placeholder="Please Type here text..." style="margin-top: 1%;" required=""></textarea>
                            </div>
                        </div>
                                <br><br>
                                <p align="right">
                                <button type="submit" class="btn btn-primary" name="add_booking">Continue</button></p>
                    </div>
                </div>
            </div>
            <?php
              echo form_close();
            ?>
        </div>
    </div>
    <a href="javascript:void(0);" class="scrollup">Scroll</a>
</div>
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js' type="text/javascript"></script>
<script src='<?php echo base_url(); ?>assets/calender/moment.min.js' type="text/javascript"></script>
<script src='<?php echo base_url(); ?>assets/calender/jquery.min.js' type="text/javascript"></script>
<script src='<?php echo base_url(); ?>assets/calender/fullcalendar.min.js' type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/datetimepicker/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/datetimepicker/jquery.timepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/jquery.event.move.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/lodash.compat.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/respond.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/excanvas.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/breakpoints.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/common/touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/DataTables/js/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/plugins.js"></script>
<script>
    $(document).ready(function() {
        App.init();
        DataTabels.init();
    });
</script>
</body>
</html>