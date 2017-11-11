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
    <style>
        
    </style>
    <body onload="initGraphics();">
        <?php
        include_once('./imports/import_header.php');
        include_once('./imports/import_menu.php');
        ?>
        <div class="container-fluid">
            <section class="content" style="width:100%">
                <h4 class="content-title">Dashboard</h4>

                <div class="row">
                    <div class="col-md-6">
                        <div class="graph-content">
                            <div class="graph-header">
                                Bar Chart
                            </div>
                            <div class="graph-body">
                                <ul>
                                    <?php $g->graphicVal();?>
                                </ul>
                                <div class="content-bars">
                                    <?php $g->graphicBars(); ?>
                                </div>
                                <div class="legend">
                                    <?php $g->graphicLabels();?>
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
