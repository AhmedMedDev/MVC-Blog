<?php

//namespace MVC\Controllers;

//use MVC\lib\Controller;

class Homes extends Controller {

    public $userID;
    public $user;

    public function __construct() {

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        $this->likeModel = $this->model('Like');

        $this->userID    = $_SESSION['user_id'];

        $this->user      = $this->userModel->getUserByID($this->userID);
        
        if(!isLoggedIn()) 
            header("Location: " . URLROOT . "/users/login");
        
    }

    public function index() {
        

        $userID         = $this->userID;

        $posts          = $this->postModel->getAllPosts();

        $imgs           = $this->postModel->getAllImgs();

        $getAllLikes    = $this->likeModel->getAllLikes();

        $getLikesPost   = array();
        
        foreach($posts as $post):

           $getLikesPost [$post['id']] =  $this->likeModel->getLikesPost($post['id']);

        endforeach;

        $data = [
            'title'         => 'Home page',
            'posts'         => $posts,
            'imgs'          => $imgs,
            'user'          => $this->user,
            'getLikesPost'  => $getLikesPost
        ];

        $this->view('home/index', $data);
    }

}

