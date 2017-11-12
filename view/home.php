<!DOCTYPE html>
<?php
include_once('./imports/import_security.php');
include_once('../controller/GraphicController.php');
$g = new GraphicController();
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body onload="initGraphics();">
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="content" style="width:100%">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-money fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">26</div>
                                                <div>Receitas</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-dollar fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">26</div>
                                                <div>Despesas</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-credit-card fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">26</div>
                                                <div>Saldo</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="graph-content">
                                    <div class="graph-header">
                                        Comparativo mensal de Receitas x Despesas
                                    </div>
                                    <div class="graph-body">
                                        <ul>
                                            <?php $g->graphicVal(); ?>
                                        </ul>
                                        <div class="content-bars">
                                            <?php $g->graphicBars(); ?>
                                        </div>
                                        <div class="legend">
                                            <?php $g->graphicLabels(); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php'); ?>
    </body>
</html>
