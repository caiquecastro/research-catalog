<?php
require_once './class/ServidorDAO.class.php';

$servidor = new ServidorDAO;

$servidores = $servidor->getAll();

//$funcao = filter_input_array(type)

require_once './header.php';
?>
<h1>Consulta de Servidor</h1>
<form role="form" class="form-horizontal" id="search-servidor">
    <div id="filtering">
        <div class="form-group">
            <div class="col-md-3">
                <select class="form-control cb-attribute">
                    <option value="nome">Nome Completo</option>
                    <option value="nascimento">Nascimento</option>
                    <option value="endereco">Endereço</option>
                    <option value="sexo">Sexo</option>
                    <option value="email">E-mail</option>
                    <option value="telefone">Telefone/Celular</option>
                    <option value="funcao">Função</option>
                    <option value="situacao">Situação</option>
                    <option value="admissao">Admissão</option>
                    <option value="concurso">Disciplina de Concurso</option>
                    <option value="titulacao">Titulação</option>
                    <option value="lattes">Lattes</option>
                    <option value="disciplina">Disciplina Ministrada</option>
                    <option value="palavra">Palavra-chave</option>
                    <option value="projeto">Projeto de Extensão</option>
                    <option value="pesquisa">Linhas de Pesquisa</option>
                </select>
            </div>
            <div class="input-filter">
                <div class="col-md-8"><input class="form-control" name="nome"></div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="button" id="add-filter">Adicionar Filtro</button>
    <button class="btn btn-success" type="submit">Buscar</button>
</form>
<p>Encontrados <?= count($servidores); ?> resultados</p>
<p>Selecione os campos que deseja exibir na tabela:</p>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="option1"> Nascimento
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="option2"> Endereço
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="grid-field" value="option3"> Sexo
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="option1"> E-mail
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="option2"> Telefone
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="grid-field" value="option3"> Celular
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="option1"> Função
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="option2"> Situação
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="grid-field" value="option3"> Admissão
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="option1"> Área de Atuação
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="option2"> Concurso
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="grid-field" value="option3"> Titulação
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="option1"> Lattes
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="disciplinas"> Disciplinas Minitradas
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="grid-field" value="projetos"> Projetos de Extensão
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="pesquisas"> Linhas de Pesquisa
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="grid-field" value="palavras"> Palavras-chave
</label>
<table class="table">
    <thead>
        <tr>
            <th class="col-id">#</th>
            <th class="col-nome">Nome</th>
            <th class="col-nascimento">Nascimento</th>
            <th class="col-endereco">Endereço</th>
            <th class="col-sexo">Sexo</th>
            <th class="col-email">E-mail</th>
            <th class="col-telefone">Telefone</th>
            <th class="col-celular">Celular</th>
            <th class="col-funcao">Função</th>
            <th class="col-situacao">Situação</th>
            <th class="col-admissao">Admissão</th>
            <th class="col-area">Área de Atuação</th>
            <th class="col-concurso">Concurso</th>
            <th class="col-titulacao">Titulação</th>
            <th class="col-lattes">Lattes</th>
            <th class="col-disciplinas">Disciplinas Ministradas</th>
            <th class="col-projetos">Projetos de Extensão</th>
            <th class="col-pesquisas">Linhas de Pesquisa</th>
            <th class="col-palavras">Palavras-chave</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($servidores as $row) :
            ?>
            <tr>
                <td class="col-id"><?= $row['id']; ?></td>
                <td class="col-nome"><?= $row['nome']; ?></td>
                <td class="col-nascimento"><?= $row['nascimento']; ?></td>
                <td class="col-endereco"><?= $row['endereco']; ?></td>
                <td class="col-sexo"><?= $row['sexo']; ?></td>
                <td class="col-email"><?= $row['email']; ?></td>
                <td class="col-telefone"><span class="telefone"><?= $row['telefone']; ?></span></td>
                <td class="col-celular"><span class="celular"><?= $row['celular']; ?></span></td>
                <td class="col-funcao"><?= $row['funcao']; ?></td>
                <td class="col-situacao"><?= $row['situacao']; ?></td>
                <td class="col-admissao"><?= $row['admissao']; ?></td>
                <td class="col-area"><?= $row['area']; ?></td>
                <td class="col-concurso"><?= $row['concurso']; ?></td>
                <td class="col-titulacao"><?= $row['titulacao']; ?></td>
                <td class="col-lattes"><?= $row['lattes']; ?></td>
                <td class="col-disciplinas"></td>
                <td class="col-projetos"></td>
                <td class="col-pesquisas"></td>
                <td class="col-palavras"></td>
                <td>
                    <a class="btn btn-danger btn-sm" href="excluir-servidor.php?id=<?= $row['id']; ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a class="btn btn-warning btn-sm" href="form-servidor.php?id=<?= $row['id']; ?>">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a class="btn btn-info btn-sm" href="relatorio.php?id=<?= $row['id']; ?>">
                        <span class="glyphicon glyphicon-file"></span>
                    </a>
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
