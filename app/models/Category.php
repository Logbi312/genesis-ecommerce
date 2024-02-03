<?php
    class Category {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }


        public function addCategory($data) {
            $this->db->query('INSERT INTO categories (category_name, parent_category) VALUE(:category_name, :parent_category)');
            // Bind values
            $this->db->bind(':category_name', $data['category_name']);
            $this->db->bind(':parent_category', $data['parent_category']);


            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getCategories() {
            $this->db->query('SELECT * FROM categories ORDER BY parent_category ASC, category_name ASC');
            $results = $this->db->resultSet();
            return $results;
        }

    }