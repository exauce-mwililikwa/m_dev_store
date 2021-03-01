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
						<label class="col-md-3 control-label"> Product Category</label>
						<div class="col-md-6">
							<select name="product_cat" class="form-control">
								<option disabled="disabled" selected="selected">Select a Category Product</option>
								<?php
									$get_P_cats="select * from product_categories";
									$run_P_cats=mysqli_query($con,$get_P_cats);
									while($row_P_cats=mysqli_fetch_array($run_P_cats)){
										$p_cat_id=$row_P_cats['p_cat_id'];
										$p_cat_title=         $row_P_cats['p_cat_title'];
										echo"
											<option value='$p_cat_id'> $p_cat_title </option>
										";
									}
								?>
							</select>
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
		$product_price=$_POST['product_price'];
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
		$insert_product="insert into products (p_cat_id, cat_id, date, 
			product_title, product_img1, product_img2, product_img3, 
			product_price, product_keywoords, product_desc) values
           ('$product_cat','$cat',NOW(),'$product_title','$product_img1',
	'$product_img2','$product_img3','$product_price','$product_keywords',
	'$product_desc' )";
		$run_product=mysqli_query($con,$insert_product);
		if($run_product){
			echo"<script>alert('Product has been inserted successfully')</script>";
			echo"<script>window.open('index.php?view_product','_self')</script>";
		}

	}

?>
<?php } ?>