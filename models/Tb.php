<?php
    class store{
        private $idTB;
        private $nameTB;
        private $ndTB;
       
        function __construct( $idTB,$nameTB,$ndTB)
        {
            $this->idTB = $idTB;
            $this->nameTB = $nameTB;
            $this->ndTB = $ndTB;
           
        }
        public function getIDTB()
        {
            return $this->idTB;
        }
        public function getNameTB()
        {
            return $this->nameTB;
        }
        public function getNDTB()
        {
            return $this->ndTB;
        }
      
    }


?>