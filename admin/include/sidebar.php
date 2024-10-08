  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link " href="dashboard.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>
      <?php 

      if($_SESSION['userrole'] == 3){
        ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>E-commerce</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="order.php">
              <i class="bi bi-circle"></i><span>All Orders</span>
            </a>
          </li>
          <!-- <li>
            <a href="coupon.php?data=view">
              <i class="bi bi-circle"></i><span>Cupon Code</span>
            </a>
          </li> -->
          <li>
            <a href="payment_history.php">
              <i class="bi bi-circle"></i><span>Payment History</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="category.php">
              <i class="bi bi-circle"></i><span>Category</span>
            </a>
          </li>
          <li>
            <a href="brand.php">
              <i class="bi bi-circle"></i><span>Brand</span>
            </a>
          </li>
          <li>
            <a href="product.php?data=add">
              <i class="bi bi-circle"></i><span>Add New Product</span>
            </a>
          </li>
          <li>
            <a href="product.php?data=view">
              <i class="bi bi-circle"></i><span>View All Products</span>
            </a>
          </li>
        </ul>
      </li><!-- Product Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Reports</span>
        </a>
      </li>End Reports Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="users.php?data=add">
              <i class="bi bi-circle"></i><span>Add New Users</span>
            </a>
          </li>
          <li>
            <a href="users.php">
              <i class="bi bi-circle"></i><span>View All Users</span>
            </a>
          </li>
        </ul>
      </li><!-- End Users Nav -->
      <?php
      }
      if($_SESSION['userrole'] == 2){
        ?>
          <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="category.php">
              <i class="bi bi-circle"></i><span>Category</span>
            </a>
          </li>
          <li>
            <a href="brand.php">
              <i class="bi bi-circle"></i><span>Brand</span>
            </a>
          </li>
          <li>
            <a href="product.php?data=add">
              <i class="bi bi-circle"></i><span>Add New Product</span>
            </a>
          </li>
          <li>
            <a href="product.php?data=view">
              <i class="bi bi-circle"></i><span>View All Products</span>
            </a>
          </li>
        </ul>
      </li><!-- Product Nav -->

<?php
      }

      ?>

    </ul>

  </aside><!-- End Sidebar-->