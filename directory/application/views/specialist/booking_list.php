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
<?php 
  include('header.php');
  include('sidebar.php'); 
?> 
<div id="content"> 
  <div class="container"> 
      <div class="page-header">  
          <div class="page-title">
              <h3 style="color: #850035;margin-bottom: -10%">Rendez vous du Professionnel</h3>
          </div>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-table"></i>D&eacute;tail des r&eacute;servations</div>
                <div class="actions">
                    <div class="btn-group">
                       <a class="btn mini green" href="<?php echo base_url() ; ?>index.php/booking">
                              <i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter une r&eacute;servation
                          </a>
                       </div>
                </div>
            </div>
         <div class="portlet-body" >
                  <div class="container">
                      <ul class="nav nav-tabs" style="width: 80%;">
                        <li><a data-toggle="tab" href="#home">R&eacute;servation pass&eacute;</a></li>
                        <li><a data-toggle="tab" href="#menu1">R&eacute;servation futur</a></li>
                      </ul>
                      <div class="tab-content">
                          <div id="home" class="tab-pane fade in active">
                            <!-- <font size="5"><h3>Past Booking</h3></font> -->
                            <div class="row">
                              <div class="col-md-12" style="width: 80%;">
                                  <div class="portlet-body">
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0">
                                      <thead>
                                        <tr>
                                         <th>Service</th>
                                         <th>Prix</th>
                                         <th>Temps</th>
                                         <th>Date de la r&eacute;servation </th>
                                         <th>Heure de la r&eacute;servation</th>
                                       </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <th>Service</th>
                                         <th>Prix</th>
                                         <th>Temps</th>
                                          <th>Date de la r&eacute;servation </th>
                                          <th>Heure de la r&eacute;servation</th>
                                      </tr>
                                      </tfoot>
                                      <tbody>
                                          <?php      
                                          $date= strtotime(date("Y-m-d H:i:s"));          
                                            date_default_timezone_set('Asia/Calcutta');
                                            // $date=date('Y-m-d H:i')."<br>";
                                            // $time=date('H:i:s');
                                          foreach($list as $row){
                                            $checkDbDate=strtotime($row->date_booking.' '.$row->time_booking);
                                              if($date>=$checkDbDate){
                                                // echo$row->date_booking;
                                            // if ($row->date_booking<=$date) {
                                            //   if ( $row->time_booking<=$time) {
                                              // echo$row->date_booking.' '."hi".'  '.$row->time_booking.'<br>';
                                                ?>
                                              <tr>
                                              <td><?php echo $row->ser_name; ?></td>
                                              <td><?php echo $row->price; ?></td>
                                              <td><?php echo $row->time; ?></td>
                                              <td><?php echo $row->date_booking; ?></td>
                                              <td><?php echo $row->time_booking; ?></td>
                                            </tr>
                                            <?php }
                                            } ?>
                                      </tbody>
                                    </table>
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div id="menu1" class="tab-pane fade">
                            <!-- <font size="5"><h3>Future Booking</h3></font> -->
                            <div class="row">
                              <div class="col-md-12"  style="width: 80%;">
                                  <div class="portlet-body">
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0">
                                      <thead>
                                        <tr>
                                         <th>Service</th>
                                         <th>Prix</th>
                                         <th>Temps</th>
                                         <th>Date de la r&eacute;servation </th>
                                         <th>Heure de la r&eacute;servation</th>
                                       </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <th>Service</th>
                                         <th>Prix</th>
                                         <th>Temps</th>
                                          <th>Date de la r&eacute;servation </th>
                                          <th>Heure de la r&eacute;servation</th>
                                      </tr>
                                      </tfoot>
                                      <tbody>
                                          <?php  
                                            date_default_timezone_set('Asia/Calcutta');
                                            $date= strtotime(date("Y-m-d H:i:s"));                        
                                            // $date=date('Y-m-d H:i')."<br>";
                                            // $time=date('H:i:s');
                                          foreach($list as $row){
                                             $checkDbDate=strtotime($row->date_booking.' '.$row->time_booking);
                                              if($date<=$checkDbDate){
                                                $row->date_booking;
                                            // if ($row->date_booking>=$date) {
                                            //   if ( $row->time_booking>=$time) {
                                            //   $row->date_booking.' '."hi".'  '.$row->time_booking.'<br>';?>
                                              <tr>
                                              <td><?php echo $row->ser_name; ?></td>
                                              <td><?php echo $row->price; ?></td>
                                              <td><?php echo $row->time; ?></td>
                                              <td><?php echo $row->date_booking; ?></td>
                                              <td><?php echo $row->time_booking; ?></td>
                                            </tr>
                                            <?php }
                                            }
                                          ?>
                                      </tbody>
                                    </table>
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
</div>  
<?php include 'footer.php'; ?>