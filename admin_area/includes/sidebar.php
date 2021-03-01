<?php
	if(!isset($_SESSION['admin_email'])){
		session_destroy();
		echo"
			<script>window.open('login.php','_self')</script>
		";
	}
	else{
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-exl-collapse">
			<span class="icon-bar">toffg</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>

		</button>
		<a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-user"></i> <?php echo $admin_name; ?><b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="index.php?user_profile=<?php echo $admin_id; ?>">
						<i class="fa fa-fw fa-user"></i> Profile
					</a>
				</li>
				<li>
					<a href="index.php?view_products">
						<i class="fa fa-fw fa-envelope"></i> Products
						<span class="badge"><?php echo $count_products ;?></span>
					</a>
				</li>
				<li>
					<a href="index.php?view_customers">
						<i class="fa fa-fw fa-users"></i> Customers
						<span class="badge"><?php echo $count_customers; ?></span>
					</a>
				</li>
				<li>
					<a href="index.php?view_cats">
						<i class="fa fa-fw fa-gear"></i> Product Categories
						<span class="badge"><?php echo $count_p_categories; ?></span>
					</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="logout.php?">
						<i class="fa fa-fw fa-power-off"></i> Log Out
					</a>
				</li>
			</ul>
	    </li>
	</ul>
			<div class="collapse navbar-collapse navbar-exl-collapse">
				<ul class="nav navbar-nav side-nav">
					<li>
						<a href="index.php?dashboard">
							<i class="fa fa-fw fa-dashboard"></i> Dashboard
						</a>
					</li>
					<li>
						<a href="#" data-toggle="collapse" data-target="#products">
							<i class="fa fa-fw fa-tag"></i> Products
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
						<ul id="products" class="collapse">
							<li>
								<a href="index.php?insert_product"> Insert Products</a>
							</li>

							<li>
								<a href="index.php?view_product"> View Products</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" data-toggle="collapse" data-target="#p_cat">
							<i class="fa fa-fw fa-edit"></i> Products Categories
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
						<ul id="p_cat" class="collapse">
							<li>
								<a href="index.php?insert_p_cat"> Insert Products Categories</a>
							</li>

							<li>
								<a href="index.php?view_p_cats"> View Products Categories</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" data-toggle="collapse" data-target="#cat">
							<i class="fa fa-fw fa-book"></i> Categories
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
						<ul id="cat" class="collapse">
							<li>
								<a href="index.php?insert_cat"> Insert Categories</a>
							</li>

							<li>
								<a href="index.php?view_cats"> View Categories</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" data-toggle="collapse" data-target="#slides">
							<i class="fa fa-fw fa-gear"></i> Slides
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
						<ul id="slides" class="collapse">
							<li>
								<a href="index.php?insert_slides"> Insert Slides</a>
							</li>

							<li>
								<a href="index.php?view_slides"> View Slides</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" data-toggle="collapse" data-target="#box">
							<i class="fa fa-fw fa-dropbox"></i> Boxes
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
						<ul id="box" class="collapse">
							<li>
								<a href="index.php?insert_box"> Insert Boxes</a>
							</li>

							<li>
								<a href="index.php?view_box"> View Boxes</a>
							</li>
							
						</ul>
					</li>
					<li>
						<a href="#" data-toggle="collapse" data-target="#manufactured">
							<i class="fa fa-fw fa-star"></i> manufactured
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
						<ul id="manufactured" class="collapse">
							<li>
								<a href="index.php?insert_manufactured"> Insert manufactured</a>
							</li>

							<li>
								<a href="index.php?view_manufactured"> View manufactured</a>
							</li>
							
						</ul>
					</li>
                    
                    <li>
						<a href="#" data-toggle="collapse" data-target="#coupon">
							<i class="fa fa-fw fa-book"></i> Coupons
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
						<ul id="coupon" class="collapse">
							<li>
								<a href="index.php?insert_coupon"> Insert Coupon</a>
							</li>

							<li>
								<a href="index.php?view_coupons"> View Coupons</a>
							</li>
							
						</ul>
					</li>
                    
					<li>
						<a href="#" data-toggle="collapse" data-target="#term">
							<i class="fa fa-fw fa-table"></i> Terms
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
						<ul id="term" class="collapse">
							<li>
								<a href="index.php?insert_term"> Insert Terms</a>
							</li>

							<li>
								<a href="index.php?view_term"> View Terms</a>
							</li>
							
						</ul>
					</li>
					<li>
						<a href="index.php?view_customers">
							<i class="fa fa-users">
							</i> View Cuctomers
						</a>
					</li>
					<li>
						<a href="index.php?edit_css">
							<i class="fa fa-pencil">
							</i> Css Editor
						</a>
					</li>
					<li>
						<a href="index.php?view_orders">
							<i class="fa fa-book">
							</i> View Orders
						</a>
					</li>
					<li>
						<a href="index.php?view_payement">
							<i class="fa fa-money">
							</i> View Payement
						</a>
					</li>
					<li>
						<a href="#" data-toggle="collapse" data-target="#users">
							<i class="fa fa-fw fa-user"></i> Users
							<i class="fa fa-fw fa-caret-down"></i>
						</a>
						<ul id="users" class="collapse">
							<li>
								<a href="index.php?insert_user"> Insert Users</a>
							</li>

							<li>
								<a href="index.php?view_users"> View Users</a>
							</li>
							<li>
								<a href="index.php?user_profile=<?php echo $admin_id;?>"> Edit User Profile</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="logout.php">
							<i class="fa fa-power-off">
							</i> Log Out
						</a>
					</li>
				</ul>
			</div>
		
</nav>
<?php } ?>