<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //Login User
        public function login($email, $password, $user_type) {
            $this->db->query('SELECT * FROM users WHERE email = :email AND user_type = :user_type');
            $this->db->bind(':email', $email);
            $this->db->bind(':user_type', $user_type);

            $row = $this->db->single();

            $hashed_password = $row->password;

            if(password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }

        //Find Email
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

        }



    }