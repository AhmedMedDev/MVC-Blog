<?php 

//namespace MVC\Models;

class Like {
    public $DB;
    public $con;
    public function __construct() {
        $this->DB  = new Database;
        $this->con = $this->DB->ReturnConnention();
    }
    
    public function getAllLikes(){

        $sql  = "SELECT * FROM likes";

        $stmt = $this->con->prepare($sql);

        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function getLikesPost($postID){

        $sql  = "SELECT userID FROM likes WHERE  postID = ?";

        $stmt = $this->con->prepare($sql);

        $stmt->execute([$postID]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function addLike($userID,$postID){

        $sql  = "INSERT INTO likes (userID ,postID ) VALUES (?,?)";

        $stmt = $this->con->prepare($sql);

        $stmt->execute([$userID,$postID]);

    }

    public function alreadyLiked($userID,$postID){

        $sql  = "SELECT * FROM likes WHERE userID = ? AND postID = ?";

        $stmt = $this->con->prepare($sql);

        $stmt->execute([$userID,$postID]);

        $count = $stmt->rowCount();

        return ($count > 0) ? true : false;
    }

    public function deleteLike($userID,$postID){

        $sql  = "DELETE FROM likes WHERE userID = ? AND postID = ?";

        $stmt = $this->con->prepare($sql);

        $stmt->execute([$userID,$postID]);


    }

}

?>



