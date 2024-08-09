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
            <!-- <div class="rating rateit-small"></div> -->
            <!-- <div class="description"></div> -->
            <?php
            if ($pro_p_sale_price == 0) {
            ?>
                <div class="product-price"> <span class="price">৳<?php echo $pro_p_reg_price; ?> </span> </div>
            <?php
            } else {
            ?>
                <div class="product-price"> <span class="price">৳<?php echo $pro_p_sale_price; ?> </span> <span class="price-before-discount"><?php echo $pro_p_reg_price; ?></span> </div>
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
                    <!-- <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li> -->
                    <!-- <li class="lnk"> <a class="add-to-cart" href="product-comparison.php?id=<?php echo $pro_ID; ?>" title="Compare"> <i class="fa fa-signal"></i> </a> </li> -->
                </ul>
            </div>
            <!-- /.action -->
        </div>
        <!-- /.cart -->
    </div>
    <!-- /.product -->

</div>
<!-- /.products -->