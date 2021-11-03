<?php  
include "configs/db.php";

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($connect, $sql);