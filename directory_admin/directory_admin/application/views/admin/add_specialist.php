<?php 
  include('header.php');
  include('sidebar.php'); 
?>
<div id="content">
  <div class="container">
      <!-- <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
          <li class="current">
            <i class="fa fa-home"></i>Add specialist
          </li>
        </ul>
      </div> -->
      <div class="page-header">
        <div class="page-title">
          <h3 style="color: #850035;">Add specialist</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
          echo form_open_multipart('specialist/add_specialist');
           echo "<span style='color:red;'>".validation_errors()."</span>"; 
          ?>
          <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Select Category<span style="color:red;">*</span></label>
              <select name="cat" class="form-control" required="">
              <option value="">Select Category</option>
              <?php          
              foreach($cat as $row_spe){
              ?>
              <option value="<?php echo $row_spe['cat_id'];?>"><?php echo $row_spe['name'];?></option>
              <?php }?>
              </select>      
          </div>
           <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Select Sub-Category<span style="color:red;">*</span></label>
              <select name="subcat" class="form-control">
              <option value="">Select Sub-Category</option>
              <?php          
              foreach($subcat as $row_spe1){
              ?>
              <option value="<?php echo $row_spe1['subcat_id'];?>"><?php echo $row_spe1['subcat_name'];?></option>
              <?php }?>
              </select>      
          </div>
          <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Shop Name<span style="color:red;">*</span></label>
             <input type="text" class="form-control" id="inputSuccess1" name="brand_name" required>
          </div>
            <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Contact<span style="color:red;">*</span></label>
             <input type="text" class="form-control" id="tbNumbers" onkeypress="javascript:return isNumber(event)" name="contact" required>
          </div>
            <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Address<span style="color:red;">*</span></label>
             <textarea type="text" class="form-control" name="address" required></textarea>
          </div>
            <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Discrption<span style="color:red;">*</span></label>
             <textarea type="text" class="form-control" name="disc" required></textarea>
          </div>
          <div class="form-group has-success col-md-8">
                         <label class="control-label" for="inputSuccess1">Location<span style="color:red;">*</span></label>
                         <input id="searchInput" class="controls" type="text" placeholder="Enter a location">
                        <div id="map" style="height: 188px;"></div>
                        <ul id="geoData">
                        <span id="location"></span>
                        <span id="postal_code"></span>
                        <span id="country"></span>
                        <span id="lat"></span>                                    
                        </ul>
                         <input type="text" class="form-control" id="mylocation" name="address_map" placeholder="Location Name" required>
                         <input type="text" class="form-control" id="mylatitde" name="lat" placeholder="Latitude" required>
                         <input type="text" class="form-control" id="mylongtitude" name="longt" placeholder="Longitude" required>
          </div>

          <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Shop Logo<span style="color:red;">*</span></label>
            <input type="file" class="form-control" id="inputSuccess1" name="brand_logo" required>
          </div>
          <div class="form-group has-success col-md-8">
             <label class="control-label" for="inputSuccess1">Specialist Contact Name<span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="inputSuccess1" name="contact_name" required>
          </div>
          <div class="form-group has-success col-md-8">
             <label class="control-label" for="inputSuccess1">Specialist Contact Image<span style="color:red;">*</span></label>
             <input type="file" class="form-control" id="inputSuccess1" name="contact_image" required>
          </div>
          <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1"> Specialist Email<span style="color:red;">*</span></label>
           <input type="text" class="form-control" id="inputSuccess1" name="email" required>
          </div>
          <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1"> Specialist Password<span style="color:red;">*</span></label>
            <input type="password" class="form-control" id="inputSuccess1" name="password" required>
          </div>
          <div class="form-group has-success col-md-6">
               <button class="btn btn-danger" name="add_user" type="submit">ADD</button><br/><br/>
          </div>
            <?php
            if(isset($res))
            echo $res;
           
            echo form_close();
            ?>
            </div>
          </div>
        </div>
      </div>
      <a href="javascript:void(0);" class="scrollup">Scroll</a>
    </div>
  </div>
  <?php include('footer.php');?>
<script> 
function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;
        return true;
    }
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -33.8688, lng: 151.2195},
      zoom: 13
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        // alert(place.geometry);
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));    
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        //Location details
        // for (var i = 0; i < place.address_components.length; i++) {
        //     if(place.address_components[i].types[0] == 'postal_code'){
        //         document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
        //     }
        //     if(place.address_components[i].types[0] == 'country'){
        //         document.getElementById('country').innerHTML = place.address_components[i].long_name;
        //     }
        // }
        // alert(place.geometry.location.lat());

        document.getElementById('mylocation').value=place.formatted_address;
        document.getElementById('mylatitde').value=place.geometry.location.lat();
        document.getElementById('mylongtitude').value=place.geometry.location.lng();

        // document.getElementById('location').innerHTML = place.formatted_address;
        // document.getElementById('lat').innerHTML = place.geometry.location.lat();
        // document.getElementById('lon').innerHTML = place.geometry.location.lng();
    });
}
</script>
 <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap&key=AIzaSyCA6lklAzTIeJvbpnGVuLwztXCXgZTq5W0" async defer></script>