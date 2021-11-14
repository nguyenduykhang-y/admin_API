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
        public function getByStroreId($storeId){
            try {
                $q = "SELECT storeID, storeName, storeAddress,storePhone,storeImage,storeEmail
                     from " . $this->tblStore . " where storeId=:storeId ";
                $stmt = $this->connection->prepare($q);                
                $stmt->bindParam(":storeId", $storeId);

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



    }



?>