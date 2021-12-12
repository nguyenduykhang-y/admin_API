<?php
    class GioHang{
        private $id;
        private $idProduct;
        private $name;
        private $price;
      
        private $image_url;
        private $category_id;
       
        function __construct($id, $idProduct, $name, $price,  $image_url, $category_id,)
        {
            $this->id = $id;
            $this->idProduct = $idProduct;
            $this->name = $name;
            $this->price = $price;
           
            $this->image_url = $image_url;
            $this->category_id = $category_id;
            // $this->address = $address;
            // $this->date = $date;
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
        // public function getQuantity()
        // {
        //     return $this->quantity;
        // }
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
        // public function getDate()
        // {
        //     return $this->date;
        // }
        // public function getAddress()
        // {
        //     return $this->address;
        // }
    }
?>