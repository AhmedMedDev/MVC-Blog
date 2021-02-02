<?php

//namespace MVC\Models;
  /*
   * Model User Class
   * Register User
   * Login User
   * Find User By ID
   */
class User {

    public $DB;
    public $con;

    public function __construct() {

        //Instantiate Database class
        $this->DB  = new Database;

        $this->con = $this->DB->ReturnConnention();
    }

    public function register($username,$email,$password,$img) {

        $sql  = "INSERT INTO user (username, email, password, img) VALUES (?, ?, ?, ?);";

        $stmt = $this->con->prepare($sql);

        $stmt->execute([$username,$email,$password,$img]);
    }

    public function login($username, $password) {

        
        $sql  = "SELECT * FROM user WHERE username = ? AND password = ?";

        $stmt = $this->con->prepare($sql);

        $stmt->execute([$username,$password]);

        $count = $stmt->rowCount();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        return ($count > 0) ? $row : false;
        
    }
    
    public function getUserByID($ID){

        $sql  = "SELECT * FROM user WHERE id = ?";

        $stmt = $this->con->prepare($sql);

        $stmt->execute([$ID]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    
}
