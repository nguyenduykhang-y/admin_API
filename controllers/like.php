<?php
  include_once '../services/like.php';    


  class LikeController{
    private $like_service;

    public function __construct()
    {
        $this-> like_service = new LikeServices();
    }
    public function getAlli(){
      return $this->like_service->getAlli();
  }

    public function insertLike($idProduct, $name, $price, $quantity, $image_url, $category_id){
        // validation
        return $this->like_service->getInsertlike($idProduct, $name, $price, $quantity, $image_url, $category_id);
    }
  }

?>