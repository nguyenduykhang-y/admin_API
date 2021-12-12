<?php
    class User{
        private $id;
        private $email;
        private $hash_password;
        private $phone;
        private $name;
        private $roles;
       
        function __construct($id, $email,$phone, $name, $hash_password, $roles)
        {
            $this->id= $id;
            $this->email=$email;
            $this->phone = $phone;
            $this->name = $name;
            $this->hash_password=$hash_password;
            $this->roles=$roles;
           
           
        }

        public function getId()
        {
            return $this->id;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function getHashPassword()
        {
            return $this->hash_password;
        }
        
        public function getPhone()
        {
            return $this->phone;
        }
        public function getName()
        {
            return $this->name;
        }
        public function getRoles()
        {
            return $this->roles;
        }
    }
?>