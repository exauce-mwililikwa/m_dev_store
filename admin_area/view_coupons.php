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
				<i class="fa fa-dashboard"></i> Dashboad / View Coupons
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags"></i> View Coupons
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th> Coupon ID </th>
								<th> Coupon Title</th>
								<th> Coupon price</th>
								<th> Coupon Code</th>
								<th> Coupon limit</th>
								<th> Coupon used</th>
								<th> Product Delete</th>
								<th> Product Edit</th>
							</tr>
						</thead> 
						<tbody>
							<?php
							$i=0;
								$get_coupon="SELECT `coupon_id`, `product_id`, `coupon_file`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used` FROM `coupons` ";
								$run_coupon=mysqli_query($con,$get_coupon);
								while($row_pro=mysqli_fetch_array($run_coupon)){
									$coupon_id=$row_pro['coupon_id'];
									$product_id=$row_pro['product_id'];
									$coupon_file=$row_pro['coupon_file'];
									$coupon_price=$row_pro['coupon_price'];
									$coupon_code=$row_pro['coupon_code'];
									$coupon_limit=$row_pro['coupon_limit'];
									$coupon_used=$row_pro['coupon_used'];
									$i++;
								
							?>
							<tr>
								<td><?php echo $coupon_id;?> </td>
								<td><?php echo $coupon_file;?></td>
								<td><?php echo $coupon_price;?></td>
								<td><?php echo $coupon_code;?></td>
								<td><?php echo $coupon_limit;?></td>
								<td><?php echo $coupon_used;?></td>
								<td>
									<a href="index.php?delete_coupon=<?php echo $coupon_id;?>">
									<i class="fa fa-trash-o"></i> Delete 
									</a>
								</td>
								<td>
									<a href="index.php?edit_coupons=<?php echo $coupon_id;?>">
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