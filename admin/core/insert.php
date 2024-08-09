<?php
include 'include/connection.php';


//category insert code
$nameErr = "";
$debugging="debug log::";
$imgErr="";
$p_featured_img_err="";
$p_gallery_image_err="";
if (isset($_POST['add_category'])) {
    $name = $_POST['cat_name'];
    $is_parent = $_POST['is_parent'];
    $file_name = $_FILES['choose-file']['name'];
    $tmp_name = $_FILES['choose-file']['tmp_name'];
    $file_size = $_FILES['choose-file']['size'];

    $splited_files = explode('.',$file_name);
    $extn = strtolower(end($splited_files));
    $extensions=array('png','jpg','jpeg','webp','avif');

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
            $imgErr='<div class="alert alert-danger mb-0 mt-2">Please upload png/jpg/jpeg/webp/avif file</div>';
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
    $gallery = array_filter($_FILES['gallery']['name']);
    $gallery_tmp_path = array_filter($_FILES['gallery']['tmp_name']);
    $gallery_images_names_for_database = "";

    if(!empty($gallery)){
        $gallery_images_names_for_database="";
        if(is_img_array($gallery)){
            //upload the gallery images to the server
            for($i=0;$i<count($gallery);$i++){
                $updated_gallery_image_name= rand().$gallery[$i];
                move_uploaded_file($gallery_tmp_path[$i],'assets/img/products/gallery/'.$updated_gallery_image_name);
                $gallery_images_names_for_database.='@'.$updated_gallery_image_name;
            }
        }else{
            $p_gallery_image_err='<div class="alert alert-danger mb-0 mt-2">All the image should be png, jpg or jpeg file</div>';
        }
    }else{
        //set the value(that has to be sent in the database) to null
    }

    if(!empty($file_name)){
        if(is_img($file_name)){
            $updatedname = rand().$file_name;
            move_uploaded_file($tmp_path, 'assets/img/products/'.$updatedname);
            $pInsertSql = "INSERT INTO estore_product (p_name, p_category, p_brand,p_reg_price,p_sale_price,p_featured_img,p_galley_img,p_short_desc,p_big_desc,p_quantity,p_status) VALUES ('$p_name', '$p_sub_category', '$p_brand','$regular_price','$offer_price','$updatedname','$gallery_images_names_for_database','$p_small_desc','$p_big_desc','$stock','1')";
            $pInsertSqlResult = mysqli_query($db, $pInsertSql);
            if($pInsertSqlResult){
                header('location: product.php?data=view');
            }else{
                die('Brand insert error!'.mysqli_error($db));
            }
        }else{
            $p_featured_img_err='<div class="alert alert-danger mb-0 mt-2">Please upload png/jpg/jpeg/avif/webp/jfif file</div>';
        }
    }else{
        $p_featured_img_err='<div class="alert alert-danger mb-0 mt-2">Featured Image Required!</div>';
    }

    

    $debugging = $p_category.'<br>'.$p_sub_category;
    
}






//add coupon insert code
if(isset($_POST['add_coupon'])){
    $coupon_code =$_POST['coupon_code'];
    $amount =$_POST['amount'];
    $discount_type =$_POST['discount_type'];
    $starting_date =$_POST['starting_date'];
    $expired_date =$_POST['expired_date'];
    $dis_on_type =$_POST['dis_on_type'];
    $discounton =$_POST['discounton'];

    $id_array= '';
    foreach($discounton as $data){
        $data = ','.$data;
        $id_array .= $data;
    }

    $coupon_sql = "INSERT INTO estore_coupon(coupon,amount,dis_type,starting_date,expire_date,dis_on_type,discount_on) VALUES ('$coupon_code','$amount','$discount_type','$starting_date','$expired_date','$dis_on_type','$id_array')";
    $coupon_res = mysqli_query($db,$coupon_sql);

    if($coupon_res){
        header('location: coupon.php');
    }else{
        die('Coupon insert error!'.mysqli_error($db));
    }

    $debugging = "debug::";
}



// user insert code
if(isset($_POST['add_user'])){

    $name  =  $_POST['user-name'];
    $email  =  $_POST['user-email'];
    $pass  =  $_POST['password'];
    $phone  =  $_POST['phone'];
    $address  =  $_POST['address'];
    $file_name  =  $_FILES['choose-file']['name'];
    $tmp_name  =  $_FILES['choose-file']['tmp_name'];
 
    if(!empty($file_name)){
         $file = is_img($file_name);
 
         if($file){
             $updatedname = rand().$file_name;
             move_uploaded_file($tmp_name, 'assets/img/users/'.$updatedname);
         }else{
             echo 'not an image';
         }
    }else{
             $updatedname = '';
    }
 
    $encrypted = sha1($pass);
 
    $insertusersql = "INSERT INTO estore_user(firstname,lastname,username,email,pass,address,photo,phone,status) VALUES ('','','$name','$email','$encrypted','$address','$updatedname','$phone','1')";
 
    $insertuserres = mysqli_query($db,$insertusersql);
 
     if($insertuserres){
         header('location: users.php');
     }else{
         die('User insert error!'.mysqli_error($db));
     }
 }