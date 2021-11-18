<?php  
include "configs/database_config.php";

$sql = "SELECT * FROM tblusers ORDER BY id DESC";
$result = mysqli_query($connection, $sql);