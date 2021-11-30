<?php
  include_once '../services/ghSV.php';    


  class GioHangController{
    private $giohang_service;

    public function __construct()
    {
        $this-> giohang_service = new GhServices();
    }
    public function getAllGH(){
      return $this->giohang_service->getAllGH();
  }

    public function insertGiohang($idProduct, $name, $price, $quantity, $image_url, $category_id){
        // validation
        return $this->giohang_service->getInsertgh($idProduct, $name, $price, $quantity, $image_url, $category_id);
    }
    public function delete($id){
      return $this->giohang_service->delete($id);
  }
  }

?>