CREATE TABLE funcao (
    funcao          serial PRIMARY KEY,
    descricao       varchar(30) NOT NULL,
    isprofessor     boolean NOT NULL
);

CREATE TABLE servidor (
    id              serial PRIMARY KEY,
    nome            varchar(60) NOT NULL,
    endereco        varchar(150),
    sexo            char(1),
    situacao        char(1),
    nascimento      date,
    admissao        date,
    funcao          integer REFERENCES funcao NOT NULL,
    email           varchar(100),
    telefone        varchar(10),
    celular         varchar(11),
    observacoes     text
);

CREATE TABLE disciplina (
    disciplina      serial PRIMARY KEY,
    descricao       varchar(50) NOT NULL
);

CREATE TABLE pesquisa (
    pesquisa        serial PRIMARY KEY,
    descricao       varchar(50) NOT NULL,
    observacao      text
);

CREATE TABLE projeto (
    projeto         serial PRIMARY KEY,
    descricao       varchar(50) NOT NULL,
    observacao      text
);

CREATE TABLE palavrachave (
    palavrachave    serial PRIMARY KEY,
    descricao       varchar(30) NOT NULL
);

CREATE TABLE professor (
    id              integer REFERENCES servidor ON DELETE CASCADE PRIMARY KEY,
    concurso        integer REFERENCES disciplina ON DELETE RESTRICT,
    area            char(1),
    titulacao       char(1),
    lattes          varchar(200) --
);

CREATE TABLE disciplina_professor (
    professor       integer REFERENCES professor ON DELETE CASCADE,
    disciplina      integer REFERENCES disciplina ON DELETE RESTRICT,
    PRIMARY KEY(professor, disciplina)
);

CREATE TABLE palavrachave_professor (
    professor       integer REFERENCES professor ON DELETE CASCADE,
    palavrachave    integer REFERENCES palavrachave ON DELETE RESTRICT,
    PRIMARY KEY(professor, palavrachave)
);
CREATE TABLE projeto_professor (
    professor       integer REFERENCES professor ON DELETE CASCADE,
    projeto         integer REFERENCES projeto ON DELETE RESTRICT,
    PRIMARY KEY(professor, projeto)
);
CREATE TABLE pesquisa_professor (
    professor        integer REFERENCES professor ON DELETE CASCADE,
    pesquisa         integer REFERENCES pesquisa ON DELETE RESTRICT,
    PRIMARY KEY(professor, pesquisa)
);