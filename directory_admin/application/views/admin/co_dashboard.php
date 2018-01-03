
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>Tableau de Bord</title>
      <style type="text/css">
        .canvasjs-chart-credit {
   display: none;
}
      </style>
    </head>
    <body>
      <!-- Start : Side bar -->
      <?php 
         include('coheader.php');
         include('cosidebar.php'); 
         ?>
      <!-- End : Side bar -->
      <div id="content">
        <!-- Start : Inner Page Content -->
        <div class="container">
          <!-- Start : Inner Page container -->
          <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
              <li class="current">
                <i class="fa fa-home"></i>Tableau de Bord
              </li>
            </ul>
          </div>
          <div class="page-header">
            <div class="page-title">
              <h3>Tableau de Bord</h3>


            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

            <div id="chartContainer" style="height: 300px; width: 70%;">
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
          $sql_con = mysqli_query($con,"SELECT count(*) as month_count, DATE(created_at) as dat, MONTHNAME(created_at) as mon,YEAR(created_at)FROM user GROUP BY date(created_at),YEAR(created_at)");
                               $count = 0;
                               while($row_con = mysqli_fetch_array($sql_con))
                               {  
                                    $month_count= (int) $row_con['month_count'];
                                  $arrayName[] = array('label' =>$row_con['dat'] , 'y' =>$month_count);
                               }

                              $data= json_encode($arrayName);
                              

    ?>

   var dps = <?php echo $data; ?>;

    var dps111 = [
    {label: "Jan", y: 206},
    {label: "Feb", y: 163},
    {label: "Mar", y: 154},
    {label: "Apr", y: 176},
    {label: "May", y: 184},
    {label: "Jun", y: 122}
    ];  

    console.log(dps);
    console.log(dps111);

    var chart = new CanvasJS.Chart("chartContainer",{     
      title: {
        text: "User Growth"    
      },
      axisY: {        
        suffix: " User"
      },    
      legend :{
        verticalAlign: 'bottom',
        horizontalAlign: "center"
      },
      data: [
      {
        type: "column", 
        bevelEnabled: true,       
        indexLabel: "{y} User",
        dataPoints: dps,         
      }
      ]
    });

      chart.render();

  }
  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js"></script>
</body>
</html>