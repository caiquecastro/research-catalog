<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand" href="/">Catalogo de Pesquisadores</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Principal</a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Cadastros
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="dropdown-item" href="/researchers/create">Servidor</a></li>
                        <li><a class="dropdown-item" href="/subjects/create">Disciplina</a></li>
                        <li><a class="dropdown-item" href="/keywords/create">Palavra-chave</a></li>
                        <li><a class="dropdown-item" href="/projects/create">Projetos de Extensão</a></li>
                        <li><a class="dropdown-item" href="/researches/create">Linhas de Pesquisa</a></li>
                        <li><a class="dropdown-item" href="/roles/create">Funções</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Relatórios
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="dropdown-item" href="/researchers">Servidor</a></li>
                        <li><a class="dropdown-item" href="/subjects">Disciplina</a></li>
                        <li><a class="dropdown-item" href="/keywords">Palavra-chave</a></li>
                        <li><a class="dropdown-item" href="/projects">Projetos de Extensão</a></li>
                        <li><a class="dropdown-item" href="/researches">Linhas de Pesquisa</a></li>
                        <li><a class="dropdown-item" href="/roles">Funções</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Olá, Usuário<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="dropdown-item" href="/settings">
                                <span class="fas fa-cog"></span> Configurações
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                                <button class="dropdown-item">
                                    <span class="fas fa-power-off"></span> Sair
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
