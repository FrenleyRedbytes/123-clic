<div id="slider-banner-section" style="height: 200px; display: block;">
  <div class="container">
    <div class="row" style="margin-top: 11px;">
      <div class="col-sm-12 text-center">
        <div class="col-sm-3 col-xs-9">
        <div id="logo"> 
        <a href="index.php"><img src="images/logo.png" alt="logo" style="height: 100px"></a> 
        <p><h6 style="text-transform:uppercase;color:#fff;font-family:Ariel;">123 clic</h6></p>
        </div>
      </div>
      <div class="col-sm-9 text-right">
        <nav class="navbar navbar-default">
          <div class="navbar-header" style="margin-top: 24px;">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#thrift-1" aria-expanded="false"> <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="collapse navbar-collapse" id="thrift-1"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
            <div id="nav_menu_list">
             <ul >
              <?php if (!isset($_SESSION['email'])) {?>
              <li>
                  <a href="aboutpro.php" style="text-transform:lowercase !important;"> 
                    <i class="fa fa-space-shuttle" aria-hidden="true"></i>
                    <br/>Espace pro
                  </a>
              </li> 
              <span class="btn_item">
                <li>
                  <button class="btn_login" data-toggle="modal" data-target="#login">S'identifier</button>
                </li>
                <li>
                  <button class="btn_register" data-toggle="modal" data-target="#register">S'enregistrer</button>
                </li>
              </span>
              <?php } else{?>
                  <li>
                  <a href="addEditUser.php" style="text-align:center;text-transform:lowercase !important;"> <i class="fa fa-user" aria-hidden="true"></i><br/>my account</a>
                </li>
                <li>
                  <a href="fav_list.php" style="text-align:center;text-transform:lowercase !important;"> <i class="fa fa-heart" aria-hidden="true"></i><br/>my favories</a>
                </li>
                <li>
                  <a href="aboutpro.php" style="text-align:center;text-transform:lowercase !important;"> 
                    <i class="fa fa-space-shuttle" aria-hidden="true"></i>
                    <br/>Espace pro
                  </a>
              </li> 
              <?php 
                }
              ?>
              </ul>
            </div>
          </div>
        </nav>
      </div>

        <div id="row" style="margin-top:11em;">
          
        </div>

      </div>
    </div>
  </div>
</div>

