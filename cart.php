<?php
$active='Cart';
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
						Cart
					</li>
				</ul>
			</div>
			<div id="cart" class="col-md-9">
				<div class="box">
					<form action="cart.php" method="post" enctype="multipart/form-data">
						<h1>Shopping Cart</h1>
						<?php
							$ip_add=getRealIpUser();
							$select_cart="select * from cart where id_add='$ip_add'";
							$run_cart=mysqli_query($con,$select_cart);
							$count=mysqli_num_rows($run_cart);
						?>
						<p class="text-muted">You currently have <?php echo $count; ?> item in your cart</p>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>

										<th colspan="2">Product</th>
										<th>Quantity</th>
										<th>Unit Price</th>
										<th>size</th>
										<th colspan="1">Delete</th>
										<th colspan="2">Sub-Total</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$total=0;
										while($row_cart=mysqli_fetch_array($run_cart)){

										$pro_id=$row_cart['p_id'];
										$pro_size=$row_cart['size'];
										$pro_qty=$row_cart['qty'];
										
										$get_products="select * from products where product_id='$pro_id'";
										$run_products=mysqli_query($con,$get_products);
										while($row_products=mysqli_fetch_array($run_products)){
											$product_title=$row_products['product_title'];
											$product_img1=$row_products['product_img1'];
											$only_price=$row_products['product_price'];
											$product_label=$row_products['product_label'];
											
											$sub_total=$row_products['product_price']*$pro_qty;
											$total+=$sub_total;
											if($product_label=="new"){
												$only_price=$row_products['product_price'];
												$sub_total=$row_products['product_price']*$pro_qty;
												
											}
											else{
												$only_price=$row_products['product_sale'];
												$sub_total=$row_products['product_sale']*$pro_qty;
											
											}
												$total+=$sub_total;
										}
									?>
									<tr>
										<td>
											<img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>">
										</td>	
										<td>
											<a href="details.php?pro_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>
										</td>
										<td><?php echo $pro_qty; ?></td>	
										<td>$<?php echo $only_price; ?></td>
										<td><?php echo $pro_size; ?></td>
										<td>
											<input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
										</td>
										<td>$<?php echo $sub_total; ?></td>								
									</tr>
									<?php }?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5">Total</th>
										<th colspan="2">$<?php total_price(); ?></th>
									</tr>
								</tfoot>
							</table>
							<div class="form-inline pull-right">
								<div class="form-group">
									<label> Coupon Code: </label>
									<input type="text" name="code" class="form-control">
									<input type="submit" class="btn btn-primary" value="Use Coupon" name="apply_coupon">
								</div>
							</div>

						</div>
						<div class="box-footer">
							<div class="pull-left">
								<a href="" class="btn btn-default">
									<i class="fa fa-chevron-left"></i>Continue Shoping
								</a>
							</div>
							<div class="pull-right ">
								<button name="update" value="Update Cart" class="btn btn-default">
									<i class="fa fa-refresh"></i>Update Cart
								</button>
								<a href="checkout.php" class="btn btn-primary">
									Proceed Checkout
									<i class="fa fa-chevron-right"></i> 
								</a>
							</div>
						</div>
					</form>
				</div>
				<?php
					if(isset($_POST['apply_coupon'])){
						$code=$_POST['code'];
						if($code==""){
							echo"
								<script>alert('insert some things')</script>
								";
						}
							else{
								$get_coupons="select * from coupons where coupon_code='$code'";
								$run_coupons=mysqli_query($con,$get_coupons);
								$check_coupon=mysqli_num_rows($run_coupons);
								if($check_coupon=="1"){
									$row_coupons=mysqli_fetch_array($run_coupons);
									$coupon_pro_id=$row_coupons['product_id'];
									$coupon_limit=$row_coupons['coupon_limit'];
									$coupon_price=$row_coupons['coupon_price'];
									$coupon_used=$row_coupons['coupon_used'];
									if($coupon_limit==$coupon_used){
										echo"
											<script>alert('Your Coupon Already Expired')</script>
										";
									}
									else{
										$get_cart="select * from cart where p_id='$coupon_pro_id' and id_add='$ip_add'";
										$run_cart=mysqli_query($con,$get_cart);
										$check_cart=mysqli_num_rows($run_cart);

										if($check_cart=="1"){

											$add_used="update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";
											$run_used=mysqli_query($con,$add_used);
											$update_cart="update cart set p_price='$coupon_price' where p_id='$coupon_pro_id' and ip_add='$ip_add'";
											$run_update_cart=mysqli_query($con,$update_cart);
											echo"
												<script>alert('Your Coupon Has Been Applied')</script>
												<script>window.open('cart.php','_self')</script>
											";
										}else{
											echo"
												<script>alert('Your Coupon Didnt Match With Your Product On Your Cart')</script>
											";
										}
									}
								}
								else{
									echo"
										<script>alert('You Coupon Is not Valid')</script>
									";
								}
							}
					}
				?>
				<?php
					function update_cart(){
						global $con;
						if(isset($_POST['update'])){
							foreach ($_POST['remove'] as $remove_id) {
								$delete_product="delete from cart where p_id='$remove_id'";
								$run_delete=mysqli_query($con,$delete_product);
								if($run_delete){
									echo "<script>window.open('cart.php','_self')</script>";
								}
							}
						}
					}
					echo @$up_cart=update_cart();
				?>
				<div id="same-heigh-row">
					<div class="col-md-3 col-sm-6">
						<div class="box same-height headline">
							<h3 class="text-center">Products You Maybe Like</h3>
						</div>
					</div>
					<?php
						$get_products="select `product_id`,products.product_sale, `product_title`,
		 `product_img1`, `product_price`,`product_label`,manufacturers.manufactured_title 
		 from products INNER JOIN manufacturers on manufacturers.manufactured_id=products.manufactured_id 
		  order by rand() limit 0,3";
					$run_products=mysqli_query($con,$get_products);
					while($row_products=mysqli_fetch_array($run_products)){
						$pro_id=$row_products['product_id'];
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$pro_img1=$row_products['product_img1'];
			$pro_label=$row_products['product_label'];
			$product_sale=$row_products['product_sale'];
			$manufactured_title=$row_products['manufactured_title'];
			if($pro_label=='sale'){
				$product_price="
					<del>$$pro_price</del>
				";
				$product_sale_price="/ $$product_sale";
			}else{
				$product_price="$$pro_price ";
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
			echo "
				<div class='col-md-3 col-sm-6 center-responsive'>
					<div class='product'>
						<a href='details.php?pro_id=$pro_id'>
							<img class='img-responsive bp_product' src='admin_area/product_images/$pro_img1'>
						</a>
					
					<div class='text'>
					<center>
						<p class='btn btn-primary'>$manufactured_title</p>
					</center>
						<h3>
							<a href='details.php?pro_id=$pro_id'>
								$pro_title
							</a>
						</h3>
						<p class='price'>
							$product_price $product_sale_price
						</p>
						<p class='button'>
							<a  class='btn btn-default' href='details.php?pro_id=$pro_id'>
								View Details
							</a>
							<a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
								<i class='fa fa-shopping-cart'></i> Add to Cart
							</a>
						</p>
					</div>
					$pro_label
				</div>
			</div>
			";
					}
					?>
				</div>
			</div>
			<div class="col-md-3">
				<div id="order-summary" class="box">
					<div class="box-header">
						<h3>Order Summary</h3>
					</div>
					<p class="text-muted">
						Shipping and additional coast are calculed based on value you have entered
					</p>
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>Order Sub-Total</td>
									<th>$<?php total_price(); ?></th>
								</tr>
								<tr>
									<td>Shipping and Handling</td>
									<td>$0</td>
								</tr>
								<tr>
									<td>Tax</td>
									<th>$0</th>
								</tr>
								<tr class="total">
									<td>Total</td>
									<th>$<?php total_price(); ?></th>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
	</div>
	 <?php
        include("includes/footer.php");
       ?>
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>