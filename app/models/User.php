<?php

//namespace MVC\Models;

class User {
    public $DB;
    public $con;
    public function __construct() {
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

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
