<?php  
include "configs/database_config.php";

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($connect, $sql);