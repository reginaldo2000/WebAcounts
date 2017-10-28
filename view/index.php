<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if(isset($_SESSION['userid'])) {
    header('location:home.php');
}
include('../model/Message.php');
$alert = -1;
$msg = new Message();
if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
}
?>
<html>
    <?php include_once('./imports/import_head.php'); ?>
    <body class="login-page">
        <?php
        include_once('./imports/import_header.php');
        ?> 
        <div class="container">
            <section class="content">
                <h4 class="content-title text-center">Login</h4>

                <?php
                if($alert == 0) {
                    $msg->showErrorMessage("Usuário ou senha incorretos!");
                } else if($alert == 1) {
                    $msg->showErrorMessage("É preciso efetuar o login para ter acesso ao sistema!");
                }
                unset($_SESSION['alert']);
                ?>

                <form method="post" autocomplete="off" action="../controller/UsuarioController.php?param=-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Usuário:</label>
                                <input type="text" class="form-control" name="usuario">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Senha:</label>
                                <input type="password" class="form-control" name="senha">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-share"></i> Entrar</button>
                </form>
            </section>
        </div>
        <?php include_once('./imports/import_footer.php');?>
    </body>
</html>
