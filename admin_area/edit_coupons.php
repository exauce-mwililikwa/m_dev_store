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
	if(isset($_GET['edit_coupons'])){
		$edit_id=$_GET['edit_coupons'];
		$edit_coupon="select `coupon_id`, coupons.product_id, `coupon_file`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`,products.product_title,products.product_id from coupons INNER JOIN products on products.product_id=coupons.product_id  where coupon_id='$edit_id'";
		$run_edit_coupon=mysqli_query($con,$edit_coupon);
		$row_edit_coupon=mysqli_fetch_array($run_edit_coupon);
		$coup_id=$row_edit_coupon['coupon_id'];
		$product_id=$row_edit_coupon['product_id'];
		$coup_file=$row_edit_coupon['coupon_file'];
		$coupon_price=$row_edit_coupon['coupon_price'];
		$coupon_code=$row_edit_coupon['coupon_code'];
		$coupon_limit=$row_edit_coupon['coupon_limit'];
		$coupon_used=$row_edit_coupon['coupon_used'];
		$product_title=$row_edit_coupon['product_title'];
	}
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> DashBoar / Edit coupon
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit coupon
				</h3>
			</div>
			<div class="panel-body">
				<form method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label"> coupon Title</label>
						<div class="col-md-6">
							<input type="text" value="<?php echo $coup_file;  ?>" name="coupon_title" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> coupon Price</label>
						<div class="col-md-6">
							<input type="number" value="<?php echo $coupon_price;  ?>" name="coupon_price" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"> coupon Limit</label>
						<div class="col-md-6">
							<input type="number" value="<?php echo $coupon_limit;  ?>" name="coupon_limit" class="form-control" required>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-md-3 control-label"> Select product </label>
						<div class="col-md-6">
							<select name="product_id" class="form-control" required>
                                <option value="<?php echo $product_id?>"><?php echo $product_title?></option>
                                <?php
                                    $get_p="select * from products";
                                    $run_p=mysqli_query($con,$get_p);
                                    while($row_p=mysqli_fetch_array($run_p)){
                                    	$p_id=$row_p['product_id'];
                                    	$p_title=$row_p['product_title'];
                                    	echo"
                                    		<option value='$p_id'>$p_title</option>
                                    	";
                                    }
        
                                ?>
                            </select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> coupon code</label>
						<div class="col-md-6">
							<input type="text" value="<?php echo $coupon_code;?>" name="coupon_code" class="form-control">
						</div>
					</div>
                    
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input name="submite" value="Edit coupon" type="submit" class="btn btn-primary form-control">
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>
<?php
	if(isset($_POST['submite'])){
		$coupon_title=$_POST['coupon_title'];
		$coupon_price=$_POST['coupon_price'];
		$coupon_code=$_POST['coupon_code'];
		$coupon_limit=$_POST['coupon_limit'];
		$coupon_pro_id=$_POST['product_id'];
		$coupon_used=0;
		$update_coupons="update coupons set product_id='$coupon_pro_id',coupon_file='$coupon_title',coupon_code='$coupon_code' where coupon_id='$coup_id'";
		$run_update_coupon=mysqli_query($con,$update_coupons);
		
			echo"
				<script>alert('Your Coupon Has Benn Update')</script>
			";
			echo"
				<script>window.open('index.php?view_coupons','_self')</script>
			";
		
		
	}
?>
<?php } ?>