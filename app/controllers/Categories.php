<?php
    class Categories extends Controller {
        public function __construct() {
            if(!isLoggedIn()) {
                redirect('admin/login');
            }

            $this->categoryModel = $this->model('Category');
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

        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'category_name' => trim($_POST['categoryName']),
                    'parent_category' => trim($_POST['parentCategory']),
                    'categoryName_error' => '',
                    'title' => 'Add New Categories'
                ];

                // Validate data
                if(empty($data['category_name'])) {
                  $data['categoryName_error'] = 'Please Enter Category Name';
                }


                // Make sure no errors
                if(empty($data['categoryName_error'])) {
                    // Validated
                    if($this->categoryModel->addCategory($data)) {
                        flash('post_message', 'Category Added');
                        redirect('categories/addCategories');
                    } else {
                        die('something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('categories/addCategories', $data);
                }

            } else {
                $data = [
                    'categoryName' => '',
                    'categoryName' => '',
                    'title' => 'Add New Categories'
                ];
    
                $this->view('categories/addCategories', $data);
            }
        }

    }