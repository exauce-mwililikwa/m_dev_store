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
	$file="../css/style.css";
	if(file_exists($file)){
		$data=file_get_contents($file);

	}
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Css Editor
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-pencil"></i> Css Editor
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<div class="col-lg-12">
							<textarea name="newdata" id="" rows="20" class="form-control">
								<?php echo $data;?>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" class="form-control btn btn-primary" name="update" value="Update Css">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
	if(isset($_POST['update'])){
		$newdata=$_POST['newdata'];
		$handle=fopen($file,"w");
		fwrite($handle,$newdata);
		fclose($handle);
		echo"<script>alert('Your Css has been update')</script>";
		echo"<script>window.open('index.php?edit_css')</script>";
	}
?>
<?php } ?>