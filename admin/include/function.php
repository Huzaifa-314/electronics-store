<?php 
include 'connection.php';

// delete function
function deleterec($tablename,$columname,$deleteid){
    global $db;
    $delete_sql="DELETE FROM `$tablename` WHERE `$columname`='$deleteid'";
    $delete_res = mysqli_query($db,$delete_sql);
    if($delete_res){
        header("Location: " . $_SERVER["HTTP_REFERER"]);    
    }
    else{
        die('Category delete error!'.mysqli_error($db));
    }

}


?>