<div class="modal fade" tabindex="-1" role="dialog" id="modal-logoff">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Efetuar Logoff</h4>
            </div>
            <div class="modal-body">
                <p>Deseja realmente sair do Sistema?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="linkFrom('../controller/MonetaryController.php?param=10');">Sim</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="btn-group">
    <a class="btn-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-menu-hamburger"></i></a>

    <ul class="dropdown-menu">
        <li><a href="home.php">Dashboard</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="monetary.php">Cadastrar Receita/Despesa</a></li>
        <li><a href="find_monetary.php">Consultas</a></li>
        <li><a href="historic.php">Histórico</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#" data-toggle="modal" data-target="#modal-logoff">Sair</a></li>
    </ul>
</div>