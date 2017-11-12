<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once('./imports/import_security.php');
include_once('../model/Message.php');
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
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastro de Receitas/Despesas</div>
                    <div class="panel-body">
                        <?php
                        $alert = 0;
                        $msg = new Message();
                        if (isset($_SESSION['alert'])) {
                            $alert = $_SESSION['alert'];
                        }
                        if ($alert == 1) {
                            $msg->showSuccessMessage("Lançamento realizado com sucesso!");
                        }
                        unset($_SESSION['alert']);
                        ?>

                        <button class="btn btn-default" onclick="linkFrom('find_monetary.php');"><i class="glyphicon glyphicon-search"></i> Consultar</button>
                        <section class="content">
                            <form method="post" autocomplete="off" action="../controller/MonetaryController.php?param=1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Descrição:</label>
                                            <input type="text" class="form-control text-uppercase" name="descricao" maxlength="120" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Tipo:</label>
                                            <select class="form-control" name="tipo">
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
                                                <input type='text' class="form-control" name="data" required/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i>&ensp; Cadastrar</button>
                                </div
                            </form>
                        </section>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
    </body>
</html>
