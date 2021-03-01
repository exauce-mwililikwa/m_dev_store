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
	if(isset($_GET['update_box'])){
		$update_box_id=$_GET['update_box'];
		$update_box_query="SELECT `box_id`, `box_title`, `box_desc` FROM `boxes_session` where box_id='$update_box_id'";
		$run_edit=mysqli_query($con,$update_box_query);
		$row_edit=mysqli_fetch_array($run_edit);
		$box_id=$row_edit['box_id'];
		$box_title=$row_edit['box_title'];
		$box_desc=$row_edit['box_desc'];
	}
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Boxes
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Boxes
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Box Title
						</label>
					
						<div class="col-md-6">
							<input type="text" value="<?php echo $box_title;?>" name="box_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						 Box Descrption
						</label>
					
						<div class="col-md-6">
							<textarea type="text" name="box_desc" class="form-control"><?php echo $box_desc;?>
							</textarea>
						
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						
						</label>
					
						<div class="col-md-6">
							<input type="submit" value="Update" name="update" id="" class="form-control btn btn-primary">
						
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>
<?php
	if(isset($_POST['update'])){
		$box_title=$_POST['box_title'];
		$box_desc=$_POST['box_desc'];
		$update_box="update boxes_session set  box_title='$box_title', box_desc='$box_desc' where box_id='$box_id'";
		$run_p_cat=mysqli_query($con,$update_box);
		if($run_p_cat){
			echo"
				<script>alert('Your Box Has been modify')</script>
			";
			echo"
				<script>window.open('index.php?view_box','_self')</script>
			";
		}
	}
?>
<?php } ?>
