<?php
include 'connection.php';



function mysql_qres($sql)
{
    global $db;
    $res = mysqli_query($db, $sql);
    return $res;
}

function mysql_qrow($sql)
{
    global $db;
    $res = mysqli_query($db, $sql);
    $row = $res ? mysqli_fetch_assoc($res) : NULL;
    return $row;
}

// delete function
function deleterec($tablename, $columname, $deleteid, $header_location)
{
    global $db;
    $delete_sql = "DELETE FROM `$tablename` WHERE `$columname`='$deleteid'";
    $delete_res = mysqli_query($db, $delete_sql);
    if ($delete_res) {
        header("Location: " . $header_location);
    } else {
        die('Category delete error!' . mysqli_error($db));
    }
}

//find values based on their sql(value of one singel field)
function findval($columname, $tablename, $wherecolumn, $wherevalue)
{
    global $db;
    $sql = "SELECT $columname FROM $tablename where $wherecolumn='$wherevalue'";
    $row1 = mysqli_fetch_assoc(mysqli_query($db, $sql));
    $value = $row1 ? $row1[$columname] : NULL;
    return $value;
}

function showprice($p_sale_price, $p_reg_price)
{
    if ($p_reg_price != 0 && $p_sale_price != 0) {
?>
        <div class="product-price"> <span class="price">৳<?php echo $p_sale_price; ?> </span> <span class="price-before-discount"><?php echo $p_reg_price ?></span> </div>
        <!-- /.product-price -->
    <?php
    } else {
    ?>
        <div class="product-price"> <span class="price">৳<?php echo $p_reg_price; ?> </span> </div>
        <!-- /.product-price -->
    <?php
    }
}


function product_card()
{
    ?>
    <?php
    $is_out_of_stock = $pro_p_quantity == 0;
    ?>

    <div class="products" style="<?php if ($is_out_of_stock) echo "opacity:0.5" ?>">
        <div class="product">
            <div class="product-image">
                <div class="image">
                    <a href="product_single.php?id=<?php echo $pro_ID; ?>">
                        <img src="admin/assets/img/products/<?php echo $pro_p_featured_img; ?>" alt="">
                        <!-- <img src="assets/images/products/p1_hover.jpg" alt="" class="hover-image"> -->
                    </a>

                </div>
                <!-- /.image -->

                <!-- <div class="tag new"><span>new</span></div> -->
            </div>
            <!-- /.product-image -->

            <div class="product-info text-left">
                <h3 class="name"><a href="product_single.php?id=<?php echo $pro_ID; ?>"><?php echo $pro_p_name; ?></a></h3>
                <?php showprice($pro_p_sale_price, $pro_p_reg_price); ?>

                <!-- /.product-price -->

            </div>
            <!-- /.product-info -->
            <div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button onclick="location.href = 'cart.php?id=<?php echo $pro_ID; ?>';" class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                            <button onclick="location.href = 'cart.php?id=<?php echo $pro_ID; ?>';" class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <!-- <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li> -->
                        <!-- <li class="lnk"> <a class="add-to-cart" href="product-comparison.php?id=<?php echo $pro_ID; ?>" title="Compare"> <i class="fa fa-signal"></i> </a> </li> -->
                    </ul>
                </div>
                <!-- /.action -->
            </div>
            <!-- /.cart -->
        </div>
        <!-- /.product -->

    </div>
    <!-- /.products -->
<?php
}
