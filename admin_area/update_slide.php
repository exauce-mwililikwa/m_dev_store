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
	if(isset($_GET['update_slide'])){
		$edit_slide_id=$_GET['update_slide'];
		$edit_slide="select * from slider where slider_id='$edit_slide_id'";
		$run_edit_slide=mysqli_query($con,$edit_slide);
		$row_edit_slide=mysqli_fetch_array($run_edit_slide);
		$slide_id=$row_edit_slide['slider_id'];
		$slide_name=$row_edit_slide['slider_name'];
		$slide_image=$row_edit_slide['slider_image'];
		$slide_url=$row_edit_slide['slider_url'];
	}
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Slide
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Slides
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Slide Name
						</label>
					
						<div class="col-md-6">
							<input type="text" value="<?php echo $slide_name;?>" name="slide_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Slide Url
						</label>
					
						<div class="col-md-6">
							<input type="text" value="<?php echo $slide_url;?>" name="slide_url" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						  Slide Image
						</label>
					
						<div class="col-md-6">
							<input class="form-control" type="file" name="slide_image">
							<br>
							<img class="img-responsive" src="slides_images/<?php echo $slide_image;?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						
						</label>
					
						<div class="col-md-6">
							<input type="submit" name="update" value="Update now" class="btn btn-primary form-control">
						
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>    
<?php
	if(isset($_POST['update'])){
		$slide_name=$_POST['slide_name'];
		$slide_url=$_POST['slide_url'];
		$slide_image=$_FILES['slide_image']['name'];
		$temp_name=$_FILES['slide_image']['tmp_name'];
		move_uploaded_file($temp_name,"slides_images/$slide_image");
		$update_slide="update slider set slider_name='$slide_name',slider_image='$slide_image',slider_url='$slide_url' where slider_id='$slide_id'";
		$run_update_slide=mysqli_query($con,$update_slide);
		if($run_update_slide){
			echo"
				<script>alert('Your Slide has been updates successfully')</script>
			";
			echo"
				<script>window.open('index.php?view_slides','_self')</script>
			";
		}
	}
?>

<?php } ?> 