<div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
    <!-- ================================== TOP NAVIGATION ================================== -->
    <div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
        <nav class="yamm megamenu-horizontal">
            <ul class="nav">

                <?php
                $cat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '0'");
                while ($row = mysqli_fetch_assoc($cat_res)) {
                    extract($row, EXTR_PREFIX_ALL, "cat");
                ?>
                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $cat_c_name; ?></a>
                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                        <ul class="dropdown-menu mega-menu">
                            <li class="yamm-content">
                                <div class="row">
                                    <?php
                                    $subcat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '$cat_ID'");
                                    $subcatall = mysqli_fetch_all($subcat_res, MYSQLI_ASSOC);
                                    ?>
                                    <div class="col-xs-12 col-sm-12 col-lg-4">
                                        <ul>
                                            <?php
                                            for ($i = 0; $i < sizeof($subcatall) / 2; $i++) {
                                                extract($subcatall[$i], EXTR_PREFIX_ALL, "subcat");
                                            ?>

                                                <li><a href="shop.php?cat_id=<?php echo $subcat_ID ?>"><?php echo $subcat_c_name; ?></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-4">
                                        <ul>
                                            <?php
                                            for ($i = sizeof($subcatall) / 2; $i < sizeof($subcatall); $i++) {
                                                extract($subcatall[$i], EXTR_PREFIX_ALL, "subcat");
                                            ?>

                                                <li><a href="shop.php?cat_id=<?php echo $subcat_ID ?>"><?php echo $subcat_c_name; ?></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="dropdown-banner-holder"> <a href="#"><img style="width:80px;margin-top:5px" alt="" src="admin/assets/img/products/category/<?php echo $cat_c_image; ?>" /></a> </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- /.yamm-content -->
                        </ul>
                        <!-- /.dropdown-menu -->
                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
                    </li>
                    <!-- /.menu-item -->
                <?php
                }
                ?>


            </ul>
            <!-- /.nav -->
        </nav>
        <!-- /.megamenu-horizontal -->
    </div>
    <!-- /.side-menu -->
    <!-- ================================== TOP NAVIGATION : END ================================== -->
    <div class="sidebar-module-container">
        <div class="sidebar-filter">
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget">
                <h3 class="section-title">Shop by</h3>
                <div class="widget-header">
                    <h4 class="widget-title">Category</h4>
                </div>
                <div class="sidebar-widget-body">
                    <div class="accordion">

                        <?php
                        $cat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '0'");
                        while ($row = mysqli_fetch_assoc($cat_res)) {
                            extract($row, EXTR_PREFIX_ALL, "cat");
                        ?>
                            <div class="accordion-group">
                                <div class="accordion-heading"> <a href="#collapse<?php echo $cat_ID; ?>" data-toggle="collapse" class="accordion-toggle collapsed"> <?php echo $cat_c_name; ?> </a> </div>
                                <!-- /.accordion-heading -->
                                <div class="accordion-body collapse" id="collapse<?php echo $cat_ID; ?>" style="height: 0px;">
                                    <div class="accordion-inner">
                                        <ul>

                                            <?php
                                            $subcat_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '$cat_ID'");
                                            while ($subcat_row = mysqli_fetch_assoc($subcat_res)) {
                                            ?>
                                                <li><a href="shop.php?cat_id=<?php echo $subcat_row['ID'] ?>"><?php echo $subcat_row['c_name'] ?></a></li>
                                            <?php
                                            }
                                            ?>


                                        </ul>
                                    </div>
                                    <!-- /.accordion-inner -->
                                </div>
                                <!-- /.accordion-body -->
                            </div>
                            <!-- /.accordion-group -->
                        <?php
                        }
                        ?>



                    </div>
                    <!-- /.accordion -->
                </div>
                <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

            <!-- ============================================== COMPARE============================================== -->
            <!-- <div class="sidebar-widget outer-top-vs">
              <h3 class="section-title">Compare products</h3>
              <div class="sidebar-widget-body">
                <div class="compare-report">
                  <p>You have no <span>item(s)</span> to compare</p>
                </div>
              </div>
            </div> -->
            <!-- /.sidebar-widget -->
            <!-- ============================================== COMPARE: END ============================================== -->
            <!-- ============================================== NEWSLETTER ============================================== -->
            <!-- <div class="sidebar-widget newsletter outer-bottom-small  outer-top-vs">
              <h3 class="section-title">Newsletters</h3>
              <div class="sidebar-widget-body outer-top-xs">
                <p>Sign Up for Our Newsletter!</p>
                <form>
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                  </div>
                  <button class="btn btn-primary">Subscribe</button>
                </form>
              </div>
            </div> -->
            <!-- /.sidebar-widget -->
            <!-- ============================================== NEWSLETTER: END ============================================== -->


        </div>
        <!-- /.sidebar-filter -->
    </div>
    <!-- /.sidebar-module-container -->
</div>