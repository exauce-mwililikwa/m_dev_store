<?php
session_start();
include("includes/db.php");
include("function/functions.php");

?>
<?php
if(isset($_GET['pro_id'])){
	$product_id=$_GET['pro_id'];
	$get_product="select products.p_cat_id,products.product_img2,products.product_img3,
	products.product_desc,`product_id`,products.product_sale, `product_title`, `product_img1`,
	 `product_price`,`product_label`,manufacturers.manufactured_title from products 
	 INNER JOIN manufacturers on manufacturers.manufactured_id=products.manufactured_id
	  where product_id='$product_id'";
	$run_product=mysqli_query($con,$get_product);
	$row_product=mysqli_fetch_array($run_product);
	$p_cat_id=$row_product['p_cat_id'];
	$pro_title=$row_product['product_title'];
	$pro_price=$row_product['product_price'];
	$pro_desc=$row_product['product_desc'];
	$pro_img1=$row_product['product_img1'];
	$pro_img2=$row_product['product_img2'];
	$pro_img3=$row_product['product_img3'];
	$pro_label=$row_product['product_label'];
	$product_sale=$row_product['product_sale'];
	$get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
	$run_p_cat=mysqli_query($con,$get_p_cat);
	$row_p_cat=mysqli_fetch_array($run_p_cat);
	$p_cat_title=$row_p_cat['p_cat_title'];

			if($pro_label=='sale'){
				$product_price="PRICE : "."
					<del>$$pro_price</del>
				";
				$product_sale_price="</br>"."SALE :"." $$product_sale";
			}else{
				$product_price="PRICE :"."$$pro_price ";
				$product_sale_price="";
			}
	if($pro_label==""){}
				else{
					$pro_label="
						<a class='label $pro_label' href='#'>
							<div class='theLabel'>$pro_label</div>
							<div class='labelBackground'></div>
						</a>
					";
				}


}
?>
<html>
<head>
	<title>M-Dev Store</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/modern-business.css">
</head>
<body>
	<div id="top"><!--Top begin-->
		<div class="container">
			<div class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
					<?php
						if(!isset($_SESSION['customer_email'])){
							echo "Welcome: Guest";
						}else{
							echo "Welcome: " . $_SESSION['customer_email'] . "";
						}
					?>  
				</a>
				<a href="checkout.php"><?php items();?> items in your Cart|Total Prices:$<?php total_price(); ?> </a>
			</div>
			<div class="col-md-6">
				<ul class="menu">
					<li>
						<a href="customer_register.php">Register</a>
					</li>
					<li>
						<a href="my_account.php">My Account</a>
					</li>
					<li>
						<a href="cart.php">Go To Cart</a>
					</li>
					<li>
						<a href="checkout.php">
							<?php
								
										if(!isset($_SESSION['customer_email'])){
											echo "<a href='checkout.php'>Login</a>";
										}else{
											echo "<a href='logout.php'>Log out</a>";
										}
					
							?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div><!--Top Finish-->
	<div id="navbar" class="navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand home">
					<img src="image/Bank Cards_48px.png" alt="M-dev-Store logo Mobile" class="visible-xs">
					<img src="image/Bank Cards_48px.png" alt="M-dev-Store logo Mobile" class="hidden-xs">
				</a>
				<button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only">Toggle Seach</span>
					<i class="fa fa-search"></i>
				</button>
		</div>
		<div class="navbar-collapse" id="navigation">
			<div class="padding-nav">
				<ul class="nav navbar-nav left">
					<li class="<?php if($active=='Home') echo"active"?>">
						<a href="index.php">Home</a>
					</li>
					<li class="<?php if($active=='Shop') echo"active"?>">
						<a href="shop.php">Shop</a>
					</li>
					<li class="<?php if($active=='Account') echo"active"?>">
						<?php
							if(!isset($_SESSION['customer_email'])){
								echo"<a href='checkout.php'>My Account </a>";
							}
							else{
								echo"<a href='my_account.php?my_orders'>My Account </a>";
							}
						?>
					</li>

					<li class="<?php if($active=='Cart') echo"active"?>">
						<a href="cart.php">Shopping Cart</a>
					</li>
					<li class="<?php if($active=='Contact') echo"active"?>">
						<a href="contact.php">Contact us</a>
					</li>
				</ul>
			</div>
			<a href="cart.php" class="btn navbar-btn btn-primary right">
				<i class="fa fa-shopping-cart"></i>
				<span><?php items(); ?> Items In Your Cart</span>
			</a>
			<div class="navbar-collapse collapse right">
				<button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
					<span class="sr-only">Toggle seach</span>
					<i class="fa fa-search"></i>
				</button>
			</div>
			<div class="collapse clearfix" id="search">
				<form method="get" action="results.php" class="navbar-form">
					<div class="input-group">
						<p><input type="text" class="form-control" placeholder="search" name="user_query" required>
						<button type="submit" name="search" value="Search" class="btn btn-primary">
							<i class="fa fa-search"></i>
						</button></p>
					</div>
				</form>
			</div>
		</div>
		</div>
	</div>