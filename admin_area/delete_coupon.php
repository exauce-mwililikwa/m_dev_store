<?php
	if(!isset($_SESSION['admin_email'])){
		session_destroy();
		echo"
			<script>window.open('login.php','_self')</script>
		";
	}
	else{
?>
<?php
	if(isset($_GET['delete_coupon'])){
		$delete_coupon=$_GET['delete_coupon'];
		$delete_coupon="delete from coupons where coupon_id='$delete_coupon'";
		$run_delete=mysqli_query($con,$delete_coupon);
		if($run_delete){
			echo"<script>alert('One of your coupons has been deleted succesfully')</script>";
			echo"<script>window.open('index.php?view_coupons','_self')</script>";
		}
	}
?>
<?php } ?>