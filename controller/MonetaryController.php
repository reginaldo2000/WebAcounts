<?php

session_start();
date_default_timezone_set('America/Fortaleza');
if (isset($_GET['param'])) {
    include_once('../model/MonetaryModel.php');
    $param = $_GET['param'];
} else {
    header('location:../view/monetary.php');
}

//CHAMA A FUNÇÃO SAVE
if ($param == 1) {
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $monetary = new MonetaryModel(null, $_SESSION['userid'], $descricao, $tipo, str_replace(',', '.', $valor), null);
    $monetary->setData($monetary->formatDate($_POST['data']));
    $monetary->save();
    $_SESSION['alert'] = 1;
    header('location:../view/monetary.php');
}
//CHAMA A FUNÇÃO UPDATE
if ($param == 2) {
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $valor = str_replace(",", ".", $_POST['valor']);
    $monetary = new MonetaryModel($id, $userid, $descricao, $tipo, $valor, null);
    $monetary->setData($monetary->formatDate($_POST['data']));
    $monetary->update();
    $_SESSION['alert'] = 2;
    header('location:MonetaryController.php?param=4');
}
//CHAMA A FUNÇÃO DELETE
if ($param == 3) {
    $id = $_POST['id'];
    $monetary = new MonetaryModel($id, null, null, null, null, null);
    $monetary->delete("dt_monetary");
    $_SESSION['alert'] = 3;
    header('location:MonetaryController.php?param=4');
}
//CHAMA A FUNÇÃO FIND
if ($param == 4) {
    $descricao = (isset($_POST['descricao2'])) ? $_POST['descricao2'] : "";
    $monetary = new MonetaryModel(null, null, null, null, null, null);
    $_SESSION['retorno_consulta'] = $monetary->find($descricao, $monetary->formatDate($_POST['data_inicial']), ($monetary->formatDate($_POST['data_final']) + 80000));
    header('location:../view/find_monetary.php');
}
//CHAMA A FUNÇÃO FINDBYID
if ($param == 6) {
    $mon = new MonetaryModel($_POST['mid'], null, null, null, null, null);
    $obj = $mon->findById();
    $vetor[0]["id"] = $obj->id;
    $vetor[0]["descricao"] = $obj->descricao;
    $vetor[0]["tipo"] = $obj->tipo;
    $vetor[0]["valor"] = $obj->valor;
    $vetor[0]["data"] = date('d/m/Y', $obj->data);
    echo json_encode($vetor);
}
//FAZ O LOGOFF DO SISTEMA
if ($param == 10) {
    session_destroy();
    header('location:../view/');
}


