<?php
include_once('../connection/ConnectDB.php');

class Generic {
    
    private $id;
    protected $con;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function findAll($table) {
        
    }

    public function delete($table) {
        $this->con = new ConnectDB();
        $pdo = $this->con->getConnection();
        $st = $pdo->prepare('DELETE FROM '.$table.' WHERE id = :id');
        $st->bindValue(':id', $this->id);
        $st->execute();
    }
}
