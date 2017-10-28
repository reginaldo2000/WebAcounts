<?php

class Connect {
    
    private $pdo;
    
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=web_acounts', 'root', '');
    }
    
    public function getConnection() {
        return $this->pdo;
    }
}

