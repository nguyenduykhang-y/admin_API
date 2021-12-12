<?php
    class product{
        private $detailId;
        private $oderId;
        private $userId;
        private $storeId;
        private $productId;
        private $productName;
        private $storeID;
        private $address;
        private $quantily;
        private $productPrice;
        private $status;    
        function __construct($oderId, $userId, $storeID,$idProduct,$status)
        {
            $this->oderId = $oderId;
            $this->userId = $userId;
            $this->storeID = $storeID;
            $this->idProduct = $idProduct;
            $this->status = $status;
        }
        public function getOderId()
        {
            return $this->oderId;
        }
        public function getUserId()
        {
            return $this->userId;
        }
        public function getIdProduct()
        {
            return $this->userId;
        }
        public function getStoreId()
        {
            return $this->storeID;
        }
        public function getStatus()
        {
            return $this->status;
        }
       
    }
?>