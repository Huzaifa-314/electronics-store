<?php 

// read function
function readstart($db,$sql){
    $res=mysqli_query($db,$sql);
    while($row=mysqli_fetch_assoc($res)){
        $key = array_keys($row);
        echo json_encode($key);
    }
}


?>