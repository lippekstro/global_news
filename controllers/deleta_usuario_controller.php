<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/usuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';

try {
    $id_usuario = $_GET['id_usuario'];

    $nome = new usuario($id_usuario); 
    $nome->deletar();

    /* setcookie("msg", "Usuario Deletado");
    setcookie("DELETAR", true); */
    header("Location: /global_news/views/admin/gerenciamento_usuario.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}