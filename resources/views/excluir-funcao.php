<?php

session_start();

require_once 'class/FuncaoDAO.class.php';

$funcoes = new FuncaoDAO;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if ($id !== FALSE) {
    if ($funcoes->delete($id) == true) {
        $_SESSION['message'] = 'Função excluida com sucesso!';
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