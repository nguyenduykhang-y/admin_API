<?php

    include_once '../services/productShop.php';    

class ProductShopController {

        private $product_service;

        public function __construct()
        {
            $this->product_service = new ProductServiceShop();
        }

        public function getById($id){
            return $this->product_service->getById($id);
        }

        public function getAllProductsShop(){
            return $this->product_service->getAllProductsShop();
        }

        public function getAllCategories(){
            return $this->product_service->getAllCategories();
        }

        public function insert($name, $price, $quantity, $image_url, $category_id){
            // validation
            return $this->product_service->insert($name, $price, $quantity, $image_url, $category_id);
        }

        public function update($id, $name, $price, $quantity, $image_url, $category_id){
            // validation
            return $this->product_service->update($id, $name, $price, $quantity, $image_url, $category_id);
        }

        public function delete($id){
            return $this->product_service->delete($id);
        }
    }

?>