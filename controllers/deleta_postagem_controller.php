<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/postagem.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';

try {
    $id = $_GET['id_post'];

    $postagem = new Postagem($id);

    $postagem->deletar();

   /*  setcookie("msg", "Categoria Deletada");
    setcookie("DELETAR", true); */
    header("Location: /global_news/views/admin/gerenciamento_post.php");
} catch (Exception $e) {
    echo $e->getMessage();
}
