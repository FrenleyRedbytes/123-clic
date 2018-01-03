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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div id="content">
      <div class="container"><br><br><br><br>
        <h3>D&eacute;tail du sp&eacute;cialiste</h3>
          <ul class="nav nav-tabs" style="width: 80%;">
            <li class="active"><a data-toggle="tab" href="#home">Employ&eacute;s</a></li>
            <li><a data-toggle="tab" href="#menu1">Services</a></li>
            <li><a data-toggle="tab" href="#menu2">R&eacute;servation Pass&eacute;</a></li>
            <li><a data-toggle="tab" href="#menu3">R&eacute;servation futur</a></li>
          </ul>

          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
              <font size="5"><h3>Employés</h3></font>
              <div class="row">
                <div class="col-md-12" style="width: 80%;">
                    <div class="portlet-body">
                      <table id="example" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                          <tr>
                           <th>Employés</th>
                         </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Employés</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                              foreach ($res as $r) {?>
                                 <tr><td><?php echo ucfirst($r->first_name).' ',ucfirst($r->last_name).'<br/>'; ?></td></tr>                
                             <?php }
                            ?>
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
            <div id="menu1" class="tab-pane fade">
              <font size="5"><h3>Services</h3></font>
              <div class="row">
                <div class="col-md-12"  style="width: 80%;">
                    <div class="portlet-body">
                      <table id="example" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                          <tr>
                           <th>Service</th>
                         </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Service</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                              foreach ($res1 as $r1) {?>
                                 <tr><td><?php echo $r1->ser_name; ?></td></tr>                
                             <?php }
                            ?>
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
            <div id="menu2" class="tab-pane fade">
              <h3>R&eacute;servation pass&eacute;</h3>
              <div class="row">
                <div class="col-md-12"  style="width: 80%;">
                    <div class="portlet-body">
                      <table id="example" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                          <tr>
                           <th>Service</th>
                           <th>Date de r&eacute;servation </th>
                           <th>Heure de r&eacute;servation</th>
                         </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Service</th>
                            <th>Booking Date de r&eacute;servation </th>
                            <th>Heure de reservation</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <?php      
                              date_default_timezone_set('Asia/Calcutta');
                            $date= strtotime(date("Y-m-d H:i:s"));
                            foreach($res2 as $row){
                              $checkDbDate=strtotime($row->date_booking.' '.$row->time_booking);
                                if($date>=$checkDbDate){
                                 ?>
                                <tr>
                                <td><?php echo $row->ser_name; ?></td>
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
            <div id="menu3" class="tab-pane fade">
              <h3>Futur r&eacute;servation</h3>
               <div class="row">
                <div class="col-md-12"  style="width: 80%;">
                    <div class="portlet-body">
                      <table id="example" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                          <tr>
                           <th>Service</th>
                           <th>Date de r&eacute;servation </th>
                           <th>Heure de r&eacute;servation</th>
                         </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Service</th>
                            <th>Date de r&eacute;servation </th>
                            <th>Heure de r&eacute;servation</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <?php  
                              date_default_timezone_set('Asia/Calcutta');
                              $date= strtotime(date("Y-m-d H:i:s"));
                            foreach($res2 as $row){
                               $checkDbDate=strtotime($row->date_booking.' '.$row->time_booking);
                                if($date<=$checkDbDate){
                              ?>
                                <tr>
                                <td><?php echo $row->ser_name; ?></td>
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
  </body>
</html>    
    <?php include('footer.php');?>

