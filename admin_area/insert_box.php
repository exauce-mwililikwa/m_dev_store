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
				<i class="fa fa-dashboard"></i> Dashboard / Insert New Box
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Insert Box
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Box Title
						</label>
					
						<div class="col-md-6">
							<input type="text" name="box_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Box description
						</label>
					
						<div class="col-md-6">
							<textarea type="text" name="box_desc" class="form-control" rows="6" cols="18"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						
						</label>
					
						<div class="col-md-6">
							<input type="submit" name="submit" value="Insert Box" class="btn btn-primary form-control">
						
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>    
<?php
	if(isset($_POST['submit'])){
		$box_title=$_POST['box_title'];
		$box_desc=$_POST['box_desc'];
		$insert_box="INSERT INTO `boxes_session`(`box_title`, `box_desc`) VALUES ('$box_title','$box_desc')";
		$run_box=mysqli_query($con,$insert_box);
			echo" 
				<script>alert('New box has been inseted successfuly')</script>
			";
			echo"<script>window.open('index.php?view_box','_self')</script>";
		}
		
?>

<?php } ?>