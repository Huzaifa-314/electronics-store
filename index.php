<?php include 'include/header.php' ?>

<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

        <!-- ================================== TOP NAVIGATION ================================== -->
        <!-- /.side-menu -->
        <!-- ============================================== HOT DEALS ============================================== -->
        <?php include 'include/hotdeals.php' ?>
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget">
          <h3 class="section-title">Best Sellers</h3>
          <div class="sidebar-widget-body">
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme">
              <?php
              $best_sellers = mysql_qres("SELECT p.* FROM estore_order_items oi JOIN estore_product p ON oi.product_id = p.ID GROUP BY oi.product_id ORDER BY SUM(oi.qty) DESC LIMIT 3;");
              while ($row = mysqli_fetch_assoc($best_sellers)) {
                extract($row, EXTR_PREFIX_ALL, "pro");
              ?>
                <div class="item">
                  <div class="products">
                    <?php include 'include/product-card.php' ?>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>


        
        
        <!-- <div class="sidebar-widget newsletter outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
              </div>
              <button class="btn btn-primary">Subscribe</button>
            </form>
          </div>
        </div> -->
        <!-- /.sidebar-widget -->
        <!-- ============================================== Testimonials============================================== -->
        <!-- <div class="sidebar-widget outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.<em>"</em></div>
              <div class="clients_author">John Doe <span>Abc Company</span> </div>
            </div>

          </div>
        </div> -->
        

      </div>
      
      <!-- /.sidemenu-holder -->

      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            <div class="item" style="background-image: url(assets/images/sliders/01.jpg);">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1" style="color:white">Top Brands</div>
                  <div class="big-text fadeInDown-1" style="color:white"> Best Camera </div>
                  <div class="excerpt fadeInDown-2 hidden-xs" style="color:white"> <span>Live Your Dream</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="shop.php" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
            <!-- /.item -->

            <div class="item" style="background-image: url(assets/images/sliders/02.jpg);">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1" style="color:white">Release 2025</div>
                  <div class="big-text fadeInDown-1">Iphone 19 Pro Max </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>Can read your mind xD<br>Dangerous for Human Lives</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="shop.php" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
            <!-- /.item -->

          </div>
          <!-- /.owl-carousel -->
        </div>

        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
              <?php
              $cat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '0'");
              while ($row = mysqli_fetch_assoc($cat_res)) {
                extract($row, EXTR_PREFIX_ALL, "cat");
              ?>
                <li><a data-transition-type="backSlide" href="#<?php echo str_replace(' ', '', $cat_c_name); ?>" data-toggle="tab"><?php echo $cat_c_name; ?></a></li>
              <?php
              }
              ?>
            </ul>
            <!-- /.nav-tabs -->
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  <?php
                  $allproduct_res = mysql_qres("SELECT * FROM estore_product order by ID DESC limit 8");
                  
                  while ($row = mysqli_fetch_assoc($allproduct_res)) {
                    extract($row, EXTR_PREFIX_ALL, "pro");
                  ?>
                    <div class="item item-carousel">
                      <?php include 'include/product-card.php'?>
                    </div>
                    <!-- /.item -->
                  <?php
                  }
                  ?>

                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->
            

            <?php
            $cat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '0'");
            
            while ($row = mysqli_fetch_assoc($cat_res)) {
              extract($row, EXTR_PREFIX_ALL, "cat");
            ?>
              <div class="tab-pane" id="<?php echo str_replace(' ', '', $cat_c_name) ?>">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                    <?php
                    $tabproduct_sql = "SELECT p.* from estore_product as p inner join estore_category as c on p.p_category=c.ID where c.is_parent = $cat_ID";
                    $tabproduct_res = mysql_qres($tabproduct_sql);
                    if(mysqli_num_rows($tabproduct_res) == 0){
                      ?>
                        <div class="owl-wrapper-outer">
                        <div style="display: flex;justify-content:center;align-items:center;"><span class="alert alert-danger text-danger">No Products Available</span></div>
                        </div>
                      <?php
                    }
                    while ($row = mysqli_fetch_assoc($tabproduct_res)) {
                      extract($row, EXTR_PREFIX_ALL, "pro");
                      ?>
                        <div class="item item-carousel">
                          <?php include 'include/product-card.php'?>
                        </div>
                      <?php
                    }
                    ?>


                    <!-- /.item -->

                  </div>
                  <!-- /.home-owl-carousel -->
                </div>
                <!-- /.product-slider -->
              </div>
              <!-- /.tab-pane -->
            <?php
            }
            ?>
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product">
          <div class="row">
            <div class="col-lg-3">
              <h3 class="section-title">All Products</h3>
              <ul class="sub-cat">
                <?php
                $cat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '0'");
                while ($row = mysqli_fetch_assoc($cat_res)) {
                  extract($row, EXTR_PREFIX_ALL, "cat");
                ?>
                  <li><a href="shop.php?cat_id=<?php echo $cat_ID ?>"><?php echo $cat_c_name; ?> </a></li>
                <?php
                }

                ?>
              </ul>
            </div>
            <div class="col-lg-9">
              <div class="owl-carousel homepage-owl-carousel custom-carousel owl-theme outer-top-xs">

                <?php
                $pro_res = mysql_qres("SELECT * FROM estore_product limit 6");
                while ($pro_row = mysqli_fetch_assoc($pro_res)) {
                  extract($pro_row, EXTR_PREFIX_ALL, "pro");
                ?>
                  <div class="item item-carousel">
                    <?php include 'include/product-card.php'?>
                  </div>
                  <!-- /.item -->
                <?php
                }
                ?>
              </div>
            </div>
          </div>
          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
      </div>
      <!-- /.homebanner-holder -->
      <!-- ============================================== CONTENT : END ============================================== -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->

<?php include 'include/footer.php' ?>