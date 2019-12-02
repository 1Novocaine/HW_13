<?php
class Database {
    
    public $config;
    public $dbConnect;
    
    public function dbConnection() 
    {
        $this->dbConnect = null;
        $this->config = require './config/config.php';
        try {
            $this->dbConnect = new PDO("mysql:host=localhost" . ";dbname=" . $this->config['dbName'], $this->config['userName'], $this->config['userPassword']);
           
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            }
        return $this->dbConnect;
    }
}

?>