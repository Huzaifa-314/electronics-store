<!-- ============================================== HEADER : START ============================================== -->
<?php include 'include/header.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->


<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="index.php">Home</a></li>
        <?php
        if (isset($_GET['cat_id'])) {
          $category_name = findval('c_name', 'estore_category', 'ID', $_GET['cat_id']);
        ?>
          <li class='active'><?php echo $category_name; ?></li>
        <?php
        } else echo "/ Shop";
        ?>
      </ul>
    </div>
    <!-- /.breadcrumb-inner -->
  </div>
  <!-- /.container -->
</div>
<!-- /.breadcrumb -->


<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <!-- ========================================== SIDEBAR - START ========================================= -->
      <?php include 'include/sidebar.php'; ?>
      <!-- ========================================== SIDEBAE – END ========================================= -->
      <div class="col-xs-12 col-sm-12 col-md-9 rht-col">



        <!-- filters -->
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6 col-lg-6 hidden-sm">
              <!-- <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- /.col -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-6 col-xs-6 col-lg-6 text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>



        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                  <?php
                  $product_count = 0;
                  if (isset($_GET['cat_id'])) {
                    $category_id = $_GET['cat_id'];
                    $category_res = mysql_qres("SELECT * FROM estore_category where ID = $category_id; ");
                    $category_row = mysqli_fetch_assoc($category_res);
                    extract($category_row, EXTR_PREFIX_ALL, "cat");
                    // echo $cat_is_parent;
                    if ($cat_is_parent == 0) {
                      $sub_cat_res = mysql_qres("SELECT ID FROM estore_category where is_parent = $cat_ID; ");
                      while ($sub_row = mysqli_fetch_assoc($sub_cat_res)) {
                        $sub_cat_id = $sub_row['ID'];
                        // echo $sub_cat_id."<br>";
                        $pro_res = mysql_qres("SELECT * FROM estore_product where p_category = $sub_cat_id");
                        while ($pro_row = mysqli_fetch_assoc($pro_res)) {
                          $product_count++;
                          extract($pro_row, EXTR_PREFIX_ALL, "pro");
                  ?>
                          <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="item">
                              <?php include 'include/product-card.php'; ?>
                            </div>
                          </div>
                          <!-- /.item -->
                        <?php
                        }
                      }
                    } else {
                      $sub_cat_id = $_GET['cat_id'];
                      // echo $sub_cat_id."<br>";
                      $pro_res = mysql_qres("SELECT * FROM estore_product where p_category = $sub_cat_id");
                      while ($pro_row = mysqli_fetch_assoc($pro_res)) {
                        $product_count++;
                        extract($pro_row, EXTR_PREFIX_ALL, "pro");
                        ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                          <div class="item">
                            <?php include 'include/product-card.php'; ?>
                          </div>
                        </div>
                      <?php
                      }
                    }
                  } else if (isset($_GET['search'])) {
                    $search_term = mysqli_real_escape_string($db, $_GET['search']); // sanitize the search input
                    $cat_id = isset($_GET['cat_id']) ? intval($_GET['cat_id']) : 0; // check if cat_id is set and convert to integer

                    // If both search and category are present
                    if ($cat_id > 0) {
                      $pro_res = mysql_qres("SELECT * FROM estore_product WHERE cat_id = $cat_id AND (p_name LIKE '%$search_term%' OR p_short_desc LIKE '%$search_term%')");
                    } else {
                      // Only search term is present
                      $pro_res = mysql_qres("SELECT * FROM estore_product WHERE p_name LIKE '%$search_term%' OR p_short_desc LIKE '%$search_term%'");
                    }

                    while ($pro_row = mysqli_fetch_assoc($pro_res)) {
                      extract($pro_row, EXTR_PREFIX_ALL, "pro");
                      $product_count++;
                      ?>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="item">
                          <?php include 'include/product-card.php'; ?>
                        </div>
                      </div>
                      <!-- /.item -->
                    <?php
                    }
                  } else {
                    $pro_res = mysql_qres("SELECT * FROM estore_product");
                    while ($pro_row = mysqli_fetch_assoc($pro_res)) {
                      extract($pro_row, EXTR_PREFIX_ALL, "pro");
                      $product_count++;
                    ?>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="item">
                          <?php include 'include/product-card.php'; ?>
                        </div>
                      </div>
                      <!-- /.item -->
                    <?php
                    }
                  }
                  if ($product_count == 0) {
                    ?><div style="display:flex;justify-content: center;align-items:center">
                      <span class="alert alert-danger text-danger">No Product</span>
                    </div><?php
                        }
                          ?>


                </div>
                <!-- /.row -->
              </div>
              <!-- /.category-product -->

            </div>
            <!-- /.tab-pane -->

          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container bottom-row">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container -->
            </div>
            <!-- /.text-right -->

          </div>
          <!-- /.filters-container -->

        </div>
        <!-- /.search-result-container -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>
<!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->

<!-- ============================================================= FOOTER ============================================================= -->
<?php include 'include/footer.php' ?>
<!-- ============================================================= FOOTER : END============================================================= -->