<?php
$active='Account';
  include("includes/header.php");
  if(isset($_GET['order_id'])){
  	$order_id=$_GET['order_id'];
  }
?>

	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						My Account
					</li>
				</ul>
			</div>
			<div class="col-md-3">
				<?php
					include("sidebar.php");
				?>
			</div>
			<div class="col-md-9">
				<div class="box">
					<h1 align="center"> Please Confirm Your Payement</h1>
					<form action="confirm.php?update_id=<?php echo $order_id;?>" method="post" enctype="mutipart/form-data">
						<div class="form-group">
							<label> Invoice No: </label>
							<input type="text" class="form-control" name="invoice_no" required>
						</div>
						<div class="form-group">
							<label> Amount Sent: </label>
							<input type="text" class="form-control" name="amount_no" required>
						</div>
						<div class="form-group">
							<label> Select Payement Method: </label>
							<select name="payment_mode" class="form-control">
								<option> Select Payment Mode </option>
								<option> Back Code </option>
								<option> Paypall </option>
								<option> Payonner </option>
								<option> Western Union</option>
							</select>
						</div>
						<div class="form-group">
							<label> Transition /Reference ID: </label>
							<input type="text" class="form-control" name="ref_no" required>
						</div>
						<div class="form-group">
							<label> Paypall / Payonner Wester-union  </label>
							<input type="text" class="form-control" name="code" required>
						</div>
						<div class="form-group">
							<label> Payement Date: </label>
							<input type="text" class="form-control" name="date" required>
						</div>
						<div class="text-center">
							<button class="btn btn-primary btn-lg" name="confirm_payment">
								<i class="fa fa-user-md"></i> Confirm Payement
							</button>
						</div>
					</form>
					<?php
						if(isset($_POST['confirm_payment'])){
								$update_id=$_GET['update_id'];
								$invoice_no=$_POST['invoice_no'];
								$amount_no=$_POST['amount_no'];
								$payment_mode=$_POST['payment_mode'];
								$ref_no=$_POST['ref_no'];
								$code=$_POST['code'];
								$payment_date=$_POST['date'];
								$complete="Complete";
								$insert_payement="INSERT INTO `payments`(`invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES('$invoice_no','$amount_no','$payment_mode','$ref_no','$code','$payment_date')";
								$run_payement=mysqli_query($con,$insert_payement);
								$update_customer_order="update customers_orders set order_status='$complete' where order_id='$update_id'";
								$run_customer_order=mysqli_query($con,$update_customer_order);
								$update_pending_order="update pending_orders set order_statu='$complete' where order_id='$update_id'";
								$run_pending_order=mysqli_query($con,$update_pending_order);
								if($run_pending_order){
									echo"<script>alert('Thank You for purchasing,your orders will be completed whithin 24 hours work')</script>";
									echo"<script>window.open('my_account.php?my_orders','_self')</script>";
								}

						}
					?>
				</div>
			</div>
		</div>
	</div>
	 <?php
        include("includes/footer.php");
       ?>
        <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
<script src="js\bootstrap.min.js"></script>
<script src="js\jquery.js"></script>
</body>
