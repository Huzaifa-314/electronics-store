<!-- ============================================== HEADER : START ============================================== -->
<?php include 'include/header.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->

<?php
$main_id = $_GET['id'];
$main_p_name = findval('p_name', 'estore_product', 'ID', $main_id);
$main_p_brand = findval('p_brand', 'estore_product', 'ID', $main_id);
$main_p_quantity = findval('p_quantity', 'estore_product', 'ID', $main_id);
//sub category
$main_p_category = findval('p_category', 'estore_product', 'ID', $main_id);
//parent category
$main_category_id = findval('is_parent', 'estore_category', 'ID', $main_p_category);
$main_category_name = findval('c_name', 'estore_category', 'ID', $main_category_id);
$main_p_featured_image = findval('p_featured_img', 'estore_product', 'ID', $main_id);

$is_out_of_stock = $main_p_quantity == 0;
?>



<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php?cat_id=<?php echo $main_category_id; ?>"><?php echo $main_category_name; ?></a></li>
        <li class='active'><?php echo $main_p_name; ?></li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row single-product'>
      <!-- ========================================== SIDEBAR - START ========================================= -->
      <?php include 'include/sidebar.php'; ?>
      <!-- ========================================== SIDEBAE – END ========================================= -->
      <div class='col-xs-12 col-sm-12 col-md-9 rht-col'>
        <div class="detail-block">
          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 gallery-holder">
              <div class="product-item-holder size-big single-product-gallery small-gallery">

                <div id="owl-single-product">
                  <div class="single-product-gallery-item" id="slide1">
                    <a data-lightbox="image-1" data-title="Gallery" href="admin/assets/img/products/<?php echo $main_p_featured_image?>">
                      <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $main_p_featured_image?>" />
                    </a>
                  </div><!-- /.single-product-gallery-item -->

                  <?php 
                    $main_p_gallery_img = findval('p_galley_img', 'estore_product', 'ID', $main_id);
                    $main_p_gallery_img = explode("#",$main_p_gallery_img);
                    for($i=0;$i<sizeof($main_p_gallery_img);$i++){
                      if(empty($main_p_gallery_img[$i])){
                        continue;
                      }
                      ?>
                        <div class="single-product-gallery-item" id="slide<?php echo ($i+2) ?>">
                          <a data-lightbox="image-1" data-title="Gallery" href="admin/assets/img/products/gallery<?php echo $main_p_gallery_image[$i]?>">
                            <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/assets/img/products/gallery<?php echo $main_p_gallery_image[$i]?>" />
                          </a>
                        </div><!-- /.single-product-gallery-item -->
                      <?php
                    }
                  ?>

                </div><!-- /.single-product-slider -->


                <div class="single-product-gallery-thumbs gallery-thumbs">

                  <div id="owl-single-product-thumbnails">
                    <div class="item">
                      <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                        <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/assets/img/products/<?php echo $main_p_featured_image?>" />
                      </a>
                    </div>

                    <?php
                    for($i=0;$i<sizeof($main_p_gallery_img);$i++){
                      if(empty($main_p_gallery_img[$i])){
                        continue;
                      }
                      ?>
                        <div class="item">
                          <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?php echo ($i+2);?>" href="#slide<?php echo ($i+2)?>">
                            <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/assets/img/products/gallery<?php echo $main_p_featured_image[$i]?>" />
                          </a>
                        </div>
                      <?php
                    }
                  ?>
                
                  </div><!-- /#owl-single-product-thumbnails -->



                </div><!-- /.gallery-thumbs -->

              </div><!-- /.single-product-gallery -->
            </div><!-- /.gallery-holder -->


            <?php 
              $product_res = mysql_qres("SELECT * FROM estore_product where id='$main_id'");
              $row = mysqli_fetch_assoc($product_res);
              extract($row,EXTR_PREFIX_ALL,"p");
            ?>
            <div class='col-sm-12 col-md-8 col-lg-8 product-info-block'>
              <div class="product-info">
                <h1 class="name"><?php echo $p_p_name; ?></h1>

                <div class="stock-container info-container m-t-10">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="pull-left">
                        <div class="stock-box">
                          <span class="label">Brand :</span>
                        </div>
                      </div>
                      <div class="pull-left">
                        <div class="stock-box">
                          <span class="value"><?php echo findval('b_name', 'estore_brand', 'ID', $main_p_brand) ?></span>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.stock-container -->

                <div class="stock-container info-container m-t-10">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="pull-left">
                        <div class="stock-box">
                          <span class="label">Availability :</span>
                        </div>
                      </div>
                      <div class="pull-left">
                        <div class="stock-box">
                          <span class="value"><?php echo $main_p_quantity>0?"In stock":"Not in stock" ?></span>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.stock-container -->

                <div class="description-container m-t-20">
                  <?php echo $p_p_short_desc?>
                </div><!-- /.description-container -->

                <div class="price-container info-container m-t-30">
                  <div class="row">


                    <div class="col-sm-6 col-xs-6">
                      <div class="price-box">
                        <?php 
                          if($p_p_sale_price!=0){
                            ?>
                              <span class="price">৳<?php echo $p_p_sale_price;?></span>
                              <span class="price-strike">$<?php echo $p_p_reg_price;?></span>
                            <?php 
                          }else{
                            ?>
                              <span class="price">৳<?php echo $p_p_reg_price;?></span>
                              <!-- <span class="price-strike">$<?php echo $p_p_reg_price;?></span> -->
                            <?php 
                          }
                        ?>
                      </div>
                    </div>



                  </div><!-- /.row -->
                </div><!-- /.price-container -->
                <?php echo $is_out_of_stock?"<h1 style='color:red;'>Out of stock</h1>":""?>

                <div class="quantity-container info-container">
                  <div class="row">

                    <div class="qty">
                      <span class="label">Qty :</span>
                    </div>

                    <form action="cart.php" method="get">
                      <div class="qty-count">
                        <div class="cart-quantity">
                          <div class="quant-input">
                            <input name="id" type="hidden" value="<?php echo $main_id; ?>">
                            <input name="quantity" type="number" min="<?php echo $is_out_of_stock?0:1?>" max="<?php echo $main_p_quantity?>" value="<?php echo $is_out_of_stock?0:1?>">
                          </div>
                        </div>
                      </div>
                      

                      <div class="add-btn">
                        <button <?php echo $is_out_of_stock?"disabled":""?> class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                      </div>
                    </form>


                  </div><!-- /.row -->
                </div><!-- /.quantity-container -->






              </div><!-- /.product-info -->
            </div><!-- /.col-sm-7 -->
          </div><!-- /.row -->
        </div>

        <div class="product-tabs inner-bottom-xs">
          <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
              <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                <!-- <li><a data-toggle="tab" href="#review">REVIEW</a></li> -->
                <!-- <li><a data-toggle="tab" href="#tags">TAGS</a></li> -->
              </ul><!-- /.nav-tabs #product-tabs -->
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">

              <div class="tab-content">

                <div id="description" class="tab-pane in active">
                  <div class="product-tab">
                    <?php echo $p_p_big_desc; ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
        <section class="section featured-product">
          <div class="row">
            <div class="col-lg-3">
              <h3 class="section-title">Upsell Products</h3>
              <div class="ad-imgs">
                <img class="img-responsive" src="assets/images/banners/LHS-banner.jpg" alt="">
                <!-- <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt=""> -->
              </div>
            </div>
            <div class="col-lg-9">
              <div class="owl-carousel homepage-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                <?php
                $pro_res = mysql_qres("SELECT * FROM estore_product where p_category = $main_p_category and ID <> $main_id");
                while ($pro_row = mysqli_fetch_assoc($pro_res)) {
                  extract($pro_row, EXTR_PREFIX_ALL, "pro");
          ?>
                  <div class="item item-carousel">
                    <?php include 'include/product-card.php'; ?>
                  </div>
                  <!-- /.item -->
                <?php
                }
                ?>


              </div><!-- /.home-owl-carousel -->
            </div>
          </div>
        </section><!-- /.section -->
        <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

      </div><!-- /.col -->
      <div class="clearfix"></div>
    </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

<!-- ============================================================= FOOTER ============================================================= -->
<?php include 'include/footer.php' ?>
<!-- ============================================================= FOOTER : END============================================================= -->
