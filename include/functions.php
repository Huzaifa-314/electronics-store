<?php
include 'connection.php';



function mysql_qres($sql){
    global $db;
    $res = mysqli_query($db,$sql);
    return $res;
}

//find values based on their sql(value of one singel field)
function findval($columname,$tablename,$wherecolumn,$wherevalue){
    global $db;
    $sql = "SELECT $columname FROM $tablename where $wherecolumn='$wherevalue'";
    $row1 = mysqli_fetch_assoc(mysqli_query($db,$sql));
    $value = $row1[$columname];
    return $value;
}

function showprice($p_sale_price,$p_reg_price){
    if($p_reg_price!=0 && $p_sale_price!=0){
        ?>
            <div class="product-price"> <span class="price"> <?php echo $p_sale_price; ?> </span> <span class="price-before-discount"><?php echo $p_reg_price ?></span> </div>
            <!-- /.product-price --> 
        <?php
    }else{
        ?>
            <div class="product-price"> <span class="price"> <?php echo $p_reg_price; ?> </span> </div>
            <!-- /.product-price --> 
        <?php
    }
}
// function price_convert($currency)[
//     if($currency=="usd")
// ]
// $cateory_sql = "SELECT * FROM estore_category WHERE is_parent = '0'";
// $category_res = mysql_qres("SELECT * FROM estore_category WHERE is_parent = '0'");
// while ($row = mysqli_fetch_assoc($category_res)) {
//     // echo json_encode($row).'<br>';
//     // extract($row,EXTR_PREFIX_ALL,"cat");
//     echo json_encode($row); 
// }