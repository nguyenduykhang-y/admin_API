<?php

if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}
require_once 'configs/connect.php';

try{
    // SELECT * FROM tb_role
    $stmt = $pdo->prepare("SELECT * FROM tbloderct ORDER BY id ASC");

    //Thực thi câu lệnh
    $stmt->execute();
    //Thiết lập chế độ lấy dữ liệu
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // $ds = $stmt->fetchAll();

    echo "<table border='1' cellpadding='10'>
            <tr><th>ID</th> <th>OderID</th> <th>User</th> <th>Product</th> 
            <th>Quantity</th> <th>Price</th> <th>Address</th> <th>Date</th> 
            </tr> 
            ";

        foreach(   $stmt->fetchAll() as $row ){
          
            echo "<tr><td> {$row['id']}</td>
                        <td> {$row['oderctId']}</td>
                        <td> {$row['idUser']}</td>
                        <td> {$row['productId']}</td>
                        <td> {$row['quantity']}</td>
                        <td> {$row['price']}</td>
                        <td> {$row['address']}</td>
                        <td> {$row['date']}</td>
                  </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}
 
?>
