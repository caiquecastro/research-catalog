CREATE VIEW vw_servidor AS
        SELECT servidor.id, nome, endereco, email, nascimento, admissao, telefone, celular,
    CASE WHEN sexo='M' THEN 'Masculino'
         WHEN sexo='F' THEN 'Feminino'
         ELSE 'Outro' END as sexo,
    CASE WHEN situacao = 'A' THEN 'Efetivo'
         WHEN situacao = 'B' THEN 'Exonerado'
         WHEN situacao = 'C' THEN 'Aposentado'
         WHEN situacao = 'D' THEN 'Afastado'
         ELSE 'Outro' END as situacao,
    CASE WHEN area = 'E' THEN 'Exatas'
         WHEN area = 'B' THEN 'Biociências'
         WHEN area = 'H' THEN 'Humanas'
         WHEN area IS NULL THEN 'N/A'
         ELSE 'Outro' END as area,
    CASE WHEN titulacao = 'E' THEN 'Especialista'
         WHEN titulacao = 'M' THEN 'Mestre'
         WHEN titulacao = 'D' THEN 'Doutor'
         WHEN titulacao = 'P' THEN 'PhD'
         WHEN titulacao IS NULL THEN 'N/A'
         ELSE 'Outro' END as titulacao,
    funcao.descricao as funcao, COALESCE(disciplina.descricao, 'N/A') as concurso, COALESCE(lattes, 'N/A') as lattes, (SELECT array_to_string(array_agg(disciplina.descricao), ', ') FROM disciplina_professor NATURAL JOIN disciplina NATURAL JOIN professor WHERE professor = servidor.id)
    FROM servidor
    INNER JOIN funcao ON servidor.funcao=funcao.funcao
    LEFT JOIN professor ON servidor.id=professor.id
    LEFT JOIN disciplina ON professor.concurso = disciplina.disciplina;