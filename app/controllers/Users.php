<?php

//namespace MVC\Controllers;

//use MVC\lib\Controller;

class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        $data = [
            'title' => 'Regisrer Page',
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'):

            $username = $_POST['username'];
            $email    = $_POST['email'];
            $password = $_POST['password'];
            $img      = $_FILES['img'];
            $imgTemp  = $_FILES['img']['tmp_name'];
            $imgName  = $_FILES['img']['name'];

            if(!empty($username) && !empty($email) && !empty($password) && !empty($img)):

                $this->userModel->register($username,$email,$password,$imgName) ;

                move_uploaded_file($imgTemp,'C:\xampp\htdocs\Blog\public\img\upload\userImg\\' . $imgName);

                header('location: ' . URLROOT . '/user/login');

            endif;

      endif;
        $this->view('user/register', $data);
    }

    public function login() {
        $data = [
            'title' => 'Login page',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') :

            $username     = $_POST['username'];
            $password     = $_POST['password'];

            $loggedInUser = $this->userModel->login($username, $password);

            ($loggedInUser) ? $this->createUserSession($loggedInUser) : "Error";
          
        endif;
        $this->view('user/login', $data);
    }

    public function createUserSession($user) {

        $_SESSION['user_id']  = $user['id'];

        $_SESSION['username'] = $user['username'];
        
        header('location:' . URLROOT . '/Homes/index');
    }

    public function logout() {

        session_unset();

        session_destroy();

        header('location:' . URLROOT . '/users/login');
    }
}
