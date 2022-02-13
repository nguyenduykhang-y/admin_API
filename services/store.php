<?php
    include_once '../configs/database_config.php';
    include_once '../models/store.php';

    class StoreService{
        private $connection;
        private $tblStore = "tblStore";

        public function __construct()
        {
            $this->connection = (new Database())->getConnection();
        }

        //get cửa hàng by storeId
        public function getByStroreEmail($storeEmail){
            try {
                $q = "SELECT storeID, storeName, storeAddress,storePhone,storeImage,storeEmail
                     from " . $this->tblStore . " where storeEmail=:storeEmail ";
                $stmt = $this->connection->prepare($q);                
                $stmt->bindParam(":storeEmail", $storeEmail);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    extract($row);
                    $pro = array(
                        "storeID" =>$storeID,
                        "storeName" =>$storeName,
                        "storeAddress" =>$storeAddress,
                        "storePhone" =>$storePhone,
                        "storeImage" =>$storeImage,
                        "storeEmail" =>$storeEmail,
                    );                                        
                    return $pro;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return null;
        }



        public function getAllStore(){
            try {
                $q = "SELECT storeID, storeName, storeAddress, storePhone, storeImage, storeEmail
                     from " . $this->tblStore . " order by storeID desc ";
                $stmt = $this->connection->prepare($q);                
                
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $store = array();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $pro = array(
                            "storeID" =>$storeID,
                            "storeName" =>$storeName,
                            "storeAddress" =>$storeAddress,
                            "storePhone" =>$storePhone,
                            "storeImage" =>$storeImage,
                            "storeEmail" =>$storeEmail,
                        );
                        array_push($store, $pro);
                    };                    
                    return $store;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return null;
        }

        public function insert($storeName, $storeAddress, $storePhone, $storeImage, $storeEmail)
        {
            try {
                $q = "insert into " . $this->tblStore . "
                        set storeName=:storeName,
                        storeAddress=:storeAddress,
                        storePhone=:storePhone,
                        storeImage=:storeImage,
                        storeEmail=:storeEmail
                ";
                $stmt = $this->connection->prepare($q);

                $stmt->bindParam(":storeName", $storeName);
                $stmt->bindParam(":storeAddress", $storeAddress);
                $stmt->bindParam(":storePhone", $storePhone);
                $stmt->bindParam(":storeImage", $storeImage);
                $stmt->bindParam(":storeEmail", $storeEmail);
                
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