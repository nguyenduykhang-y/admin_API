<?php
    include_once '../configs/database_config.php';
    include_once '../models/gh.php';
     class GhServices{
        private $connection;
     
        private $tblgh = "tblgh";
       
        public function __construct()
        {
            $this->connection = (new Database())->getConnection();
        }
        public function getAllGH(){
            try {
                $q = "SELECT id, idProduct,name, price, quantity, image_url, category_id
                     from " . $this->tblgh . " order by id desc ";
                $stmt = $this->connection->prepare($q);                
                
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $gh = array();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $pro = array(
                            "id" =>$id,
                            "idProduct" =>$idProduct,
                            "name" =>$name,
                            "price" =>$price,
                            "quantity" =>$quantity,
                            "image_url" =>$image_url,
                            "category_id" =>$category_id,
                        );
                        array_push($gh, $pro);
                    };                    
                    return $gh;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return null;
        }
        public function getInsertgh($idProduct, $name, $price, $quantity, $image_url, $category_id)
        {
            try {
                $q = "insert into " . $this->tblgh."
                        set idProduct=:idProduct,
                        name=:name,
                        price=:price,
                        quantity=:quantity,
                        image_url=:image_url,
                        category_id=:category_id
                ";
                $stmt = $this->connection->prepare($q);

                $stmt->bindParam(":idProduct", $idProduct);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":price", $price);
                $stmt->bindParam(":quantity", $quantity);
                $stmt->bindParam(":image_url", $image_url);
                $stmt->bindParam(":category_id", $category_id);
                
                $this->connection->beginTransaction();

                if ($stmt->execute()) {
                    $this->connection->commit();
                    return true;
                } else {
                    $this->connection->rollBack();
                    return false;
                }
            } catch (Exception $e) {
                //throw $th;
                echo $e;
            }
            return false;
        }
    }

?>