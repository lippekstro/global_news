<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/postagem.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';
session_start();

try {
    $titulo = htmlspecialchars($_POST['titulo']);
    $conteudo = htmlspecialchars($_POST['conteudo']);
    $id_autor = $_SESSION['usuario']['id_usuario'];
    $id_categoria = $_POST['categoria'];
    if (!empty($_FILES['imagem']['tmp_name'])){
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    }

    $postagem = new Postagem();
    $postagem->titulo= $titulo;
    $postagem->conteudo = $conteudo;
    $postagem->imagem = $imagem;
    $postagem->id_usuario  = $id_autor;
    $postagem->id_categoria = $id_categoria;
    
    $postagem->inserir();

    /* setcookie("msg", "Categoria Criada com Sucesso");
    setcookie("CRIAR", true); */
    header("Location: /global_news/views/admin/gerenciamento_post.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}