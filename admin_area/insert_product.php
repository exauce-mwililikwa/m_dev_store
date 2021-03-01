<?php
if(!isset($_SESSION['admin_email'])){
		session_destroy();
		echo"
			<script>window.open('login.php','_self')</script>
		";
	}
	else{
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
				<i class="fa fa-dashboard"></i> DashBoar / Insert Products
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
							<input type="text" name="product_title" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Manufacturer </label>
						<div class="col-md-6">
							<select name="manufacturer" class="form-control">
								<option disabled="disabled" selected="selected">Select a Manufacturer</option>
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
								<option disabled="disabled" selected="selected">Select a Category Product</option>
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
								<option disabled="disabled" selected="selected"> Select a Category </option>
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
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Image 2</label>
						<div class="col-md-6">
							<input type="file" name="product_img2" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Image 3</label>
						<div class="col-md-6">
							<input type="file" name="product_img3" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product Price</label>
						<div class="col-md-6">
							<input type="number" name="product_price" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"> Product sale</label>
						<div class="col-md-6">
							<input type="number" name="product_sale" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product KeyWords</label>
						<div class="col-md-6">
							<input type="text" name="product_keywords" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"> Product Desc</label>
						<div class="col-md-6">
							<textarea type="text" cols="19" rows="6" name="product_desc" class="form-control" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Product label</label>
						<div class="col-md-6">
							<select name="product_label" class="form-control">
								<option disabled="disabled" selected="selected"> Select product sale </option>
							    <option value='new'> new </option>
								<option value='sale'> sale </option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input name="submite" value="Insert Product" type="submit" class="btn btn-primary form-control">
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
	if(isset($_POST['submite'])){
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$cat=$_POST['cat'];
		$manufacturer=$_POST['manufacturer'];
		$product_price=$_POST['product_price'];
		$product_keywords=$_POST['product_keywords'];
		$product_sale=$_POST['product_sale'];
		$product_desc=$_POST['product_desc'];
		$product_label=$_POST['product_label'];
		$product_img1=$_FILES['product_img1']['name'];
		$product_img2=$_FILES['product_img2']['name'];
		$product_img3=$_FILES['product_img3']['name'];
		$temp_name1=$_FILES['product_img1']['tmp_name'];
		$temp_name2=$_FILES['product_img2']['tmp_name'];
		$temp_name3=$_FILES['product_img3']['tmp_name'];
		move_uploaded_file($temp_name1, "product_images/$product_img1");
		move_uploaded_file($temp_name2, "product_images/$product_img2");
		move_uploaded_file($temp_name3, "product_images/$product_img3");
	$insert_product="INSERT INTO `products`( `p_cat_id`, `cat_id`, `date`, `product_title`,
		 	 `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywoords`,
		 	  `manufactured_id`, `product_label`, `product_sale`, `product_url`) VALUES 
           ('$product_cat','$cat',NOW(),'$product_title','$product_img1',
	'$product_img2','$product_img3','$product_price','$product_desc','$product_keywords',
	'$manufacturer','$product_label','$product_sale','')";
		$run_product=mysqli_query($con,$insert_product);
		if($run_product){
			echo"<script>alert('Product has been inserted successfully')</script>";
			echo"<script>window.open('index.php?view_product','_self')</script>";
		}
		else{
			echo"<script>alert('erreur')</script>";
		}

	}

?>
<?php } ?>