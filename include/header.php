<?php
include 'connection.php';
include 'functions.php';
ob_start();
session_start();
$is_logged_in = false;
if (isset($_SESSION['id'])) {
  $user_id = $_SESSION['id'];
  $is_logged_in = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="MediaCenter, Template, eCommerce">
  <meta name="robots" content="all">
  <title>Online Mobile Shop</title>

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Customizable CSS -->
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/blue.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/rateit.css">
  <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->


  <!-- Icons/Glyphs -->
  <link rel="stylesheet" href="assets/css/font-awesome.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">
  <!-- ============================================== HEADER ============================================== -->
  <header class="header-style-1">
    <!-- <?php print_r($_SESSION); ?> -->
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li class="myaccount"><a href="my_order.php"><span>My Orders</span></a></li>
              <li class="myaccount"><a href="shop.php"><span>Shop</span></a></li>
              <li class="header_cart hidden-xs"><a href="cart.php"><span>My Cart</span></a></li>
              <li class="check"><a href="checkout.php"><span>Checkout</span></a></li>
              <?php if ($is_logged_in) {
              ?>
                <li class="login"><a href="include/logout.php"><span>Logout</span></a></li>
              <?php
              } else {
              ?>
                <li class="login"><a href="sign-in.php"><span>Login</span></a></li>
              <?php
              }
              ?>
            </ul>
          </div>
          <!-- /.cnt-account -->

          <div class="cnt-block">
            <ul class="list-unstyled list-inline white">
              <li class=""> <a href="contact.php"><span class="value">Sector-10, Uttara Model Town, Dhaka-1230.</span></a></li>
                  <?php
                  ?>
                </ul>
              </li> 
            </ul>
            <!-- /.list-unstyled -->
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="index.php"> <img src="assets/images/logo.png" alt="logo" width="260" style="margin-top: -13px;"> </a> </div>
            <!-- /.logo -->
            <!-- ============================================================= LOGO : END ============================================================= -->
          </div>
          <!-- /.logo-holder -->

          <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder">
            <!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form action="shop.php" method="GET" onsubmit="checkCategorySelection()">
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" id="category-menu">
                        <?php
                        $cat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '0'");
                        while ($row = mysqli_fetch_assoc($cat_res)) {
                          extract($row, EXTR_PREFIX_ALL, "cat");
                        ?>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#" data-cat-id="<?php echo $cat_ID ?>">- <?php echo $cat_c_name; ?> </a></li>
                        <?php
                        }
                        ?>
                      </ul>
                    </li>
                  </ul>
                  <input type="hidden" name="cat_id" id="selected-cat-id" value="" />
                  <input style="outline:none;" class="search-field" name="search" placeholder="Search here..." />
                  <button type="submit" style="border:none" class="search-button"></button>
                </div>
              </form>
            </div>

            <script>
              document.querySelectorAll('#category-menu a').forEach(function(element) {
                element.addEventListener('click', function(e) {
                  e.preventDefault();
                  const selectedCategory = this.getAttribute('data-cat-id');
                  document.getElementById('selected-cat-id').value = selectedCategory;
                  document.querySelector('.dropdown-toggle').textContent = this.textContent;
                });
              });

              function checkCategorySelection() {
                const selectedCategory = document.getElementById('selected-cat-id').value;
                if (!selectedCategory) {
                  document.getElementById('selected-cat-id').remove();
                }
              }
            </script>


            <!-- /.search-area -->
            <!-- ============================================================= SEARCH AREA : END ============================================================= -->
          </div>
          <!-- /.top-search-holder -->

          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row">
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

            <?php
            if ($is_logged_in) {
              $is_cart_empty = true;
              $cart_res = mysql_qres("SELECT c.ID as cart_ID,c.*,p.* FROM estore_cart as c join estore_product as p on c.p_id=p.ID where user_id = $user_id");
              $is_cart_empty = mysqli_num_rows($cart_res) == 0 ? true : false;
            ?>
              <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                  <div class="items-cart-inner">
                    <div class="basket">
                      <div class="basket-item-count"><span class="count"><?php echo $grand_grand_total = mysql_qrow("select count(ID) as item_count from estore_cart where user_id=$user_id")['item_count'] ?></span></div>
                      <div class="total-price-basket"> <span class="lbl">Shopping Cart</span> <span class="value">
                          ৳
                          <?php
                          $grand_grand_total_res = mysql_qres("SELECT SUM(price * qty) AS total FROM (SELECT IF(p.p_sale_price = 0, p.p_reg_price, p.p_sale_price) AS price, qty FROM estore_cart AS c INNER JOIN estore_product AS p ON c.p_id = p.ID where user_id= $user_id) AS subquery;");
                          $grand_grand_total = mysqli_fetch_all($grand_grand_total_res)[0][0];
                          echo $grand_grand_total == NULL ? 0 : $grand_grand_total;
                          ?>
                        </span> </div>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="cart-item product-summary">
                      <?php
                      if ($is_cart_empty) {
                      ?><div style="display: flex;justify-content:center;align-items:center;"><span class="alert alert-danger text-danger">Cart is Empty</span></div><?php
                                                                                                                                                                    }
                                                                                                                                                                      ?>
                      <?php

                      while ($cart_row = mysqli_fetch_assoc($cart_res)) {
                        extract($cart_row, EXTR_PREFIX_ALL, "cart");
                        $unit_price = $cart_p_sale_price == 0 ? $cart_p_reg_price : $cart_p_sale_price;
                      ?>
                        <div class="row">
                          <div class="col-xs-4">
                            <div class="image"> <a href="product_single.php?id=<?php echo $cart_p_id; ?>"><img src="admin/assets/img/products/<?php echo $cart_p_featured_img; ?>" alt=""></a> </div>
                          </div>
                          <div class="col-xs-7">
                            <h3 class="name"><a href="product_single.php?id=<?php echo $cart_p_id; ?>"><?php echo $cart_p_name; ?></a></h3>
                            <div class="price">৳<?php echo $unit_price * $cart_qty; ?></div>
                          </div>
                          <div class="col-xs-1 action"> <a href="core/delete.php?delete_cart_id=<?php echo $cart_cart_ID ?>"><i class="fa fa-trash"></i></a> </div>
                        </div>
                      <?php
                      }
                      ?>

                    </div>
                    <!-- /.cart-item -->
                    <div class="clearfix"></div>
                    <hr>
                    <div class="clearfix cart-total">
                      <div class="pull-right"> <span class="text">Grand Total :</span><span class='price'>৳<?php echo $grand_grand_total; ?></span> </div>
                      <div class="clearfix"></div>
                      <?php
                      if (!$is_cart_empty) {
                      ?><a href="checkout.php" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a><?php
                       }
                       ?>
                    </div>
                    <!-- /.cart-total-->

                  </li>
                </ul>
                <!-- /.dropdown-menu-->
              </div>
            <?php
            }
            ?>
            <!-- /.dropdown-cart -->

            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
          </div>
          <!-- /.top-cart-row -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
              <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown"> <a href="index.php">Home</a> </li>
                  <li class="dropdown"> <a href="shop.php">All</a> </li>

                  <?php
                  $cat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '0'");
                  while ($row = mysqli_fetch_assoc($cat_res)) {
                    extract($row, EXTR_PREFIX_ALL, "cat");
                  ?>
                    <li class="yamm"> <a href="shop.php?cat_id=<?php echo $cat_ID; ?>"><?php echo $cat_c_name; ?></a>
                    </li>
                  <?php
                  }
                  ?>
                 

                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer -->
            </div>
            <!-- /.navbar-collapse -->

          </div>
          <!-- /.nav-bg-class -->
        </div>
        <!-- /.navbar-default -->
      </div>
      <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

  </header>