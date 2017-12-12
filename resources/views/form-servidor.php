<?php
session_start();

$labelBtn = "Cadastrar";
$nome = "";
$nascimento = "";
$endereco = "";
$sexo = "";
$email = "";
$telefone = "";
$celular = "";
$funcaoID = "";
$situacao = "";
$admissao = "";
$area = "";
$concurso = "";
$titulacao = "";
$lattes = "";
$disciplinas = "";
$projetos = "";
$pesquisas = "";
$palavras = "";

if (isset($_POST['sent'])) {

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
    $funcao = filter_input(INPUT_POST, 'funcao', FILTER_SANITIZE_NUMBER_INT);
    $situacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_STRING);
    $admissao = filter_input(INPUT_POST, 'admissao', FILTER_SANITIZE_STRING);

    $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);
    $concurso = filter_input(INPUT_POST, 'concurso', FILTER_SANITIZE_NUMBER_INT);
    $titulacao = filter_input(INPUT_POST, 'titulacao', FILTER_SANITIZE_STRING);
    $lattes = filter_input(INPUT_POST, 'lattes', FILTER_SANITIZE_URL);

    $disciplina = filter_input(INPUT_POST, 'disciplinas', FILTER_SANITIZE_STRING);
    $projeto = filter_input(INPUT_POST, 'projetos', FILTER_SANITIZE_STRING);
    $pesquisa = filter_input(INPUT_POST, 'pesquisas', FILTER_SANITIZE_STRING);
    $palavra = filter_input(INPUT_POST, 'palavras', FILTER_SANITIZE_STRING);

    $disciplinas = (!empty($disciplina)) ? explode(",", $disciplina) : null;
    $projetos = (!empty($projeto)) ? explode(",", $projeto) : null;
    $pesquisas = (!empty($pesquisa)) ? explode(",", $pesquisa) : null;
    $palavras = (!empty($palavra)) ? explode(",", $palavra) : null;

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    if (!empty($nome)) {
        $funcaoServidor = $funcaoDAO->getById($funcao);
        $isProfessor = $funcaoServidor['isprofessor'];

        if ($isProfessor) {
            $professor = new Professor;
            $professor->setNome($nome);
            $professor->setNascimento($nascimento);
            $professor->setEndereco($endereco);
            $professor->setSexo($sexo);
            $professor->setEmail($email);
            $professor->setTelefone($telefone);
            $professor->setCelular($celular);
            $professor->setFuncao($funcao);
            $professor->setSituacao($situacao);
            $professor->setAdmissao($admissao);
            $professor->setArea($area);
            $professor->setConcurso($concurso);
            $professor->setTitulacao($titulacao);
            $professor->setLattes($lattes);
            $professor->setDisciplinas($disciplinas);
            $professor->setProjetos($projetos);
            $professor->setPesquisas($pesquisas);
            $professor->setPalavras($palavras);
        } else {
            $administrativo = new Servidor;
            $administrativo->setNome($nome);
            $administrativo->setNascimento($nascimento);
            $administrativo->setEndereco($endereco);
            $administrativo->setSexo($sexo);
            $administrativo->setEmail($email);
            $administrativo->setTelefone($telefone);
            $administrativo->setCelular($celular);
            $administrativo->setFuncao($funcao);
            $administrativo->setSituacao($situacao);
            $administrativo->setAdmissao($admissao);
        }

        if (empty($id)) {
            if (isset($professor)) {
                $retorno = $professores->insert($professor);
            } elseif (isset($administrativo)) {
                $retorno = $servidores->insert($administrativo);
            }
        } else {
            if (isset($professor)) {
                $retorno = $professores->update($professor);
            } elseif (isset($administrativo)) {
                $retorno = $servidores->update($administrativo);
            }
        }
    }

    if (isset($retorno) && $retorno != false) {
        $_SESSION['messageType'] = 'success';
        $_SESSION['message'] = "Sucesso!";
    } else {
        $_SESSION['messageType'] = 'danger';
        $_SESSION['message'] = "Houve um erro ao processar os dados. "
                . "Tente novamente mais tarde ou contate o suporte";
    }
    //header("Location:form-servidor.php");
    //exit(0);
} elseif (isset($_GET['id'])) {
    $labelBtn = "Editar";
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $servidorEdition = $servidores->getById($id);
    $servidorValue = $servidorEdition['id'];
    $nome = $servidorEdition['nome'];
    $nascimento = $servidorEdition['nascimento'];
    $endereco = $servidorEdition['endereco'];
    $sexo = $servidorEdition['sexo'];
    $email = $servidorEdition['email'];
    $telefone = $servidorEdition['telefone'];
    $celular = $servidorEdition['celular'];
    $funcaoID = $servidorEdition['funcao'];
    $situacao = $servidorEdition['situacao'];
    $admissao = $servidorEdition['admissao'];
    
    if($funcaoDAO->isProfessor($funcaoID)) {
        $professorEdition = $professores->getById($servidorValue);
        $concurso = $professorEdition['concurso'];
        $area = $professorEdition['area'];
        $titulacao = $professorEdition['titulacao'];
        $lattes = $professorEdition['lattes'];
        
        $disciplinas = array();
        foreach($professorEdition['disciplina'] as $disciplina) {
            $disciplinas[] = implode(",", $disciplina);
        }
        $disciplinas = implode("|", $disciplinas);
        
        $projetos = array();
        foreach($professorEdition['projeto'] as $projeto) {
            $projetos[] = implode(",", $projeto);
        }
        $projetos = implode("|", $projetos);
        
        $pesquisas = array();
        foreach($professorEdition['pesquisa'] as $pesquisa) {
            $pesquisas[] = implode(",", $pesquisa);
        }
        $pesquisas = implode("|", $pesquisas);
        
        $palavras = array();
        foreach($professorEdition['palavrachave'] as $palavrachave) {
            $palavras[] = implode(",", $palavrachave);
        }
        $palavras = implode("|", $palavras);
    }
}

