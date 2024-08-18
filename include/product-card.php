<?php 
$is_out_of_stock = $pro_p_quantity == 0;
$product_link = "product_single.php?id=$pro_ID";
$cart_link = "cart.php?id=$pro_ID";
?>

<div class="products" style="<?php if($is_out_of_stock) echo "opacity:0.5" ?>">
    <div class="product">
        <div class="product-image">
            <div class="image">
                <a href="<?php echo $product_link;?>">
                    <img src="admin/assets/img/products/<?php echo $pro_p_featured_img; ?>" alt="">
                    <!-- <img src="assets/images/products/p1_hover.jpg" alt="" class="hover-image"> -->
                </a>
            </div>
            <!-- /.image -->
             
            <?php echo $is_out_of_stock?"<div class=\"tag out-of-stock\"><span>Out of Stock</span></div>":"";?>
        </div>
        <!-- /.product-image -->

        <div class="product-info text-left">
            <h3 class="name"><a href="<?php echo $product_link;?>"><?php echo $pro_p_name; ?></a></h3>
            <?php showprice($pro_p_sale_price, $pro_p_reg_price);?>

        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
            <div class="action">
                <ul class="list-unstyled">
                    <li class="add-cart-button btn-group">
                        <button <?php echo $is_out_of_stock?"disabled":"" ?> onclick="location.href = '<?php echo $cart_link; ?>';" class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                        <button <?php echo $is_out_of_stock?"disabled":"" ?> onclick="location.href = '<?php echo $cart_link; ?>';" class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </li>
                </ul>
            </div>
            <!-- /.action -->
        </div>
        <!-- /.cart -->
    </div>
    <!-- /.product -->

</div>
<!-- /.products -->