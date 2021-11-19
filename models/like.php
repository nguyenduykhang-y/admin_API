<?php
    class Like{
        private $id;
        private $idProduct;
        private $name;
        private $price;
        private $quantity;
        private $image_url;
        private $category_id;

        function __construct($id, $idProduct, $name, $price, $quantity, $image_url, $category_id)
        {
            $this->id = $id;
            $this->idProduct = $idProduct;
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;
            $this->image_url = $image_url;
            $this->category_id = $category_id;
        }
        public function getId()
        {
            return $this->id;
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
        public function getIdProduct()
        {
            return $this->idProducts;
        }
    }
?>