<?php
    class store{
        private $storeID;
        private $storeName;
        private $storeAddress;
        private $storePhone;
        private $storeImage;
        private $storeEmail;
        function __construct( $storeID,$storeName,$storeAddress,$storePhone,$storeImage,$storeEmail)
        {
            $this->storeIDid = $storeID;
            $this->storeName = $storeName;
            $this->storeAddress = $storeAddress;
            $this->storePhone = $storePhone;
            $this->storeImage = $storeImage;
            $this->storeEmail = $storeEmail;
        }
        public function getStoreID()
        {
            return $this->storeID;
        }
        public function getStoreName()
        {
            return $this->storeName;
        }
        public function getStoreAddress()
        {
            return $this->storeAddress;
        }
        public function getStorePhone()
        {
            return $this->storePhone;
        }
        public function getStoreImage()
        {
            return $this->storeImage;
        }
        public function getStoreEmail()
        {
            return $this->storeEmail;
        }
    }


?>