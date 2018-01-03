<html lang="en"><head>
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
          <h1>Dashboard</h1>
          <a href="index.php">Home</a> <i class="fa fa-circle"></i> <a href="about.php"><span>Dashboard</span></a> </div>
      </div>
    </div>
  </div>
</div>
<div id="pricing-item-block" class="white_bg_block">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="col-md-12 all-categorie-list-title bt_heading_3">
          <h1>My <span>Listing</span></h1>
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
                <li><a href="edit_profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                <li class="active"><a href="my_listing.php"><i class="fa fa-list-ul"></i> My Listing</a></li>
                <li><a href="change_password.php"><i class="fa fa-key"></i> Change Password</a></li>
                <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-9 col-sm-8 col-xs-12">
            <div id="dashboard_listing_blcok">
              <div class="tg-listing">
                <div class="tg-listing-head">
                  <div class="tg-titlebox">
                    <h3>title</h3>
                  </div>
                  <div class="tg-titlebox">
                    <h3>viewed</h3>
                  </div>
                  <div class="tg-titlebox">
                    <h3>favorites</h3>
                  </div>
                  <div class="tg-titlebox">
                    <h3>Action</h3>
                  </div>
                </div>
                <div class="tg-lists">
                  <div class="tg-list">
                    <div class="tg-listbox" data-title="title"> <span class="list_user_thu"> <img src="images/img-01.jpg" alt="image description"> </span>
                      <div class="tg-listdata">
                        <h4><a href="#">joe 19s coffee</a></h4>
                        <span>Payment Mode: Paypal</span>
                        <time datetime="2016-05-04 18:30">02-Mar-2017</time>
                      </div>
                    </div>
                    <div class="tg-listbox" data-viewed="viewed"> <span>650</span> </div>
                    <div class="tg-listbox" data-favorites="favorites"> <span>1156</span> </div>
                    <div class="tg-listbox" data-action="action"> <a class="tg-btn-list" href="#"><i class="fa fa-pencil"></i></a> <a class="tg-btn-list" href="#"><i class="fa fa-trash-o"></i></a> </div>
                  </div>
                  <div class="tg-list">
                    <div class="tg-listbox" data-title="title"> <span class="list_user_thu"> <img src="images/img-02.jpg" alt="image description"> </span>
                      <div class="tg-listdata">
                        <h4><a href="#">joe 19s coffee</a></h4>
                        <span>Payment Mode: Paypal</span>
                        <time datetime="2016-05-04 18:30">02-Mar-2017</time>
                      </div>
                    </div>
                    <div class="tg-listbox" data-viewed="viewed"> <span>650</span> </div>
                    <div class="tg-listbox" data-favorites="favorites"> <span>1156</span> </div>
                    <div class="tg-listbox" data-action="action"> <a class="tg-btn-list" href="#"><i class="fa fa-pencil"></i></a> <a class="tg-btn-list" href="#"><i class="fa fa-trash-o"></i></a> </div>
                  </div>
                  <div class="tg-list">
                    <div class="tg-listbox" data-title="title"> <span class="list_user_thu"> <img src="images/img-03.jpg" alt="image description"> </span>
                      <div class="tg-listdata">
                        <h4><a href="#">joe 19s coffee</a></h4>
                        <span>Payment Mode: Paypal</span>
                        <time datetime="2016-05-04 18:30">02-Mar-2017</time>
                      </div>
                    </div>
                    <div class="tg-listbox" data-viewed="viewed"> <span>650</span> </div>
                    <div class="tg-listbox" data-favorites="favorites"> <span>1156</span> </div>
                    <div class="tg-listbox" data-action="action"> <a class="tg-btn-list" href="#"><i class="fa fa-pencil"></i></a> <a class="tg-btn-list" href="#"><i class="fa fa-trash-o"></i></a> </div>
                  </div>
                  <div class="tg-list">
                    <div class="tg-listbox" data-title="title"> <span class="list_user_thu"> <img src="images/img-04.jpg" alt="image description"> </span>
                      <div class="tg-listdata">
                        <h4><a href="#">joe 19s coffee</a></h4>
                        <span>Payment Mode: Paypal</span>
                        <time datetime="2016-05-04 18:30">02-Mar-2017</time>
                      </div>
                    </div>
                    <div class="tg-listbox" data-viewed="viewed"> <span>650</span> </div>
                    <div class="tg-listbox" data-favorites="favorites"> <span>1156</span> </div>
                    <div class="tg-listbox" data-action="action"> <a class="tg-btn-list" href="#"><i class="fa fa-pencil"></i></a> <a class="tg-btn-list" href="#"><i class="fa fa-trash-o"></i></a> </div>
                  </div>
                  <div class="tg-list">
                    <div class="tg-listbox" data-title="title"> <span class="list_user_thu"> <img src="images/img-01.jpg" alt="image description"> </span>
                      <div class="tg-listdata">
                        <h4><a href="#">joe 19s coffee</a></h4>
                        <span>Payment Mode: Paypal</span>
                        <time datetime="2016-05-04 18:30">02-Mar-2017</time>
                      </div>
                    </div>
                    <div class="tg-listbox" data-viewed="viewed"> <span>650</span> </div>
                    <div class="tg-listbox" data-favorites="favorites"> <span>1156</span> </div>
                    <div class="tg-listbox" data-action="action"> <a class="tg-btn-list" href="#"><i class="fa fa-pencil"></i></a> <a class="tg-btn-list" href="#"><i class="fa fa-trash-o"></i></a> </div>
                  </div>
                  <div class="tg-list">
                    <div class="tg-listbox" data-title="title"> <span class="list_user_thu"> <img src="images/img-02.jpg" alt="image description"> </span>
                      <div class="tg-listdata">
                        <h4><a href="#">joe 19s coffee</a></h4>
                        <span>Payment Mode: Paypal</span>
                        <time datetime="2016-05-04 18:30">02-Mar-2017</time>
                      </div>
                    </div>
                    <div class="tg-listbox" data-viewed="viewed"> <span>650</span> </div>
                    <div class="tg-listbox" data-favorites="favorites"> <span>1156</span> </div>
                    <div class="tg-listbox" data-action="action"> <a class="tg-btn-list" href="#"><i class="fa fa-pencil"></i></a> <a class="tg-btn-list" href="#"><i class="fa fa-trash-o"></i></a> </div>
                  </div>
                  <div class="tg-list">
                    <div class="tg-listbox" data-title="title"> <span class="list_user_thu"> <img src="images/img-03.jpg" alt="image description"> </span>
                      <div class="tg-listdata">
                        <h4><a href="#">joe 19s coffee</a></h4>
                        <span>Payment Mode: Paypal</span>
                        <time datetime="2016-05-04 18:30">02-Mar-2017</time>
                      </div>
                    </div>
                    <div class="tg-listbox" data-viewed="viewed"> <span>650</span> </div>
                    <div class="tg-listbox" data-favorites="favorites"> <span>1156</span> </div>
                    <div class="tg-listbox" data-action="action"> <a class="tg-btn-list" href="#"><i class="fa fa-pencil"></i></a> <a class="tg-btn-list" href="#"><i class="fa fa-trash-o"></i></a> </div>
                  </div>
                </div>
                <div class="vfx-person-block">
                  <ul class="vfx-pagination">
                    <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
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

</body>
</html>