<?php 
	include 'db.php';
	$cat_id=$_POST['cat_id'];
	if(isset($cat_id) && !empty($cat_id)){
		$sql = mysqli_query($con,"SELECT * FROM  `subcategory` WHERE `cat_id`='$cat_id' ");
		if(mysqli_num_rows($sql)>0){  		
			$add='<option selected="selected">Sélectionnez la sous-catégorie</option>';
			$arr='';
			while($subcat=mysqli_fetch_array($sql)){ 			
				 // $value='<option value='.$subcat['subcat_id'].'>'.$subcat['subcat_name'].'</option>';
				 $arr.='<option value='.$subcat['subcat_id'].'>'.$subcat['subcat_name'].'</option>';
			}	
				 $data=array('subcategory' =>$add.$arr,'chk' =>'true');
		} 
		else {
			 $value='<option value="">no record</option>';
			$data = array('subcategory' =>$value,'chk' =>'false');
			}
	}
	echo json_encode($data); 