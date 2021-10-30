<?php
    class User{
        private $id;
        private $email;
        private $hash_password;
        private $full_name;


        function __construct($id, $email, $hash_password, $full_name) {
            $this->id = $id;
            $this->email = $email;
            $this->hash_password = $hash_password;
            $this->full_name = $full_name;

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

        public function getFullName(){
            return $this->full_name;
        }

      

    }
?>