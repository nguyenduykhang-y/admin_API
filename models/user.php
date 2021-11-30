<?php
    class User{
        private $id;
        private $email;
        private $hash_password;
        private $phone;
        private $name;

        function __construct($id, $email, $hash_password, $phone, $name) {
            $this->id = $id;
            $this->email = $email;
            $this->hash_password = $hash_password;
            $this->phone = $phone;
            $this->name = $name;


        }

        public function getId(){
            return $this->id;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getHashPassword(){
            return $this->hash_password;
        }

        public function getName(){
            return $this->name;
        }
        public function getPhone(){
            return $this->phone;
        }

      

    }
?>