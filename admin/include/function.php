<?php 
include 'connection.php';


function mysql_qres($sql){
    global $db;
    $res = mysqli_query($db,$sql);
    return $res;
}

function mysql_qrow($sql)
{
    global $db;
    $res = mysqli_query($db, $sql);
    $row = $res ? mysqli_fetch_assoc($res) : NULL;
    return $row;
}

//find sub category
function show_sub_category($cat_id){
    global $db;
    $sub_cat_sql = "SELECT * FROM estore_category WHERE is_parent='$cat_id'";
    $sub_cat_res = mysqli_query($db, $sub_cat_sql);
    while ($row = mysqli_fetch_assoc($sub_cat_res)) {
        $sub_cat_id = $row['ID'];
        $sub_cat_name = $row['c_name'];
        $sub_cat_image = $row['c_image'];
        $sub_cat_status = $row['c_status'];
        $is_parent = $row['is_parent'];
    ?>
        <tr class="table-primary">
            <!--  id="cat<?php //echo $is_parent; ?>" class="table-primary collapse" -->
            <th scope="row"><?php echo '-'; ?></th>
            <td>
                <img src="assets/img/products/category/<?php echo $sub_cat_image; ?>" width="55" alt="">
            </td>
            <td><?php echo '<i class="bi bi-arrow-return-right"> </i>' . $sub_cat_name; ?></td>
            <td>
                <?php
                if ($sub_cat_status == 0) {
                    echo '<span class="badge bg-danger">Inactive</sapn>';
                }
                if ($sub_cat_status == 1) {
                    echo '<span class="badge bg-success">Active</sapn>';
                }
                ?>
            </td>
            <td>
                <a href="category.php?editid=<?php echo $sub_cat_id;?>"><i class="bi bi-pencil-square text-dark"></i></a>
                <a data-bs-toggle="modal" data-bs-target="#deleteModalid<?php echo $sub_cat_id; ?>" href=""><i class="bi bi-trash text-danger"></i></a>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModalid<?php echo $sub_cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div>Confirm Delete</div>
                                <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <h4 class="modal-body text-center m-4">
                                Do you want to delete "<?php echo $sub_cat_name; ?>" sub-category?
                            </h4>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="category.php?deleteid=<?php echo $sub_cat_id; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
<?php
    }
}



// delete function
function deleterec($tablename,$columname,$deleteid,$header_location){
    global $db;
    $delete_sql="DELETE FROM `$tablename` WHERE `$columname`='$deleteid'";
    $delete_res = mysqli_query($db,$delete_sql);
    if($delete_res){
        header("Location: " . $header_location);    
    }
    else{
        die('Category delete error!'.mysqli_error($db));
    }

}


function is_img($file_name){
    global $db;

    $splitedArray = explode('.', $file_name);
    $extn = strtolower(end($splitedArray));

    $extentions = array('png', 'jpg', 'jpeg','webp','avif','jfif');

    if(in_array($extn, $extentions) === true){
        return true;
    }else{
        return false;
    }
}

function is_img_array($file_name){
    global $db;
    $all_is_image = true;

    for($i=0;$i<count($file_name);$i++){
        $splitedArray = explode('.', $file_name[$i]);
    $extn = strtolower(end($splitedArray));

    $extentions = array('png', 'jpg', 'jpeg');

    if(in_array($extn, $extentions) === true){
    }else{
        $all_is_image=false;
        break;
    }
    }
    if($all_is_image){
        return true;
    }else{
        return false;
    }
}


// delete file
function delete_file($file_name,$table,$key,$file_id,$path){
    global $db;

    $file_name_res = mysqli_query($db,"SELECT $file_name FROM $table WHERE $key = '$file_id'");
    $row = mysqli_fetch_assoc($file_name_res);
    $f_name = $row[$file_name];

    unlink($path.$f_name);
}


//find parent category



//find values based on their sql(value of one singel field)
function findval($columname,$tablename,$wherecolumn,$wherevalue){
    global $db;
    $sql = "SELECT $columname FROM $tablename where $wherecolumn='$wherevalue'";
    $row1 = mysqli_fetch_assoc(mysqli_query($db,$sql));
    $value = $row1[$columname];
    return $value;
}


//generate random string
function RandomString($thiss){
    $length=8;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

// check if its an admin or not
function is_admin($userrole){
    global $db;

    if($userrole == 3){
        return true;
    }else{
        return false;
    }
}



?>



