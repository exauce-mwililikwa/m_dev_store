<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<h3 class="panel-title">
			Manufacturers
			<div class="pull-right">
				<a href="#" style="color:black;"></a>
				<span class="nav-toggle hide-show">
					Hide
				</span>
			</div>
		</h3>
	</div>
	<div class="panel-collapse collapse-data">
	<div class="panel-body">
		<div class="input-group">
			<input class="form-control" data-action="filter" data-filters="#dev-manufacturer" id="dev-table-filter" placeholder="Filder Manufactured">
			<a href="" class="input-group-addon">
				<i class="fa fa-search"></i>
			</a>
		</div>
		</div>
		<div class="panel-body scroll-menu">
		<ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer">
			<?php
				$get_manufacturers="select `manufactured_id`, `manufactured_title`, `manufactured_top`, `manufactured_image` from manufacturers where manufactured_top='yes'";
				$run_manufacturers=mysqli_query($con,$get_manufacturers);
				while($row_manufacturers=mysqli_fetch_array($run_manufacturers))
				{
					$manufacturers_id=$row_manufacturers['manufactured_id'];
					$manufacturers_title=$row_manufacturers['manufactured_title'];
					$manufacturers_image=$row_manufacturers['manufactured_image'];
					if($manufacturers_image==""){

					}else{
						$manufacturers_image="<img src='admin_area/other_images/$manufacturers_image' width='20px'>&nbsp";
					}
					echo"<li style='background:#dddddd;' class='checkbox checkbox-primary'>
						<a>
							<label>
								<input value='$manufacturers_id' type='checkbox' name='manufacturer' class='get_manufacturers'>
								<span>	
								$manufacturers_image
								$manufacturers_title
								</span>
							</label>
						</a>
					<li>";
				}
				$get_manufacturers="select `manufactured_id`, `manufactured_title`, `manufactured_top`, `manufactured_image` from manufacturers where manufactured_top='no'";
				$run_manufacturers=mysqli_query($con,$get_manufacturers);
				while($row_manufacturers=mysqli_fetch_array($run_manufacturers))
				{
					$manufacturers_id=$row_manufacturers['manufactured_id'];
					$manufacturers_title=$row_manufacturers['manufactured_title'];
					$manufacturers_image=$row_manufacturers['manufactured_image'];
					if($manufacturers_image==""){

					}else{
						$manufacturers_image="<img src='admin_area/other_images/$manufacturers_image' width='20px'>&nbsp";
					}
					echo"<li style='background:#ddd' class='checkbox checkbox-primary'>
						<a>
							<label>
								<input value='$manufacturers_id' type='checkbox' name='manufacturer' class='get_manufacturers'>
								<span>
									$manufacturers_image
									$manufacturers_title
								</span>
							</label>
						</a>
					<li>";
				}
			?>
		</ul>
	</div>
	</div>
