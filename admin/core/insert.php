<?php 
    include '../include/connection.php';
    if(isset($_POST['add_category'])){
        $name = $_POST['cat_name'];
        $is_parent = $_POST['is_parent'];
        $cat_insert = "INSERT INTO estore_category (c_name,is_parent,c_status) VALUES ('$name','$is_parent','1')";
        $cat_insert_res = mysqli_query($db,$cat_insert);
        if($cat_insert_res){
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
        else{
            die('Category insert error!'.mysqli_error($db));
        }
    }
?>