<html lang="en">
<head>
<?php
include'db.php';
 include 'header.php'; ?>
</head>
<body>
<div id="vfx_loader_block" style="display: none;">
  <div class="vfx-loader-item"> <img src="images/loading.gif" alt=""> </div>
</div>

<?php include('menu.php');?>
<div id="vfx-search-item-inner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 vfx-search-categorie-title text-center bt_heading_3">
        <h1>Search &amp; Business <span>Listing</span></h1>
        <div class="blind line_1"></div>
        <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
        <div class="blind line_2"></div>
      </div>
      <div class="col-md-12">
        <form id="search-form">
          <div class="col-sm-9 col-md-10 nopadding">
            <div id="vfx-search-box">
              <div class="col-sm-3 nopadding">
             <select id="location-search-list" class="form-control">
                    <option>All Categories</option>
                   <?php 
                  $data=mysqli_query($con,"select * from category ORDER BY icon");
                  while($data_ar=mysqli_fetch_array($data)){
                    ?>
                    <option value="<?php echo $data_ar['cat_id']; ?>"><?php echo $data_ar['name']; ?></option>
                    <?php }  ?>
                  </select>
              </div>
              <div class="col-sm-9 nopadding">
                <div class="form-group">
                  <input id="search-data" class="form-control" name="search" placeholder="Enter Keyword" required="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-2 text-right nopadding-right">
            <div id="vfx-search-btn">
              <button type="submit" id="search"><i class="fa fa-search"></i>Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="all-categorie-item-block">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="col-md-12 all-categorie-list-title bt_heading_3">
          <h1>Directory <span>Categorie</span></h1>
          <div class="blind line_1"></div>
          <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
          <div class="blind line_2"></div>
        </div>

        <div id="search-categorie-item">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="row">
          <div class="col-md-12 categories-heading bt_heading_3">
           <!--  <h1>Directory <span>Categorie</span></h1> -->
            <div class="blind line_1"></div>
            <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
            <div class="blind line_2"></div>
          </div>
          <?php 
                  $data1=mysqli_query($con,"select * from category");
                  while($data_ar1=mysqli_fetch_array($data1)){
                    ?>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="categorie_item">
              <div class="cate_item_block hi-icon-effect-8">
                <div class="cate_item_social hi-icon"><i class="<?php echo $data_ar1['icon']; ?>"></i></div>
                <h1><a href="listing_detail.php"><?php echo $data_ar1['name']; ?></a></h1>
              </div>
            </div>
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
<?php include('footer.php');?>

</body></html>