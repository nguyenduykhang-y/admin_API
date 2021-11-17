<?php
  include_once '../services/TBSV.php';    


  class TBController{
    private $gtb_service;

    public function __construct()
    {
        $this-> gtb_service = new TBService();
    }
    public function getAllTB(){
      return $this->gtb_service->getAllTB();
  }

  }

?>