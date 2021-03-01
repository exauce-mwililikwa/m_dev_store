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
			<li class="active">
				<i class="fa fa-dashboard"></i> DashBoar / Insert User
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Insert User
				</h3>
			</div>
			<div class="panel-body">
				<form method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label"> Username </label>
						<div class="col-md-6">
							<input type="text" name="admin_name" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> E-mail</label>
						<div class="col-md-6">
							<input type="text" name="admin_email" class="form-control" required>		
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Passowrd </label>
						<div class="col-md-6">
							<input type="password" name="admin_pass" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Country</label>
						<div class="col-md-6">
							<input type="text" name="admin_country" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Contact </label>
						<div class="col-md-6">
							<input type="text" name="admin_contact" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Job </label>
						<div class="col-md-6">
							<input type="text" name="admin_job" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Image </label>
						<div class="col-md-6">
							<input type="file" name="admin_image" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> About </label>
						<div class="col-md-6">
							<textarea name="admin_about" class="form-control" rows="3"></textarea>
						</div>
					</div>
					
					
					
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input name="submite" value="Insert Users" type="submit" class="btn btn-primary form-control">
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($_POST['submite'])){
		$admin_name=$_POST['admin_name'];
		$admin_email=$_POST['admin_email'];
		$admin_pass=$_POST['admin_pass'];
		$admin_country=$_POST['admin_country'];
		$admin_contact=$_POST['admin_contact'];
		$admin_job=$_POST['admin_job'];
		$admin_about=$_POST['admin_about'];
		$admin_image=$_FILES['admin_image']['name'];
		$temp_admin_image=$_FILES['admin_image']['tmp_name'];		
		move_uploaded_file($temp_admin_image, "admin_images/$admin_image");
		$insert_user="INSERT INTO `admins`( `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_country','$admin_about','$admin_contact','$admin_job')";
		$run_user=mysqli_query($con,$insert_user);
		if($run_user){
			echo"<script>alert('New user has been inserted successfully')</script>";
			echo"<script>window.open('index.php?view_users','_self')</script>";
		}

	}

?>
<?php } ?>