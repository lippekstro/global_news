<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/usuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';

try {
    $nome = htmlspecialchars($_POST['nome_usuario']);
    $email = htmlspecialchars($_POST["email"]);
    $nivel_acesso = $_POST["nivel_acesso"];
    $id_usuario = $_POST["id_usuario"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $usuario = new Usuario($id_usuario);
        $usuario->nome_usuario = $nome;
        $usuario->email = $email;
        $usuario->nivel_acesso = $nivel_acesso;

        $usuario->editar_admin();

        /* setcookie("msg", "Usuario Atualizado");
        setcookie("EDITAR", true); */
        header("Location: /global_news/views/admin/gerenciamento_usuario.php");
    } else {
        /* setcookie("msg", "ERRO"); */
        header("Location: /global_news/views/admin/gerenciamento_usuario.php");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
