<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/categoria.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';

try {
    $id_categoria = $_GET['id_categoria'];

    $nome_categoria = new Categoria($id_categoria);

    $nome_categoria->deletar();

   /*  setcookie("msg", "Categoria Deletada");
    setcookie("DELETAR", true); */
    header("Location: /global_news/views/admin/gerenciamento_categoria.php");
} catch (Exception $e) {
    echo $e->getMessage();
}
