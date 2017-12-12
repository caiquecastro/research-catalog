<?php
session_start();

require_once 'class/PalavraChaveDAO.class.php';

$palavrachaves = new PalavraChaveDAO;

$labelBtn = "Cadastrar";
$descricao = "";
$palavrachaveValue = "";

// Verifica se está sendo enviado algum formulário
if (isset($_POST['sent'])) {
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $palavrachave = new PalavraChave;
    $palavrachave->setDescricao($descricao);

    //Verifica se é novo cadastro ou edição
    if (empty($id)) { //novo
        $retorno = $palavrachaves->insert($palavrachave);
    } else { //edição
        if ($palavrachaves->getById($id) == null) { //se não existe o cadastro
            $retorno = null;
        } else {
            $palavrachave->setPalavraChave($id);
            $retorno = $palavrachaves->update($palavrachave);
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
    header("Location:form-palavra.php");
    exit(0);
} elseif (isset($_GET['id'])) {
    $labelBtn = "Editar";
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $palavraEdition = $palavrachaves->getById($id);
    $descricao = $palavraEdition['descricao'];
    $palavrachaveValue = $palavraEdition['palavrachave'];
}

$listaPalavra = $palavrachaves->getAll();

require_once './header.php';
?>
<h1>Cadastro de Palavra Chave</h1>
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
        <div class="col-md-8">
            <input type="text" class="form-control" id="nome" name="descricao" maxlength="60" value="<?= $descricao; ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" name="sent" class="btn btn-primary btn-block"><?= $labelBtn; ?></button>
        </div>
    </div>
    <input type="hidden" name="id" value="<?= $palavrachaveValue; ?>">
</form>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Palavra Chave</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listaPalavra as $palavra) :
            ?>
            <tr>
                <td><?= $palavra['id']; ?></td>
                <td><?= $palavra['name']; ?></td>
                <td>
                    <a class="btn btn-danger btn-sm" href="excluir-palavra.php?id=<?= $palavra['id']; ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a class="btn btn-warning btn-sm" href="form-palavra.php?id=<?= $palavra['id']; ?>">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
            </tr>
            <?php
        endforeach;
        ?>
    </tbody>
</table>
<?php
require_once './footer.php';
