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
				<i class="fa fa-dashboard"></i> Dashboard
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"> <?php echo $count_products;?> </div>
							<div> Products </div>
						
					</div>
				</div>
			</div>
			<a href="index.php?view_product">
				<div class="panel-footer">
					<span class="pull-left">
						 View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"> <?php echo $count_customers?> </div>
							<div> Customers </div>
						
					</div>
				</div>
			</div>
			<a href="index.php?view_customers">
				<div class="panel-footer">
					<span class="pull-left">
						 View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-orange">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tags fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"> <?php echo $count_p_categories;?> </div>
							<div> Products Categories </div>
						
					</div>
				</div>
			</div>
			<a href="index.php?view_p_cats">
				<div class="panel-footer">
					<span class="pull-left">
						 View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"> <?php echo $count_pending_orders; ?> </div>
							<div> Orders </div>
						
					</div>
				</div>
			</div>
			<a href="index.php?view_p_cats">
				<div class="panel-footer">
					<span class="pull-left">
						 View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3> 
					<i class="fa fa-money fa-fw"></i> New Orders
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover-table-striped table-bordered">
						<thead>
							<tr>
							<th> Order No</th>
							<th> Customer Email:</th>
							<th> Invoice No: </th>
							<th> Product NAME: </th>
							<th> Product Qty: </th>
							<th> Product Size</th>
							<th> Status : </th>
						</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_order="SELECT `order_id`,customers.customer_email,
								 `invoice_no`, `qty`, `size`, `order_statu`,products.product_title
								  FROM `pending_orders` inner JOIN customers inner JOIN products on
								   pending_orders.customer_id=customers.customer_id and 
								   products.product_id=pending_orders.product_id order by order_id limit 0,5";
								$run_order=mysqli_query($con,$get_order);
								while ($row_order=mysqli_fetch_array($run_order)) {
									$order_id=$row_order['order_id'];
									$c_email=$row_order['customer_email'];
									$invoice_no=$row_order['invoice_no'];
									$product_title=$row_order['product_title'];
									$qty=$row_order['qty'];
									$size=$row_order['size'];
									$order_status=$row_order['order_statu'];
									$i++;
								
							?>
							<tr>
								<td> <?php echo $order_id;?> </td>
								<td> <?php echo $c_email;?> </td>
								<td> <?php echo $invoice_no;?> </td>
								<td> <?php echo $product_title;?> </td>
								<td> <?php echo $qty;?> </td>
								<td> <?php echo $size;?> </td>								
								<td> <?php echo $order_status;?> </td>

							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="text-right">
					<a href="index.php?view_orders">
						View All Order <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
	<div class="panel">
		<div class="panel-body">
			<div class="mb-md thumb-info">

				<img src="admin_images/<?php echo $admin_image;?>" alt="admin-thumb-info" class="img-responsive rounded">
				<div class="thumb-info-title">

					<span class="thumb-info-inner"><?php echo $admin_name;?></span>
					<span class="thumb-info-type"><?php echo $admin_job;?></span>


				</div>
			</div>
			<div class="md-mb">
				<div class="widget-content-expanded">
					<i class="fa fa-user"></i><span> Email: </span> <?php echo $admin_email;?> <br>
					<i class="fa fa-flag"></i><span> Countery: </span> <?php echo $admin_country;?> <br>
					<i class="fa fa-envelope"></i><span> Contact: </span> <?php echo $admin_contact;?> <br>
				</div>
				<hr class="dotted short" style="margin:10px 0 10px 0;">
				<h5 class="text-muted"> About me</h5>
				<p>
					This applications is created by EXAUCE MWILILIKWA, if you willing to contact me,please click this link. <br>
					<a href="#">M Dev Store</a><br>
					<?php echo $admin_about;?>
				</p>
			</div>
		</div>
	</div>
	</div>
</div>
<?php } ?>