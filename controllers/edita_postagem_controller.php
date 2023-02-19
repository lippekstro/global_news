<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/postagem.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';

try {
    $titulo = htmlspecialchars($_POST['titulo']);
    $conteudo = htmlspecialchars($_POST['conteudo']);
    $id_categoria = $_POST['categoria'];
    $id_postagem = $_POST['id_postagem'];
    if (!empty($_FILES['imagem']['tmp_name'])){
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    }

    $postagem = new Postagem($id_postagem);
    $postagem->titulo = $titulo;
    $postagem->conteudo = $conteudo;
    $postagem->id_categoria = $id_categoria;
    if($imagem){
        $postagem->imagem = $imagem;
        $postagem->editarComImagem();
    } else {
        $postagem->editar_postagem();
    }

    $postagem->editar_postagem();

    /* setcookie("msg", "Categoria Editada");
    setcookie("EDITAR", true); */
    header("Location: /global_news/views/admin/gerenciamento_post.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
