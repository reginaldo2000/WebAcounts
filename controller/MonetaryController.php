<?php

session_start();
date_default_timezone_set('America/Fortaleza');
if (isset($_GET['param'])) {
    include_once('../model/MonetaryModel.php');
    $param = $_GET['param'];
} else {
    header('location:../view/monetary.php');
}

if($param == 1) {
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $monetary = new MonetaryModel(null, $_SESSION['userid'], $descricao, $tipo, str_replace(',', '.', $valor), null);
    $monetary->setData($monetary->formatDate($_POST['data']));
    $monetary->save();
    $_SESSION['alert'] = 1;
    header('location:../view/monetary.php');
}
if($param == 4) {
    $descricao = $_POST['descricao'];
    $monetary = new MonetaryModel(null, null, null, null, null, null);
    $_SESSION['retorno_consulta'] = $monetary->find($_POST['descricao'], $monetary->formatDate($_POST['data_inicial']), ($monetary->formatDate($_POST['data_final'])+80000));
    header('location:../view/find_monetary.php');
}
if($param == 10) {
    session_destroy();
    header('location:../view/');
}


