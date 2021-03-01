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
				<i class="fa fa-dashboard"></i> Dashboad / View Payement
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags"></i> View Payement
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th> No: </th>
								<th> Invoice No </th>
								<th> Amount Paid </th>
								<th> Method </th>
								<th> Reference No </th>
								<th> Payement Code </th>
								<th> Payement Date </th>
								<th> Delete Payement </th>
							</tr>
						</thead> 
						<tbody>
							<?php
							$i=0;
								$get_payments="SELECT `payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date` FROM payments";
								$run_payments=mysqli_query($con,$get_payments);
								while($row_payments=mysqli_fetch_array($run_payments)){
									$payments_id=$row_payments['payment_id'];
									$invoice_no=$row_payments['invoice_no'];
									$amount=$row_payments['amount'];
									$payment_mode=$row_payments['payment_mode'];
									$ref_no=$row_payments['ref_no'];
									$code=$row_payments['code'];
									$payment_date=$row_payments['payment_date'];
									$i++;
								
							?>
							<tr>
								<td> <?php echo $i;?> </td>
								<td style="width: 12%;"> <?php echo $invoice_no?> </td>
								<td><?php echo "$".$amount;?></td>
								<td><?php echo $payment_mode;?></td>
								<td style="width: 15%;"><?php echo $ref_no;?></td>
								<td><?php echo $code;?></td>
								<td><?php echo $payment_date;?></td>
								<td>
									<a href="index.php?delete_payment=<?php echo $payments_id;?>">
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