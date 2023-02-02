<?php
include 'include/connection.php';


//category insert code
$nameErr = "";
$debugging="debug log::";
$imgErr="";
$p_featured_img_err="";
if (isset($_POST['add_category'])) {
    $name = $_POST['cat_name'];
    $is_parent = $_POST['is_parent'];
    $file_name = $_FILES['choose-file']['name'];
    $tmp_name = $_FILES['choose-file']['tmp_name'];
    $file_size = $_FILES['choose-file']['size'];

    $splited_files = explode('.',$file_name);
    $extn = strtolower(end($splited_files));
    $extensions=array('png','jpg','jpeg');

    if(!empty($file_name)){
        if(in_array($extn,$extensions) === true){
            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name,'assets/img/products/category/'.$update_name);
            $cat_insert = "INSERT INTO estore_category (c_name,c_image,is_parent,c_status) VALUES ('$name','$update_name','$is_parent','1')";
            $cat_insert_res = mysqli_query($db, $cat_insert);
            if ($cat_insert_res) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            } else {
                die('Category insert error!' . mysqli_error($db));
            }
        }else{
            $imgErr='<div class="alert alert-danger mb-0 mt-2">Please upload png, jpg or jpeg file</div>';
        }
    }else{
        $cat_insert = "INSERT INTO estore_category (c_name,is_parent,c_status) VALUES ('$name','$is_parent','1')";
        $cat_insert_res = mysqli_query($db, $cat_insert);
        if ($cat_insert_res) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        } else {
            die('Category insert error!' . mysqli_error($db));
        }
    }
}

    

    // if (!empty($name)) {
        
    // } else {
    //     $nameErr = '<div class="alert alert-danger mb-0 mt-2">Please Name the Cateory</div>';
    // }

    // $mbsize=($file_size/1024)/1024;
    // if($mbsize>1){
    //     $sizeErr='<div class="alert alert-danger mb-0 mt-2">Image size must less than 1 MB</div>';
    // }



    // brand insert
if(isset($_POST['add_brand'])){
    $brand_name = $_POST['brand_name'];
    $file_name  = $_FILES['choose-file']['name'];
    $tmp_name   = $_FILES['choose-file']['tmp_name'];

    if(!empty($file_name)){
        $file = is_img($file_name);

        if($file){
            $updatedname = rand().$file_name;
            move_uploaded_file($tmp_name, 'assets/img/products/brand/'.$updatedname);
        }else{
            echo 'not an image';
        }
    }else{
        $updatedname = '';
    }

    $brandInsertSql = "INSERT INTO estore_brand (b_name, b_image, b_status) VALUES ('$brand_name', '$updatedname', '1')";
    $brandInsertSqlResult = mysqli_query($db, $brandInsertSql);
    if($brandInsertSqlResult){
        header('location: brand.php');
    }else{
        die('Brand insert error!'.mysqli_error($db));
    }
    
    
    $debugging="$extn";
}



//add product insert code
if(isset($_POST['add_product'])){
    $p_name=$_POST['p_name'];
    $p_small_desc = mysqli_real_escape_string($db, $_POST['p_small_desc']);
    $regular_price=$_POST['regular_price'];
    $offer_price=$_POST['offer_price'];
    $stock=$_POST['stock'];
    $p_big_desc = mysqli_real_escape_string($db, $_POST['p_big_desc']);
    $p_category = $_POST['p_category'];
    $p_brand = $_POST['p_brand'];
    $p_sub_category = $_POST['p_sub_category'];
    $file_name= $_FILES['choose-file']['name'];
    $tmp_path = $_FILES['choose-file']['tmp_name'];
    //$_FILES['files']['name'];

    $file = is_img($file_name);

    if($file){
        $updatedname = rand().$file_name;
        move_uploaded_file($tmp_path, 'assets/img/products/'.$updatedname);
    }else{
        $p_featured_img_err='<div class="alert alert-danger mb-0 mt-2">Please upload png, jpg or jpeg file</div>';
    }

    $pInsertSql = "INSERT INTO estore_product (p_name, p_category, p_brand,p_reg_price,p_sale_price,p_featured_img,p_short_desc,p_big_desc,p_quantity,p_status) VALUES ('$p_name', '$p_sub_category', '$p_brand','$regular_price','$offer_price','$updatedname','$p_small_desc','$p_big_desc','$stock','1')";
    $pInsertSqlResult = mysqli_query($db, $pInsertSql);
    if($pInsertSqlResult){
        header('location: product.php?data=view');
    }else{
        die('Brand insert error!'.mysqli_error($db));
    }

    $debugging = $p_category.'<br>'.$p_sub_category;
    
}