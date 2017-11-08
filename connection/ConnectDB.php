<?php

class ConnectDB {
    
    private $pdo;
    
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=web_acounts', 'root', 'root');
    }
    
    public function getConnection() {
        return $this->pdo;
    }
}

