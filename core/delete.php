<?php
include '../include/connection.php';
include '../include/functions.php';

if(isset($_GET['delete_cart_id'])){
    $cart_id = $_GET['delete_cart_id'];
    deleterec('estore_cart','ID',$cart_id,$_SERVER['HTTP_REFERER']);
}