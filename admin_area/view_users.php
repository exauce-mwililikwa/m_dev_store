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
	<title></title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboad / View users
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags"></i> View users
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th> No: </th>
								<th> User name </th>
								<th> User image </th>
								<th> User email </th>
								<th> User Country </th>
								<th> User job </th>
								<th> User Contact </th>
								<th> Delete</th>
								<th> Edit</th>
							</tr>
						</thead> 
						<tbody>
							<?php
							$i=0;
								$get_c="SELECT `admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job` FROM `admins`";
								$run_c=mysqli_query($con,$get_c);
								while($row_c=mysqli_fetch_array($run_c)){
									$admin_id=$row_c['admin_id'];
									$admin_name=$row_c['admin_name'];
									$admin_email=$row_c['admin_email'];
									$admin_image=$row_c['admin_image'];
									$admin_country=$row_c['admin_country'];
									$admin_about=$row_c['admin_about'];
									$admin_contact=$row_c['admin_contact'];
									$admin_job=$row_c['admin_job'];
									$i++;
								
							?>
							<tr>
								<td> <?php echo $i;?> </td>
								<td><?php echo $admin_name;?></td>
								<td><img width="60" height="60" src="admin_images/<?php echo $admin_image;?>"></td>
								<td><?php echo $admin_email;?></td>
								<td><?php echo $admin_country;?></td>
								<td><?php echo $admin_job;?></td>
								<td><?php echo $admin_contact;?></td>
								<td>
									<a href="index.php?delete_admin=<?php echo $admin_id;?>">
									<i class="fa fa-trash-o"></i> Delete 
									</a>
								</td>
								<td>
									<a href="index.php?edit_admin=<?php echo $admin_id;?>">
									<i class="fa fa-pencil"></i> Edit 
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
</body>
</html>
<?php } ?>