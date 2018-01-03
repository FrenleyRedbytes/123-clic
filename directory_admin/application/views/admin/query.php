<?php 
include'db.php';
$method =  mysqli_real_escape_string($con,$_REQUEST['method']);
if($method=="1"){
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);

		$sql = mysqli_query($con,"DELETE FROM category WHERE id='$id'"); 

		if($sql)
		{

		echo "Successfully Delete.";

		}else
		{

		echo "Please Try Later.";

		}
	}
if($method=="2"){
	    $id =  mysqli_real_escape_string($con,$_REQUEST['id']);

		$sql = mysqli_query($con,"DELETE FROM sub_category WHERE id='$id'"); 

		if($sql)
		{

		echo "Successfully Delete.";

		}else
		{

		echo "Please Try Later.";

		}
  }
if($method=="3")
{
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);

		$sql = mysqli_query($con,"DELETE FROM packages WHERE id='$id'"); 

		if($sql)
		{

		echo "Successfully Delete.";

		}else
		{

		echo "Please Try Later.";

		}

}
if($method=="4"){
		$id = mysqli_real_escape_string($con,$_REQUEST['id']);
		$contents = array();
		$sqlget = mysqli_query($con,"SELECT * FROM blog WHERE id='$id'");
		if($rowget = mysqli_fetch_array($sqlget)){
			$contents['edit_user']=array("id1"=>$rowget['id'],"title1"=>$rowget['title'],"description1"=>$rowget['description'],"date1"=>$rowget['date']);
		}
		echo json_encode($contents);
	}
	if($method=="5"){
	    $id               = $_REQUEST['id1'];
	   	$title       =$_POST['title1'];
        $description        =$_POST['description1'];
        $date        =$_POST['date1'];
      
        // echo$hjd="UPDATE `church_admin` SET `church`='$church',`fattor_name`='$fattor',`address`='$address',`email`='$email', `password`='$password' WHERE id='$id'";exit();
      
    $sql = mysqli_query($con,"UPDATE `blog` SET `title`='$title',`description`='$description',`date`='$date' WHERE id='$id'");
    if($sql){
     header("location:blog.php");
    }else {
      header("location:blog.php");
    }
  }
  if($method=="6")
{
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);

		$sql = mysqli_query($con,"DELETE FROM blog WHERE id='$id'"); 

		if($sql)
		{

		echo "Successfully Delete.";

		}else
		{

		echo "Please Try Later.";

		}

}
if($method=="7"){
		$id = mysqli_real_escape_string($con,$_REQUEST['id']);
		$contents = array();
		$sqlget = mysqli_query($con,"SELECT * FROM coupon WHERE id='$id'");
		if($rowget = mysqli_fetch_array($sqlget)){
			$contents['edit_user']=array("id1"=>$rowget['id'],"catid1"=>$rowget['catid'],"code1"=>$rowget['coupen_code'],"date1"=>$rowget['date'],"validity1"=>$rowget['validity'],"plan1"=>$rowget['plan']);
		}
		echo json_encode($contents);
	}
	if($method=="8"){
	    $id         = $_REQUEST['id1'];
	   	$catid1     = $_POST['catid1'];
        $code1      = $_POST['code1'];
        $date1      = $_POST['date1'];
        $validity1  = $_POST['validity1'];
        $plan1      = $_POST['plan1'];
        $myimg      = $_FILES["file"]["name"];
        $path1      = "img/".$myimg;
         if (move_uploaded_file($_FILES["file"]["tmp_name"], $path1)) {
              echo "success";
         } else {
                  echo "Sorry, there was an error uploading your file.";
         }
    $sql = mysqli_query($con,"UPDATE `coupon` SET `catid`='$catid1',`coupen_code`='$code1',`date`='$date1',`validity`='$validity1',`plan`='$plan1',`img`='$path1' WHERE id='$id'");
    if($sql){
     header("location:coupons.php");
    }else {
      header("location:coupons.php");
    }
  }
  if($method=="9")
  {
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);

		$sql = mysqli_query($con,"DELETE FROM coupon WHERE id='$id'"); 

		if($sql)
		{

		echo "Successfully Delete.";

		}else
		{

		echo "Please Try Later.";

		}

  }
  if($method=="10"){
		$id = mysqli_real_escape_string($con,$_REQUEST['id']);
		$contents = array();
		$sqlget = mysqli_query($con,"SELECT * FROM merchant WHERE id='$id'");
		if($rowget = mysqli_fetch_array($sqlget)){
			$contents['edit_user']=array("id1"=>$rowget['id'],"name1"=>$rowget['name'],"shopname1"=>$rowget['shopname'],"address1"=>$rowget['address'],"email1"=>$rowget['email'],"password1"=>$rowget['password'],"redeemed1"=>$rowget['redeemed']);
		}
		echo json_encode($contents);
	}
	if($method=="11"){
	    $id               = $_REQUEST['id1'];
	   	$name1       =$_POST['name1'];
        $shopname1        =$_POST['shopname1'];
        $address1        =$_POST['address1'];
        $email1        =$_POST['email1'];
        $password1        =$_POST['password1'];
         $redeemed1=$_POST['redeemed1'];
       
      
        // echo$hjd="UPDATE `church_admin` SET `church`='$church',`fattor_name`='$fattor',`address`='$address',`email`='$email', `password`='$password' WHERE id='$id'";exit();
      
    $sql = mysqli_query($con,"UPDATE `merchant` SET `name`='$name1',`shopname`='$shopname1',`address`='$address1',`email`='$email1',`password`='$password1',`redeemed`='$redeemed1' WHERE id='$id'");
    if($sql){
     header("location:info.php");
    }else {
      header("location:info.php");
    }
  }
  if($method=="12")
{
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);

		$sql = mysqli_query($con,"DELETE FROM merchant WHERE id='$id'"); 

		if($sql)
		{

		echo "Successfully Delete.";

		}else
		{

		echo "Please Try Later.";

		}

}
if($method=="13"){
		$id = mysqli_real_escape_string($con,$_REQUEST['id']);
		$contents = array();
		$sqlget = mysqli_query($con,"SELECT * FROM user WHERE id='$id'");
		if($rowget = mysqli_fetch_array($sqlget)){
			$contents['edit_user']=array("id1"=>$rowget['id'],"name1"=>$rowget['name'],"email1"=>$rowget['email'],"password1"=>$rowget['password']);
		}
		echo json_encode($contents);
	}
	if($method=="14"){
	    $id               = $_REQUEST['id1'];
	   	$name1       =$_POST['name1'];
        $email1        =$_POST['email1'];
     	$password1        =$_POST['password1'];
     //	echo "string";echo $id;echo $name1;echo "      ";echo $email1;exit;
        // echo$hjd="UPDATE `church_admin` SET `church`='$church',`fattor_name`='$fattor',`address`='$address',`email`='$email', `password`='$password' WHERE id='$id'";exit();
      
    $sql = mysqli_query($con,"UPDATE `user` SET `name`='$name1',`email`='$email1',`password`='$password1' WHERE id='$id'");
    if($sql){
     header("location:user.php");
    }else {
      header("location:user.php");
    }
  }
  if($method=="15")
  {
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);
		//echo $id;exit;
		$sql = mysqli_query($con,"DELETE FROM `sliders` WHERE id='$id'"); 
		if($sql)
		{
		echo "Successfully Delete.";
		}else
		{
		echo "Please Try Later.";
		}
   }

   if($method=="16"){
		$id = mysqli_real_escape_string($con,$_REQUEST['id']);
		$contents = array();
		$sqlget = mysqli_query($con,"SELECT * FROM `sliders` WHERE id='$id'");
		if($rowget = mysqli_fetch_array($sqlget)){
			$contents['edit_user']=array("id1"=>$rowget['id'],"name1"=>$rowget['name'],"img1"=>$rowget['img']);
		}
		echo json_encode($contents);
   }
  if($method=="17")
  {
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);

		$sql = mysqli_query($con,"DELETE FROM `category` WHERE id='$id'"); 

		if($sql)
		{

		echo "Successfully Delete.";

		}else
		{

		echo "Please Try Later.";

		}

  } 

