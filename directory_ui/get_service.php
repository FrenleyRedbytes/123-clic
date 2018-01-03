<?php 
	include 'db.php';
	$cat_id=$_POST['cat_id'];
	$subcat_id=$_POST['subcat_id'];
	echo "SELECT * FROM  `service_detail` WHERE `cat_id`='$cat_id' and subcat_id='$subcat_id'";
		$sql = mysqli_query($con,"SELECT * FROM  `service_detail` WHERE `cat_id`='$cat_id' and sub_cat_id='$subcat_id'");
		if(mysqli_num_rows($sql)>0){  		
			echo '<option selected="selected">Sélectionnez la sous-catégorie</option>';
			while($subcat=mysqli_fetch_array($sql)){ 
				?>
					<option value="<?php echo $subcat['ser_detail_id'];?>"><?php echo $subcat['ser_name'];?>
					</option>
				<?php
			}	
		} 
		else {
			echo '<option value="">no record</option>';
		}
