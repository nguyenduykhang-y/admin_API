<?php
    class User{
        private $id_shop;
        private $name;
        private $price;
        private $quantity;
        private $image_url;
        private $category_id;

        function __construct($id_shop, $name, $price, $quantity, $image_url, $category_id)
        {
            $this->id_shop = $id_shop;
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;
            $this->image_url = $image_url;
            $this->category_id = $category_id;
        }
        public function getId()
        {
            return $this->id_shop;
        }
        public function getName()
        {
            return $this->name;
        }
        public function getPrice()
        {
            return $this->price;
        }
        public function getQuantity()
        {
            return $this->quantity;
        }
        public function getImageUrl()
        {
            return $this->image_url;
        }
        public function getCategoryId()
        {
            return $this->category_id;
        }
    }
?>