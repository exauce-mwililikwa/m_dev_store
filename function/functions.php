<?php
	$db=mysqli_connect("localhost","root","","ecom_store");
	function getRealIpUser(){
		switch (true) {
					
		case(!empty($_SERVER['HTTP_X_REAL_IP'])):return $_SERVER['HTTP_X_REAL_IP'];
		case(!empty($_SERVER['HTTP_CLIENT_IP'])):return $_SERVER['HTTP_CLIENT_IP'];
		case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):return $_SERVER['HTTP_X_FORWARDED_FOR'];
		default:return $_SERVER['REMOTE_ADDR'];
	}
}//xmxmxnxnsnsnmxmxsnsnmxmmxsnsnsmsm
function add_cart(){
	global $db;
	if(isset($_GET['add_cart'])){
		$ip_add=getRealIpUser();
		$p_id=$_GET['add_cart'];
		$product_qty=$_POST['product_qty'];
		$product_size=$_POST['product_size'];
		$check_product="select * from cart where id_add='$ip_add' and p_id='$p_id'";
		$run_check=mysqli_query($db,$check_product);
		if(mysqli_num_rows($run_check)>0){
			echo"<script>alert('This product has already added in cart');</script>";
			echo"<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}else{
			$get_price="select * from products where product_id='$p_id'";
			$run_price=mysqli_query($db,$get_price);
			$row_price=mysqli_fetch_array($run_price);
			$pro_price=$row_price['product_price'];
			$pro_sale=$row_price['product_sale'];
			$pro_label=$row_price['product_label'];
			if($pro_label=="sale"){
				$product_price=$pro_sale;
			}
			else{
				$product_price=$pro_price;
			}

			$query="insert into cart (p_id,id_add,qty,p_price,size)values('$p_id','$ip_add','$product_qty','$product_price','$product_size')";
			$run_query=mysqli_query($db,$query);
			echo"<script>window.open('details.php?pro_id=$p_id','_self')</script>";

		}
	}
}
		function getPro(){
		global $db;
		$get_products='select `product_id`,products.product_sale, `product_title`,
		products.product_url, `product_img1`, `product_price`,`product_label`,
		manufacturers.manufactured_title from products INNER JOIN manufacturers on 
		manufacturers.manufactured_id=products.manufactured_id order by 1 desc limit 0,8';
		$run_products=mysqli_query($db,$get_products);
		while($row_products=mysqli_fetch_array($run_products)){
			$pro_id=$row_products['product_id'];
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$pro_url=$row_products['product_url'];
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
				<div class='col-md-4 col-sm-6 single'>
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
	}
	function getPCats(){
		global $db;
		$get_P_cats="select * from product_categories";
		$run_P_cats=mysqli_query($db,$get_P_cats);
		while($row_P_cats=mysqli_fetch_array($run_P_cats)){
		$p_cat_id=$row_P_cats["p_cat_id"];
		$p_cat_title=$row_P_cats["p_cat_title"];
		echo"
			<li>
				<a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a>
			</li>
		";	

		}
	}
	function getCats(){
		global $db;
		$get_cats="select * from categories";
		$run_cats=mysqli_query($db,$get_cats);
		while($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id=$row_cats["cat_id"];
		$cat_title=$row_cats["cat_title"];
		echo"
			<li>
				<a href='shop.php?cat=$cat_id'>$cat_title</a>
			</li>
		";	

		}
	}

	function getpcatpro(){
		global $db;
		if(isset($_GET['p_cat'])){
			$p_cat_id=$_GET['p_cat'];
			$get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
			$run_p_cat=mysqli_query($db,$get_p_cat);
			$row_p_cat=mysqli_fetch_array($run_p_cat);
			$p_cat_title=$row_p_cat['p_cat_title'];
			$p_cat_desc=$row_p_cat['p_cat_desc'];
			$get_products="select * from products where p_cat_id='$p_cat_id'";
			$run_products=mysqli_query($db,$get_products);
			$count=mysqli_num_rows($run_products);
			if($count==0){
				echo"
					<div class='box'>
						<h1> No Product Found In this Product categories</h1>
					</div>
				";
			}else{
				echo"
					<div class='box'>
						<h1> $p_cat_title </h1>
						<p> $p_cat_desc </p>
					</div>
				";
			}
			while($row_products=mysqli_fetch_array($run_products)){
				$pro_id=$row_products['product_id'];
				$pro_title=$row_products['product_title'];
				$pro_price=$row_products['product_price'];
				$pro_img1=$row_products['product_img1'];
				echo "
				<div class='col-md-4 col-sm-6 center-responsive'>
					<div class='product'>
						<a href='details.php?pro_id=$pro_id'>
							<img class='img-responsive bp_product' src='admin_area/product_images/$pro_img1'>
						</a>
					
					<div class='text'>
						<h3>
							<a href='details.php?pro_id'>
								$pro_title
							</a>
						</h3>
						<p class='price'>
							$$pro_price
						</p>
						<p class='button'>
							<a  class='btn btn-default' href='details.php?pro_id'>
								View Details
							</a>
							<a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
								<i class='fa fa-shopping-cart'></i> Add to Cart
							</a>
						</p>
					</div>
				</div>
			</div>
			";
			}
			}
		}
	
	function getcatpro(){
		global $db;
		if(isset($_GET['cat'])){
			$cat_id=$_GET['cat'];
			$get_cat="select * from categories where cat_id='$cat_id'";
			$run_cat=mysqli_query($db,$get_cat);
			$row_cat=mysqli_fetch_array($run_cat);
			$cat_title=$row_cat['cat_title'];
			$cat_desc=$row_cat['cat_desc'];
			$get_cat="select * from products where cat_id='$cat_id' limit 0,6";
			$run_products=mysqli_query($db,$get_cat);
			$count=mysqli_num_rows($run_products);
			if($count==0){
				echo"
					<div class='box'>
						<h1> No Product Found I This Categories</h1>
					</div>
				";
				}else{
					echo"
						<div class='box'>
							<h1> $cat_title </h1>
							<p> $cat_desc </p>
						</div>
					";
				}
				while($row_products=mysqli_fetch_array($run_products)){
					$pro_id=$row_products['product_id'];
					$pro_title=$row_products['product_title'];
					$pro_price=$row_products['product_price'];
					$pro_desc=$row_products['product_desc'];
					$pro_img1=$row_products['product_img1'];
					echo"
					    <div class='col-md-4 col-sm-6 center-responsive'>
                            <div class='product'>
                                <a href='details.php?pro_id=$pro_id'>
                                    <img class='img-responsive bp_product' src='admin_area/product_images/$pro_img1'>
                                </a>
                                <div class='text'>
                                    <h3>
                                        <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                                    </h3>
                                    <p class='price'>
                                       $$pro_price
                                    </p>
                                    <p class='buttton'>
                                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                                          View Details
                                        </a>
                                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                                            <i class='fa fa-shopping-cart'></i> Add To Cart                                   
                                        </a>
                                    </p>
                                
                                </div>
                            </div>
                        </div>
					";
				}

		}
	}
	function items(){
		global $db;
		$ip_add=getRealIpUser();
		$get_items="select * from cart where id_add='$ip_add'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);
		echo $count_items;
	}
	function total_price(){
		global $db;
		$ip_add=getRealIpUser();
		$total=0;
		$select_cart="select * from cart where id_add='$ip_add'";
		$run_cart=mysqli_query($db,$select_cart);
		while($record=mysqli_fetch_array($run_cart)){
			$pro_id=$record['p_id'];
			$pro_qty=$record['qty'];
			$get_price="select * from products where product_id='$pro_id'";
			$run_price=mysqli_query($db,$get_price);
			while($row_price=mysqli_fetch_array($run_price)){
				$product_label=$row_price['product_label'];
				$product_sale=$row_price['product_sale'];
				if($product_label=="new"){
				$sub_total=$row_price['product_price']*$pro_qty;
			
				}
				else{
				$sub_total=$row_price['product_sale']*$pro_qty;
				
				}
				$total+=$sub_total;
			}
		}
		echo $total;
	}
	function getProducts(){
		global $db;
		$aWhere=array();
		if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){
			foreach ($_REQUEST['man'] as $skey => $sVal) {
				
					if((int)$sVal!=0){
						$aWhere[]='manufacturer_id='.(int)$sVal;
					}
				}
			}

			if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
			foreach ($_REQUEST['p_cat'] as $skey => $sVal) {
				
					if((int)$sVal!=0){
						$aWhere='p_cat_id='.$sVal;
					}
				}
			
		}

			if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
			foreach ($_REQUEST['cat'] as $skey => $sVal) {
				
					if((int)$sVal!=0){
						$aWhere='cat_id='.$sVal;
					}
				}
			}
			$per_page=6;
			if(isset($_GET['page'])){
				$page=$_GET['page'];
			}
			else{
				$page=1;
			}
			$start_from=($page-1)*$per_page;
			$slimit=" order by product_id desc limit $start_from,$per_page";
			$sWhere=(count($aWhere)<0?' where '.implode('or ', $aWhere):'').$slimit;
			$get_products="select * from products ".$sWhere;
			$run_products=mysqli_query($db,$get_products);
			while($row_products=mysqli_fetch_array($run_products)){
				$pro_id=$row_products['product_id'];
				$pro_title=$row_products['product_title'];
				$pro_price=$row_products['product_price'];
				$pro_img1=$row_products['product_img1'];
				echo"
					<div class='col-md-4 col-sm-6 center-responsive'>
					<div class='product'>
						<a href='details.php?pro_id=$pro_id'>
							<img class='img-responsive bp_product' src='admin_area/product_images/$pro_img1'>
						</a>
					
					<div class='text'>
						<h3>
							<a href='details.php?pro_id=$pro_id'>
								$pro_title
							</a>
						</h3>
						<p class='price'>
							$$pro_price
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
				</div>
			</div>
				";
			}
		}
		function getPagination(){
			global $db;
			$per_page=6;
			$sWhere=array();
			$aPath='';
			if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){
			foreach ($_REQUEST['man'] as $skey => $sVal) {
				
					if((int)$sVal!=0){
						$aWhere[]='manufacturer_id='.(int)$sVal;
						$aPath .='man[]='.(int)$sVal.'$';
					}
				}
			}

			if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
			foreach ($_REQUEST['p_cat'] as $skey => $sVal) {
				
					if((int)$sVal!=0){
						$aWhere[]='p_cat_id='.(int)$sVal;
						$aPath .='p_cat[]='.(int)$sVal.'$';
					}
				}
			
		}

			if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
			foreach ($_REQUEST['cat'] as $skey => $sVal) {
				
					if((int)$sVal!=0){
						$aWhere[]='cat_id='.(int)$sVal;
						$aPath .='cat[]='.(int)$sVal.'$';
					}
				}
			}
			$sWhere=(count($sWhere)>0?' where '.implode(' or ', $aWhere):'');
			$query="select * from products ".$sWhere;
			$result=mysqli_query($db,$query);
			$total_records=mysqli_num_rows($result);
			$total_page=ceil($total_records/$per_page);
			echo"
				<li><a href='shop.php?page=1';";
				if(!empty($aPath)){
					echo "&".$aPath;
				}
				echo "'>".'First Page'."</a></li>";
				for($i=1;$i<=$total_page;$i++){
					echo"<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";

				};
				echo"<li><a href='shop.php?page=$total_page";
				if(!empty($aPath)){
					echo "&".$aPath;
				}
				echo "'>".'Last Page'."</a></li>";
		}

?>