
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>User</title>
      <style type="text/css">
        .canvasjs-chart-credit {
   display: none;
}
      </style>
    </head>
    <body>
      <!-- Start : Side bar -->
      <?php 
         include('header.php');
         include('sidebar.php'); 
         ?>
      <!-- End : Side bar -->
      <div id="content">
        <!-- Start : Inner Page Content -->
        <div class="container">
          <!-- Start : Inner Page container -->
          <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
              <li class="current">
                <i class="fa fa-home"></i>Popularit&eacute des Sous-Cat&eacutegories
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Popularit&eacute des Sous-Cat&eacutegories</h3>
           </div>
          </div>
            <form action="" method="POST" enctype="multipart/form-data" >

                      <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1"> S&eacutelectionner une Sous-Cat&eacutegorie<span style="color:red;">*</span></label>
                         <select class="form-control" name="category" required >
                         <?php  $sql_con = mysqli_query($con,"SELECT * FROM sub_category order by id desc");
                               $count = 0;
                               while($row_con = mysqli_fetch_array($sql_con))
                               {
                                    echo"<option value='".$row_con['id']."'>".$row_con['name']."</option>";
                               }
                          ?>
                                
                         </select>
                       </div>

                       <div class="form-group has-success col-md-6">
                          <button class="btn btn-danger" name="add_category" type="submit">Afficher</button><br/><br/>
                      </div>
                </form>
          <div class="row">

        
            <div class="col-md-12">

            <div id="chartContainer" style="height: 300px; width: 70%; float: left;">
           </div>
           
             
            </div>
          </div>
        </div>
      </div>
      <a href="javascript:void(0);" class="scrollup">Scroll</a>
    </div>
  </div>

  


  <?php include('footer.php');?>

    <script type="text/javascript">
  window.onload = function () {
    
    //initial value of dataPoints 
      
     <?php 

            if(isset($_POST['category']))
              {

               $cat= $_POST['category']; 

               $tutor_info1=mysqli_query($con,"SELECT * FROM sub_category WHERE `id`='$cat' ");
              $tutor_info11 = mysqli_fetch_array($tutor_info1);
              $cat_name=$tutor_info11['name'];

             $sql_con = mysqli_query($con,"SELECT count(*) as coun,status FROM image_status where `sub_cat_id`='$cat' GROUP BY status");
                               $count = 0;
                               while($row_con = mysqli_fetch_array($sql_con))
                               {  
                                    $month_count= (int) $row_con['coun'];
                                  $arrayName[] = array('label' =>$row_con['status'] ,'legendText' =>$row_con['status'] , 'y' =>$month_count);
                               }

                              $data= json_encode($arrayName);

              }
                              

    ?>

   var dps = <?php echo $data; ?>;

   var chart = new CanvasJS.Chart("chartContainer",
  {
    title:{
      text: "<?php if(isset($_POST['category'])){ echo $cat_name; } ?>"
    },
                animationEnabled: true,
    legend:{
      verticalAlign: "center",
      horizontalAlign: "left",
      fontSize: 20,
      fontFamily: "Helvetica"        
    },
    theme: "theme2",
    data: [
    {        
      type: "pie",       
      indexLabelFontFamily: "Garamond",       
      indexLabelFontSize: 20,
      indexLabel: "{label} {y}",
      startAngle:-20,      
      showInLegend: true,
      toolTipContent:"{legendText} {y}",
      dataPoints: dps
    }
    ]
  });

      chart.render();

  }
  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js"></script>
</body>
</html>