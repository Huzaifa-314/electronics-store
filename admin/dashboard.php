<?php include 'include/header.php'; ?>

<?php include 'include/sidebar.php';
if (!empty($_SESSION['email']) && $_SESSION['userrole'] == 1) {
  header('location: userdashboard.php');
}
?>


<?php
//all calculation
$total_products = mysql_qrow("SELECT COUNT(*) AS total_products FROM estore_product;")["total_products"];
$stock_out = mysql_qrow("SELECT COUNT(*) AS stock_out FROM estore_product where p_quantity = 0")["stock_out"];


$query = "SELECT SUM(oi.qty * p.p_reg_price) AS total_revenue 
          FROM estore_order_items oi 
          JOIN estore_product p ON oi.product_id = p.ID";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$total_revenue = $row['total_revenue'];

?>



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

              <div class="card-body">
                <h5 class="card-title">Total Products <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo $total_products ?></h6>
                    <a href="product.php?stock_out">
                      <span class="text-success small pt-1 fw-bold"><?php echo $stock_out ?></span> <span class="text-muted small pt-2 ps-1">out of stock</span>
                    </a>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->



          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Revenue <span>| Total</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>$<?php echo number_format($total_revenue, 2); ?></h6>
                    <span class="text-muted small pt-2 ps-1">Total revenue generated</span>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Revenue Card -->






          <?php
          $query = "SELECT * FROM estore_product WHERE p_quantity <= 0 limit 4";
          $result = mysqli_query($db, $query);
          ?>

          <!-- Out of Stock Products List -->
          <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card" style="background-color: rgba(255,0,0,0.2);">
              <div class="card-body">
                <h5 class="card-title">Out of Stock Products</h5>
                <div class="row">
                  <?php
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <div class="col-6 col-md-4 col-lg-3 text-center">
                        <a href="product.php?data=edit&editid=<?php echo $row['ID']?>">
                          <img src="assets/img/products/<?php echo $row['p_featured_img'] ?>" alt="<?php echo $row['p_name'] ?>" class="img-fluid mb-2" style="height: 100px; width: auto;">
                        </a>

                        <p><?php echo $row['p_name'] ?></p>
                      </div>
                  <?php
                    }
                  } else {
                    echo '<p>No products are out of stock.</p>';
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>





        </div>
  </section>

</main><!-- End #main -->

<?php include 'include/footer.php'; ?>