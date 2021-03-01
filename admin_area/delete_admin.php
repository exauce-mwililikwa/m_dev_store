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
	if(isset($_GET['delete_admin'])){
		$delete_admin_id=$_GET['delete_admin'];
		$delete_admin="delete from admins where admin_id='$delete_admin_id'";
		$run_delete=mysqli_query($con,$delete_admin);
		if($run_delete){
			echo"<script>alert('One Account of Your administrator has been deleted')</script>";
			echo"<script>window.open('index.php?view_users','_self')</script>";
		}
	}
?>
<?php } ?>