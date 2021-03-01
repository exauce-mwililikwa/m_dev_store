<?php
$active='Home';
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
						Shop
					</li>
					<li>
						<a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
					</li>
					<li><?php echo $pro_title; ?></li>
				</ul>
			</div>
			<div class="col-md-12">
				<div id="productMain" class="row">
					<div class="col-sm-6">
						<div id="mainImage">
							<header id="myCarousel" class="carousel slide">
        
        						<ol class="carousel-indicators">
            						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            						<li data-target="#myCarousel" data-slide-to="1"></li>
            						<li data-target="#myCarousel" data-slide-to="2"></li>
        						</ol>
        						<div class="carousel-inner">
           							<div class="item active">
                						<div class="fill" style="background-image:url('admin_area/product_images/<?php echo $pro_img1; ?>');">
                						</div>
               							<div class="carousel-caption">
                   							<h2 class="animated bounce">Quelle belle nature</h2>
                						</div>
            						</div>
            						<div class="item">
                						<div class="fill" style="background-image:url('admin_area/product_images/<?php echo $pro_img2; ?>');">
                						</div>
                						<div class="carousel-caption">
                    						<h2>La nature est belle</h2>
                						</div>
            						</div>
            					    <div class="item">
                					    <div class="fill" style="background-image:url('admin_area/product_images/<?php echo       $pro_img3; ?>');">
                						</div>
                						<div class="carousel-caption">
                   							 <h2>Un couche du soleil</h2>
                						</div>
           							 </div>
            				     	
        						</div>
        						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
           							 <span class="icon-prev"></span>
        						</a>
        						<a class="right carousel-control" href="#myCarousel" data-slide="next">
            						<span class="icon-next"></span>
        						</a>
    						</header>
						</div>
						<?php echo $pro_label;?>
					</div>
					<div class="col-sm-6">
						<div class="box">
							<h1 class="text-center"><?php echo $pro_title;?></h1>
							<?php add_cart();?>
							<form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">
								<div class="form-group">
									<label for="" class="col-md-5 control-label">Products Quantity</label>
									<div class="col-md-7">
										<select name="product_qty" id="" class="form-control">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-5 control-label">
										Product size
									</label>
									<div class="col-md-7">
										<select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')">
										<option disabled selected>Select a size</option>
										<option>Small</option>
										<option>Medium</option>
										<option>Large</option>
										</select>
									</div>
								</div>
								<p class="price">
									<?php
									echo"
										$product_price $product_sale_price
									";
									?>
									
								</p>
								<p class="text-center button"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>
							</form>
						</div>
						<div class="row" id="thumbs">
							<div class="col-xs-4">
								<a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">
									<img src="admin_area/product_images/<?php echo       $pro_img1; ?>" alt="" class="img-responsive">
								</a>
							</div>
							<div class="col-xs-4">
								<a href="#" data-target="#myCarousel" data-slide-to="1" class="thumb">
									<img src="admin_area/product_images/<?php echo       $pro_img2; ?>" alt="" class="img-responsive">
								</a>
							</div>
							<div class="col-xs-4">
								<a href="#" data-target="#myCarousel" data-slide-to="2" class="thumb">
									<img src="admin_area/product_images/<?php echo       $pro_img3; ?>" alt="" class="img-responsive">
								</a>
							</div>
							

						</div>
					</div>
				</div>
				<div class="box" id="details">
					<p>
						<h4>Product Details</h4>
					</p>
                
                       
					<p>
						<?php echo $pro_desc;?>
					</p>
					<h4>size</h4>
					<ul>
						<li>Small</li>
						<li>Medium</li>
						<li>Large</li>
					</ul>
					<hr>
				</div>
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
		</div>
	</div>
	 <?php
        include("includes/footer.php");
       ?>
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>