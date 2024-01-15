<?php
    class Products extends Controller {
        public function __construct() {
            if(!isLoggedIn()) {
                redirect('admin/login');
            }
        }

        public function index () {
            $data = [
                'title' => 'Products',
            ];

            $this->view('products/index', $data);
            
        }

        public function addProduct() {
            $data = [
                'title' => 'Add New Product',
            ];

            $this->view('products/addProduct', $data);
        }

    }