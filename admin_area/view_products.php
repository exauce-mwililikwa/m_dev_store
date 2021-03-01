<?php
	if(!isset($_SESSION['admin_email'])){
		session_destroy();
		echo"
			<script>window.open('login.php','_self')</script>
		";
	}
	else{
?>
<html>
<head>
	<title></title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboad / View Products
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags"></i> View Products
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th> Product ID </th>
								<th> Product Title</th>
								<th> Product Image</th>
								<th> Product Price</th>
								<th> Product Sold</th>
								<th> Product KeyBoard</th>
								<th> Product Date</th>
								<th> Product Delete</th>
								<th> Product Edit</th>
							</tr>
						</thead> 
						<tbody>
							<?php
							$i=0;
								$get_pro="SELECT products.product_id, `p_cat_id`, 
								`cat_id`, `date`, `product_title`, `product_img1`,
								 `product_img2`, `product_img3`, `product_price`,
								  `product_desc`, `product_keywoords`,sum(pending_orders.qty)
								   as somme  FROM `products` LEFT JOIN pending_orders on 
								   pending_orders.product_id=products.product_id GROUP by 
								   products.product_id";
								$run_pro=mysqli_query($con,$get_pro);
								while($row_pro=mysqli_fetch_array($run_pro)){
									$pro_id=$row_pro['product_id'];
									$pro_title=$row_pro['product_title'];
									$pro_img1=$row_pro['product_img1'];
									$pro_price=$row_pro['product_price'];
									$pro_date=$row_pro['date'];
									$pro_keywords=$row_pro['product_keywoords'];
									$pro_somme=$row_pro['somme'];
									$i++;
								
							?>
							<tr>
								<td> <?php echo $i;?> </td>
								<td><?php echo $pro_title;?></td>
								<td><img width="60" height="60" src="product_images/<?php echo $pro_img1;?>"></td>
								<td><?php echo "$".$pro_price;?></td>
								<td>
									<?php
										if($pro_somme==null){
											echo "0";
										}
										else{
											echo $pro_somme;
										}
									?>
								</td>
								<td><?php echo $pro_keywords;?></td>
								<td><?php echo $pro_date;?></td>
								<td>
									<a href="index.php?delete_product=<?php echo $pro_id;?>">
									<i class="fa fa-trash-o"></i> Delete 
									</a>
								</td>
								<td>
									<a href="index.php?edit_product=<?php echo $pro_id;?>">
									<i class="fa fa-pencil"></i> Edit 
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>		
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>