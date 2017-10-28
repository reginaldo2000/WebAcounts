<?php
include_once('../model/Generic.php');
class UsuarioModel extends Generic {

    private $usuario;
    private $senha;
    private $email;
    private $apelido;

    function __construct($id, $usuario, $senha, $email, $apelido) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->email = $email;
        $this->apelido = $apelido;
    }

    public function logar() {
        $this->con = new ConnectDB();
        $pdo = $this->con->getConnection();
        $st = $pdo->prepare('SELECT * FROM dt_usuarios WHERE usuario = :usuario AND senha = :senha');
        $st->bindValue(':usuario', $this->usuario);
        $st->bindValue(':senha', $this->senha);
        $st->execute();
        if($st->rowCount() > 0) {
            $usuario = $st->fetch(PDO::FETCH_OBJ);
            $_SESSION['userid'] = $usuario->id;
            return true;
        } else {
            return false;
        }
    }
    
    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getEmail() {
        return $this->email;
    }

    function getApelido() {
        return $this->apelido;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setApelido($apelido) {
        $this->apelido = $apelido;
    }

}
