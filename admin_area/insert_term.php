<?php
if(!isset($_SESSION['admin_email'])){
		session_destroy();
		echo"
			<script>window.open('login.php','_self')</script>
		";
	}
	else{
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
							<input type="text" name="term_title" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Term Link</label>
						<div class="col-md-6">
							<input type="text" name="term_link" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Term Desc</label>
						<div class="col-md-6">
							<textarea type="text" cols="19" rows="6" name="term_desc" class="form-control" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input name="submite" value="Create Term" type="submit" class="btn btn-primary form-control">
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
		$insert_term="INSERT INTO `term`(`term_title`, `term_link`, `term_desc`) VALUES('$term_title','$term_link','$term_desc')";
		$run_product=mysqli_query($con,$insert_term);
		if($run_product){
			echo"<script>alert('Term has been inserted successfully')</script>";
			echo"<script>window.open('index.php?view_term','_self')</script>";
		}

	}

?>
<?php } ?>