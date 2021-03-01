<center>
	<h1> My Orders </h1>
	<p class="lead"> Your Ordrs on one place</p>
	<p class="text-muted">If You have any questions,feel free to <a href="contact.php">contact us</a>  Our Customer Service work <strong>24/7</strong></p>
</center>
<hr>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th> ON: </th>
				<th> Due Account </th>
				<th> Invoice No :</th>
				<th> Qte </th>
				<th> Size </th>
				<th> Order Date </th>
				<th> Paid / Unpaid </th>
				<th> Status:</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$customer_session=$_SESSION['customer_email'];
				$get_customer="select * from customers where customer_email='$customer_session'";
				$run_customer=mysqli_query($con,$get_customer);
				$row_customer=mysqli_fetch_array($run_customer);
				$customer_id=$row_customer['customer_id'];
				$get_orders="select * from customers_orders where customer_id='$customer_id'";
				$run_orders=mysqli_query($con,$get_orders);
				$i=0;

				while($row_orders=mysqli_fetch_array($run_orders)){
					$order_id=$row_orders['order_id'];
					$due_amount=$row_orders['due_amount'];
					$invoice_no=$row_orders['invoice_no'];
					$qty=$row_orders['qty'];
					$size=$row_orders['size'];
					$order_date=$row_orders['order_date'];
					$order_status=$row_orders['order_status'];
					$i++;
					if($order_status=='pending'){
						$order_status='Unpaid';
					}else{
						$order_status='Paid';
					}
			?>
			<tr>
				<th> <?php echo $i;?> </th>
				<th> $<?php echo $due_amount;?> </th>
				<th> <?php echo $invoice_no;?> </th>
				<th> <?php echo $qty;?> </th>
				<th> <?php echo $size;?> </th>
				<th> <?php echo $order_date;?> </th>
				<th> <?php echo $order_status;?> </th>
				<th> 
					<a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm Paid </a>
				 </th>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>