<?php
include_once('../connection/ConnectDB.php');

class Generic {
    
    protected $id;
    protected $con;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function findAll($table) {
        $this->con = new ConnectDB();
        $pdo = $this->con->getConnection();
        $st = $pdo->prepare('SELECT * FROM '.$table.' WHERE id_usuario = :userid');
        $st->bindValue(':userid', $_SESSION['userid']);
        $st->execute();
        return $st;
    }

    public function delete($table) {
        $this->con = new ConnectDB();
        $pdo = $this->con->getConnection();
        $st = $pdo->prepare('DELETE FROM '.$table.' WHERE id = :id');
        $st->bindValue(':id', $this->id);
        $st->execute();
    }
}
