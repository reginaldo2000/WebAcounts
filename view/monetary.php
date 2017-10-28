<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body>
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container">
            <section class="content">
                <h4 class="content-title">Cadastro de Receitas/Despesas</h4>
                <button class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Consultar</button>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Descrição:</label>
                                <input type="text" class="form-control text-uppercase" name="descricao" required>
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
                                <input type="text" class="form-control" name="valor">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Data:</label>
                                <div class='input-group date' id='data'>
                                    <input type='text' class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary">Cadastrar</button>
                    </div>
                </section>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
    </body>
</html>
