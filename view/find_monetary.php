<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once('./imports/import_security.php');
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container">
            <section class="content">
                <h4 class="content-title">Consulta de Receitas/Despesas</h4>

                <button class="btn btn-default" style="margin-bottom: 10px" onclick="linkFrom('monetary.php');"><i class="glyphicon glyphicon-plus"></i> Cadastrar Novo</button>

                <form method="post" autocomplete="off" action="../controller/MonetaryController.php?param=4">
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Descrição:</label>
                                    <input type="text" class="form-control text-uppercase" name="descricao">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Data Inicial:</label>
                                    <div class='input-group date' id='data-inicial'>
                                        <input type='text' class="form-control" name="data_inicial"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Data Final:</label>
                                    <div class='input-group date' id='data-final'>
                                        <input type='text' class="form-control" name="data_final"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['retorno_consulta'])) {
                                $dados = $_SESSION['retorno_consulta'];
                                echo $dados;
                                $_SESSION['retorno_consulta'] = "";
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
