<?php

session_start();

if (isset($_GET['param'])) {
    include_once('../model/UsuarioModel.php');
    $param = $_GET['param'];
} else {
    header('location:index.php');
}

if($param == -1) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $u = new UsuarioModel(null, $usuario, $senha, null, null);
    if($u->logar()) {
        header('location:../view/home.php');
    } else {
        $_SESSION['alert'] = 0;       
        header('location:../view/');
    }
}

