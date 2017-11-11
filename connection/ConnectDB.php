<?php

class ConnectDB {
    
    private $pdo;
    
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=web_acounts', 'root', '');
//        $this->pdo = new PDO('mysql:host=mysql.hostinger.com.br;dbname=u771009211_wa', 'u771009211_root', 'masterkey');
    }
    
    public function getConnection() {
        return $this->pdo;
    }
}

