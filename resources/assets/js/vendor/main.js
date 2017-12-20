(function() {

    $(".col-nascimento, .col-celular, .col-telefone, .col-situacao, .col-area, .col-endereco, .col-sexo, .col-email, .col-lattes, .col-titulacao, .col-admissao, .col-nascimento, .col-projetos, .col-pesquisas").hide();

    var attr_size = 0;

    var maskBehavior = function(val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    }, options = {
        onKeyPress: function(val, e, field, options) {
            field.mask(maskBehavior, apply({}, arguments), options);
        }
    };

    $('.telefone').mask("(00) 0000-0000");
    $('.celular').mask("(00) 00000-0000");
    $('.mixedphone').mask(maskBehavior, options);

    $("#fieldset-professor").hide();

    $("body").on('click', '.btn-remove', function() {
        $(this).parent().parent().remove();
    });

    $("body").on('change', ".cb-attribute", function() {
        var field = $(this).val();
        var input = "";
        if (field === "nome") {
            input = '<div class="col-md-8"><input class="form-control" name="nome"></div>';
        } else if (field === "endereco") {
            input = '<div class="col-md-8"><input class="form-control" name="endereco"></div>';
        } else if (field === "lattes") {
            input = '<div class="col-md-8"><input class="form-control" name="lattes"></div>';
        } else if (field === "email") {
            input = '<div class="col-md-8"><input class="form-control" type="email" name="email"></div>';
        } else if (field === "sexo") {
            input = '<div class="col-md-8"><select class="form-control" name="sexo">'
                    + '<option value="M">Masculino</option>'
                    + '<option value="F">Feminino</option></select></div>';
        } else if (field === "situacao") {
            input = '<div class="col-md-8"><select class="form-control" name="situacao[]">'
                    + '<option value="A">Efetivo</option>'
                    + '<option value="B">Exonerado</option>'
                    + '<option value="C">Aposentado</option>'
                    + '<option value="D">Afastado</option>'
                    + '</select></div>';
        } else if (field === "nascimento") {
            input = '<label class="control-label col-md-1 aux-text"><p class="text-center">entre</p></label>'
                    + '<div class="col-md-3"><input type="date" class="form-control" name="nascimento-inicio"></div>'
                    + '<label class="control-label col-md-1 aux-text"><p class="text-center">e</p></label>'
                    + '<div class="col-md-3"><input type="date" class="form-control" name="nascimento-fim"></div>';
        } else if (field === "admissao") {
            input = '<label class="control-label col-md-1 aux-text"><p class="text-center">entre</p></label>'
                    + '<div class="col-md-3"><input type="date" class="form-control" name="admissao-inicio"></div>'
                    + '<label class="control-label col-md-1 aux-text"><p class="text-center">e</p></label>'
                    + '<div class="col-md-3"><input type="date" class="form-control" name="admissao-fim"></div>';
        } else if (field === "telefone") {
            input = '<div class="col-md-8"><input class="form-control mixedphone" type="text" name="telefone"></div>';
        } else if (field === "titulacao") {
            input = '<div class="col-md-8"><select class="form-control" name="titulacao[]">'
                    + '<option value="E">Especialista</option>'
                    + '<option value="M">Mestre</option>'
                    + '<option value="D">Doutor</option>'
                    + '<option value="P">PhD</option>'
                    + '</select></div>';
        } else if (field === "funcao") {
            var input = $("<div />", {
                class: 'col-md-8'
            });
            var select = $("<select/>", {
                name: 'funcao[]',
                class: 'form-control'
            }).appendTo(input);
            loadSelectFuncao(select);
        } else if (field === "concurso") {
            var input = $("<div />", {
                class: 'col-md-8'
            });
            var select = $("<select/>", {
                name: 'concurso[]',
                class: 'form-control'
            }).appendTo(input);
            loadSelectDisciplina(select);
        } else if (field === "concurso") {
            var input = $("<div />", {
                class: 'col-md-8'
            });
            var select = $("<select/>", {
                name: 'concurso[]',
                class: 'form-control'
            }).appendTo(input);
            loadSelectDisciplina(select);
        } else if (field === "disciplina") {
            var input = $("<div />", {
                class: 'col-md-8'
            });
            var select = $("<select/>", {
                name: 'disciplina[]',
                class: 'form-control'
            }).appendTo(input);
            loadSelectDisciplina(select);
        } else if (field === "palavra") {
            var input = $("<div />", {
                class: 'col-md-8'
            });
            var select = $("<select/>", {
                name: 'palavra[]',
                class: 'form-control'
            }).appendTo(input);
            loadSelectPalavra(select);
        } else if (field === "projeto") {
            var input = $("<div />", {
                class: 'col-md-8'
            });
            var select = $("<select/>", {
                name: 'projeto[]',
                class: 'form-control'
            }).appendTo(input);
            loadSelectProjeto(select);
        } else if (field === "pesquisa") {
            var input = $("<div />", {
                class: 'col-md-8'
            });
            var select = $("<select/>", {
                name: 'pesquisa[]',
                class: 'form-control'
            }).appendTo(input);
            loadSelectPesquisa(select);
        }
        $(this).parent().parent().find(".input-filter").html(input);
    });

    $("#add-filter").click(function() {
        var filter = '<div class="form-group"><div class="col-md-3">'
                + '<select class="form-control cb-attribute">'
                + '<option value="nome">Nome Completo</option>'
                + '<option value="nascimento">Nascimento</option>'
                + '<option value="endereco">Endereço</option>'
                + '<option value="sexo">Sexo</option>'
                + '<option value="email">E-mail</option>'
                + '<option value="telefone">Telefone/Celular</option>'
                + '<option value="funcao">Função</option>'
                + '<option value="situacao">Situação</option>'
                + '<option value="admissao">Admissão</option>'
                + '<option value="concurso">Disciplina de Concurso</option>'
                + '<option value="titulacao">Titulação</option>'
                + '<option value="lattes">Lattes</option>'
                + '<option value="disciplina">Disciplina Ministrada</option>'
                + '<option value="palavra">Palavra-chave</option>'
                + '<option value="projeto">Projeto de Extensão</option>'
                + '<option value="pesquisa">Linhas de Pesquisa</option>'
                + '</select></div><div class="input-filter">'
                + '<div class="col-md-8"><input class="form-control" name="nome">'
                + '</div></div><div class="col-md-1"><a href="#" class="btn btn-danger btn-remove">'
                + '<span class="fas fa-trash"></span></a></div></div>';
        $("#filtering").append(filter);
    });


    var cbProfessor = $("#funcao").find(":selected");
    enableProfessorFields(cbProfessor);
    $("#role_id").on('change', function() {
        enableProfessorFields($(this).find(':selected'));
    });

    var palavras = [];
    var valuePalavras = $("#palavrachaves");
    if (valuePalavras.val() !== "" && valuePalavras.length > 0) {
        palavras = valuePalavras.val().split("|");
    }
    $("#palavrachaves").tokenInput("/keywords", {
        theme: "unitau",
        hintText: "Pesquise a palavra-chave desejada",
        searchingText: "Buscando...",
        noResultsText: "Não houve resultado",
        preventDuplicates: true
    });
    for (var palavra in palavras) {
        var value = palavras[palavra].split(",");
        var id = +value[0];
        var descricao = value[1];
        $("#palavrachaves").tokenInput("add", {id: id, name: descricao});
    }

    var pesquisas = [];
    var valuePesquisas = $("#pesquisas");
    if (valuePesquisas.val() !== "" && valuePesquisas.length > 0) {
        pesquisas = valuePesquisas.val().split("|");
    }
    $("#pesquisas").tokenInput("./api/pesquisa.php", {
        theme: "unitau",
        hintText: "Pesquise a Linha de Pesquisa desejada",
        searchingText: "Buscando...",
        noResultsText: "Não houve resultado",
        preventDuplicates: true
    });
    for (var pesquisa in pesquisas) {
        var value = pesquisas[pesquisa].split(",");
        var id = +value[0];
        var descricao = value[1];
        $("#pesquisas").tokenInput("add", {id: id, name: descricao});
    }

    var projetos = [];
    var valueProjetos = $("#projetos");
    if (valueProjetos.val() !== "" && valueProjetos.length > 0) {
        projetos = valueProjetos.val().split("|");
    }
    $("#projetos").tokenInput("./api/projeto.php", {
        theme: "unitau",
        hintText: "Pesquise o Projeto desejado",
        searchingText: "Buscando...",
        noResultsText: "Não houve resultado",
        preventDuplicates: true
    });
    for (var projeto in projetos) {
        var value = projetos[projeto].split(",");
        var id = +value[0];
        var descricao = value[1];
        $("#projetos").tokenInput("add", {id: id, name: descricao});
    }

    var disciplinas = [];
    var valueDisciplinas = $("#disciplinas");
    if (valueDisciplinas.val() !== "" && valueDisciplinas.length > 0) {
        disciplinas = $("#disciplinas").val().split("|");
    }
    $("#disciplinas").tokenInput("/subjects", {
        theme: "unitau",
        hintText: "Pesquise a Disciplina desejada",
        searchingText: "Buscando...",
        noResultsText: "Não houve resultado",
        preventDuplicates: true
    });

    for (var disciplina in disciplinas) {
        var value = disciplinas[disciplina].split(",");
        var id = +value[0];
        var descricao = value[1];
        $("#disciplinas").tokenInput("add", {id: id, name: descricao});
    }

    function enableProfessorFields(el) {
        var isprofessor = el.data("professor");
        if (isprofessor === 0) {
            $("#fieldset-professor").slideUp();
        } else {
            $("#fieldset-professor").slideDown();
        }
    }
    function loadSelectFuncao(el) {
        $.ajax({
            type: "GET",
            url: "api/funcao.php",
            data: {
            }
        }).done(function(data) {
            var funcoes = "";
            $.each(data, function(key, value) {
                funcoes += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            el.html(funcoes);
        }).fail(function() {
        });
    }
    function loadSelectDisciplina(el) {
        $.ajax({
            type: "GET",
            url: "api/disciplina.php",
            data: {
            }
        }).done(function(data) {
            var funcoes = "";
            $.each(data, function(key, value) {
                funcoes += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            el.html(funcoes);
        }).fail(function() {
        });
    }
    function loadSelectPalavra(el) {
        $.ajax({
            type: "GET",
            url: "api/palavrachave.php",
            data: {
            }
        }).done(function(data) {
            var funcoes = "";
            $.each(data, function(key, value) {
                funcoes += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            el.html(funcoes);
        }).fail(function() {
        });
    }
    function loadSelectProjeto(el) {
        $.ajax({
            type: "GET",
            url: "api/projeto.php",
            data: {
            }
        }).done(function(data) {
            var funcoes = "";
            $.each(data, function(key, value) {
                funcoes += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            el.html(funcoes);
        }).fail(function() {
        });
    }
    function loadSelectPesquisa(el) {
        $.ajax({
            type: "GET",
            url: "api/pesquisa.php",
            data: {
            }
        }).done(function(data) {
            var funcoes = "";
            $.each(data, function(key, value) {
                funcoes += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            el.html(funcoes);
        }).fail(function() {
        });
    }
}
)();
