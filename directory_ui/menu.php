
<script type="text/javascript">
  function getsubcat(val) {
        document.getElementById('value').value=val;
        $.ajax({
        type: "POST",
        url: "get_subcat.php",
        data: "cat_id=" + val,
        success: function (response){ 
         response1=JSON.parse(response);
         if(response1.chk=='true'){
            $('#subcat').html(response1.subcategory);
            document.getElementById("subcat").disabled = false;
         }else{
            document.getElementById("subcat").disabled = true;
            document.getElementById("subcat").options.length=0;
            var sub=0;
                  $.ajax({
                  type: "POST",
                  url: "get_service.php",
                  data: "subcat_id="+sub+"&cat_id="+val,
                  success: function (response){   
                  console.log(response); 
                  $('#service').html(response);
                  }
                  });                  
         }
        }
        });
  }

  function getservice(val) {
        var cat_id=document.getElementById('value').value;
        $.ajax({
        type: "POST",
        url: "get_service.php",
        data: "subcat_id=" + val+ "&cat_id="+cat_id,
        success: function (response){   
        console.log(response); 
         $('#service').html(response);
        }
        });
        }
</script>


<div id="slider-banner-section" style="height:300px;display: block;">
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
                  <a href="addEditUser.php"  style="text-align:center;text-transform:lowercase !important;"> <i class="fa fa-user" aria-hidden="true"></i><br/>my account</a>
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

        <!-- <div id="search-categorie-item-block" style="margin: 50px 100px;">
          <form method="POST" action="search.php">
            <div class="col-sm-9 col-md-10 nopadding">
              <div id="search-input">
              <div class="col-md-4 nopadding">
              <input type="hidden" name="cat" value="" id="value">
                  <select id="location-search-list" name="cat" class="form-control" 
                  style="border-radius:unset;font-size: 13px;background: #ffffff !important;" required="" onchange="getsubcat(this.value);">
                    <option value="">Specialiste</option>
                   <?php 
                  $data=mysqli_query($con,"select * from category");
                  while($data_ar=mysqli_fetch_array($data)){
                    ?>
                    <option value="<?php echo $data_ar['cat_id']; ?>"><?php echo $data_ar['name']; ?></option>
                    <?php }  ?>
                  </select>
                </div>

                <div class="col-md-4 nopadding">
                  <select id="subcat" name="subcat" class="form-control" style="border-radius:unset;background: #ffffff !important;font-size: 13px;">
                    <option>Praticien,Etablissement</option>
                  </select>
                </div>

                <div class="col-md-4" id="locationField" style="height: 100% !important; margin-bottom: 2px;font-size: 13px;" >
                   <input type="text" id="autocomplete" name="textdata" onFocus="geolocate()" class="form-control" placeholder="Ville" style="box-shadow: none !important;" ><i class="fa fa-map-marker" id="mapIcon"  data-toggle="modal_not_used" data-target="#googleMap" aria-hidden="true"></i>
                   <input type="hidden" id="latitude" name="latitude" value="" />
                   <input type="hidden" id="longitude" name="longitude" value=""  />
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-md-2 text-right nopadding-right">
              <div id="location-search-btn" style="margin-right: 120px;margin-left: -20px;margin-top: -0.1em;">
              <?php if (!isset($_SESSION['email'])) { ?>
                <button type="button" data-toggle="modal" data-target="#login"   style="margin-right:2em;width: 49px;height: 37px;background-color: #9a0440;margin-top: -1px;"><i class="fa fa-search"  style="margin-top: -0.3em;"></i></button>
                <?php }else{ ?>
                <button type="submit" name="submitSearch" class="form-control" style="background-color: #9a0440;width: 49px;height: 37px;}"><i class="fa fa-search" style="margin-top: -0.3em;"></i></button>
                <?php } ?>
              </div>
            </div>
          </form>
        </div> -->

      </div>
    </div>

    <div class="row">
      <div id="search-categorie-item-block" style="margin: 50px 100px;">
          <div class="col-md-12">
            <form method="POST" action="search.php">
              <div class="col-md-3">
                 <input type="hidden" name="cat" value="" id="value">
                 <select id="location-search-list" name="cat" class="form-control" 
                  style="width:112%;border-radius:unset;font-size: 13px;background: #ffffff !important;" required="" onchange="getsubcat(this.value);">
                    <option value="">Specialiste</option>
                   <?php 
                  $data=mysqli_query($con,"select * from category where status=1");
                  while($data_ar=mysqli_fetch_array($data)){
                    ?>
                    <option value="<?php echo $data_ar['cat_id']; ?>"><?php echo $data_ar['name']; ?></option>
                    <?php }  ?>
                  </select>                
              </div>
              <div class="col-md-3">
                 <select id="subcat" name="subcat" class="form-control" style="border-radius:unset;background: #ffffff !important;font-size: 13px;width:112%;">
                    <option>Praticien,Etablissement</option>
                  </select>                
              </div>
              <div class="col-md-3">
                  <input type="text" id="autocomplete" name="textdata" onFocus="geolocate()" class="form-control" placeholder="Ville" style="box-shadow: none !important;border-radius:unset;" ><i class="fa fa-map-marker" id="mapIcon"  data-toggle="modal_not_used" data-target="#googleMap" aria-hidden="true"></i>
                   <input type="hidden" id="latitude" name="latitude" value="" />
                   <input type="hidden" id="longitude" name="longitude" value="" />
              </div>
              <div class="col-md-2">
                  <div id="location-search-btn" style="margin-right: 120px;margin-left: -20px;margin-top: -0.1em;">
                  <?php if (!isset($_SESSION['email'])) { ?>
                    <button type="button" data-toggle="modal" data-target="#login"   style="margin-right:2em;width: 49px;height: 37px;background-color: #9a0440;margin-top: -1px;"><i class="fa fa-search"  style="margin-top: -0.3em;"></i></button>
                    <?php }else{ ?>
                    <button type="submit" name="submitSearch" class="form-control" style="background-color: #9a0440;width: 49px;height: 37px;border-radius:unset;}"><i class="fa fa-search" style="margin-top: -0.3em;"></i></button>
                    <?php } ?>
                  </div>
              </div>
            </form>
          </div>
          
            <!-- <div class="col-sm-9 col-md-10 nopadding">
              <div id="search-input">
              <div class="col-md-4 nopadding">
              <input type="hidden" name="cat" value="" id="value">
                 
              </div>

                <div class="col-md-4 nopadding">
                  <select id="subcat" name="subcat" class="form-control" style="border-radius:unset;background: #ffffff !important;font-size: 13px;">
                    <option>Praticien,Etablissement</option>
                  </select>
                </div>

                <div class="col-md-4" id="locationField" style="height: 100% !important; margin-bottom: 2px;font-size: 13px;" >
                   <input type="text" id="autocomplete" name="textdata" onFocus="geolocate()" class="form-control" placeholder="Ville" style="box-shadow: none !important;" ><i class="fa fa-map-marker" id="mapIcon"  data-toggle="modal_not_used" data-target="#googleMap" aria-hidden="true"></i>
                   <input type="hidden" id="latitude" name="latitude" value="" />
                   <input type="hidden" id="longitude" name="longitude" value=""  />
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-md-2 text-right nopadding-right">
              <div id="location-search-btn" style="margin-right: 120px;margin-left: -20px;margin-top: -0.1em;">
              <?php if (!isset($_SESSION['email'])) { ?>
                <button type="button" data-toggle="modal" data-target="#login"   style="margin-right:2em;width: 49px;height: 37px;background-color: #9a0440;margin-top: -1px;"><i class="fa fa-search"  style="margin-top: -0.3em;"></i></button>
                <?php }else{ ?>
                <button type="submit" name="submitSearch" class="form-control" style="background-color: #9a0440;width: 49px;height: 37px;}"><i class="fa fa-search" style="margin-top: -0.3em;"></i></button>
                <?php } ?>
              </div>
            </div>
          </form>  -->
        </div>
    </div>


  </div>
</div>


