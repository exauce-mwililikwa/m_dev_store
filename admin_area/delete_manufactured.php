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
	if(isset($_GET['delete_manufactured'])){
		$delete_manufactured_id=$_GET['delete_manufactured'];
		$delete_manufactured="delete from manufacturers where manufactured_id='$delete_manufactured_id'";
		$run_delete=mysqli_query($con,$delete_manufactured);
		if($run_delete){
			echo"<script>alert('One of the manufacturers has been deleted')</script>";
			echo"<script>window.open('index.php?view_manufactured','_self')</script>";
		}
	}
?>
<?php } ?>