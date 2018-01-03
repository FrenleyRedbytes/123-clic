<?php 
session_start();
include "db.php";
 $userzip=$_POST['zipuser'];
 $cat=$_POST['cat_id'];
 $subcat=$_POST['subcat_id'];
 
		if(isset($userzip)){
		echo 'true';
		}
		else{
		echo 'false';
		}              

 ?>