if($method=="18"){
		$id = mysqli_real_escape_string($con,$_REQUEST['id']);
		$contents = array();
		$sqlget = mysqli_query($con,"SELECT * FROM `category` WHERE id='$id'");
		if($rowget = mysqli_fetch_array($sqlget)){
			$contents['edit_user']=array("id1"=>$rowget['id'],"title1"=>$rowget['name'],"description1"=>$rowget['description'],"date1"=>$rowget['date'],"img1"=>$rowget['img']);
		}
		echo json_encode($contents);
	}
	if($method=="19")
  {
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);
		$sql = mysqli_query($con,"DELETE FROM `coupon` WHERE id='$id'"); 
		if($sql)
		{
		echo "Successfully Delete.";
		}else
		{
		echo "Please Try Later.";
		}

  }
  if($method=="20"){
		$id = mysqli_real_escape_string($con,$_REQUEST['id']);
		$contents = array();
		$sqlget = mysqli_query($con,"SELECT * FROM `coupon` WHERE id='$id'");
		if($rowget = mysqli_fetch_array($sqlget)){
			$contents['edit_user']=array("id1"=>$rowget['id'],"catid1"=>$rowget['catid'],"code1"=>$rowget['coupen_code'],"date1"=>$rowget['date'],"validity1"=>$rowget['validity'],"plan1"=>$rowget['plan'],"img"=>$rowget['img']);
		}
		echo json_encode($contents);
	}

	 if($method=="21")
  {
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);
		//echo $id;exit;
		$sql = mysqli_query($con,"DELETE FROM `user` WHERE id='$id'"); 
		if($sql)
		{
		echo "Successfully Delete.";
		}else
		{
		echo "Please Try Later.";
		}
   }

    if($method=="22")
  {
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);

		$sql = mysqli_query($con,"DELETE FROM `city` WHERE id='$id'"); 

		if($sql)
		{

		echo "Successfully Delete.";

		}else
		{

		echo "Please Try Later.";

		}

  } 

  if($method=="23"){
		$id = mysqli_real_escape_string($con,$_REQUEST['id']);
		$contents = array();
		$sqlget = mysqli_query($con,"SELECT * FROM `city` WHERE id='$id'");
		if($rowget = mysqli_fetch_array($sqlget)){
			$contents['edit_user']=array("id1"=>$rowget['id'],"title1"=>$rowget['name']);
		}
		echo json_encode($contents);
	}

  if($method=="24")
  {
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);
		$sql = mysqli_query($con,"DELETE FROM `top_deal` WHERE id='$id'"); 
		if($sql)
		{
		echo "Successfully Delete.";
		}else
		{
		echo "Please Try Later.";
		}
   }

   if($method=="25")
   {
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);
		$sql = mysqli_query($con,"DELETE FROM `free_coupons` WHERE `free_coupon_id`='$id'"); 
		if($sql)
		{
		echo "Successfully Delete.";
		
		}else
		{
		echo "Please Try Later.";
		}

   }

   if($method=="26"){
	    $id         = $_REQUEST['id1'];
	   	$catid1     = $_POST['catid1'];
        $code1      = $_POST['code1'];
        $date1      = $_POST['date1'];
        $validity1  = $_POST['validity1'];
     //   $plan1      = $_POST['plan1'];
        $myimg      = $_FILES["file"]["name"];
        $path1      = "img/".$myimg;
        // echo $id."&&&"; echo $catid1."&&&"; echo $code1."&&&"; echo $date1."&&&"; echo $validity1."&&&"; echo $myimg."&&&";exit; 
         if (move_uploaded_file($_FILES["file"]["tmp_name"], $path1)) {
              echo "success";
         } else {
                  echo "Sorry, there was an error uploading your file.";
         }
    $sql = mysqli_query($con,"UPDATE `free_coupons` SET `coupen_code`='$code1',`max_used`='$validity1' WHERE `free_coupon_id`='$id'");
    if($sql){
     header("location:freecoupon.php");
    }else {
      header("location:freecoupon.php");
    }
  }

  if($method=="27"){
     $id           = $_REQUEST['id'];
     $sql = mysqli_query($con,"UPDATE `coupon` SET `is_activated`='0' WHERE id='$id'");
  }
  if($method=="28"){
     $id           = $_REQUEST['id'];
     $sql = mysqli_query($con,"UPDATE `coupon` SET `is_activated`='1' WHERE id='$id'");
  }

  if($method=="29")
   {
		$id =  mysqli_real_escape_string($con,$_REQUEST['id']);
		$sql = mysqli_query($con,"DELETE FROM `coupon_img` WHERE `id`='$id'"); 
		if($sql)
		{
		echo "Successfully Delete.";
		
		}else
		{
		echo "Please Try Later.";
		}

   }
?>