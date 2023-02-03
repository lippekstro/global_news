<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/usuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';

try {
    $usuario = new usuario();

    $nome = htmlspecialchars($_POST['nome_usuario']);
    $senha = $_POST['senha'];
    $email = htmlspecialchars($_POST['email']);
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $usuario->nome_usuario = $nome;
        $usuario->senha = $senha;
        $usuario->email = $email;

        $usuario->criar();

        /* setcookie("msg", "Usuario Cadastrado com Sucesso");
        setcookie("CRIAR", true); */
        header("Location: /global_news/views/admin/gerenciamento_usuario.php");
    } else {
        /* setcookie("msg", "ERRO");
        setcookie("CRIAR", true); */
        header("Location: /global_news/views/admin/gerenciamento_usuario.php");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
