<?php
if(!isset($_SESSION['admin_email'])){
		session_destroy();
		echo"
			<script>window.open('login.php','_self')</script>
		";
	}
	else{
?>
<?php
	if(isset($_GET['edit_product'])){
		$edit_id=$_GET['edit_product'];
		$get_p="SELECT product_id,products.p_cat_id, products.cat_id,
		 categories.cat_title, product_categories.p_cat_title, date, product_title, 
		 product_img1, product_img2, product_img3, product_price, product_desc,
		  product_keywoords,manufacturers.manufactured_id, 
		  manufacturers.manufactured_title,products.product_label FROM products inner
		   JOIN manufacturers INNER JOIN categories inner JOIN product_categories on 
		   manufacturers.manufactured_id=products.manufactured_id and
		    categories.cat_id=products.cat_id and 
		    product_categories.p_cat_id=products.p_cat_id where 
		    products.product_id='$edit_id'";
		$run_edit=mysqli_query($con,$get_p);
		$row_edit=mysqli_fetch_array($run_edit);
		$cat=$row_edit['cat_id'];
		$manufactured_id=$row_edit['manufactured_id'];
		$product_label=$row_edit['product_label'];
		$p_id=$row_edit['product_id'];
		$p_cat=$row_edit['p_cat_id'];
		$p_title=$row_edit['product_title'];
		$p_image1=$row_edit['product_img1']; 
		$p_image2=$row_edit['product_img2'];
		$p_image3=$row_edit['product_img3'];
		$p_price=$row_edit['product_price'];
		$p_keywords=$row_edit['product_keywoords'];
		$p_desc=$row_edit['product_desc'];
		$p_cat_title=$row_edit['p_cat_title'];
		$cat_title=$row_edit['cat_title'];
		$manufactured_title=$row_edit['manufactured_title'];
	}
?>

<html>
<head>
	<title> Insert Products </title>
		
</head>
<body>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> DashBoar / Edit Products
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Insert Product
				</h3>
			</div>
			<div class="panel-body">
				<form method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Title</label>
						<div class="col-md-6">
							<input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Manufacturer </label>
						<div class="col-md-6">
							<select name="manufacturer" class="form-control">
								<option value="<?php echo $manufactured_id; ?>"><?php echo $manufactured_title; ?></option>
								<?php
									$get_manufacturer="SELECT `manufactured_id`, `manufactured_title`, `manufactured_top`, `manufactured_image` FROM `manufacturers`";
									$run_manufacturer=mysqli_query($con,$get_manufacturer);
									while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){
										$manufacturer_id=$row_manufacturer['manufactured_id'];
										$manufacturer_title=$row_manufacturer['manufactured_title'];
										echo"
											<option value='$manufacturer_id'> $manufacturer_title </option>
										";
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Category</label>
						<div class="col-md-6">
							<select name="product_cat" class="form-control">
								<option value="<?php echo $p_cat; ?>"><?php echo $p_cat_title; ?></option>
								<?php
									$get_P_cats="select * from product_categories";
									$run_P_cats=mysqli_query($con,$get_P_cats);
									while($row_P_cats=mysqli_fetch_array($run_P_cats)){
										$p_cat_id=$row_P_cats['p_cat_id'];
										$p_cat_title=$row_P_cats['p_cat_title'];
										echo"
											<option value='$p_cat_id'> $p_cat_title </option>
										";
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Category</label>
						<div class="col-md-6">
							<select name="cat" class="form-control">
								<option value="<?php echo $cat; ?>"><?php echo $cat_title; ?></option>
								<?php
									$get_cat="select * from categories";
									$run_cat=mysqli_query($con,$get_cat);
									while($row_cat=mysqli_fetch_array($run_cat)){
										$cat_id=$row_cat['cat_id'];
										$cat_title=$row_cat['cat_title'];
										echo"
											<option value='$cat_id'> $cat_title </option>
										";    
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Image 1</label>
						<div class="col-md-6">
							<input type="file" name="product_img1" class="form-control" required>
							<br>
							<img width="70" height="70" src="product_images/<?php echo $p_image1; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Image 2</label>
						<div class="col-md-6">
							<input type="file" name="product_img2" class="form-control" >
							<br>
							<img width="70" height="70" src="product_images/<?php echo $p_image2; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Image 3</label>
						<div class="col-md-6">
							<input type="file" name="product_img3" class="form-control">
							<br>
							<img width="70" height="70" src="product_images/<?php echo $p_image3; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Price</label>
						<div class="col-md-6">
							<input type="number" name="product_price" class="form-control" required value="<?php echo $p_price;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product KeyWords</label>
						<div class="col-md-6">
							<input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Desc</label>
						<div class="col-md-6">
							<textarea type="text" cols="19" rows="6" name="product_desc" class="form-control" required><?php echo $p_desc;?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product label</label>
						<div class="col-md-6">
							<select name="product_label" class="form-control">
							    <option selected="selected" value='<?php echo $product_label; ?>'> <?php echo $product_label; ?> </option>
							    <?php
							    	if($product_label=='new'){
							    		echo"
							    		<option value='sale'> sale </option>
							    
							    		";
							    	}
							    	else{
							    		echo"
							    		<option value='new'> new </option>
							    		";
							    	}
							    ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input name="update" value="Update" type="submit" class="btn btn-primary form-control">
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>
<?php
	if(isset($_POST['update'])){
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$cat=$_POST['cat'];
		$product_price=$_POST['product_price'];
		$product_label=$_POST['product_label'];
		$manufacturer=$_POST['manufacturer'];
		$product_keywords=$_POST['product_keywords'];
		$product_desc=$_POST['product_desc'];
		$product_img1=$_FILES['product_img1']['name'];
		$product_img2=$_FILES['product_img2']['name'];
		$product_img3=$_FILES['product_img3']['name'];
		$temp_name1=$_FILES['product_img1']['tmp_name'];
		$temp_name2=$_FILES['product_img2']['tmp_name'];
		$temp_name3=$_FILES['product_img3']['tmp_name'];
		move_uploaded_file($temp_name1, "product_images/$product_img1");
		move_uploaded_file($temp_name2, "product_images/$product_img2");
		move_uploaded_file($temp_name3, "product_images/$product_img3");
		
		$update_product="update products set p_cat_id='$product_cat', cat_id='$cat',
		 product_title='$product_title', product_img1='$product_img1', product_img2='$product_img2',
		  product_img3='$product_img3', product_price='$product_price', 
		 product_desc='$product_desc', product_keywoords='$product_keywords',manufactured_id='$manufacturer'
		 ,product_label='$product_label' where product_id='$p_id'";
		
		 	
		 $run_product=mysqli_query($con,$update_product);
		 if($run_product){
		 	echo"
		 	<script>alert('Your product has been update Successfully')</script>
		 	";
		 	echo"
		 		<script>window.open('index.php?view_product','_self')</script>
		 	";
		 }
		 

	}

?>
<?php } ?>