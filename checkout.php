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
                <li><a href="#">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<body class="bg-light" style="padding-bottom: 20px;">
    <div class="container">

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill"><?php echo $cart_count = mysql_qrow("select count(ID) as item_count from estore_cart where user_id=$user_id")['item_count'] ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    $cart_res = mysql_qres("SELECT c.ID as cart_ID,c.*,p.* FROM estore_cart as c join estore_product as p on c.p_id=p.ID where user_id = $user_id");
                    while ($cart_row = mysqli_fetch_assoc($cart_res)) {
                        extract($cart_row, EXTR_PREFIX_ALL, "cart");
                        $unit_price = $cart_p_sale_price == 0 ? $cart_p_reg_price : $cart_p_sale_price;
                    ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <a href="product_single.php?id=<?php echo $cart_p_id; ?>">
                                    <h6 class="my-0"><?php echo $cart_p_name; ?></h6>
                                </a>
                                <!-- <small class="text-muted">Brief description</small> -->
                            </div>
                            <span class="text-muted">৳ <?php echo $unit_price * $cart_qty; ?></span>
                        </li>
                    <?php
                    }

                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong>
                            <?php
                            $grand_grand_total_res = mysql_qres("SELECT SUM(price * qty) AS total FROM (SELECT IF(p.p_sale_price = 0, p.p_reg_price, p.p_sale_price) AS price, qty FROM estore_cart AS c INNER JOIN estore_product AS p ON c.p_id = p.ID where user_id= $user_id) AS subquery;");
                            $grand_grand_total = mysqli_fetch_all($grand_grand_total_res)[0][0];
                            echo $grand_grand_total == NULL ? 0 : $grand_grand_total;
                            ?>
                            TK</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form action="checkout_hosted.php" method="POST" class="needs-validation">
                    <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Full name</label>
                            <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                                required>
                            <div class="invalid-feedback">
                                Valid customer name is required.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="mobile">Mobile</label>
                            <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Mobile" value="+88" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your Mobile number is required.
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" name="customer_email" class="form-control" id="email"
                                placeholder="you@example.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                            required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" required>
                                <option value="">Choose...</option>
                                <option value="Bangladesh" selected>Bangladesh</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" required>
                                <option value="">Choose...</option>
                                <option value="Dhaka" selected>Dhaka</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" value="1000" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div> -->
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <input type="hidden" value="<?php echo $grand_grand_total?>" name="amount" id="total_amount" required />
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                            address</label>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout (Hosted)</button>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br>
</body>
<!-- ============================================================= FOOTER ============================================================= -->
<?php include 'include/footer.php' ?>
<!-- ============================================================= FOOTER : END============================================================= -->