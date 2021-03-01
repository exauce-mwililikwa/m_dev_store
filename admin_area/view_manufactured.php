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
				<i class="fa fa-dashboard"></i> Dashboard / View Manufactured
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i> View Manufatured
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table striped table-bordered">
						<thead>
							<tr><th> Manufactured ID</th>
								<th> Manufactured Title</th>
								<th> Manufactured Image</th>
								<th> Manufactured top</th>
								<th> Edit categories</th>
								<th> Delete Category</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_manufactured="SELECT `manufactured_id`, `manufactured_title`, 
								`manufactured_top`, `manufactured_image` FROM `manufacturers`";
								$run_manufactured=mysqli_query($con,$get_manufactured);
								while($row_manufactured=mysqli_fetch_array($run_manufactured)){
									$manufactured_id=$row_manufactured['manufactured_id'];
									$manufactured_title=$row_manufactured['manufactured_title'];
								$manufactured_top=$row_manufactured['manufactured_top'];
								$manufactured_image=$row_manufactured['manufactured_image'];
									$i++;
								
							?>
							<tr>
								<td><?php echo $manufactured_id;?></td>
								<td><?php echo $manufactured_title;?></td>
								<td><img width="60" height="60" class="img-responsive" src="other_images/<?php echo $manufactured_image;?>"></td>
								<td width="300"><?php echo $manufactured_top;?></td>

								<td>
									<a href="index.php?edit_manufactured=<?php echo $manufactured_id;?>">
										<i class="fa fa-pencil"></i> Edit
									</a>
								</td>
								<td>
									<a href="index.php?delete_manufactured=<?php echo $manufactured_id;?>">
										<i class="fa fa-trash"></i> Delete
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<?php } ?>