</div>
<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<h3 class="panel-title">
			Categories
			<div class="pull-right">
				<a href="#" style="color:black;"></a>
				<span class="nav-toggle hide-show">
					<a href="">Hide</a>
				</span>
			</div>
		</h3>
	</div>
	<div class="panel-collapse collapse-data">
	<div class="panel-body">
		<div class="input-group">
			<input class="form-control" data-action="filter" data-filters="#dev-cat" id="dev-table-filter" placeholder="Filder Categories">
			<a href="" class="input-group-addon">
				<i class="fa fa-search"></i>
			</a>
		</div>
		</div>
		<div class="panel-body scroll-menu">
		<ul class="nav nav-pills nav-stacked category-menu" id="dev-cat">
			<?php
				$get_cat="SELECT `cat_id`, `cat_title`, `cat_top`, `cat_image` FROM `categories` where cat_top='yes'";
				$run_cat=mysqli_query($con,$get_cat);
				while($row_cat=mysqli_fetch_array($run_cat))
				{
					$cat_id=$row_cat['cat_id'];
					$cat_title=$row_cat['cat_title'];
					$cat_image=$row_cat['cat_image'];
					if($cat_image==""){

					}else{
						$cat_image="<img src='admin_area/other_images/$cat_image' width='20px'>&nbsp";
					}
					echo"<li style='background:#dddddd;' class='checkbox checkbox-primary'>
						
						<a href='shop.php?cat=$cat_id'>
							<label>

								<input value='$manufacturers_id' type='checkbox' name='manufacturer' class='get_manufacturers'>
								
								<span>
								
									$cat_image
									$cat_title
								
								</span>
								
							</label>
							
						</a>
					<li>";
				}
				$get_cat="SELECT `cat_id`, `cat_title`, `cat_top`, `cat_image` FROM `categories` where cat_top='no'";
				$run_cat=mysqli_query($con,$get_cat);
				while($row_cat=mysqli_fetch_array($run_cat))
				{
					$cat_id=$row_cat['cat_id'];
					$cat_title=$row_cat['cat_title'];
					$cat_image=$row_cat['cat_image'];
					if($cat_image==""){

					}else{
						$cat_image="<img src='admin_area/other_images/$cat_image' width='20px'>&nbsp";
					}
					echo"<li style='background:#dddddd;' class='checkbox checkbox-primary'>
						<a>
						<a>
							<label>
								<input value='$manufacturers_id' type='checkbox' name='manufacturer' class='get_manufacturers'>
								<span>
									$cat_image
									$cat_title
								</span>
							</label>
						</a>
					<li>";
				}
			?>
		</ul>
	</div>
	</div>
</div>
<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<h3 class="panel-title">
			Producteurs Categories
			<div class="pull-right">
				<a href="#" style="color:black;"></a>
				<span class="nav-toggle hide-show">
					Hide
				</span>
			</div>
		</h3>
	</div>
	<div class="panel-collapse collapse-data">
	<div class="panel-body">
		<div class="input-group">
			<input class="form-control" data-action="filter" data-filters="#dev-p_cat" id="dev-table-filter" placeholder="Filder Product categories">
			<a href="" class="input-group-addon">
				<i class="fa fa-search"></i>
			</a>
		</div>
		</div>
		<div class="panel-body scroll-menu">
		<ul class="nav nav-pills nav-stacked category-menu" id="dev-p_cat">
			<?php
				$get_p_cat="SELECT `p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image` FROM `product_categories` where p_cat_top='yes'";
				$run_p_cat=mysqli_query($con,$get_p_cat);
				while($row_p_cat=mysqli_fetch_array($run_p_cat))
				{
					$p_cat_id=$row_p_cat['p_cat_id'];
					$p_cat_title=$row_p_cat['p_cat_title'];
					$p_cat_image=$row_p_cat['p_cat_image'];
					if($p_cat_image==""){

					}else{
						$p_cat_image="<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp";
					}
					echo"<li style='background:#dddddd;' class='checkbox checkbox-primary'>
					
							<a href='shop.php?p_cat=$p_cat_id'>
							<label>
								<input value='$p_cat_id' type='checkbox' name='manufacturer' class='get_manufacturers'>
								<span>
									$p_cat_image
									$p_cat_title
								</span>
							</label>
						</a>
						
					<li>";
				}
				$get_p_cat="SELECT `p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image` FROM `product_categories` where p_cat_top='no'";
				$run_p_cat=mysqli_query($con,$get_p_cat);
				while($row_p_cat=mysqli_fetch_array($run_p_cat))
				{
					$p_cat_id=$row_p_cat['p_cat_id'];
					$p_cat_title=$row_p_cat['p_cat_title'];
					$p_cat_image=$row_p_cat['p_cat_image'];
					if($p_cat_image==""){

					}else{
						$p_cat_image="<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp";
					}
					echo"<li style='background:#dddddd;' class='checkbox checkbox-primary'>
						<a>
							<label>
								<input value='$p_cat_id' type='checkbox' name='manufacturer' class='get_manufacturers'>
								<span>
									$p_cat_image
									$p_cat_title
								</span>
							</label>
						</a>
					<li>";
				}
			?>
		</ul>
	</div>
	</div>
</div>