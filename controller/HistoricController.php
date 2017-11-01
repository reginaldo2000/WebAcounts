<?php
session_start();
date_default_timezone_set('America/Fortaleza');
include_once('../model/MonetaryModel.php');
$param = 0;
if(isset($_GET['param'])) {
    $param = $_GET['param'];
}

//CHAMA A FUNÇÃO FIND
if($param == 1) {
    $m = new MonetaryModel(null, null, null, null, null, null);
    $dataInicial = $m->formatDate($_POST['data_inicial']);
    $dataFinal = $m->formatDate($_POST['data_final']);
    $_SESSION['dados'] = $m->find("", $dataInicial, $dataFinal);
    header('location:../view/historic.php');
}

