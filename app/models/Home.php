<?php 

//namespace MVC\Models;

class Home {

    public $DB;
    public $con;

    public function __construct() {
        
        $this->DB   = new Database;
        $this->con  = $this->DB->ReturnConnention();
    }
    
    
    

}

?>



