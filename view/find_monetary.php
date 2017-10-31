<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once('./imports/import_security.php');
include_once('../model/Message.php');
$alert = 0;
$msg = new Message();
if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
}
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
                            <h4 class="modal-title">Atualizar Dados</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" autocomplete="off" action="../controller/MonetaryController.php?param=2">
                                <input type="text" class="form-control hidden" id="id-conta" name="id">
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
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>&ensp; Confirmar Edição</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--FIM DO MODAL DE EDIÇÃO-->

            <!--MODAL DE EXCLUSÃO-->
            <div class="modal fade" id="modal-exclusao" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Excluir</h4>
                        </div>
                        <div class="modal-body">
                            <h5>Deseja realmente excluir o resgistro?</h5>
                            <form method="post" class="center-block" action="../controller/MonetaryController.php?param=3">
                                <input type="text" class="hidden" id="id-exclusao" name="id">
                                <button type="submit" class="btn btn-primary">Sim</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!--FIM DO MODAL DE EXCLUSÃO-->

            <section class="content">
                <h4 class="content-title">Consulta de Receitas/Despesas</h4>

                <?php
                if ($alert == 2) {
                    $msg->showSuccessMessage("Dados atualizados com sucesso!");
                } else if($alert == 3) {
                    $msg->showSuccessMessage("Dados excluídos com sucesso!");
                }
                unset($_SESSION['alert']);
                ?>

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
                    <table class="table table-bordered table-hover" id="tabela">
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
