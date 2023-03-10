<?php
    include '../include/connection.php';
    $q=$_GET['value'];
    if($q==0){
        ?>
            <label for="">Choose Products</label>
            <select id="" class="form-control" name="discounton[]" multiple>
        <?php
        $p_sql = "SELECT * FROM estore_product";
        $p_res = mysqli_query($db, $p_sql);
        while ($row = mysqli_fetch_assoc($p_res)) {
            $p_id = $row['ID'];
            $p_name=$row['p_name'];

            ?>
                <option value="<?php echo $p_id ?>">
                    <?php echo $p_name;?>
                </option>
            <?php
        }
            ?>
            </select>
            <?php
    }
    if($q==1){
        ?>
            <label for="">Choose Categories</label>
            <select name="discounton[]" class="form-control"  multiple>
        <?php
        $cateory_sql = "SELECT * FROM estore_category WHERE is_parent='0'";
        $category_res = mysqli_query($db, $cateory_sql);
        while ($row = mysqli_fetch_assoc($category_res)) {
            $ecat_id = $row['ID'];
            $ecat_name = $row['c_name'];

            ?>
                <option value="<?php echo $ecat_id ?>">
                    <?php echo $ecat_name;?>
                </option>
            <?php
        }
            ?>
            </select>
            <?php
    }
    if($q ==2){
        ?>
            <label for="">Choose Brands</label>
            <select class="form-control" name="discounton[]" multiple>
        <?php
        $brand_sql = "SELECT * FROM estore_brand";
        $brand_res = mysqli_query($db, $brand_sql);
        while ($row = mysqli_fetch_assoc($brand_res)) {
          $eb_id = $row['ID'];
          $eb_name = $row['b_name'];

            ?>
                <option value="<?php echo $eb_id ?>">
                    <?php echo $eb_name;?>
                </option>
            <?php
        }
            ?>
            </select>
            <?php
    }
    if($q==3){
        ?>

            <label for="">Choose Brands</label>
            <select id="" class="form-control" name="discounton[]">
            <option value="all" selected>All Products</option>
            </select>
            
        <?php
    }
    ?><small>Press CTRL to multiple select</small><?php

?>
