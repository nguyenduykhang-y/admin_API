<?php

if(isset($_SESSION['err'])){
    echo "<p style='color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
}
require_once 'configs/connect.php';

try{
    // SELECT * FROM tblusers
    $stmt = $pdo->prepare("SELECT * FROM tblusers ORDER BY id ASC");

    //Thực thi câu lệnh
    $stmt->execute();
    //Thiết lập chế độ lấy dữ liệu
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // $ds = $stmt->fetchAll();

    echo "<table border='1' cellpadding='5'>
            <tr><th>ID</th> <th>Name</th> <th>Email</th> <th>Phone</th> 
            </tr> 
            ";

        foreach(   $stmt->fetchAll() as $row ){
          
            echo "<tr><td> {$row['id']}  </td>
                        <td> {$row['name']}</td>
                        <td> {$row['email']}</td>
                        <td> {$row['phone']}</td>
                  </tr>";
        } 

    echo '</table>'; 

}catch(PDOException $e){
    echo "<br>Loi truy van CSDL: ".$e->getMessage();
}
 
?>
