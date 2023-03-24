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

                                            <li><a href="category.php?id=<?php echo $subcat_ID ?>"><?php echo $subcat_c_name; ?></a></li>
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

                                            <li><a href="category.php?id=<?php echo $subcat_ID ?>"><?php echo $subcat_c_name; ?></a></li>
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