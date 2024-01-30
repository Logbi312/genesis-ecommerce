<?php
    class Categories extends Controller {
        public function __construct() {
            if(!isLoggedIn()) {
                redirect('admin/login');
            }
        }

        public function index () {
            $data = [
                'title' => 'Categories',
            ];

            $this->view('categories/index', $data);
            
        }

        public function addCategories() {
            $data = [
                'title' => 'Add New Categories',
            ];

            $this->view('categories/addCategories', $data);
        }

    }