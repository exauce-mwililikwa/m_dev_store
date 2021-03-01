<?php
  $active='Home';
  include("includes/header.php");
?>
        <!-- Wrapper for slides -->
<header id="myCarousel" class="carousel slide container">
        
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">

                         <?php
                          $get_slides="select * from slider limit 0,1";
                          $run_slider=mysqli_query($con,$get_slides);
                          while($row_slides=mysqli_fetch_array($run_slider))
                          {
                            $slider_name=$row_slides['slider_name'];
                            $slider_image=$row_slides['slider_image'];
                            $slider_url=$row_slides['slider_url'];
                            echo "
                                  <div class='item active'>
                                    <a href='$slider_url'>
                                      <img src='admin_area/slides_images/$slider_image'>
                                    </a>  
                                  </div>
                            ";

                          }
                             $get_slides="select * from slider limit 1,3";
                          $run_slider=mysqli_query($con,$get_slides);
                          while($row_slides=mysqli_fetch_array($run_slider))
                          {
                            $slider_name=$row_slides['slider_name'];
                            $slider_image=$row_slides['slider_image'];
                            $slider_url=$row_slides['slider_url'];
                            echo "
                                  <div class='item'>
                                    <a href='$slider_url'>
                                      <img src='admin_area/slides_images/$slider_image'>
                                    </a>  
                                  </div>
                            ";

                          }
                         ?>
  
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                       <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="icon-next"></span>
                    </a>
</header>


       <div id="advantages">
       		<div class="container">
       			<div class="same-height-row">
              <?php
                $get_boxes="SELECT `box_id`, `box_title`, substr(box_desc,1,500) as box_desc FROM `boxes_session`";
                $run_boxes=mysqli_query($con,$get_boxes);
                while($run_boxes_section=mysqli_fetch_array($run_boxes)){
                  $box_id=$run_boxes_section['box_id'];
                  $box_title=$run_boxes_section['box_title'];
                  $box_desc=$run_boxes_section['box_desc'];
               
              ?>
       				<div class="col-sm-4">
       					<div class="box sama-height">
       						<div class="icon">
       							<i class="fa fa-heart"></i>
       						</div>
       						<h3><a href=""><?php echo $box_title;?></a></h3>
       						<p><?php echo $box_desc;?></p>
       					</div>
       				</div>
       			<?php } ?>
       			</div>
            
       		</div>
       </div>
       <div id="hot">
        <div class="box">
          <div class="container">
            <div class="col-md-12">
              <h2>
                Our Latest Products
              </h2>
            </div>
          </div>
          </div>
       </div>
       <div id="content" class="container">
          <div class="row">
              <?php
                getPro();
              ?> 
          </div>
       </div>

       <?php
        include("includes/footer.php");
       ?>
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
