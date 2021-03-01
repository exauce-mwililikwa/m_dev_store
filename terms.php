<?php
  $active='Shop';
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
            Tearms & Conditions | Refund
          </li>
        </ul>
      </div>
      <div class="col-md-3">
        <div class="box">
          <ul class="nav-pills nav-stacked nav">
            <?php
              $get_terms="select `term_id`, `term_title`, `term_link`, `term_desc` from term limit 0,1";
              $run_terms=mysqli_query($con,$get_terms);
              while($row_terms=mysqli_fetch_array($run_terms)){
                  $terms_link=$row_terms['term_link'];
                   $term_title=$row_terms['term_title'];
                   

            ?>
            <li class="active">
              <a data-toggle="pill" href="#<?php echo $terms_link; ?>">
                <?php echo $term_title;?>
              </a>
            </li>
           <?php } ?>  
           <?php
            $count_terms="select * from term";
            $run_count_terms=mysqli_query($con,$count_terms);
            $count=mysqli_num_rows($run_count_terms);
            $get_terms="select * from term limit 1,$count";
            $run_terms=mysqli_query($con,$get_terms);
            while($row_terms=mysqli_fetch_array($run_terms)){
              $term_title=$row_terms['term_title'];
              $term_link=$row_terms['term_link'];
            
             ?>
            
            <li>
              <a data-toggle="pill" href="#<?php echo $term_link; ?>">
                <?php echo $term_title;?>
              </a>
            </li>
           <?php } ?>
          </ul>
        </div>
      </div> 
      <div class="col-md-9">
        <div class="box">
          <div class="tab-content">
             <?php
              $get_terms="select `term_id`, `term_title`, `term_link`, `term_desc` from term limit 0,1";
              $run_terms=mysqli_query($con,$get_terms);
              while($row_terms=mysqli_fetch_array($run_terms)){
                $term_title=$row_terms['term_title'];
                $term_desc=$row_terms['term_desc'];
                $term_link=$row_terms['term_link'];
              
             ?>
             <div id="<?php echo $term_link;?>" class="tab-pane fade in active">
                <h1 class="tabTitle"><?php echo $term_title;?></h1>
                <p class="tabDesc"><?php echo $term_desc;?></p>
             </div>
             
               <?php
            $count_terms="select * from term";
            $run_count_terms=mysqli_query($con,$count_terms);
            $count=mysqli_num_rows($run_count_terms);
            $get_terms="select * from term limit 1,$count";
            $run_terms=mysqli_query($con,$get_terms);
            while($row_terms=mysqli_fetch_array($run_terms)){
              $term_title=$row_terms['term_title'];
              $term_link=$row_terms['term_link'];
              $term_desc=$row_terms['term_desc'];
            
             ?>
              <div id="<?php echo $term_link;?>" class="tab-pane fade in">
                <h1 class="tabTitle"><?php echo $term_title;?></h1>
                <p class="tabDesc"><?php echo $term_desc;?></p>
             </div>
             <?php } ?>
          </div>
        </div>
      </div>
      </div>
      </div>      
      
   <?php
        include("includes/footer.php");
  ?>
        <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
<?php } ?>