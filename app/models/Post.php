<?php 

//namespace MVC\Models;
  /*
   * Model Post Class
   * get All Posts
   * get All Imgs
   * Get Imgs Of Post
   * Add Post
   * Add Post Img
   * Edite Post 
   * Edite Post Imgs
   * Get Post By ID
   * Get Post Img By ID
   * Delete Post
   * Delete Post Img
   */
class Post extends Model{
    

    public function getAllPosts(){

        $sql  = " SELECT post.id , title, content,`date`,userID,username,img 
                  FROM post,user 
                  WHERE user.id = userID 
                  ORDER BY post.id DESC ";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function getAllImgs(){

        $sql  = "SELECT * FROM post_img";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function getImgsOfPost($postID){

        $sql  = "SELECT * FROM post_img WHERE postID = ?";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute([$postID]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function addPost($title,$content,$userID){

        $sql  = "INSERT INTO post (title, content,userID) VALUES (?,?,?)";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute([$title,$content,$userID]);

        $last_id = $this->Connection->lastInsertId();

       return $last_id;
    }

    public function addPostImg($postID,$img){

        $sql  = "INSERT INTO post_img (postID,img) VALUES (?,?)";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute([$postID,$img]);

    }

    public function editePost($title,$content,$postID){
        
        $sql  = "UPDATE post SET title = ? , content = ? WHERE id = ? ";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute([$title,$content,$postID]);
    }

    public function editePostImg($img,$imgID){

        $sql  = "UPDATE post_img SET img = ? WHERE imgID = ?";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute([$img,$imgID]);

    }

    public function getPostByID($postID){

        $sql  = "SELECT * FROM post WHERE id = ?";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute([$postID]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function getPostImgByID($postID){

        $sql  = "SELECT * FROM post_img WHERE postID = ?";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute([$postID]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function deletePost($postID){

        $sql  = "DELETE FROM post WHERE id = ?";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute([$postID]);
    }
    
    public function deletePostImg($imgID){

        $sql  = "UPDATE post_img SET img = ?  WHERE imgID = ?";

        $stmt = $this->Connection->prepare($sql);

        $stmt->execute(["",$imgID]);
    }

    
}

?>



