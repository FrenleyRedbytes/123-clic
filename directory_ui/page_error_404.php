<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<body>
<div id="vfx_loader_block" style="display: none;">
  <div class="vfx-loader-item"> <img src="images/loading.gif" alt=""> </div>
</div>
<?php include('menu.php');?>s
<div id="breadcrum-inner-block">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="breadcrum-inner-header">
          <h1>Page Not Found</h1>
          <a href="index.php">Home</a> <i class="fa fa-circle"></i> <a href="page-error-404.php"><span>Page Not Found</span></a> </div>
      </div>
    </div>
  </div>
</div>

<!-- error-page -->
<div class="error-page-alt" style="background-image: url(images/error-page-bg.jpg)">
  <div class="container">
    <div class="b-title-error f-title-error"> <span class="f-primary-eb">404</span> <strong class="f-primary-l">Page Not Found !</strong> </div>
    <div class="b-error-description f-error-description"> <strong class="f-primary">Sorry, this page does not exist</strong> <span class="f-primary">The link you clicked might be corrupted, or the page may have been removed.</span> </div>
    <div class="b-error-search">
      <div class="b-form-row b-input-search">
        <input type="text" placeholder="Enter your keyword" class="form-control">
        <span class="b-btn b-btn-search f-btn-search fa fa-search"></span> </div>
    </div>
  </div>
</div>
<!-- END error-page -->

<?php include('footer.php');?>
</body>
</html>