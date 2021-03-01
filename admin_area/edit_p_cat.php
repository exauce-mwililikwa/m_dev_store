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
	if(isset($_GET['edit_p_cat'])){
		$edit_p_cat_id=$_GET['edit_p_cat'];
		$edit_p_cat_query="select p_cat_id, p_cat_title, p_cat_top, p_cat_image from product_categories where p_cat_id='$edit_p_cat_id'";
		$run_edit=mysqli_query($con,$edit_p_cat_query);
		$row_edit=mysqli_fetch_array($run_edit);
		$p_cat_id=$row_edit['p_cat_id'];
		$p_cat_title=$row_edit['p_cat_title'];
		$p_cat_top=$row_edit['p_cat_top'];
		$p_cat_image=$row_edit['p_cat_image'];
	}
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Product Categories
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Category
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Product Categories Title
						</label>
					
						<div class="col-md-6">
							<input value="<?php echo $p_cat_title;?>" type="text" name="p_cat_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Choose As Top Manufactured
						</label>
					
						<div class="col-md-6">
							<input type="radio" value="yes" name="p_cat_top"
								<?php
							if($p_cat_top=='no')
							{}
							else{
								echo "checked='checked'";
							}
							?>
							>
							<label for="">Yes</label>
							<input type="radio" value="No" name="p_cat_top"
								<?php
							if($p_cat_top=='yes')
							{}
							else{
								echo "checked='checked'";
							}
							?>
							>
							<label for="">No</label>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						  Manufacturer Image
						</label>
					
						<div class="col-md-6">
							<input class="form-control" type="file" name="p_cat_image">
						
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						
						</label>
					
						<div class="col-md-6">
							<input type="submit" value="Update Product Categories" name="submit" id="" class="form-control btn btn-primary">
						
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>
<?php
	if(isset($_POST['submit'])){
		$p_cat_title=$_POST['p_cat_title'];
		$p_cat_top=$_POST['p_cat_top'];
		$p_cat_image=$_FILES['p_cat_image']['name'];
		$temp_name=$_FILES['p_cat_image']['tmp_name'];
		move_uploaded_file($temp_name, "other_images/$p_cat_image");
		$update_p_cat="update product_categories set p_cat_title='$p_cat_title', p_cat_top='$p_cat_top',p_cat_image='$p_cat_image' where p_cat_id='$edit_p_cat_id'";
		$run_cat=mysqli_query($con,$update_p_cat);
		if($run_cat){
			echo"
				<script>alert('Your New Product Categories Has been inserted')</script>
			";
			echo"
				<script>window.open('index.php?view_p_cats','_self')</script>
			";
		}
	}
?>

<?php } ?>

