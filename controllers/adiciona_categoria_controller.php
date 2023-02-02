<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/categoria.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';

try {
    $nome_categoria = htmlspecialchars($_POST['nome']);

    $categoria = new Categoria();
    $categoria->nome_categoria = $nome_categoria;
    $categoria->criar();

    /* setcookie("msg", "Categoria Criada com Sucesso");
    setcookie("CRIAR", true); */
    header("Location: /global_news/views/admin/gerenciamento_categoria.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}