<?php
    class Admin extends Controller {
        public function __construct () {
         
            $this->userModel = $this->model('User');
        }


        public function index () {
            
            redirect('admin/login');
        }

        public function login() {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                 // Process form
                // Sanitieze POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


                 // Init data
                 $data =[
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_error' => '',
                    'password_error' => '',
                    'title' => 'Admin'
                ];

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_error'] = 'Please enter email';
                } else {
                    // Check for user by email
                    $user = $this->userModel->findUserByEmail($data['email']);

                    if ($user) {
                        // User found
                        // You can do additional processing here if needed
                    } else {
                        // No user found
                        $data['email_error'] = 'No user found';
                    }
                }

                // Validate Password
                if(empty($data['password'])) {
                    $data['password_error'] = 'Please enter password';
                } 

              
                

                 // Make sure errors are empty
                 if(empty($data['email_error'])  && empty($data['password_error'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password'], 'admin');

                    if($loggedInUser) {
                        // Create Session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_error'] = 'Password Incorrect';

                        $this->view('admin/login', $data);
                    }

                } else {
                    // Load view with errors
                    $this->view('admin/login', $data);
                }

             
            } else {
                // Init data
                $data =[
                    'email' => '',
                    'password' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'title' => 'Admin'
                ];

                // Load view
                $this->view('admin/login', $data);
            }


        }

        public function dashboard() {
            $data = [
                'title' => 'Dashboard',
                ];

                if(!isLoggedIn()) {
                    redirect('admin/login');
                }
    
    
            $this->view('admin/dashboard', $data);
        }


        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->userID;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            redirect('admin/dashboard');

        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();

            redirect('admin/login');
        }




    }   


?>





