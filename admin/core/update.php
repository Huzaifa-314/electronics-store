<?php

    include '../include/connection.php';
    if(isset($_POST['update_category'])){
        $name = $_POST['cat_name'];
        $parentid = $_POST['is_parent'];
        $status = $_POST['cat_status'];
        $editid = $_POST['editid'];
        
        if(!empty($_FILES['choose-file']['name'])){
            $file_name = $_FILES['choose-file']['name'];
            $tmp_path=$_FILES['choose-file']['tmp_name'];

            $splited_files = explode('.',$file_name);
            $extn = strtolower(end($splited_files));
            $extensions=array('png','jpg','jpeg');
            if(in_array($extn,$extensions) === true){
                $update_name = rand().$file_name;
                move_uploaded_file($tmp_path,'../assets/img/products/category/'.$update_name);
                $cat_update_sql = "UPDATE estore_category SET c_name='$name',c_image='$update_name',is_parent='$parentid',c_status='$status' WHERE ID='$editid' ";
                $cat_insert_res = mysqli_query($db, $cat_update_sql);
                if ($cat_insert_res) {
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                } else {
                    die('Category insert error!' . mysqli_error($db));
                }
            }else{
                echo "please upload an image file";
            }
        }else{
            $cat_update_sql = "UPDATE estore_category SET c_name='$name',is_parent='$parentid',c_status='$status' WHERE ID='$editid' ";
            $cat_insert_res = mysqli_query($db, $cat_update_sql);
            if ($cat_insert_res) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            } else {
                die('Category insert error!' . mysqli_error($db));
            }
        }
    }

?>