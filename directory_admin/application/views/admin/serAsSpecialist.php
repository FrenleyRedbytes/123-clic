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
       <!--  <div class="crumbs">    
                    <ul id="breadcrumbs" class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="current">Category</li>
                    </ul>
        </div> -->
        <div class="page-header">   
            <div class="page-title">
                <h3 style="color: #850035;">Service du Sp&eacute;cialiste</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="fa fa-table"></i>Détail service du Sp&eacute;cialiste</div>
                        <div class="actions">
                            <div class="btn-group">
                                <a class="btn mini green" href="add_serAsSpecialist" >
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>AJOUTER 
                                </a>
                               </div>
                        </div>
                    </div>
                  <div class="portlet-body">
                      <table class="table" border="">
                          <tr style="background-color: #e6b53e;">
                            <th>Id</th>
                            <th>S&eacute;pcialiste</th>
                            <th>Service</th>
                            <th>Modification</th>
                          </tr>
				                    
                              <?php
                              foreach ($ser as $row){ ?>
		                      <tr>
                      		  <td><?php echo $row->ser_as_specialist; ?></td>
                      		  <td><?php echo $row->brand_name; ?></td>
                      		  <td><?php echo $row->ser_name; ?></td>
                    		  <td>
                              <a href="<?php echo base_url(); ?>index.php/specialist/edit_sp/<?php echo $row->spe_id; ?>">View All Data</a>&nbsp;&nbsp;&nbsp;&nbsp; -||- &nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="<?php echo base_url(); ?>index.php/specialist/delete_sp/<?php echo $row->spe_id;?>">Supprimer</a>
                              </td>
                    		</tr>
                              <?php } ?>
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>  
        <a href="javascript:void(0);" class="scrollup">Scroll</a>
    </div> 
</div>  
<?php include 'footer.php';