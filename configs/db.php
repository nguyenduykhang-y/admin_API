<?php
    $connection = mysqli_connect('localhost', 'root', '', 'php1fpt');
    if($connection){
        mysqli_query($connection, "SET NAMES 'UTF8'");
    }else{
        echo "Kết nối thất bại!";
    }
 ?>