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

            <!--MODAL DE EDIÇÃO-->
            <div class="modal fade" tabindex="-1" role="dialog" id="modal-edicao">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Título do modal</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" autocomplete="off" action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Descrição:</label>
                                            <input type="text" class="form-control text-uppercase" id="desc" name="descricao" maxlength="120" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Tipo:</label>
                                            <select class="form-control" id="tipo" name="tipo">
                                                <option value="r">Receita</option>
                                                <option value="d">Despesa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Valor:</label>
                                            <input type="text" class="form-control" id="moeda" name="valor">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Data:</label>
                                            <div class='input-group date' id='data'>
                                                <input type='text' class="form-control" id="data-conta" name="data" required/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&ensp; Confirmar Edição</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--FIM DO MODAL DE EDIÇÃO-->

            <section class="content">
                <h4 class="content-title">Consulta de Receitas/Despesas</h4>

                <button class="btn btn-default" style="margin-bottom: 10px" onclick="linkFrom('monetary.php');"><i class="glyphicon glyphicon-plus"></i> Cadastrar Novo</button>

                <form method="post" autocomplete="off" action="../controller/MonetaryController.php?param=4">
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Descrição:</label>
                                    <input type="text" class="form-control text-uppercase" name="descricao2">
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
