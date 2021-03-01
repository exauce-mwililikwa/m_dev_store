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
	if(isset($_GET['edit_manufactured'])){
		$edit_manufactured_id=$_GET['edit_manufactured'];
		$edit_manufactured_query="SELECT manufactured_id, manufactured_title, 
		manufactured_top, manufactured_image FROM manufacturers where manufactured_id='$edit_manufactured_id'";
		$run_edit=mysqli_query($con,$edit_manufactured_query);
		$row_edit=mysqli_fetch_array($run_edit);
		$manufactured_id=$row_edit['manufactured_id'];
		$manufactured_title=$row_edit['manufactured_title'];
		$manufactured_top=$row_edit['manufactured_top'];
		$manufactured_image=$row_edit['manufactured_image'];
	}
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Manufactured
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Manufactured
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Manufacturer Name
						</label>
					
						<div class="col-md-6">
							<input type="text" value="<?php echo $manufactured_title;?>" name="manufactured_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Choose As Top Manufactured
						</label>
					
						<div class="col-md-6">
							<input type="radio" value="yes" name="manufactured_top"
							<?php
							if($manufactured_top=='no')
							{}
							else{
								echo "checked='checked'";
							}
							?>
							>
							<label for="">Yes</label>
							<input type="radio" value="No" name="manufactured_top"
							<?php
							if($manufactured_top=='Yes')
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
							<input class="form-control" type="file" name="manufacturer_image">
						<br>
						<img class="img-responsive" src="other_images/<?php echo $manufactured_image;?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						
						</label>
					
						<div class="col-md-6">
							<input type="submit" name="submit" value="Update Manufacturer" class="btn btn-primary form-control">
						
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>
<?php
	if(isset($_POST['submit'])){
		$manufactured_name=$_POST['manufactured_name'];
		$manufactured_top=$_POST['manufactured_top'];
		$manufacturer_image=$_FILES['manufacturer_image']['name'];
		$temp_name=$_FILES['manufacturer_image']['tmp_name'];
		move_uploaded_file($temp_name, "other_images/$manufacturer_image");
			$update_manufacturer="update manufacturers set manufactured_title='$manufactured_name',
			 manufactured_top='$manufactured_top', manufactured_image='$manufacturer_image' where manufactured_id='$edit_manufactured_id'";
			$run_manufacturer=mysqli_query($con,$update_manufacturer);
			echo"
				<script>alert('Your new manufactured has been Update')</script>
			";
			echo"<script>window.open('index.php?view_manufactured','_self')</script>";
		
	}
?>
<?php } ?>