$servidorValue = "";

$listaFuncao = [];
$listaDisciplina = [];
//$listaProjeto = $projetos->getAll();
//$listaPesquisa = $pesquisas->getAll();
//$listaPalavra = $palavras->getAll();

require_once './header.php';
?>
<h1>Cadastro de Servidor</h1>
<div id="messages">
    <?php
    if (isset($_SESSION['messageType'])) {
        echo '<div class="alert alert-' . $_SESSION['messageType'] . '" role="alert">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
        unset($_SESSION['messageType']);
    }
    ?>
</div>
<form role="form" class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF']; ?>" id="form-servidor">
    <fieldset>
        <legend>Geral</legend>
        <div class="form-group">
            <label for="nome" class="col-md-2 control-label">Nome Completo</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="nome" name="nome" maxlength="60" value="<?= $nome; ?>" required>
            </div>
            <label for="nascimento" class="col-md-1 control-label">Nascimento</label>
            <div class="col-md-3">
                <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?= $nascimento; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="endereco" class="col-md-2 control-label">Endereço Residencial</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $endereco; ?>">
            </div>
            <label for="sexo" class="col-md-1 control-label">Sexo</label>
            <div class="col-md-3">
                <select id="sexo" name="sexo" class="form-control">
                    <option value="M" <?php if ($sexo == "M") echo "selected"; ?>>Masculino</option>
                    <option value="F" <?php if ($sexo == "F") echo "selected"; ?>>Feminino</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-2 control-label">E-mail</label>
            <div class="col-md-4">
                <input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>">
            </div>
            <label for="telefone" class="col-md-1 control-label">Telefone</label>
            <div class="col-md-2">
                <input type="text" id="telefone" class="telefone form-control" name="telefone" value="<?= $telefone; ?>">
            </div>
            <label for="celular" class="col-md-1 control-label">Celular</label>
            <div class="col-md-2">
                <input type="text" id="celular" class="celular form-control" name="celular" value="<?= $celular; ?>">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Servidor</legend>
        <div class="form-group">
            <label for="funcao" class="col-md-2 control-label">Função / Cargo</label>
            <div class="col-md-3">
                <select class="form-control" id="funcao" name="funcao" required>
                    <?php
                    foreach ($listaFuncao as $funcao) :
                        $boolProfessor = ($funcao['isprofessor'] == '1') ? "sim" : "nao";
                        ?>
                        <option value="<?= $funcao['id']; ?>" data-professor="<?= $boolProfessor; ?>" <?php if ($funcao['id'] == $funcaoID) echo "selected"; ?>><?= $funcao['name']; ?></option>
                        <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <label for="situacao" class="col-md-1 control-label">Situação</label>
            <div class="col-md-2">
                <select class="form-control" id="situacao" name="situacao">
                    <option value="A" <?php if ($situacao == "A") echo "selected"; ?>>Efetivo</option>
                    <option value="B" <?php if ($situacao == "B") echo "selected"; ?>>Exonerado</option>
                    <option value="C" <?php if ($situacao == "C") echo "selected"; ?>>Aposentado</option>
                    <option value="D" <?php if ($situacao == "D") echo "selected"; ?>>Afastado</option>
                </select>
            </div>
            <label for="admissao" class="col-md-1 control-label">Admissão</label>
            <div class="col-md-3">
                <input type="date" class="form-control" id="admissao" name="admissao" value="<?= $admissao; ?>">
            </div>
        </div>
    </fieldset>
    <fieldset id="fieldset-professor">
        <legend>Professor</legend>
        <div class="form-group">
            <label for="area" class="col-md-2 control-label">Área de Atuação</label>
            <div class="col-md-3">
                <select class="form-control" id="area" name="area">
                    <option value="B" <?php if ($area == "B") echo "selected"; ?>>Biociências</option>
                    <option value="E" <?php if ($area == "E") echo "selected"; ?>>Exatas</option>
                    <option value="H" <?php if ($area == "H") echo "selected"; ?>>Humanas</option>
                </select>
            </div>
            <label for="concurso" class="col-md-2 control-label">Disciplina de Concurso</label>
            <div class="col-md-5">
                <select class="form-control" id="concurso" name="concurso">
                    <?php
                    foreach ($listaDisciplina as $disciplina) :
                        ?>
                        <option value="<?= $disciplina['id']; ?>" <?php if($concurso == $disciplina['id']) { echo "selected"; } ?>><?= $disciplina['name']; ?></option>
                        <?php
                    endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="titulacao" class="col-md-2 control-label">Titulação</label>
            <div class="col-md-3">
                <select class="form-control" id="titulacao" name="titulacao">
                    <option value="E" <?php if ($titulacao == "E") echo "selected"; ?>>Especialista</option>
                    <option value="M" <?php if ($titulacao == "M") echo "selected"; ?>>Mestre</option>
                    <option value="D" <?php if ($titulacao == "D") echo "selected"; ?>>Doutor</option>
                    <option value="P" <?php if ($titulacao == "P") echo "selected"; ?>>PhD</option>
                </select>
            </div>
            <label for="lattes" class="col-md-1 control-label">Lattes</label>
            <div class="col-md-6">
                <input class="form-control" id="lattes" name="lattes" value="<?= $lattes; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="disciplinas" class="col-md-2 control-label">Disciplinas Ministradas</label>
            <div class="col-md-10">
                <input class="form-control" type="text" id="disciplinas" name="disciplinas" value="<?= $disciplinas; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="projetos" class="col-md-2 control-label">Projetos de Extensão</label>
            <div class="col-md-10">
                <input class="form-control" type="text" id="projetos" name="projetos" value="<?= $projetos; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="pesquisas" class="col-md-2 control-label">Linhas de Pesquisa</label>
            <div class="col-md-10">
                <input class="form-control" type="text" id="pesquisas" name="pesquisas" value="<?= $pesquisas; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="palavrachaves" class="col-md-2 control-label">Palavras-chaves</label>
            <div class="col-md-10">
                <input class="form-control" type="text" id="palavrachaves" name="palavras" value="<?= $palavras; ?>">
            </div>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary" name="sent"><?= $labelBtn; ?></button>
    <input type="hidden" name="id" value="<?= $servidorValue; ?>">
</form>
<?php
require_once './footer.php';
