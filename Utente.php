<?php
    class Utente
    {
        private $email;
        private $password;
        public $lastName;

        public function __construct($email, $password, $lastName) {
            $this->email = $email;
            $this->password = $password;
            $this->lastName = $lastName;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getLastName() {
            return $this->lastName;
        }
    }
