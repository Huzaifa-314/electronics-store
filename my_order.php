<!-- ============================================== HEADER : START ============================================== -->
<?php include 'include/header.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->

<?php
if (!$is_logged_in) {
    header("Location: sign-in.php");
}

?>

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="index.php">Home</a></li>
                <li class='active'>My Order/li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">Shpping name</th>
                                    <th class="cart-description item">Shipping email</th>
                                    <th class="cart-product-name item">Shipping phone</th>
                                    <th class="cart-product-name item">Shipping Address</th>
                                    <th class="cart-product-name item">Ordered Products</th>
                                    <th class="cart-qty item">Total Amount</th>
                                    <th class="cart-sub-total item">Order status</th>
                                    <th class="cart-total last-item">Transaction ID</th>
                                </tr>
                            </thead><!-- /thead -->

                            <tbody>
                                <?php
                                $order_res = mysql_qres("select * from estore_orders where user_id = $user_id");
                                while ($order_row = mysqli_fetch_assoc($order_res)) {
                                    extract($order_row, EXTR_PREFIX_ALL, "order");
                                ?>
                                    <tr>
                                        <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $order_name; ?></span></td>
                                        <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $order_email; ?></span></td>
                                        <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $order_phone; ?></span></td>
                                        <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $order_address; ?></span></td>
                                        <td><ol>
                                            <?php
                                            $order_product_res = mysql_qres("select * from estore_order_items as oi join estore_product as p on oi.product_id=p.id where order_id = $order_id order by oi.id asc");
                                            while ($order_product_row = mysqli_fetch_assoc($order_product_res)) {
                                                extract($order_product_row, EXTR_PREFIX_ALL, "order_product");
                                            ?>
                                                <li class="cart-product-name-info">
                                                    <h4 class='cart-product-description'><a href="product_single.php?id=<?php echo $order_product_product_id; ?>"><?php echo $order_product_p_name; ?></a></h4>
                                                </li>
                                            <?php
                                            }
                                    ?>
                                    </ol></td>
                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $order_amount; ?></span></td>
                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $order_status; ?></span></td>
                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $order_transaction_id; ?></span></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody><!-- /tbody -->

                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <?php
                                        if (mysqli_num_rows($order_res) == 0) {
                                        ?><div style="display: flex;justify-content:center;align-items:center;"><span class="alert alert-danger text-danger">Havent orderd anything</span></div><?php
                                                                                                                                                                                            }
                                                                                                                                                                                                ?>
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="shop.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                                <!-- <a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a> -->
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->


            </div><!-- /.shopping-cart -->
        </div> <!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.body-content -->


<!-- ============================================================= FOOTER ============================================================= -->
<?php include 'include/footer.php' ?>
<!-- ============================================================= FOOTER : END============================================================= -->