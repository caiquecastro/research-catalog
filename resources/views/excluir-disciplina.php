<?php

session_start();

require_once 'class/DisciplinaDAO.class.php';

$disciplinas = new DisciplinaDAO;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if ($id !== false) {
    if ($disciplinas->delete($id) == true) {
        $_SESSION['message'] = 'Disciplina excluida com sucesso!';
        $_SESSION['messageType'] = 'success';
    } else {
        $_SESSION['message'] = 'Erro ao excluir registro';
        $_SESSION['messageType'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Parametro inválido para excluir';
    $_SESSION['messageType'] = 'danger';
}
header("Location:".$_SERVER['HTTP_REFERER']);