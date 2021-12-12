<?php
include_once '../configs/database_config.php';
include_once '../models/oderCT.php';


    class OderCTSV{

        private $connection;
     
        private $tbloderct = "tbloderct";
       private $date1;
       private $date2;
        public function __construct()
        {
            $this->connection = (new Database())->getConnection();
        }
        
        public function getAllOderCT(){
            try {
                $q = "SELECT oderctId ,idUser, productId ,quantity, price,address,date
                     from " . $this->tbloderct . " order by oderctId desc ";
                $stmt = $this->connection->prepare($q);                
                
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $products = array();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $pro = array(
                            "oderctId" =>$oderctId,
                            "idUser" =>$idUser,
                            "productId" =>$productId,
                            "quantity" =>$quantity,
                            "price" =>$price,
                            "address" =>$address,
                            "date"=>$date
                        );
                        array_push($products, $pro);
                    };                    
                    return $products;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return null;
        }

        // public function getAllForDate($date1,$date2){
        //     try {
        //         $q = "SELECT oderctId ,oderId, productId ,namePr,quantity, price,address,date from " 
        //         .$this->tbloderct. " WHERE BETWEEN ".$date1." AND" .$date2;
        //         $stmt = $this->connection->prepare($q);                
        //         $stmt->bindParam(":date1", $date1);
        //         $stmt->bindParam(":date2", $date2);
        //         $stmt->execute();

        //         if ($stmt->rowCount() > 0) {
        //             $products = array();
        //             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //                 extract($row);
        //                 $pro = array(
        //                     "oderctId" =>$oderctId,
        //                     "oderId" =>$oderId,
        //                     "productId" =>$productId,
        //                     "namePr" =>$namePr,
        //                     "quantity" =>$quantity,
        //                     "price" =>$price,
        //                     "address" =>$address,
        //                     "date"=>$date
        //                 );
        //                 array_push($products, $pro);
        //             };                    
        //             return $products;
        //         }
        //     } catch (Exception $e) {
        //         echo $e->getMessage();
        //     }
        //     return null;
        // }


        public function insertOderCT( $oderctId, $idUser, $productId,$price,$quantity,$address,$date)
        {
            try {
                $q = "insert into " . $this->tbloderct."
                        set oderctId =:oderctId,
                        idUser =:idUser,
                        productId=:productId,
                        quantity=:quantity,
                        price=:price,
                        address=:address,
                        date=:date
                ";
                $stmt = $this->connection->prepare($q);
                
                $stmt->bindParam(":oderctId", $oderctId);
                $stmt->bindParam(":idUser", $idUser);
                $stmt->bindParam(":productId", $productId);
                $stmt->bindParam(":quantity", $quantity);
                $stmt->bindParam(":price", $price);
                $stmt->bindParam(":address", $address);
                $stmt->bindParam(":date", $date);
                
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