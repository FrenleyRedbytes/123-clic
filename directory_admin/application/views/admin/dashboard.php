<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>ACCUEIL</title>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
          <!-- <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
              <li class="current">
                <i class="fa fa-home"></i>Dashboard
              </li>
            </ul>
          </div> -->
          <div class="page-header">
            <div class="page-title">
              <h3>ACCUEIL</h3>

<p style="font-size:24px;top:20px; position:relative;">Bienvenue dans la partie accueil de<?php echo $this->session->userdata('email'); ?></p>
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
      
     

   var dps = <?php //echo $data; ?>;

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