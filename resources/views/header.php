<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Catalogo de Servidores | Unitau</title>

        <!-- Available CSS Themes:
        emes | default | default & theme | cerulean | cosmo | cyborg | darkly | flatly | journal | lumen
        paper | readable | sandstone | simplex | slate | spacelab | superhero | united | yeti
        -->
        <link href="/css/cosmo.min.css" rel="stylesheet">
        <link href="/css/token-input.css" rel="stylesheet">
        <link href="/css/token-input-unitau.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-principal">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Catalogo de Servidores</a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-principal">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Principal</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cadastros <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/researchers/create">Servidor</a></li>
                                <li><a href="form-disciplina.php">Disciplina</a></li>
                                <li><a href="form-palavra.php">Palavra-chave</a></li>
                                <li><a href="form-projeto.php">Projetos de Extensão</a></li>
                                <li><a href="form-pesquisa.php">Linhas de Pesquisa</a></li>
                                <li><a href="form-funcao.php">Funções</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Relatórios <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="consulta-servidor.php">Servidor</a></li>
                                <li><a href="consulta-disciplina.php">Disciplina</a></li>
                                <li><a href="consulta-palavra.php">Palavra-chave</a></li>
                                <li><a href="consulta-projeto.php">Projetos de Extensão</a></li>
                                <li><a href="consulta-pesquisa.php">Linhas de Pesquisa</a></li>
                                <li><a href="consulta-funcao.php">Funções</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Olá, Usuário<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Configurações</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
