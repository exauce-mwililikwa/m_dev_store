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
				<i class="fa fa-dashboard"></i> Dashboard / Insert Slide
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Insert Slides
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Slide Name
						</label>
					
						<div class="col-md-6">
							<input type="text" name="slide_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Slide Url
						</label>
					
						<div class="col-md-6">
							<input type="text" name="slider_url" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						  Slide Image
						</label>
					
						<div class="col-md-6">
							<input class="form-control" type="file" name="slide_image">
						
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
		$slide_name=$_POST['slide_name'];
		$slider_url=$_POST['slider_url'];
		$slide_image=$_FILES['slide_image']['name'];
		$temp_name=$_FILES['slide_image']['tmp_name'];
		$view_slides="select * from slider";
		$view_run_slides=mysqli_query($con,$view_slides);
		$count=mysqli_num_rows($view_run_slides);
		if($count<4){
			move_uploaded_file($temp_name, "slides_images/$slide_image");
			$insert_slide="INSERT INTO `slider`(`slider_name`, `slider_image`,slider_url) VALUES('$slide_name','$slide_image','$slider_url')";
			$run_slide=mysqli_query($con,$insert_slide);
			echo"
				<script>alert('Your new slide image has been inserted')</script>
			";
			echo"<script>window.open('index.php?view_slides','_self')</script>";
		}
		else{
			echo"<script>alert('Your have already inserted four slider')</script>";
		}
	}
?>

<?php } ?>