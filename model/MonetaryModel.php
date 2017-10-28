<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MonetaryModel
 *
 * @author Reginaldo
 */
include_once('../model/Generic.php');

class MonetaryModel extends Generic {

    private $userid;
    private $descricao;
    private $tipo;
    private $valor;
    private $data;

    function __construct($id, $userid, $descricao, $tipo, $valor, $data) {
        $this->id = $id;
        $this->userid = $userid;
        $this->descricao = $descricao;
        $this->tipo = $tipo;
        $this->valor = $valor;
        $this->data = $data;
    }

    public function save() {
        $this->con = new ConnectDB();
        $pdo = $this->con->getConnection();
        $st = $pdo->prepare('INSERT INTO dt_monetary (id_usuario, descricao, tipo, valor, data) VALUES(?,?,?,?,?)');
        $st->bindParam(1, $this->userid);
        $st->bindParam(2, $this->descricao);
        $st->bindParam(3, $this->tipo);
        $st->bindParam(4, $this->valor);
        $st->bindParam(5, $this->data);
        $st->execute();
    }

    public function find($descricao, $dataInicial, $dataFinal) {
        $restricao = $this->getRestrictions($descricao, $dataInicial, $dataFinal);
        $this->con = new ConnectDB();
        $pdo = $this->con->getConnection();
        $st = $pdo->prepare('SELECT * FROM dt_monetary WHERE id_usuario = :userid' .$restricao);
        $st->bindValue(':userid', $_SESSION['userid']);
        $st->execute();
        $retorno = '';
        if ($st->rowCount() > 0) {
            while ($money = $st->fetch(PDO::FETCH_OBJ)) {
                $retorno .= '<tr><td>' . $money->descricao . '</td>'
                        . '<td>' . (($money->tipo == "r") ? "Receita" : "Despesa") . '</td>'
                        . '<td>' . str_replace(".", ",", $money->valor) . '</td>'
                        . '<td>' . date('d/m/Y', $money->data) . '</td>'
                        . '<td class="text-center"><i class="glyphicon glyphicon-edit"></i> <i class="glyphicon glyphicon-trash"></i></td></tr>';
            }
        } else {
            $retorno = '<tr><td colspan="5"><b>Nenhum registro encontrado!</b></td></tr>';
        }
        return $retorno;
    }

    function getRestrictions($descricao, $dataInicial, $dataFinal) {
        $restricao = '';
        if ($descricao != "" || $descricao != " ") {
            $restricao .= ' AND descricao LIKE "%' . $descricao . '%"';
        }
        if ($dataInicial != "" && $dataFinal != "") {
            $restricao .= ' AND data between ' . $dataInicial . ' AND ' . $dataFinal;
        }
        return $restricao;
    }

    public function formatDate($data) {
        $newdate = "";
        $array = explode('/', $data);
        $newdate = $array[2] . '-' . $array[1] . '-' . $array[0];
        return date('U', strtotime($newdate));
    }

    function getUserid() {
        return $this->userid;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getValor() {
        return $this->valor;
    }

    function getData() {
        return $this->data;
    }

    function setUserid($userid) {
        $this->userid = $userid;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setData($data) {
        $this->data = $data;
    }

}
