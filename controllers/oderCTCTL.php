<?php
  include_once '../services/oderCTSV.php';    


  class OderCTCTL{
    private $oderct_service;

    public function __construct()
    {
        $this-> oderct_service = new OderCTSV();
    }

    public function getALLoderCT(){
      return $this->oderct_service->getAllOderCT();
  }

  // public function getDate($date1,$date2){
  //   return $this->oderct_service->getAllForDate($date1,$date2);
  // }

    public function insertODerCT( $oderctId, $idUser, $productId,$price,$quantity,$address,$date){
        // validation
        return $this->oderct_service->insertOderCT($oderctId, $idUser, $productId,$price,$quantity,$address,$date);
    }
   
  }

?>