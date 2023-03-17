<?php include 'include/header.php';

$main_id = $_GET['id'];
$main_p_name = findval('p_name', 'estore_product', 'ID', $main_id);
$main_p_category = findval('p_category', 'estore_product', 'ID', $main_id);
$main_category_id = findval('is_parent', 'estore_category', 'ID', $main_p_category);
$main_category_name = findval('c_name', 'estore_category', 'ID', $main_category_id);
$main_p_featured_image = findval('p_featured_img', 'estore_product', 'ID', $main_id);
?>



<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="index.php">Home</a></li>
        <li><a href="category.php?id=<?php echo $main_category_id; ?>"><?php echo $main_category_name; ?></a></li>
        <li class='active'><?php echo $main_p_name; ?></li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row single-product'>
      <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
        <div class="sidebar-module-container">
          <div class="home-banner outer-top-n outer-bottom-xs">
            <img src="assets/images/banners/LHS-banner.jpg" alt="Image">
          </div>



          <!-- ============================================== HOT DEALS ============================================== -->
          <?php include 'include/hotdeals.php'; ?>
          <!-- ============================================== HOT DEALS: END ============================================== -->

          <!-- ============================================== NEWSLETTER ============================================== -->
            <div class="sidebar-widget newsletter outer-bottom-small outer-top-vs">
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
              </div><!-- /.sidebar-widget-body -->
            </div><!-- /.sidebar-widget -->
          <!-- ============================================== NEWSLETTER: END ============================================== -->

          <!-- ============================================== Testimonials============================================== -->
          <div class="sidebar-widget  outer-top-vs ">
            <div id="advertisement" class="advertisement">
              <div class="item">
                <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                <div class="clients_author">John Doe <span>Abc Company</span> </div><!-- /.container-fluid -->
              </div><!-- /.item -->

              <div class="item">
                <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
              </div><!-- /.item -->

              <div class="item">
                <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div><!-- /.container-fluid -->
              </div><!-- /.item -->

            </div><!-- /.owl-carousel -->
          </div>

          <!-- ============================================== Testimonials: END ============================================== -->



        </div>
      </div><!-- /.sidebar -->
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

                <div class="rating-reviews m-t-20">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="pull-left">
                        <div class="rating rateit-small"></div>
                      </div>
                      <div class="pull-left">
                        <div class="reviews">
                          <a href="#" class="lnk">(13 Reviews)</a>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.rating-reviews -->

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
                          <span class="value">In Stock</span>
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
                              <span class="price">$<?php echo $p_p_sale_price;?></span>
                              <span class="price-strike">$<?php echo $p_p_reg_price;?></span>
                            <?php 
                          }else{
                            ?>
                              <!-- <span class="price">$<?php echo $p_p_sale_price;?></span> -->
                              <span class="price-strike">$<?php echo $p_p_reg_price;?></span>
                            <?php 
                          }
                        ?>
                      </div>
                    </div>

                    <div class="col-sm-6 col-xs-6">
                      <div class="favorite-button m-t-5">
                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                          <i class="fa fa-heart"></i>
                        </a>
                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                          <i class="fa fa-signal"></i>
                        </a>
                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                          <i class="fa fa-envelope"></i>
                        </a>
                      </div>
                    </div>

                  </div><!-- /.row -->
                </div><!-- /.price-container -->

                <div class="quantity-container info-container">
                  <div class="row">

                    <div class="qty">
                      <span class="label">Qty :</span>
                    </div>

                    <div class="qty-count">
                      <div class="cart-quantity">
                        <div class="quant-input">
                          <div class="arrows">
                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                          </div>
                          <input type="text" value="1">
                        </div>
                      </div>
                    </div>

                    <div class="add-btn">
                      <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                    </div>


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
                <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                <li><a data-toggle="tab" href="#tags">TAGS</a></li>
              </ul><!-- /.nav-tabs #product-tabs -->
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">

              <div class="tab-content">

                <div id="description" class="tab-pane in active">
                  <div class="product-tab">
                    <?php echo $p_p_big_desc; ?>
                  </div>
                </div><!-- /.tab-pane -->

                <div id="review" class="tab-pane">
                  <div class="product-tab">

                    <div class="product-reviews">
                      <h4 class="title">Customer Reviews</h4>

                      <div class="reviews">
                        <div class="review">
                          <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                          <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                        </div>

                      </div><!-- /.reviews -->
                    </div><!-- /.product-reviews -->



                    <div class="product-add-review">
                      <h4 class="title">Write your own review</h4>
                      <div class="review-table">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="cell-label">&nbsp;</th>
                                <th>1 star</th>
                                <th>2 stars</th>
                                <th>3 stars</th>
                                <th>4 stars</th>
                                <th>5 stars</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="cell-label">Quality</td>
                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                              </tr>
                              <tr>
                                <td class="cell-label">Price</td>
                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                              </tr>
                              <tr>
                                <td class="cell-label">Value</td>
                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                              </tr>
                            </tbody>
                          </table><!-- /.table .table-bordered -->
                        </div><!-- /.table-responsive -->
                      </div><!-- /.review-table -->

                      <div class="review-form">
                        <div class="form-container">
                          <form class="cnt-form">

                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                  <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                  <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                  <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                </div><!-- /.form-group -->
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                  <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                </div><!-- /.form-group -->
                              </div>
                            </div><!-- /.row -->

                            <div class="action text-right">
                              <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                            </div><!-- /.action -->

                          </form><!-- /.cnt-form -->
                        </div><!-- /.form-container -->
                      </div><!-- /.review-form -->

                    </div><!-- /.product-add-review -->

                  </div><!-- /.product-tab -->
                </div><!-- /.tab-pane -->

                <div id="tags" class="tab-pane">
                  <div class="product-tag">

                    <h4 class="title">Product Tags</h4>
                    <form class="form-inline form-cnt">
                      <div class="form-container">

                        <div class="form-group">
                          <label for="exampleInputTag">Add Your Tags: </label>
                          <input type="email" id="exampleInputTag" class="form-control txt">


                        </div>

                        <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                      </div><!-- /.form-container -->
                    </form><!-- /.form-cnt -->

                    <form class="form-inline form-cnt">
                      <div class="form-group">
                        <label>&nbsp;</label>
                        <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                      </div>
                    </form><!-- /.form-cnt -->

                  </div><!-- /.product-tab -->
                </div><!-- /.tab-pane -->

              </div><!-- /.tab-content -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.product-tabs -->

        <!-- ============================================== UPSELL PRODUCTS ============================================== -->
        <section class="section featured-product">
          <div class="row">
            <div class="col-lg-3">
              <h3 class="section-title">Upsell Products</h3>
              <div class="ad-imgs">
                <img class="img-responsive" src="assets/images/banners/home-banner1.jpg" alt="">
                <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt="">
              </div>
            </div>
            <div class="col-lg-9">
              <div class="owl-carousel homepage-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                <div class="item item-carousel">
                  <div class="products">

                    <div class="product">
                      <div class="product-image">
                        <div class="image">
                          <a href="detail.html"><img src="assets/images/products/p1.jpg" alt=""></a>
                        </div><!-- /.image -->

                        <div class="tag sale"><span>sale</span></div>
                      </div><!-- /.product-image -->


                      <div class="product-info text-left">
                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>

                        <div class="product-price">
                          <span class="price">
                            $650.99 </span>
                          <span class="price-before-discount">$ 800</span>

                        </div><!-- /.product-price -->

                      </div><!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                              <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>
                              </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>

                            <li class="lnk wishlist">
                              <a class="add-to-cart" href="detail.html" title="Wishlist">
                                <i class="icon fa fa-heart"></i>
                              </a>
                            </li>

                            <li class="lnk">
                              <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                              </a>
                            </li>
                          </ul>
                        </div><!-- /.action -->
                      </div><!-- /.cart -->
                    </div><!-- /.product -->

                  </div><!-- /.products -->
                </div><!-- /.item -->

                <div class="item item-carousel">
                  <div class="products">

                    <div class="product">
                      <div class="product-image">
                        <div class="image">
                          <a href="detail.html"><img src="assets/images/products/p2.jpg" alt=""></a>
                        </div><!-- /.image -->

                        <div class="tag sale"><span>sale</span></div>
                      </div><!-- /.product-image -->


                      <div class="product-info text-left">
                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>

                        <div class="product-price">
                          <span class="price">
                            $650.99 </span>
                          <span class="price-before-discount">$ 800</span>

                        </div><!-- /.product-price -->

                      </div><!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                              <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>
                              </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>

                            <li class="lnk wishlist">
                              <a class="add-to-cart" href="detail.html" title="Wishlist">
                                <i class="icon fa fa-heart"></i>
                              </a>
                            </li>

                            <li class="lnk">
                              <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                              </a>
                            </li>
                          </ul>
                        </div><!-- /.action -->
                      </div><!-- /.cart -->
                    </div><!-- /.product -->

                  </div><!-- /.products -->
                </div><!-- /.item -->

                <div class="item item-carousel">
                  <div class="products">

                    <div class="product">
                      <div class="product-image">
                        <div class="image">
                          <a href="detail.html"><img src="assets/images/products/p3.jpg" alt=""></a>
                        </div><!-- /.image -->

                        <div class="tag hot"><span>hot</span></div>
                      </div><!-- /.product-image -->


                      <div class="product-info text-left">
                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>

                        <div class="product-price">
                          <span class="price">
                            $650.99 </span>
                          <span class="price-before-discount">$ 800</span>

                        </div><!-- /.product-price -->

                      </div><!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                              <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>
                              </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>

                            <li class="lnk wishlist">
                              <a class="add-to-cart" href="detail.html" title="Wishlist">
                                <i class="icon fa fa-heart"></i>
                              </a>
                            </li>

                            <li class="lnk">
                              <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                              </a>
                            </li>
                          </ul>
                        </div><!-- /.action -->
                      </div><!-- /.cart -->
                    </div><!-- /.product -->

                  </div><!-- /.products -->
                </div><!-- /.item -->

                <div class="item item-carousel">
                  <div class="products">

                    <div class="product">
                      <div class="product-image">
                        <div class="image">
                          <a href="detail.html"><img src="assets/images/products/p4.jpg" alt=""></a>
                        </div><!-- /.image -->

                        <div class="tag new"><span>new</span></div>
                      </div><!-- /.product-image -->


                      <div class="product-info text-left">
                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>

                        <div class="product-price">
                          <span class="price">
                            $650.99 </span>
                          <span class="price-before-discount">$ 800</span>

                        </div><!-- /.product-price -->

                      </div><!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                              <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>
                              </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>

                            <li class="lnk wishlist">
                              <a class="add-to-cart" href="detail.html" title="Wishlist">
                                <i class="icon fa fa-heart"></i>
                              </a>
                            </li>

                            <li class="lnk">
                              <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                              </a>
                            </li>
                          </ul>
                        </div><!-- /.action -->
                      </div><!-- /.cart -->
                    </div><!-- /.product -->

                  </div><!-- /.products -->
                </div><!-- /.item -->

                <div class="item item-carousel">
                  <div class="products">

                    <div class="product">
                      <div class="product-image">
                        <div class="image">
                          <a href="detail.html"><img src="assets/images/blank.gif" data-echo="assets/images/products/p5.jpg" alt=""></a>
                        </div><!-- /.image -->

                        <div class="tag hot"><span>hot</span></div>
                      </div><!-- /.product-image -->


                      <div class="product-info text-left">
                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>

                        <div class="product-price">
                          <span class="price">
                            $650.99 </span>
                          <span class="price-before-discount">$ 800</span>

                        </div><!-- /.product-price -->

                      </div><!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                              <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>
                              </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>

                            <li class="lnk wishlist">
                              <a class="add-to-cart" href="detail.html" title="Wishlist">
                                <i class="icon fa fa-heart"></i>
                              </a>
                            </li>

                            <li class="lnk">
                              <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                              </a>
                            </li>
                          </ul>
                        </div><!-- /.action -->
                      </div><!-- /.cart -->
                    </div><!-- /.product -->

                  </div><!-- /.products -->
                </div><!-- /.item -->

                <div class="item item-carousel">
                  <div class="products">

                    <div class="product">
                      <div class="product-image">
                        <div class="image">
                          <a href="detail.html"><img src="assets/images/blank.gif" data-echo="assets/images/products/p6.jpg" alt=""></a>
                        </div><!-- /.image -->

                        <div class="tag new"><span>new</span></div>
                      </div><!-- /.product-image -->


                      <div class="product-info text-left">
                        <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>

                        <div class="product-price">
                          <span class="price">
                            $650.99 </span>
                          <span class="price-before-discount">$ 800</span>

                        </div><!-- /.product-price -->

                      </div><!-- /.product-info -->
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                              <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                <i class="fa fa-shopping-cart"></i>
                              </button>
                              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                            </li>

                            <li class="lnk wishlist">
                              <a class="add-to-cart" href="detail.html" title="Wishlist">
                                <i class="icon fa fa-heart"></i>
                              </a>
                            </li>

                            <li class="lnk">
                              <a class="add-to-cart" href="detail.html" title="Compare">
                                <i class="fa fa-signal"></i>
                              </a>
                            </li>
                          </ul>
                        </div><!-- /.action -->
                      </div><!-- /.cart -->
                    </div><!-- /.product -->

                  </div><!-- /.products -->
                </div><!-- /.item -->
              </div><!-- /.home-owl-carousel -->
            </div>
          </div>
        </section><!-- /.section -->
        <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

      </div><!-- /.col -->
      <div class="clearfix"></div>
    </div><!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider">

      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item m-t-15">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item m-t-10">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->

          <div class="item">
            <a href="#" class="image">
              <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
            </a>
          </div><!--/.item-->
        </div><!-- /.owl-carousel #logo-slider -->
      </div><!-- /.logo-slider-inner -->

    </div><!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div><!-- /.container -->
</div><!-- /.body-content -->

<?php include 'include/footer.php'; ?>