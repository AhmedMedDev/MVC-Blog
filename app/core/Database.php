<?php
    class Database {
        public $DB_HOST = DB_HOST;
        public $DB_USER = DB_USER;
        public $DB_PASS = DB_PASS;
        public $DB_NAME = DB_NAME;

        public $statement;
        public $connection;
        public $error;

        public function __construct() {

            $dsn = 'mysql:host=' . $this->DB_HOST . ';dbname=' . $this->DB_NAME;

            $option = array(

                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                
              );
            try {

                $this->connection = new PDO($dsn, $this->DB_USER, $this->DB_PASS, $option);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e) {

                echo 'Failed To Connect' . $e->getMessage();

              }
        }

        public function ReturnConnention(){
            return $this->connection;
        }

        //Allows us to write queries
        public function query($sql) {
            $this->stmt = $this->connection->prepare($sql);
        }

        //Bind values
        public function bind($parameter, $value, $type = null) {
            switch (is_null($type)) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            $this->statement->bindValue($parameter, $value, $type);
        }

        //Execute the prepared statement
        public function execute() {
            return $this->statement->execute();
        }

        //Return an array
        public function resultSet() {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        //Return a specific row as an object
        public function single() {
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        //Get's the row count
        public function rowCount() {
            return $this->statement->rowCount();
        }
    }
