<?php

$db = mysqli_connect('localhost','root','','estore');
if($db){
    //echo 'database connection established';
}
else{
    die('Databse connection lost'.mysqli_error($db));
}