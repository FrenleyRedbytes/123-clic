<?php 
  include('header.php');
  include('sidebar.php'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <style type="text/css">
  @media only screen and (max-width: 800px) {
    #unseen table td:nth-child(2), 
    #unseen table th:nth-child(2) {display: none;}
  }
  @media only screen and (max-width: 640px) {
      #unseen table td:nth-child(4),
      #unseen table th:nth-child(4),
      #unseen table td:nth-child(7),
      #unseen table th:nth-child(7),
      #unseen table td:nth-child(8),
      #unseen table th:nth-child(8){display: none;}
  }
  td {
  word-wrap:break-word!important;
  }
</style>
    <style type="text/css">
      .paginate_button{
        padding: 0px 10px;
      }
      .dataTables_filter{
        margin-top: -25px;
      }
      .page-header {
        padding-bottom: 0px;
        margin: 14px 1px 0px;
        border-bottom: 0px solid #eee;
      }
      /*.navbar .navbar-brand{
        margin-left: -90px !important;
      }*/
    </style>
    <script>
      $(document).ready(function() {
      $('#example').DataTable();
      } );
    </script>

<script type="text/javascript">
function getSubcat(val) {
     $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>index.php/Specialist/detailview",
          data: "subcat=" + val,
          success: function(response) {
            console.log(response);
              $('#subcat').html(response);
          }
      });
}
</script>
  </head>
  <body>
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
          <h3 style="color: #850035;">Ajouter un service</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
          echo form_open_multipart('specialist/add_service');
           echo "<span style='color:red;'>".validation_errors()."</span>"; 
          ?>
          <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Selectionner une Cat&eacute;gorie<span style="color:red;">*</span></label>
              <select name="cat" class="form-control" required="" onchange="getSubcat(this.value)" >
              <option value="">Selectionner une Cat&eacute;gorie</option>
              <?php          
              foreach($cat as $row_spe){
              ?>
              <option value="<?php echo $row_spe['cat_id'];?>"><?php echo $row_spe['name'];?></option>
              <?php }?>
              </select>      
          </div>
           <div class="form-group has-success col-md-8">
              <label class="control-label" for="inputSuccess1">Selectionner une Sous-Cat&eacute;gorie<span style="color:red;">*</span></label>
              <select name="subcat" class="form-control" id="subcat">
              <option value="">Selectionner une Sous-Cat&eacute;gorie</option>              
              </select>      
          </div>
          <div class="form-group has-success col-md-8">
            <label class="control-label" for="inputSuccess1">Nom du service<span style="color:red;">*</span></label>
             <input type="text" class="form-control" id="inputSuccess1" name="service" required>
          </div>
          <div class="form-group has-success col-md-6">
               <button class="btn btn-danger" name="add_user" type="submit">AJOUTER</button><br/><br/>
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
  </body>
  </html>
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