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
				<i class="fa fa-dashboard"></i> Dashboard / View Boxes
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i> View Boxes
				</h3>
			</div>
			<div class="panel-body">
				<?php
					$get_box="SELECT `box_id`, `box_title`, `box_desc` FROM `boxes_session`";
					$run_box=mysqli_query($con,$get_box);
					while($row_box=mysqli_fetch_array($run_box)){
						$box_id=$row_box['box_id'];
						$box_title=$row_box['box_title'];
						$box_desc=$row_box['box_desc'];
					
				?>
				<div class="col-lg-4 col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title" align="center">
								<?php echo $box_title;?>
							</h3>
						</div>
						<div class="panel-body">
								<?php echo $box_desc;?>
						</div>
						<div class="panel-footer">
							<center>
								<a href="index.php?delete_box=<?php echo $box_id;?>" class="pull-right">
									<i class="fa fa-trash"></i> Delete
								</a>
								<a href="index.php?update_box=<?php echo $box_id;?>" class="pull-left">
									<i class="fa fa-pencil"></i> Edit
								</a>
								<div class="clearfix"></div>
							</center>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>


<?php } ?>