<?php

if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}
require_once 'configs/connect.php';

try{
    // SELECT * FROM tb_role
    $stmt = $pdo->prepare("SELECT * FROM tblstore ORDER BY storeId ASC");

    //Thực thi câu lệnh
    $stmt->execute();
    //Thiết lập chế độ lấy dữ liệu
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // $ds = $stmt->fetchAll();

    echo "<table border='1' cellpadding='10'>
            <tr><th>ID</th> <th>StoreName</th> <th>StoreAddress</th> <th>Phone</th> 
            <th>StoreEmail</th> 
            </tr> 
            ";

        foreach(   $stmt->fetchAll() as $row ){
          
            echo "<tr><td> {$row['storeId']}</td>
                        <td> {$row['storeName']}</td>
                        <td> {$row['storeAddress']}</td>
                        <td> {$row['storePhone']}</td>
                        <td> {$row['storeEmail']}</td>
                        
                  </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}
 
?>
