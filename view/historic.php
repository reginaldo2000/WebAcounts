<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once('./imports/import_security.php');
?>
<html lang="pt-br">
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <style>
            .table tbody tr td:last-child {
                display: none;
            }
        </style>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>

        <div class="container">
            <section class="content">
                <h4 class="content-title">Histórico de Contas</h4>
                <div class="panel-footer">
                    <form method="post" autocomplete="off" action="../controller/HistoricController.php?param=1">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Data Inicial:</label>
                                    <div class='input-group date' id='data-inicial'>
                                        <input type='text' class="form-control" id="form-data-inicial" name="data_inicial" required/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Data Final:</label>
                                    <div class='input-group date' id='data-final'>
                                        <input type='text' class="form-control" id="form-data-final" name="data_final" required/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        <button type="button" class="btn btn-warning" onclick="window.print();">Gerar Relatório</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['dados'])) {
                                $dados = $_SESSION['dados'];
                                echo $dados;
                                $_SESSION['dados'] = "";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <?php include_once('./imports/import_footer.php'); ?>
    </body>
</html>
