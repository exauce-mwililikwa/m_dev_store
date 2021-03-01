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
	if(isset($_GET['update_term'])){
		$update_term_id=$_GET['update_term'];
		$update_term_query="SELECT `term_title`, `term_link`, `term_desc`,`term_id` FROM `term` where `term_id`='$update_term_id'";
		$run_edit=mysqli_query($con,$update_term_query);
		$row_edit=mysqli_fetch_array($run_edit);
		$term_link=$row_edit['term_link'];
		$term_title=$row_edit['term_title'];
		$term_desc=$row_edit['term_desc'];
		$term_id=$row_edit['term_id'];
	}
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
				<i class="fa fa-dashboard"></i> DashBoar / Ceate Terms
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Ceate Term
				</h3>
			</div>
			<div class="panel-body">
				<form method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label"> Term Title</label>
						<div class="col-md-6">
							<input type="text" name="term_title" value="<?php echo $term_title;?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Term Link</label>
						<div class="col-md-6">
							<input type="text" value="<?php echo $term_link;?>" name="term_link" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Term Desc</label>
						<div class="col-md-6">
							<textarea type="text" cols="19" rows="6" name="term_desc" class="form-control" required><?php echo $term_desc;?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input name="submite" value="Update Term" type="submit" class="btn btn-primary form-control">
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
		$term_link=$_POST['term_link'];
		$term_title=$_POST['term_title'];
		$term_desc=$_POST['term_desc'];
		$update_term="UPDATE `term` SET `term_title`='$term_title',`term_link`='$term_link',`term_desc`='$term_desc' where term_id='$term_id'";
		$run_product=mysqli_query($con,$update_term);
		if($run_product){
			echo"<script>alert('Term has been Update successfully')</script>";
			echo"<script>window.open('index.php?view_term','_self')</script>";
		}

	}

?>
<?php } ?> 