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
	if(isset($_GET['delete_box'])){
		$delete_box_id=$_GET['delete_box'];
		$delete_box="delete from boxes_session where box_id='$delete_box_id'";
		$run_delete=mysqli_query($con,$delete_box);
		if($run_delete){
			echo"<script>alert('One of the boxes has been deleted')</script>";
			echo"<script>window.open('index.php?view_box','_self')</script>";
		}
	}
?>
<?php } ?>