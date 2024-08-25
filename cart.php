<!-- ============================================== HEADER : START ============================================== -->
<?php include 'include/header.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->


<?php
if (!$is_logged_in) {
  header("Location: sign-in.php");
}

if (isset($_GET['id'])) {
  $p_id = $_GET['id'];
  $qty = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
  // $existing_cart_ID = findval("ID","estore_cart","p_id",$p_id);
  $existing_cart_row = mysql_qrow("select ID from estore_cart where p_id = $p_id and user_id = $user_id");
  $existing_cart_ID = $existing_cart_row ? $existing_cart_row['ID'] : NULL;
  if ($existing_cart_ID) {
    $sql = "UPDATE estore_cart SET qty = qty + $qty WHERE ID = $existing_cart_ID";
  } else {
    $sql = "INSERT INTO estore_cart (p_id, qty, user_id) VALUES ('$p_id', '$qty', '$user_id')";
  }
  mysqli_query($db, $sql);
  header("Location: cart.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantity'])) {
  foreach ($_POST['quantity'] as $cart_ID => $quantity) {
      $cart_ID = intval($cart_ID);
      $quantity = intval($quantity);
      
      if ($quantity > 0) {
          $sql = "UPDATE estore_cart SET qty = $quantity WHERE ID = $cart_ID AND user_id = $user_id";
          mysqli_query($db, $sql);
      } else {
          // Optionally, you could delete the item if the quantity is 0
          $sql = "DELETE FROM estore_cart WHERE ID = $cart_ID AND user_id = $user_id";
          mysqli_query($db, $sql);
      }
  }
  header("Location: cart.php"); // Reload the page after update
  exit();
}

?>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="index.php">Home</a></li>
        <li class='active'>Shopping Cart</li>
      </ul>
    </div><!-- /.breadcrumb-inner -->
  </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
  <div class="container">
    <div class="row ">
      <div class="shopping-cart">
        <div class="shopping-cart-table">
          <form action="cart.php" method="post">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th class="cart-romove item">Remove</th>
                    <th class="cart-description item">Image</th>
                    <th class="cart-product-name item">Product Name</th>
                    <th class="cart-qty item">Quantity</th>
                    <th class="cart-sub-total item">Unit Price</th>
                    <th class="cart-total last-item">Grandtotal</th>
                  </tr>
                </thead><!-- /thead -->

                <tbody>
                  <?php
                  $grand_grand_total = 0;
                  $cart_res = mysql_qres("SELECT c.ID as cart_ID,c.*,p.*,p.ID as product_ID FROM estore_cart as c join estore_product as p on c.p_id=p.ID where c.user_id = $user_id");
                  if(mysqli_num_rows($cart_res) <= 0){
                    ?>
                      <tr>
                        <td colspan="7">
                        <div style="display: flex;justify-content:center;align-items:center;"><span class="alert alert-danger text-danger">Cart is Empty</span></div>
                        </td>
                      </tr>
                    <?php
                  }
                  while ($cart_row = mysqli_fetch_assoc($cart_res)) {
                    extract($cart_row, EXTR_PREFIX_ALL, "cart");
                    $unit_price = $cart_p_sale_price == 0 ? $cart_p_reg_price : $cart_p_sale_price;
                    $grand_total = $unit_price * $cart_qty;
                    $grand_grand_total += $grand_total;
                    $main_p_quantity = findval('p_quantity','estore_product','ID',$cart_product_ID)
                  ?>
                    <tr>
                      <td class="romove-item"><a href="core/delete.php?delete_cart_id=<?php echo $cart_cart_ID ?>" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                      <td class="cart-image">
                        <a class="entry-thumbnail" href="product_single.php?id=<?php echo $cart_p_id; ?>">
                          <img src="admin/assets/img/products/<?php echo $cart_p_featured_img; ?>" alt="">
                        </a>
                      </td>
                      <td class="cart-product-name-info">
                        <h4 class='cart-product-description'><a href="product_single.php?id=<?php echo $cart_p_id; ?>"><?php echo $cart_p_name; ?></a></h4>
                      </td>
                      <td class="cart-product-quantity">
                        <div class="quant-input">
                          <input type="number" min="1" max="<?php echo $main_p_quantity?>" name="quantity[<?php echo $cart_cart_ID ?>]" value="<?php echo $cart_qty ?>" min="1">
                        </div>
                      </td>
                      <td class="cart-product-sub-total"><span class="cart-sub-total-price">৳ <?php echo $unit_price; ?></span></td>
                      <td class="cart-product-grand-total"><span class="cart-grand-total-price">৳ <?php echo $grand_total; ?></span></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody><!-- /tbody -->

                <tfoot>
                  <tr>
                    <td colspan="7">
                      <div class="shopping-cart-btn">
                        <span class="">
                          <a href="shop.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                          <?php
                          if (!$is_cart_empty) {
                          ?>
                          <button type="submit" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</button>
                          <?php }?>
                        </span>
                      </div><!-- /.shopping-cart-btn -->
                    </td>
                  </tr>
                </tfoot>
              </table><!-- /table -->
            </div>
          </form>
        </div><!-- /.shopping-cart-table -->

        <div class="col-md-4 col-sm-12 estimate-ship-tax">
        </div><!-- /.estimate-ship-tax -->

        <div class="col-md-4 col-sm-12 estimate-ship-tax">
        </div><!-- /.estimate-ship-tax -->

        <div class="col-md-4 col-sm-12 cart-shopping-total">
          <table class="table">
            <thead>
              <tr>
                <th>
                  <!-- <div class="cart-sub-total">
                    Subtotal<span class="inner-left-md">$600.00</span>
                  </div> -->
                  <div class="cart-grand-total">
                    Grand Total<span class="inner-left-md">৳ <?php echo $grand_grand_total ?></span>
                  </div>
                </th>
              </tr>
            </thead><!-- /thead -->
            <tbody>
              <tr>
                <td>
                  <?php
                  if (!$is_cart_empty) {
                  ?>
                    <div class="cart-checkout-btn pull-right">
                      <a href="checkout.php"><button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button></a>
                      <!-- <span class="">Checkout with multiples address!</span> -->
                    </div>
                  <?php
                  }
                  ?>
                </td>
              </tr>
            </tbody><!-- /tbody -->
          </table><!-- /table -->
        </div><!-- /.cart-shopping-total -->
      </div><!-- /.shopping-cart -->
    </div> <!-- /.row -->
  </div><!-- /.container -->
</div><!-- /.body-content -->

<!-- ============================================================= FOOTER ============================================================= -->
<?php include 'include/footer.php' ?>
<!-- ============================================================= FOOTER : END============================================================= -->