<?php
session_start();

require_once 'class/FuncaoDAO.class.php';

$funcoes = new FuncaoDAO;

$search = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);

if($search) {
    $listaFuncao = $funcoes->getByDescricao($search);
} else {
    $listaFuncao = $funcoes->getAll();
}

require_once './header.php';
?>
<h1>Consulta de Função</h1>
<?php
if (isset($_SESSION['messageType'])) {
    echo '<div class="alert alert-' . $_SESSION['messageType'] . '" role="alert">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
    unset($_SESSION['messageType']);
}
?>
<form role="form" class="form-horizontal">
    <div class="form-group">
        <label for="nome" class="col-md-2 control-label">Descrição</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="descricao" name="s">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block">Buscar</button>
        </div>
    </div>
</form>
<p>Encontrados <?= count($listaFuncao); ?> resultados</p>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Função</th>
            <th>É professor</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($listaFuncao as $funcao) :
            $isProfessor = "";
            if($funcao['isprofessor']) {
                $isProfessor = '<span class="glyphicon glyphicon-ok"></span>';
            }
        ?>
        <tr>
            <td><?=$funcao['id'];?></td>
            <td><?=$funcao['name'];?></td>
            <td><?=$isProfessor;?></td>
            <td>
                <a class="btn btn-danger btn-sm" href="excluir-funcao.php?id=<?= $funcao['id']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                <a class="btn btn-warning btn-sm" href="form-funcao.php?id=<?= $funcao['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
            </td>
        </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
<a href="#" class="btn btn-default">Exportar para PDF</a>
<?php
require_once './footer.php';
