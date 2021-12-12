<?php
     class oderCT{
        private $oderctId;
        private $idUser;
        private $quantity;
        private $productId;
        private $price;
        private $address;
        private $date;
        function __construct($oderctId, $idUser, $productId,  $quantity,  $price, $address,$date)
        {
            $this->oderctId = $oderctId;
            $this->idUser = $idUser;
            $this->quantity = $quantity;
            $this->productId = $productId;
            $this->price = $price;
            $this->address = $address;
            $this->date = $date;
          
        }
        public function getOderCTId()
        {
            return $this->oderctId;
        }
       
        public function getProductId()
        {
            return $this->productId;
        }
        public function getQuantity()
        {
            return $this->quantity;
        }
        public function getidUser()
        {
            return $this->idUser;
        }
        public function getPice()
        {
            return $this->price;
        }
        public function getAddress()
        {
            return $this->address;
        }
        public function getDate()
        {
            return $this->date;
        }
      
       
    }
?>