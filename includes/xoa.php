<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE prd_id = $id";
    $query = mysqli_query($connection, $sql);
    // header('location: layout.php');
?>