<?php
	if(!isset($_SESSION['admin_email'])){
		session_destroy();
		echo"
			<script>window.open('login.php','_self')</script>
		";
	}
	else{
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Insert Manufacturer
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Insert Manufacturer
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Manufacturer Name
						</label>
					
						<div class="col-md-6">
							<input type="text" name="manufactured_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Choose As Top Manufactured
						</label>
					
						<div class="col-md-6">
							<input type="radio" value="yes" name="manufactured_top">
							<label for="">Yes</label>
							<input type="radio" value="No" name="manufactured_top">
							<label for="">No</label>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						  Manufacturer Image
						</label>
					
						<div class="col-md-6">
							<input class="form-control" type="file" name="manufacturer_image">
						
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						
						</label>
					
						<div class="col-md-6">
							<input type="submit" name="submit" value="Submit now" class="btn btn-primary form-control">
						
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
			$insert_manufacturer="INSERT INTO `manufacturers`(`manufactured_title`, `manufactured_top`, `manufactured_image`) VALUES('$manufactured_name','$manufactured_top','$manufacturer_image')";
			$run_manufacturer=mysqli_query($con,$insert_manufacturer);
			echo"
				<script>alert('Your new manufactured has been inserted')</script>
			";
			echo"<script>window.open('index.php?insert_manufactured','_self')</script>";
		
	}
?>

<?php } ?>