<?php

//namespace MVC\Controllers;

//use MVC\lib\Controller;

class Posts extends Controller{
    public $userID;
    public $user;
    public function __construct(){
        $this->postModel = $this->model('Post');
        $this->likeModel = $this->model('Like');
        $this->userModel = $this->model('User');
        $this->userID    = $_SESSION['user_id'];
        $this->user      = $this->userModel->getUserByID($this->userID);

        if(!isLoggedIn()) 
            header("Location: " . URLROOT . "/users/login");
        
    }

    public function create(){
        
        $data = [
            'title' => 'Create Post',
            'user'  => $this->user,
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'):

            $userID = $this->userID;

            $title   = $_POST['title'];
            $content = $_POST['content'];
            $imgs    = $_FILES['img'];
            
            $imgTemp = $_FILES['img']['tmp_name'];
            $imgName = $_FILES['img']['name'];

            $NumImg = count($imgName);

            $lastPostId = $this->postModel->addPost($title,$content,$userID);

            for($i = 0;$i < $NumImg; $i++ ):
                
                $imgTemp = $_FILES['img']['tmp_name'][$i];

                $imgName = $_FILES['img']['name'][$i];

                move_uploaded_file($imgTemp,'C:\xampp\htdocs\Blog\public\img\upload\\' . $imgName);

                $this->postModel->addPostImg($lastPostId,$imgName);  

            endfor;

            header('location:' . URLROOT . '/Home/index');

        endif;

        $this->view('post/create',$data);
    }

    public function edite($postID){

        $post    = $this->postModel->getPostByID($postID);
        $postImg = $this->postModel->getPostImgByID($postID);     

        $data = [
            'title'     => 'Edite Post',
            'user'      => $this->user,
            'post'      => $post,
            'postImg'   => $postImg,
        ];
        if($_SERVER['REQUEST_METHOD'] == 'POST'):

            $userID = $this->userID;

            $title   = $_POST['title'];
            $content = $_POST['content'];
            $imgs    = $_FILES['img'];
            $imgTemp = $_FILES['img']['tmp_name'];
            $imgName = $_FILES['img']['name'];

            $NumImg = count($imgName);

            $this->postModel->editePost($title,$content,$postID);

                for($i = 0;$i < $NumImg; $i++ ):

                    $imgID   = $postImg[$i]['imgID'];

                    $imgTemp = $_FILES['img']['tmp_name'][$i];

                    $imgName = $_FILES['img']['name'][$i];
                    if(!empty($imgName)):

                        move_uploaded_file($imgTemp,'C:\xampp\htdocs\Blog\public\img\upload\\' . $imgName);

                        $this->postModel->editePostImg($imgName,$imgID);
                        
                    endif;

                endfor;

            header('location:' . URLROOT . '/Home/index');
            
        endif;

        if($post['userID'] != $this->userID)
            header("Location: " . URLROOT . "/homes/index");
            
        $this->view('post/edite',$data);
    }
    
    public function delete($postID){

        $this->postModel->deletePost($postID);

        header('location:' . $_SERVER['HTTP_REFERER']);

    }

    public function deleteImg($imgID){

        $this->postModel->deletePostImg($imgID);

        header('location:' . $_SERVER['HTTP_REFERER']);

        $this->view('post/deleteImg');
    }

    public function like($userID,$postID){
        
        $alreadyLiked = $this->likeModel->alreadyLiked($userID,$postID);

        if(!$alreadyLiked)
            $this->likeModel->addLike($userID,$postID);

        header('location:' . $_SERVER['HTTP_REFERER']);

    }

    public function Dislike($userID,$postID){
        
        $this->likeModel->deleteLike($userID,$postID);

        header('location:' . $_SERVER['HTTP_REFERER']);

    }





    
}


?>