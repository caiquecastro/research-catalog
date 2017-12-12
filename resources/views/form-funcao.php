<?php
session_start();

require_once 'class/FuncaoDAO.class.php';

$funcoes = new FuncaoDAO;

$labelBtn = "Cadastrar";
$descricao = "";
$selected = "";
$funcaoValue = "";

// Verifica se está sendo enviado algum formulário
if (isset($_POST['sent'])) {
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $isprofessor = (isset($_POST['ck-professor'])) ? true : false;
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $funcao = new Funcao;
    $funcao->setDescricao($descricao);
    $funcao->setProfessor($isprofessor);
    
    //Verifica se é novo cadastro ou edição
    if(empty($id)) { //novo
        $retorno = $funcoes->insert($funcao);
    } else { //edição
        if($funcoes->getById($id) == null) { //se não existe o cadastro
            $retorno = null;
        } else {
            $funcao->setFuncao($id);
            $retorno = $funcoes->update($funcao);
        }
    }
    if ($retorno) {
        $_SESSION['messageType'] = 'success';
        $_SESSION['message'] = "Sucesso!";
    } else {
        $_SESSION['messageType'] = 'danger';
        $_SESSION['message'] = "Houve um erro ao processar os dados. "
                . "Tente novamente mais tarde ou contate o suporte";
    }
    header("Location:form-funcao.php");
    exit(0);
} elseif (isset($_GET['id'])) {
    $labelBtn = "Editar";
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $funcaoEdition = $funcoes->getById($id);
    $descricao = $funcaoEdition['descricao'];
    $selected = ($funcaoEdition['isprofessor'] == "true") ? " checked" : "";
    $funcaoValue = $funcaoEdition['funcao'];
}

$listaFuncao = $funcoes->getAll();

require_once './header.php';
?>
<h1>Cadastro de Função/Cargo</h1>
<?php
if (isset($_SESSION['messageType'])) {
    echo '<div class="alert alert-' . $_SESSION['messageType'] . '" role="alert">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
    unset($_SESSION['messageType']);
}
?>
<form role="form" id="form-funcao" class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
        <label for="nome" class="col-md-2 control-label">Descrição</label>
        <div class="col-md-5">
            <input type="text" class="form-control" id="nome" name="descricao" maxlength="60" value="<?= $descricao; ?>">
        </div>
        <label for="ck-professor" class="col-md-2 control-label">É professor?</label>
        <div class="col-md-1">
            <div class="checkbox">
                <input type="checkbox" name="ck-professor" id="ck-professor" value="true" <?= $selected; ?>>
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" name="sent" class="btn btn-primary btn-block"><?= $labelBtn; ?></button>
        </div>
    </div>
    <input type="hidden" name="id" value="<?= $funcaoValue; ?>">
</form>
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
        foreach ($listaFuncao as $funcao) :
            $isProfessor = "";
            if ($funcao['isprofessor']) {
                $isProfessor = '<span class="glyphicon glyphicon-ok"></span>';
            }
            ?>
            <tr>
                <td><?= $funcao['id']; ?></td>
                <td><?= $funcao['name']; ?></td>
                <td><?= $isProfessor; ?></td>
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
<?php
require_once './footer.php';
