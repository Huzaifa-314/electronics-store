<?php 

include '../include/connection.php';
include '../include/function.php';

$users = mysqli_query($db,"SELECT * FROM estore_user");
echo $users;