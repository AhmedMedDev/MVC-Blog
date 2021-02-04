<?php
    //Require libraries from folder libraries
    require_once 'core/Core.php';
    require_once 'core/Controller.php';
    require_once 'core/Database.php';
    require_once 'core/Model.php';
    //Require helpers from folder helpers
    require_once 'helpers/session_helper.php';
    //Require Config file 
    require_once 'config/config.php';

    //Instantiate core class
    $init = new Core();
