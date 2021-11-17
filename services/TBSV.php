<?php
    include_once '../configs/database_config.php';
    include_once '../models/Tb.php';

    class TBService{
        private $connection;
        private $tbltb = "tbltb";

        public function __construct()
        {
            $this->connection = (new Database())->getConnection();
        }

        //get cửa hàng by storeId
      


        public function getAllTB(){
            try {
                $q = "SELECT idTB, nameTB, ndTB
                     from " . $this->tbltb . " order by idTB desc ";
                $stmt = $this->connection->prepare($q);                
                
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $tb = array();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $pro = array(
                            "idTB" =>$idTB,
                            "nameTB" =>$nameTB,
                            "ndTB" =>$ndTB,
                            
                        );
                        array_push($tb, $pro);
                    };                    
                    return $tb;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return null;
        }



    }



?>