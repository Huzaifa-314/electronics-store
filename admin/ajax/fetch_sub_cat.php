<?php 
include '../include/connection.php';

if(isset($_POST['subs_parent_id']))
{
    global $db;
    $subs_parent_id = $_POST['subs_parent_id'];
    $sub_id = $_POST['sub_id'];
    $fetched_res=mysqli_query($db,"SELECT * FROM estore_category WHERE is_parent = $subs_parent_id AND c_status='1' ORDER BY c_name ASC");
    while($row=mysqli_fetch_assoc($fetched_res))
    {
        $sub_cat_id=$row['ID'];
        echo "<option value=".$sub_cat_id.'"'.($sub_cat_id==$sub_id?" selected":"").">".$row['c_name']."</option>";
    }
    exit;
}