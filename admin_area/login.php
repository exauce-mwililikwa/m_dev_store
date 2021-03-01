<?php
	session_start();
	include("includes/db.php");
?>
<html>
<head>
	<title>M-Dev Store Admin Area</title>
	
<link rel="stylesheet" type="text/css" href="css/sweetalert.min.css">
	<link rel="stylesheet" type="text/css" href="..\css\bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="..\font-awesome\css\font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="..\css\modern-business.css">
  <link rel="stylesheet" type="text/css" href="css\login.css">
</head>
<body>
<div class="container">
	<form action="" class="form-login" method="post">
		<h2 class="form-login-heading"> Admin Login </h2>
		<input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
		<input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">
			Login
		</button>
	</form>
</div>
	<script src="../js/jquery.js"></script>
	<script src="js/sweetalert.min.js"></script> 
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
<?php
	if(isset($_GET['login']))
	{
		echo"
			<script type='text/javascript'>
    $(document).ready(function(){
        
       swal('Bye! Bye! ', 'See you soon', 'success', {
button: 'Aww yiss!',
}); 
    })
   </script>
		";
	}
	else if(isset($_GET['authentification']))
	{
		echo"
			<script type='text/javascript'>
    $(document).ready(function(){
        
       swal('Attention', 'You must be logges', 'warning', {
button: 'Aww yiss!',
}); 
    })
   </script>
		";
	}
?>
<?php
	if(isset($_POST['admin_login'])){
		$admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);
		$admin_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
		$get_admin="select * from admins where admin_email='$admin_email' and admin_pass='$admin_pass'";
		$run_admin=mysqli_query($con,$get_admin);
		$count=mysqli_num_rows($run_admin);
		if($count==1){
			$_SESSION['admin_email']=$admin_email;
			
			echo"
				<script>window.open('index.php?login','_self')</script>
			";
		}else{
			echo"
				<script>alert('Email or password is Wrong !')</script>
			";
		}
	}
?>