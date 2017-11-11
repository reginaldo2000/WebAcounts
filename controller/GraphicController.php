<?php
include_once('../model/MonetaryModel.php');
date_default_timezone_set('América/Fortaleza');

class GraphicController {

    public function __construct() {
        ;
    }

    public function graphicBars() {
        $dataInicio = "";
        $dataFim = "";
        $m = new MonetaryModel(null, null, null, null, null, null);
        $left = 0;
        $height = 0;
        $cont = 1;
        for ($i = 0; $i < 12; $i++) {
            echo '<div class="bar" style="left: ' . $left . 'px; height: ' . $height . 'px"></div>';
            if ($cont == 2) {
                $left = $left + 50;
                $cont = 1;
            } else {
                $left = $left + 35;
                $cont++;
            }
        }
    }

    public function graphicLabels() {
        $dataAtual = date('U');
        $mes = date('m');
        for ($i = 0; $i < 6; $i++) {
            echo '<span>' . $this->translate(date('m', $dataAtual)) . '</span>';
            $novaData = $dataAtual - 2678400;
            $dataAtual = $novaData;
        }
    }

    public function graphicVal() {
        $maiorValor = 4547.00;
        $padrao = $maiorValor / 5;
        for ($i = 0; $i < 6; $i++) {
            if ($i <= 4) {
                echo '<li><span>' . (number_format($maiorValor, 2, ",", ".")) . '</span></li>';
                $maiorValor = $maiorValor - $padrao;
            } else {
                echo '<li><span>0,00</span></li>';
            }
        }
    }

    private function translate($mes) {
        $nomeMes = "";
        switch ($mes) {
            case "01":return "jan";
            case "02":return "fev";
            case "03":return "mar";
            case "04":return "abr";
            case "05":return "mai";
            case "06":return "jun";
            case "07":return "jul";
            case "08":return "ago";
            case "09":return "set";
            case "10":return "out";
            case "11":return "nov";
            case "12":return "dez";
        }
    }
    
    private function getValMax() {
        
    }

}
