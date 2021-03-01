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
				<i class="fa fa-dashboard"></i> Dashboad / View Orders
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags"></i> View Orders
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th> No </th>
								<th> Date </th>
								<th> Customer Email </th>
								<th> Invoice No </th>
								<th> Product Name </th>
								<th> price </th>
								<th> Qty </th>
								<th> size </th>
								<th> Total Amount </th>
								<th> Status </th>
								<th> Customers Delete </th>
							</tr>
						</thead> 
						<tbody>
							<?php
							$i=0;
								$get_orders="select customers_orders.order_date as date,pending_orders.order_id, customers.customer_email, pending_orders.invoice_no, products.product_title,products.product_price as prix, pending_orders.qty,(pending_orders.qty*products.product_price) as total,pending_orders.size,order_statu from pending_orders inner join products INNER JOIN customers inner JOIN customers_orders on customers.customer_id=pending_orders.customer_id and pending_orders.product_id=products.product_id and customers_orders.order_id=pending_orders.order_id ORDER by customers_orders.order_date";
								$run_orders=mysqli_query($con,$get_orders);
								while($row_orders=mysqli_fetch_array($run_orders)){
									$orders_id=$row_orders['order_id'];
									$date=$row_orders['date'];
									$customer_email=$row_orders['customer_email'];
									$invoice_no=$row_orders['invoice_no'];
									$product_title=$row_orders['product_title'];
									$qty=$row_orders['qty'];
									$total=$row_orders['total'];
									$size=$row_orders['size'];
									$prix=$row_orders['prix'];
									$order_statu=$row_orders['order_statu'];
									$i++;
								
							?>
							<tr>
								<td> <?php echo $i;?> </td>
								<td style="width 12%;"> <?php echo $date;?> </td>
								<td><?php echo $customer_email;?></td>
								<td><?php echo $invoice_no;?></td>
								<td style="width 15%;"><?php echo $product_title;?></td>
								<td><?php echo "$".$prix;?></td>
								<td><?php echo $qty;?></td>
								<td><?php echo $size;?></td>
								<td><?php echo $total;?></td>
								<td><?php echo $order_statu;?></td>
								<td>
									<a href="index.php?delete_order=<?php echo $orders_id;?>">
									<i class="fa fa-trash-o"></i> Delete 
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