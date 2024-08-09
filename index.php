<?php include 'include/header.php' ?>

<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

        <!-- ================================== TOP NAVIGATION ================================== -->
        <?php include 'include/categorybar.php'; ?>
        <!-- /.side-menu -->
        <!-- ============================================== HOT DEALS ============================================== -->
        <?php include 'include/hotdeals.php' ?>
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter outer-bottom-small">
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
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.<em>"</em></div>
              <div class="clients_author">John Doe <span>Abc Company</span> </div>
              <!-- /.container-fluid -->
            </div>
            <!-- /.item -->

            <div class="item">
              <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.<em>"</em></div>
              <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
            </div>
            <!-- /.item -->

            <div class="item">
              <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.<em>"</em></div>
              <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
              <!-- /.container-fluid -->
            </div>
            <!-- /.item -->

          </div>
          <!-- /.owl-carousel -->
        </div>

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
                    extract($row, EXTR_PREFIX_ALL, "all");
                  ?>
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image">
                              <a href="product_single.php?id=<?php echo $all_ID; ?>">
                                <img src="admin/assets/img/products/<?php echo $all_p_featured_img; ?>" alt="">
                                <!-- <img src="assets/images/products/p1_hover.jpg" alt="" class="hover-image"> -->
                              </a>
                            </div>
                            <!-- /.image -->

                            <div class="tag new"><span>new</span></div>
                          </div>
                          <!-- /.product-image -->

                          <div class="product-info text-left">
                            <h3 class="name"><a href="product_single.php?id=<?php echo $all_ID; ?>"><?php echo $all_p_name ?></a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>
                            <?php showprice($all_p_sale_price, $all_p_reg_price); ?>

                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <a href="cart.php?id="><button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button></a>
                                  <a href="cart.php?id="><button class="btn btn-primary cart-btn" type="button">Add to cart</button></a>
                                </li>
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="cart.php?id=" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="cart.php?id=" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                              </ul>
                            </div>
                            <!-- /.action -->
                          </div>
                          <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                      </div>
                      <!-- /.products -->
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
                    $allproduct_res = mysql_qres("SELECT * FROM estore_product");
                    while ($row = mysqli_fetch_assoc($allproduct_res)) {
                      extract($row, EXTR_PREFIX_ALL, "specicat");
                      if ($cat_ID == findval('is_parent', 'estore_category', 'ID', $specicat_p_category)) {
                    ?>
                        <div class="item item-carousel">
                          <div class="products">
                            <div class="product">
                              <div class="product-image">
                                <div class="image">
                                  <a href="product_single.php?id=<?php echo $specicat_ID; ?>">
                                    <img src="admin/assets/img/products/<?php echo $specicat_p_featured_img; ?>" alt="">
                                    <!-- <img src="assets/images/products/p7_hover.jpg" alt="" class="hover-image"> -->
                                  </a>

                                </div>
                                <!-- /.image -->

                                <div class="tag sale"><span>sale</span></div>
                              </div>
                              <!-- /.product-image -->

                              <div class="product-info text-left">
                                <h3 class="name"><a href="product_single.php?id=<?php echo $specicat_ID; ?>"><?php echo $specicat_p_name; ?></a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"> <span class="price"> <?php echo $specicat_p_sale_price ?> </span> <span class="price-before-discount"><?php $specicat_p_reg_price ?></span> </div>
                                <!-- /.product-price -->

                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                    </li>
                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                    <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                  </ul>
                                </div>
                                <!-- /.action -->
                              </div>
                              <!-- /.cart -->
                            </div>
                            <!-- /.product -->

                          </div>
                          <!-- /.products -->
                        </div>
                    <?php
                      }
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
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image">
                            <a href="product_single.php?id=<?php echo $pro_ID?>">
                              <img src="admin/assets/img/products/<?php echo $pro_p_featured_img;?>" alt="">
                              <!-- <img src="assets/images/products/p13_hover.jpg" alt="" class="hover-image"> -->
                            </a>

                          </div>
                          <!-- /.image -->

                          <div class="tag hot"><span>hot</span></div>
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="detail.html"><?php echo $pro_p_name;?></a></h3>
                          <div class="product-price"> <span class="price"> <?php showprice($pro_p_sale_price,$pro_p_reg_price) ?> </span></div>
                          <!-- /.product-price -->

                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button onclick="location.href = 'cart.php?id=<?php echo $pro_ID; ?>';" class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button onclick="location.href = 'cart.php?id=<?php echo $pro_ID; ?>';" class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <!-- <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li> -->
                              <!-- <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li> -->
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                      <!-- /.product -->

                    </div>
                    <!-- /.products -->
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