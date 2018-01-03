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
<?php
  include('header.php');
  include('sidebar.php');
?>     
<div id="content">  
  <div class="container"> 
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="dashboard.php">ACCUEIL</a>
                </li>
                <li class="current">Administrateur</li>
            </ul>
        </div> 
        <div class="page-header">  
            <div class="page-title">
                <h3>Administrateur</h3>
            </div>
        </div>    
  <div class="row">
  <div class="col-md-12">
           <?php
          echo form_open_multipart('addadmin/change_pass');
          ?>                     
            <div class="form-group has-success col-md-8">
               <label class="control-label" for="inputSuccess1">Entrer Ancien Mot de Passe<span style="color:red;">*</span></label>
                <input type="password" class="form-control" id="inputSuccess1" name="password" required>
            </div>
            <div class="form-group has-success col-md-8">
                <label class="control-label" for="inputSuccess1">Entrer Nouveau Mot de Passe<span style="color:red;">*</span></label>
                <input type="password" class="form-control" id="inputSuccess1" name="newpassword" required>
            </div>
            <div class="form-group has-success col-md-8">
                <label class="control-label" for="inputSuccess1"> Entrer Nouveau Mot de Passe<span style="color:red;">*</span></label>
                <input type="password" class="form-control" id="inputSuccess1" name="repassword" required>
            </div>
            <div class="form-group has-success col-md-6">
               <button class="btn btn-danger" name="add_user" type="submit">AJOUTER</button><br/><br/>
            </div>
            <?php
            echo form_close();
            echo validation_errors();
            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0);" class="scrollup">Scroll</a>
        </div>  
    </div>
  <?php include 'footer.php'; ?>