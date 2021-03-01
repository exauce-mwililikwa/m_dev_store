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
            Shop
          </li>
        </ul>
      </div>
      <div class="col-md-3">
        <?php
          include("includes/sidebar.php");
        ?>
      </div> 
      <div class="col-md-9">
        <?php
        if(!isset($_GET['p_cat'])){
          if(!isset($_GET['cat'])){
          
                    echo"
                  <div class='box'>
                    <h1>Shop</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                    ";
      }
        }
        ?>
        <div class="row">
      <?php
           if(!isset($_GET['p_cat'])){
           if(!isset($_GET['cat'])){
            $per_page=6;
            if(isset($_GET['page'])){
              $page=$_GET['page'];
             } else{
                $page=1;
               }
              $start_from=($page-1)*$per_page;
              $get_products="select `product_id`,products.product_sale, `product_title`,
     `product_img1`, `product_price`,`product_label`,manufacturers.manufactured_title 
     from products INNER JOIN manufacturers on manufacturers.manufactured_id=products.manufactured_id 
     order by 1 desc limit  $start_from,$per_page";
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
        <div class='col-md-4 col-sm-4 center-responsive'>
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
        <center>
          <ul class="pagination">
             <?php
             $query="select * from products";
             $result=mysqli_query($con,$query);
             $total_records=mysqli_num_rows($result);
             $total_pages=ceil($total_records/$per_page);
             echo"
                <li>
                    <a href='shop.php?page=1'> ".'First Page'." </a>
                </li>
             ";
             for($i=1;$i<=$total_pages;$i++)
             {
              echo"
                <li>
                    <a href='shop.php?page=".$i."'>".$i."</a>
                </li>
              ";
              }
              echo"
                <li>
                    <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>
                </li>
             ";
             
              }

            }
             ?>
          </ul>
    </center>
        <?php
         getpcatpro(); 
         getcatpro();
        ?>
        
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
<script src="js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $('.nav-toggle').click(function(){
      $('.panel-collapse,.collapse-data').slideToggle(1700,function(){
        if($(this).css('display')=='none'){
            $(".hide-show").html('Show');
        }else{
          $(".hide-show").html('Hide');
        }
      });
    });

    $(function(){
      $.fn.extend({
        filterTable: function(){
          return this.each(function(){
            $(this).on('keyup',function(){
              var $this=$(this),
              search=$this.val().toLowerCase(),
              target=$this.attr('data-filters'),
              handle=$(target),
              rows=handle.find('li a');
              if(search == ''){
                rows.show();
              }
              else{
                rows.each(function(){
                  var $this=$(this);
                  $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() :
                  $this.show();
                });
              }
            });
          });
        }
      });
      $('[data-action="filter"][id="dev-table-filter"]').filterTable();
    });

  });
</script>
</body>
