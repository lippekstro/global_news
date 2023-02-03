<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global News</title>
    <link rel="shortcut icon" href="/global_news/img/newspaper.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/global_news/css/style.css">
    <link rel="stylesheet" href="/global_news/css/carrossel.css">
    <link rel="stylesheet" href="/global_news/css/cards.css">
    <link rel="stylesheet" href="/global_news/css/dropdown.css">
    <link rel="stylesheet" href="/global_news/css/table.css">

</head>

<body>
    <header>
        <div class="container-logo-busca-login">
            <div class="container-logo">
                <img class="imagem-branca" src="/global_news/img/newspaper.svg" width="100%" height="auto">
            </div>

            <form action="">
                <div class="form-item">
                    <input type="text" id="busca" name="busca" placeholder="busque uma noticia">
                    <label for="busca">
                        <button>
                            <span class="material-symbols-outlined">search</span>
                        </button>
                    </label>
                </div>
            </form>

            <div class="dropdown">
                <a href="/global_news/views/admin/login.php">
                    <span class="material-symbols-outlined">login</span>
                </a>
                <div class="dropdown-content">
                    <a href="/global_news/views/admin/gerenciamento_categoria.php">Gerenciamento de Categorias</a>
                    <a href="/global_news/views/admin/gerenciamento_post.php">Gerenciamento de Postagens</a>
                    <a href="/global_news/views/admin/gerenciamento_usuario.php">Gerenciamento de Usuários</a>
                    <a href="/global_news/views/admin/logout.php">Logout</a>
                </div>
            </div>
        </div>

        <nav class="container-menu">
            <ul>
                <li>
                    <a href="/global_news/index.php">Inicio</a>
                </li>
                <li>
                    <div class="dropdown">
                        <a>Categorias</a>
                        <div class="dropdown-content">
                            <a href="/global_news/views/categorias.php?cat=#">Link 1</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="/global_news/views/sobre.php">Sobre</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>