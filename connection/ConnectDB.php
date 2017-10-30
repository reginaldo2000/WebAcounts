<?php

class ConnectDB {
    
    private $pdo;
    
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=webacounts', 'root', '');
    }
    
    public function getConnection() {
        return $this->pdo;
    }
}

