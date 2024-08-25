        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget hot-deals outer-bottom-xs">
          <h3 class="section-title">Hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
            <?php 
              $hotproduct_res= mysql_qres("SELECT * FROM estore_product WHERE p_status = '1' AND p_sale_price != '0' ORDER BY ((p_reg_price-p_sale_price)/p_reg_price) DESC LIMIT 5");
              while($row=mysqli_fetch_assoc($hotproduct_res)){
                extract($row,EXTR_PREFIX_ALL,"hot");
                ?>
                  <div class="item">
                    <div class="products">
                      <div class="hot-deal-wrapper">
                        <div class="image"> 
                        <a href="product_single.php?id=<?php echo $hot_ID;?>">
                        <img src="admin/assets/img/products/<?php echo $hot_p_featured_img; ?>" alt=""> 
                        <!-- <img src="assets/images/hot-deals/p13_hover.jpg" alt="" class="hover-image"> -->
                        </a>
                        </div>
                        <div class="sale-offer-tag"><span><?php echo round(((($hot_p_reg_price-$hot_p_sale_price)/$hot_p_reg_price)*100),1)."%"; ?><br>
                          off</span></div>
                        <!-- <div class="timing-wrapper">
                          <div class="box-wrapper">
                            <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                          </div>
                          <div class="box-wrapper">
                            <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                          </div>
                          <div class="box-wrapper">
                            <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                          </div>
                          <div class="box-wrapper">
                            <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                          </div>
                        </div> -->
                      </div>
                      <!-- /.hot-deal-wrapper -->
                      
                      <div class="product-info text-left m-t-20">
                        <h3 class="name"><a href="product_single.php?id=<?php echo $hot_ID;?>"><?php echo $hot_p_name;?></a></h3>
                        <!-- <div class="rating rateit-small"></div> -->
                        <?php showprice($hot_p_sale_price,$hot_p_reg_price);?>
                        
                      </div>
                      <!-- /.product-info -->
                      
                      <div class="cart clearfix animate-effect">
                        <div class="action">
                          <div class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                            <a href="cart.php?id=<?php echo $hot_ID;?>"><button class="btn btn-primary cart-btn" type="button">Add to cart</button></a>
                          </div>
                        </div>
                        <!-- /.action --> 
                      </div>
                      <!-- /.cart --> 
                    </div>
                  </div>
                <?php
              }
            ?>


          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ============================================== HOT DEALS: END ============================================== --> 