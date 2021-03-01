<?php
	session_start();
	include("includes/db.php");
	if(!isset($_SESSION['admin_email'])){
		session_destroy();
		echo"
			<script>window.open('login.php?authentification','_self')</script>
		";
	}
	else{
		$admin_session=$_SESSION['admin_email'];
		$get_admin="select * from admins where admin_email='$admin_session'";
		$run_admin=mysqli_query($con,$get_admin);
		$row_admin=mysqli_fetch_array($run_admin);
		$admin_id=$row_admin['admin_id'];
		$admin_name=$row_admin['admin_name'];
		$admin_email=$row_admin['admin_email'];
		$admin_image=$row_admin['admin_image'];
		$admin_country=$row_admin['admin_country'];
		$admin_about=$row_admin['admin_about'];
		$admin_contact=$row_admin['admin_contact'];
		$admin_job=$row_admin['admin_job'];
		$get_products="select * from products";
		$run_products=mysqli_query($con,$get_products);
		$count_products=mysqli_num_rows($run_products);
		$get_customers="select * from customers";
		$run_customers=mysqli_query($con,$get_customers);
		$count_customers=mysqli_num_rows($run_customers);
		$get_p_categories="select * from product_categories";
		$run_p_categories=mysqli_query($con,$get_p_categories);
		$count_p_categories=mysqli_num_rows($run_p_categories);
		$get_pending_orders="select * from pending_orders";
		$run_pending_orders=mysqli_query($con,$get_pending_orders);
		$count_pending_orders=mysqli_num_rows($run_pending_orders);
?>
<html>
<head>
	<title>M-Dev Store Admin Area</title>
<link rel="stylesheet" type="text/css" href="css/sweetalert.min.css">
	<link rel="stylesheet" type="text/css" href="..\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="stylesheet" type="text/css" href="..\font-awesome\css\font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="..\css\modern-business.css">
</head>
<body>
	 <div id="wrapper">
	 	<?php include("includes/sidebar.php");?>
	 	<div id="page-wrapper">
	 		<div class="container-fluid">
	 			<?php
	 				if(isset($_GET['dashboard'])){
	 					include("dashbord.php");
	 				}
	 				else if(isset($_GET['insert_product'])){
	 					include("insert_product.php");
	 				}else if(isset($_GET['login'])){
	 					include("dashbord.php");
	 				}
	 				else if(isset($_GET['view_product'])){
	 					include("view_products.php");
	 				}
	 				else if(isset($_GET['delete_product'])){
	 					include("delete_product.php");
	 				}
	 				else if(isset($_GET['edit_product'])){
	 					include("edit_product.php");
	 				}
	 				else if(isset($_GET['view_p_cats'])){
	 					include("view_p_cats.php");
	 				}
	 				else if(isset($_GET['insert_p_cat'])){
	 					include("insert_p_cat.php");
	 				}
	 				else if(isset($_GET['delete_p_cat'])){
	 					include("delete_p_cat.php");
	 				}
	 				else if(isset($_GET['edit_p_cat'])){
	 					include("edit_p_cat.php");
	 				}
	 				else if(isset($_GET['insert_cat'])){
	 					include("insert_cat.php");
	 				}
	 				else if(isset($_GET['view_cats'])){
	 					include("view_cats.php");
	 				}
	 				else if(isset($_GET['edit_cat'])){
	 					include("edit_cat.php");
	 				}
	 				else if(isset($_GET['delete_cat'])){
	 					include("delete_cat.php");
	 				}
	 				else if(isset($_GET['insert_slides'])){
	 					include("insert_slides.php");
	 				}
	 				else if(isset($_GET['view_slides'])){
	 					include("view_slides.php");
	 				}
	 				else if(isset($_GET['delete_slide'])){
	 					include("delete_slide.php");
	 				}
	 				else if(isset($_GET['update_slide'])){
	 					include("update_slide.php");
	 				}
	 				else if(isset($_GET['view_customers'])){
	 					include("view_customers.php");
	 				}
	 				else if(isset($_GET['delete_customer'])){
	 					include("delete_customer.php");
	 				}
	 				else if(isset($_GET['view_orders'])){
	 					include("view_orders.php");
	 				}
	 				else if(isset($_GET['delete_order'])){
	 					include("delete_order.php");
	 				}
	 				else if(isset($_GET['view_payement'])){
	 					include("view_payement.php");
	 				}
	 				else if(isset($_GET['delete_payment'])){
	 					include("delete_payment.php");
	 				}
	 				else if(isset($_GET['view_users'])){
	 					include("view_users.php");
	 				}
	 				else if(isset($_GET['delete_admin'])){
	 					include("delete_admin.php");
	 				}
	 				else if(isset($_GET['insert_user'])){
	 					include("insert_user.php");
	 				}
	 				else if(isset($_GET['edit_admin'])){
	 					include("edit_admin.php");
	 				}
	 				else if(isset($_GET['insert_box'])){
	 					include("insert_box.php");
	 				}
	 				else if(isset($_GET['view_box'])){
	 					include("view_box.php");
	 				}
	 				else if(isset($_GET['delete_box'])){
	 					include("delete_box.php");
	 				}else if(isset($_GET['update_box'])){
	 					include("update_box.php");
	 				
	 				}else if(isset($_GET['insert_term'])){
	 					include("insert_term.php");
	 				}else if(isset($_GET['view_term'])){
	 					include("view_term.php");
	 				}else if(isset($_GET['delete_term'])){
	 					include("delete_term.php");
	 				}else if(isset($_GET['view_term'])){
	 					include("view_term.php");
	 				}
	 				else if(isset($_GET['update_term'])){
	 					include("update_term.php");
	 				}
	 				else if(isset($_GET['edit_css'])){
	 					include("edit_css.php");
	 				}
	 				else if(isset($_GET['insert_manufactured'])){
	 					include("insert_manufactured.php");
	 				}
	 				else if(isset($_GET['view_manufactured'])){
	 					include("view_manufactured.php");
	 				}
	 				else if(isset($_GET['delete_manufactured'])){
	 					include("delete_manufactured.php");
	 				}
	 				
	 				else if(isset($_GET['edit_manufactured'])){
	 					include("edit_manufactured.php");
	 				}
                    else if(isset($_GET['insert_coupon'])){
	 					include("insert_coupon.php");
	 				}
                    else if(isset($_GET['view_coupons'])){
	 					include("view_coupons.php");
	 				}
	 				else if(isset($_GET['delete_coupon'])){
	 					include("delete_coupon.php");
	 				}
	 				else if(isset($_GET['edit_coupons'])){
	 					include("edit_coupons.php");
	 				}

	 			?>
	 		</div>
	 	</div>
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
        
       swal('Felicitation!', 'Your are logged successfully', 'success', {
button: 'Aww yiss!',
}); 
    })
   </script>
		";
	}
?>


<?php } ?>