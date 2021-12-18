<?php
        include_once '../services/store.php';
    class StoreController{
        private $store_service;

        public function __construct()
        {
            $this->store_service = new StoreService();
        }

        public function getByStoreID($storeId){
            return $this->store_service->getByStroreId($storeId);
        }

        public function getAllStore(){
            return $this->store_service->getAllStore();
        }
        public function insert($storeName,$storeAddress,$storePhone,$storeImage,$storeEmail){
            // validation
            return $this->store_service->insert($storeName,$storeAddress,$storePhone,$storeImage,$storeEmail);
        }

}

?>