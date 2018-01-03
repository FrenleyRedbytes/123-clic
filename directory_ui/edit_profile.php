
<html lang="en">
<head>
<?php include 'header.php'; ?> 
</head>
<body>
<div id="vfx_loader_block" style="display: none;">
  <div class="vfx-loader-item"> <img src="images/loading.gif" alt=""> </div>
</div>
<?php include('menu.php');?>
<div id="breadcrum-inner-block">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <div class="breadcrum-inner-header">
          <h1>Edit Profile</h1>
          <a href="index.php">Home</a> <i class="fa fa-circle"></i> <a href="about.php"><span>Edit Profile</span></a> </div>
      </div>
    </div>
  </div>
</div>
<div id="pricing-item-block" class="white_bg_block">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="col-md-12 all-categorie-list-title bt_heading_3">
          <h1>Edit <span>Profile</span></h1>
          <div class="blind line_1"></div>
          <div class="flipInX-1 blind icon"><span class="icon"><i class="fa fa-stop"></i>&nbsp;&nbsp;<i class="fa fa-stop"></i></span></div>
          <div class="blind line_2"></div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-4 col-xs-12">
            <div id="leftcol_item">
              <div class="user_dashboard_pic"> <img alt="user photo" src="images/user-profile.png"> <span class="user-photo-action">Click here to Reupload</span> </div>
            </div>
            <div class="dashboard_nav_item">
              <ul>
                <li><a href="dashboard.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                <li><a href="listing_submit.php"><i class="fa fa-pencil"></i> Submit Listing</a></li>
                <li class="active"><a href="edit_profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                <li><a href="my_listing.php"><i class="fa fa-list-ul"></i> My Listing</a></li>
                <li><a href="change_password.php"><i class="fa fa-key"></i> Change Password</a></li>
                <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-9 col-sm-8 col-xs-12">
            <div id="submit_listing_box">
              <h3>Contact Information</h3>
              <form class="form-alt">
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Name <span>*</span></label>
                    <input placeholder="Name" required="" class="form-control" type="text">
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Surname <span>*</span></label>
                    <input placeholder="Surname" required="" class="form-control" type="text">
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>E-Mail <span>*</span></label>
                    <input placeholder="Email" required="" class="form-control" type="text">
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Phone <span>*</span></label>
                    <input placeholder="Phone" required="" class="form-control" type="text">
                  </div>
                </div>
              </form>
            </div>
            <div id="submit_listing_box">
              <h3>Social Connections</h3>
              <form class="form-alt">
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Facebook :-</label>
                    <input class="form-control" value="http://facebook.com/" type="text">
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Twitter :-</label>
                    <input class="form-control" value="http://twitter.com/" type="text">
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Linkedin :-</label>
                    <input class="form-control" value="http://linkedin.com/" type="text">
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Dribble :-</label>
                    <input class="form-control" value="http://dribble.com/" type="text">
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Instagram :-</label>
                    <input class="form-control" value="http://insatgram.com/" type="text">
                  </div>
                </div>
              </form>
            </div>
            <div id="submit_listing_box">
              <h3>Address</h3>
              <form class="form-alt">
                <div class="row">
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Name :-</label>
                    <input class="form-control" value="New York" type="text">
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>City :-</label>
                    <input class="form-control" value="New York City" type="text">
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label>Street :-</label>
                    <input class="form-control" value="Everton Eve" type="text">
                  </div>
                  <div class="form-group col-md-3 col-sm-12 col-xs-12">
                    <label>House Number :-</label>
                    <input class="form-control" value="12345" type="text">
                  </div>
                  <div class="form-group col-md-3 col-sm-12 col-xs-12">
                    <label>Zip :-</label>
                    <input class="form-control" value="121211" type="text">
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label>Address :-</label>
                    <textarea placeholder="Address..." class="form-control" rows="5"></textarea>
                  </div>
                </div>
              </form>
            </div>
            <div id="submit_listing_box">
              <h3>Upload Photo</h3>
              <div class="fileupload_block">
                <input type="file" name="fileupload" value="fileupload" id="fileupload">
                <div class="fileupload_img"> <img type="image" src="images/add_image.png" alt="add image"> </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="from-list-lt">
              <div class="form-group">
                <button class="btn pull-right" type="submit">Submit</button>
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