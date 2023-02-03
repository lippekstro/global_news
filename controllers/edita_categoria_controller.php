<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/categoria.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';

try {
    $id_categoria = $_POST['id_categoria'];
    $nome_categoria = htmlspecialchars($_POST['nome_categoria']);
    $categoria = new Categoria($id_categoria);
    $categoria->nome_categoria = $nome_categoria;

    $categoria->editar();

    /* setcookie("msg", "Categoria Editada");
    setcookie("EDITAR", true); */
    header("Location: /global_news/views/admin/gerenciamento_categoria.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
