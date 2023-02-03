<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/db/conexao.php';
session_start();
$email = $_REQUEST['email'];
$senha = $_REQUEST['senha'];

try {
    $query = "select * from usuario where email = :email LIMIT 1";
    $conexao = Conexao::conectar();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
        if (password_verify($senha, $registro['senha'])) {
            $_SESSION['usuario']['nome_usuario'] = $registro['nome_usuario'];
            $_SESSION['usuario']['email'] = $registro['email'];
            $_SESSION['usuario']['id_usuario'] = $registro['id_usuario'];
            $_SESSION['usuario']['nivel_acesso'] = $registro['nivel_acesso'];

            header("Location: /global_news/index.php");
        } else {
            $erroMsg[] = "Email ou Senha errado";
            header("Location: /global_news/views/admin/login.php");
        }
    } else {
        $erroMsg[] = "Email ou Senha errado";
        header("Location: /global_news/views/admin/login.php");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
