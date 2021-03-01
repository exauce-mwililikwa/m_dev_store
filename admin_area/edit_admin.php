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
	if(isset($_GET['edit_admin'])){
		$edit_user=$_GET['edit_admin'];
		$get_user="select * from admins where admin_id='$edit_user'";
		$run_user=mysqli_query($con,$get_user);
		$row_user=mysqli_fetch_array($run_user);
		$user_id=$row_user['admin_id'];
		$admin_name=$row_user['admin_name'];
		$admin_email=$row_user['admin_email'];
		$admin_pass=$row_user['admin_pass'];
		$admin_image=$row_user['admin_image'];
		$admin_country=$row_user['admin_country'];
		$admin_about=$row_user['admin_about'];
		$admin_contact=$row_user['admin_contact'];
		$admin_job=$row_user['admin_job'];
	}
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> DashBoar / Edit User
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit User
				</h3>
			</div>
			<div class="panel-body">
				<form method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label"> Username </label>
						<div class="col-md-6">
							<input type="text" name="admin_name" value="<?php echo $admin_name;?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> E-mail</label>
						<div class="col-md-6">
							<input type="text" value="<?php echo $admin_email;?>" name="admin_email" class="form-control" required>		
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Passowrd </label>
						<div class="col-md-6">
							<input type="password" value="<?php echo $admin_pass;?>" name="admin_pass" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Country</label>
						<div class="col-md-6">
							<input type="text" value="<?php echo $admin_country;?>" name="admin_country" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Contact </label>
						<div class="col-md-6">
							<input type="text" value="<?php echo $admin_contact;?>" name="admin_contact" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Job </label>
						<div class="col-md-6">
							<input type="text" value="<?php echo $admin_job;?>" name="admin_job" class="form-control" required>
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
							<textarea name="admin_about" class="form-control" rows="3"><?php echo $admin_about;?></textarea>
						</div>
					</div>
					
					
					
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input name="submite" value="Edit Users" type="submit" class="btn btn-primary form-control">
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
		$admin_about=$_POST['admin_about'];
		$admin_contact=$_POST['admin_contact'];
		$admin_job=$_POST['admin_job'];
		$admin_image=$_FILES['admin_image']['name'];
		$temp_admin_image=$_FILES['admin_image']['tmp_name'];		
		move_uploaded_file($temp_admin_image, "admin_images/$admin_image");
		$insert_user="update admins set admin_name='$admin_name', admin_email='$admin_email', admin_pass='$admin_pass', admin_image='$admin_image', admin_country='$admin_country', admin_about='$admin_about', admin_contact='$admin_contact', admin_job='$admin_job' where admin_id='$user_id'";
		$run_user=mysqli_query($con,$insert_user);
		if($run_user){
			echo"<script>alert('User has been modified successfully')</script>";
			echo"<script>window.open('index.php?view_users','_self')</script>";
		}

	}

?>
<?php } ?>