<?php

  include("includes/db.php");
  include("includes/header.php");
?>
	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						Register
					</li>
				</ul>
			</div>
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<center>
							<h2>Register a new account</h2>
							
						</center>
						<form action="customer_register.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Your Name</label>
								<input type="text" class="form-control" name="c_name" required>
							</div>
							<div class="form-group">
								<label>Your Email</label>
								<input type="text" class="form-control" name="c_mail" required>
							</div>
							<div class="form-group">
								<label>Your Passowrd</label>
								<input type="password" class="form-control" name="c_pass" required>
							</div>
							<div class="form-group">
								<label>Your Country</label>
								<input type="text" class="form-control" name="c_country" required>
							</div>
							<div class="form-group">
								<label>Your City</label>
								<input type="text" class="form-control" name="c_city" required>
							</div>
							<div class="form-group">
								<label>Your Contact</label>
								<input type="tet-xt" class="form-control" name="c_contact" required>
							</div>
							<div class="form-group">
								<label>Your Address</label>
								<input type="text" class="form-control" name="c_address" required>
							</div>
							<div class="form-group">
								<label>Your Profile Picture</label>
								<input type="file" class="form-control form-height-custom" name="c_image" required>
							</div>
							<div class="text-center">
								<button class="btn btn-primary" type="submit" name="register">
								<i class="fa fa-user-md"></i> Register
								</button>
							</div>
						</form>
					</div>
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
<?php
	if(isset($_POST['register'])){
		$c_name=$_POST['c_name'];
		$c_mail=$_POST['c_mail'];
		$c_pass=$_POST['c_pass'];
		$c_country=$_POST['c_country'];
		$c_city=$_POST['c_city'];
		$c_contact=$_POST['c_contact'];
		$c_address=$_POST['c_address'];
		$c_image=$_FILES['c_image']['name'];
		$c_image_tmp=$_FILES['c_image']['tmp_name'];
		$c_ip=getRealIpUser();
		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		$insert_customer="INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES ('$c_name','$c_mail','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
			$run_customer=mysqli_query($con,$insert_customer);
			$sel_cart="select * from cart where id_add='$c_ip'";
			$run_cart=mysqli_query($con,$sel_cart);
			$check_cart=mysqli_num_rows($run_cart);
			if($check_cart>0){
				// if register whith item in cart
				$session['customer_email']=$c_mail;
				echo"<script>alert('You have been Registered Successfully')</script>";
				echo"<script>window.open('checkout.php','_self')</script>";
			}
			else{
				// if register whithout item in cart
				$_SESSION['customer_email']=$c_mail;
				echo"<script>alert('You have been Registered Successfully')</script>";
				echo"<script>window.open('index.php','_self')</script>";
			}
	}
?>