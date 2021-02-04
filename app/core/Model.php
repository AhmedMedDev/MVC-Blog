<?php

class Model{

    public $Database;
    
    public $Connection;

    public function __construct() {

        //Instantiate Database class
        $this->Database  = new Database;

        $this->Connection = $this->Database->ReturnConnention();
    }
}


