<?php 
session_start();
$user_id=$_SESSION['user_id'];
include 'db.php';

if(isset($_GET['fav_did'])){
	$spr_id=$_GET['fav_did'];
	$cat_id=$_GET['cat_id'];
	$subcat_id=$_GET['subcat_id'];
	$data=mysqli_query($con,"delete from favorite where spe_id='$spr_id' and user_id='$user_id'");
	header("location:specialist_new1.php?cat_id=$cat_id&subcat_id=$subcat_id");
 }
 if(isset($_GET['fav_iid'])){
	$spr_id=$_GET['fav_iid'];
	$cat_id=$_GET['cat_id'];
	$subcat_id=$_GET['subcat_id'];
	$data=mysqli_query($con,"insert into favorite(user_id,spe_id) values('$user_id','$spr_id')");
	 header("location:specialist_new1.php?cat_id=$cat_id&subcat_id=$subcat_id");
 }

//  fav_ list manage.................
 if(isset($_GET['fav_dfid'])){
	$spr_id=$_GET['fav_dfid'];	
	$data=mysqli_query($con,"delete from favorite where spe_id='$spr_id' and user_id='$user_id'");
	header("location:fav_list.php");
 }
 if(isset($_GET['fav_ifid'])){
	$spr_id=$_GET['fav_ifid'];
	$data=mysqli_query($con,"insert into favorite(user_id,spe_id) values('$user_id','$spr_id')");
	 header("location:fav_list.php");
 }

