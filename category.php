<?php include 'include/header.php'; ?>

<!-- ============================================== HEADER : END ============================================== -->

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="index.php">Home</a></li>
        <?php
        if (isset($_GET['id'])) {
          $category_name = findval('c_name', 'estore_category', 'ID', $_GET['id']);
        ?>
          <li class='active'><?php echo $category_name; ?></li>
        <?php
        }
        ?>

      </ul>
    </div>
    <!-- /.breadcrumb-inner -->
  </div>
  <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
        <!-- ================================== TOP NAVIGATION ================================== -->
        <?php
        include 'include/categorybar.php';
        ?>
        <!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter">
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget">
              <h3 class="section-title">Shop by</h3>
              <div class="widget-header">
                <h4 class="widget-title">Category</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">

                  <?php
                    $cat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '0'");
                    while ($row = mysqli_fetch_assoc($cat_res)) {
                      extract($row, EXTR_PREFIX_ALL, "cat");
                      ?>
                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapse<?php echo $cat_ID;?>" data-toggle="collapse" class="accordion-toggle collapsed"> <?php echo $cat_c_name;?> </a> </div>
                          <!-- /.accordion-heading -->
                            <div class="accordion-body collapse" id="collapse<?php echo $cat_ID;?>" style="height: 0px;">
                              <div class="accordion-inner">
                                <ul>

                                  <?php
                                    $subcat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '$cat_ID'");
                                    while($subcat_row = mysqli_fetch_assoc($subcat_res)){
                                      ?>
                                        <li><a href="category.php?id=<?php echo $subcat_row['ID'] ?>"><?php echo $subcat_row['c_name'] ?></a></li>
                                      <?php
                                    }
                                  ?>
                                  

                                </ul>
                              </div>
                              <!-- /.accordion-inner -->
                            </div>
                            <!-- /.accordion-body -->
                        </div>
                        <!-- /.accordion-group -->
                      <?php
                    }
                  ?>



                </div>
                <!-- /.accordion -->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

            <!-- ============================================== COMPARE============================================== -->
            <div class="sidebar-widget outer-top-vs">
              <h3 class="section-title">Compare products</h3>
              <div class="sidebar-widget-body">
                <div class="compare-report">
                  <p>You have no <span>item(s)</span> to compare</p>
                </div>
                <!-- /.compare-report -->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== COMPARE: END ============================================== -->
            <!-- ============================================== NEWSLETTER ============================================== -->
            <div class="sidebar-widget newsletter outer-bottom-small  outer-top-vs">
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
            <!-- ============================================== NEWSLETTER: END ============================================== -->


          </div>
          <!-- /.sidebar-filter -->
        </div>
        <!-- /.sidebar-module-container -->
      </div>
      <!-- /.sidebar -->
      <div class="col-xs-12 col-sm-12 col-md-9 rht-col">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <!-- <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"> Big Sale </div>
                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                <div class="buy-btn"><a href="#" class="lnk btn btn-primary">Show Now</a></div>
              </div>
              
            </div>
          </div>
        </div> -->

        <!-- filters -->
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <!-- <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-6">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-bars"></i>List</a></li>
                </ul>
              </div>
            </div> -->
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6 col-lg-6 hidden-sm">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-6 col-md-6 no-padding hidden-sm hidden-md">
                <div class="lbl-cnt"> <span class="lbl">Show</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">1</a></li>
                        <li role="presentation"><a href="#">2</a></li>
                        <li role="presentation"><a href="#">3</a></li>
                        <li role="presentation"><a href="#">4</a></li>
                        <li role="presentation"><a href="#">5</a></li>
                        <li role="presentation"><a href="#">6</a></li>
                        <li role="presentation"><a href="#">7</a></li>
                        <li role="presentation"><a href="#">8</a></li>
                        <li role="presentation"><a href="#">9</a></li>
                        <li role="presentation"><a href="#">10</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-6 col-xs-6 col-lg-6 text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>



        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                  <?php
                  if (isset($_GET['id'])) {
                    $category_id = $_GET['id'];
                    $category_res = mysql_qres("SELECT * FROM estore_category where ID = $category_id; ");
                    $category_row = mysqli_fetch_assoc($category_res);
                    extract($category_row, EXTR_PREFIX_ALL, "cat");
                    // echo $cat_is_parent;
                    if ($cat_is_parent == 0) {
                      $sub_cat_res = mysql_qres("SELECT ID FROM estore_category where is_parent = $cat_ID; ");
                      while ($sub_row = mysqli_fetch_assoc($sub_cat_res)) {
                        $sub_cat_id = $sub_row['ID'];
                        // echo $sub_cat_id."<br>";
                        $pro_res = mysql_qres("SELECT * FROM estore_product where p_category = $sub_cat_id");
                        while ($pro_row = mysqli_fetch_assoc($pro_res)) {
                          extract($pro_row, EXTR_PREFIX_ALL, "pro");
                  ?>
                          <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="item">
                              <div class="products">
                                <div class="product">
                                  <div class="product-image">
                                    <div class="image">
                                      <a href="product_single.php?id=<?php echo $pro_ID; ?>">
                                        <img src="admin/assets/img/products/<?php echo $pro_p_featured_img; ?>" alt="">
                                        <!-- <img src="assets/images/products/p1_hover.jpg" alt="" class="hover-image"> -->
                                      </a>
                                    </div>
                                    <!-- /.image -->

                                    <!-- <div class="tag new"><span>new</span></div> -->
                                  </div>
                                  <!-- /.product-image -->

                                  <div class="product-info text-left">
                                    <h3 class="name"><a href="product_single.php?id=<?php echo $pro_ID; ?>"><?php echo $pro_p_name; ?></a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <?php
                                    if ($pro_p_sale_price == 0) {
                                    ?>
                                      <div class="product-price"> <span class="price"> <?php echo $pro_p_reg_price; ?> </span> </div>
                                    <?php
                                    } else {
                                    ?>
                                      <div class="product-price"> <span class="price"> <?php echo $pro_p_sale_price; ?> </span> <span class="price-before-discount"><?php echo $pro_p_reg_price; ?></span> </div>
                                    <?php
                                    }
                                    ?>

                                    <!-- /.product-price -->

                                  </div>
                                  <!-- /.product-info -->
                                  <div class="cart clearfix animate-effect">
                                    <div class="action">
                                      <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                          <button onclick="location.href = 'cart.php?id=<?php echo $pro_ID; ?>';" class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </li>
                                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                        <li class="lnk"> <a class="add-to-cart" href="product-comparison.php?id=<?php echo $pro_ID; ?>" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                          </div>
                          <!-- /.item -->
                        <?php
                        }
                      }
                    } else {
                      $sub_cat_id = $_GET['id'];
                      // echo $sub_cat_id."<br>";
                      $pro_res = mysql_qres("SELECT * FROM estore_product where p_category = $sub_cat_id");
                      while ($pro_row = mysqli_fetch_assoc($pro_res)) {
                        extract($pro_row, EXTR_PREFIX_ALL, "pro");
                        ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                          <div class="item">
                            <div class="products">
                              <div class="product">
                                <div class="product-image">
                                  <div class="image">
                                    <a href="product_single.php?id=<?php echo $pro_ID; ?>">
                                      <img src="admin/assets/img/products/<?php echo $pro_p_featured_img; ?>" alt="">
                                      <!-- <img src="assets/images/products/p1_hover.jpg" alt="" class="hover-image"> -->
                                    </a>
                                  </div>
                                  <!-- /.image -->

                                  <!-- <div class="tag new"><span>new</span></div> -->
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                  <h3 class="name"><a href="product_single.php?id=<?php echo $pro_ID; ?>"><?php echo $pro_p_name; ?></a></h3>
                                  <div class="rating rateit-small"></div>
                                  <div class="description"></div>
                                  <?php
                                  if ($pro_p_sale_price == 0) {
                                  ?>
                                    <div class="product-price"> <span class="price"> <?php echo $pro_p_reg_price; ?> </span> </div>
                                  <?php
                                  } else {
                                  ?>
                                    <div class="product-price"> <span class="price"> <?php echo $pro_p_sale_price; ?> </span> <span class="price-before-discount"><?php echo $pro_p_reg_price; ?></span> </div>
                                  <?php
                                  }
                                  ?>

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
                                      <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                      <li class="lnk"> <a class="add-to-cart" href="product-comparison.php?id=<?php echo $pro_ID; ?>" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                        </div>
                        <!-- /.item -->
                  <?php
                      }
                    }
                  }
                  ?>


                </div>
                <!-- /.row -->
              </div>
              <!-- /.category-product -->

            </div>
            <!-- /.tab-pane -->


          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container bottom-row">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container -->
            </div>
            <!-- /.text-right -->

          </div>
          <!-- /.filters-container -->

        </div>
        <!-- /.search-result-container -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->

          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
          <!--/.item-->
        </div>
        <!-- /.owl-carousel #logo-slider -->
      </div>
      <!-- /.logo-slider-inner -->

    </div>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div>
  <!-- /.container -->

</div>
<!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->

<?php include 'include/footer.php' ?>