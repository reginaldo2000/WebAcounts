<?php

include_once('../model/MonetaryModel.php');
date_default_timezone_set('America/Fortaleza');

class GraphicController {

    private $valores = array();

    public function __construct() {
        ;
    }

    public function graphicBars() {
        $cont = 1;
        $left = 460;
        $height = 10;

        $vetor = array();

        for ($i = 0; $i < 12; $i++) {
            if ($this->valores[$i] != 0) {
                $height = $this->valores[$i] * (256 / $this->getValMax());
                $vetor[$i] = '<div class="bar" style="left: ' . $left . 'px; height: ' . $height . 'px"><p>' . number_format($this->valores[$i], 2, ",", ".") . '</p></div>';
            } else {
                $height = 0;
                $vetor[$i] = '<div class="bar" style="left: ' . $left . 'px; height: ' . $height . 'px"></div>';
            }
            if ($cont == 2) {
                $left = $left - 50;
                $cont = 1;
            } else {
                $left = $left - 35;
                $cont++;
            }
        }

        for ($b = 11; $b >= 0; $b--) {
            echo $vetor[$b];
        }
    }

    public function graphicLabels() {
        $dataAtual = date('U');
        $vetor[] = array();
        for ($i = 0; $i < 6; $i++) {
            $vetor[$i] = '<span>' . $this->translate(date('m', $dataAtual)) . '</span>';
            $novaData = $dataAtual - 2678400;
            $dataAtual = $novaData;
        }
        for ($b = 5; $b >= 0; $b--) {
            echo $vetor[$b];
        }
    }

    public function graphicVal() {
        $m = new MonetaryModel(null, null, null, null, null, null);
        $dataControle = date('U');
        $varC = 0;
        for ($a = 0; $a < 12; $a++) {
            if ($varC == 0) {
                $this->valores[$a] = $m->calculateTotalDespesas("", $this->getDataInicial($dataControle), $this->getDataFinal($dataControle));
                $varC = 1;
            } else {
                $this->valores[$a] = $m->calculateTotalReceitas("", $this->getDataInicial($dataControle), $this->getDataFinal($dataControle));
                $varC = 0;
                $dataControle = $dataControle - 2678400;
            }
        }

        $maiorValor = $this->getValMax();
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

    public function valorTotalReceitas() {
        $m = new MonetaryModel(null, null, null, null, null, null);
        $data = date('U');
        return $m->calculateTotalReceitas("", $this->getDataInicial($data), $this->getDataFinal($data));
    }
    
    public function valorTotalDespesas() {
        $m = new MonetaryModel(null, null, null, null, null, null);
        $data = date('U');
        return $m->calculateTotalDespesas("", $this->getDataInicial($data), $this->getDataFinal($data));
    }
    
    private function getDataInicial($data) {
        $novaData = date('Y-m-d', $data);
        $parts = explode("-", $novaData);
        $dataFormatada = $parts[0] . '-' . $parts[1] . '-01';
        return date('U', strtotime($dataFormatada));
    }

    private function getDataFinal($data) {
        $novaData = date('Y-m-d', $data);
        $parts = explode("-", $novaData);
        $dataFormatada = (intval($parts[1]) == 2) ? $parts[0] . '-' . $parts[1] . '-29' : $parts[0] . '-' . $parts[1] . '-31';
        return date('U', strtotime($dataFormatada));
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
        $max = 1;
        for ($i = 0; $i < sizeof($this->valores) - 1; $i++) {
            if ($this->valores[$i] > $max) {
                $max = $this->valores[$i];
            }
        }
        return $max;
    }

}
