<?php
    class Categories extends Controller {
        public function __construct() {
            if(!isLoggedIn()) {
                redirect('admin/login');
            }

            $this->categoryModel = $this->model('Category');
        }

        public function index () {
           // Get Categories
           $categories = $this->categoryModel->getCategories();

            $data = [
                'title' => 'Categories',
                'categories' => $categories
            ];

            $this->view('categories/index', $data);
            
        }

        public function addCategories() {
             // Get Categories
             $categories = $this->categoryModel->getCategories();
             
            $data = [
                'title' => 'Add New Categories',
                'categories' => $categories
            ];

            $this->view('categories/addCategories', $data);
        }

        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                 // Get Categories
                 $categories = $this->categoryModel->getCategories();

                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'category_name' => trim($_POST['categoryName']),
                    'parent_category' => trim($_POST['parentCategory']),
                    'categoryName_error' => '',
                    'title' => 'Add New Categories',
                    'categories' => $categories
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
                 // Get Categories
                $categories = $this->categoryModel->getCategories();
                $data = [
                    'categoryName' => '',
                    'categories' => $categories,
                    'title' => 'Add New Categories'
                ];
    
                $this->view('categories/addCategories', $data);
            }
        }

    }