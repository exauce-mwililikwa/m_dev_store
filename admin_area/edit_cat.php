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
	if(isset($_GET['edit_cat'])){
		$edit_cat_id=$_GET['edit_cat'];
		$edit_cat_query="select * from categories where cat_id='$edit_cat_id'";
		$run_edit=mysqli_query($con,$edit_cat_query);
		$row_edit=mysqli_fetch_array($run_edit);
		$cat_id=$row_edit['cat_id'];
		$cat_title=$row_edit['cat_title'];
		$cat_top=$row_edit['cat_top'];
		$cat_image=$row_edit['cat_image'];
	}
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Categories
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
						 Categories Title
						</label>
					
						<div class="col-md-6">
							<input type="text" value="<?php echo $cat_title;?>" name="cat_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Choose As Top Manufactured
						</label>
					
						<div class="col-md-6">
							<input type="radio" value="yes" name="cat_top"
								<?php
							if($cat_top=='no')
							{}
							else{
								echo "checked='checked'";
							}
							?>
							>
							<label for="">Yes</label>
							<input type="radio" value="No" name="cat_top"
								<?php
							if($cat_top=='yes')
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
							<input class="form-control" type="file" name="cat_image">
							<img src="other_images/<?php echo $cat_image?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						
						</label>
					
						<div class="col-md-6">
							<input type="submit" value="Insert Categories" name="submit" id="" class="form-control btn btn-primary">
						
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>    
<?php
	if(isset($_POST['submit'])){
		$cat_title=$_POST['cat_title'];
		$cat_top=$_POST['cat_top'];
		$cat_image=$_FILES['cat_image']['name'];
		$temp_name=$_FILES['cat_image']['tmp_name'];
		move_uploaded_file($temp_name, "other_images/$cat_image");
		$insert_cat="update categories set cat_title='$cat_title', cat_top='$cat_top',cat_image='$cat_image' where cat_id='$edit_cat_id'";
		$run_cat=mysqli_query($con,$insert_cat);
		if($run_cat){
			echo"
				<script>alert('Your New Categories Has been update')</script>
			";
			echo"
				<script>window.open('index.php?view_cats','_self')</script>
			";
		}
	}
?>

<?php } ?>
