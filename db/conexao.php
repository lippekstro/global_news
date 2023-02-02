<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/configs/config.php';

class Conexao
{
    public static function conectar()
    {
        $conn = new PDO(DB_DRIVE . ":host=" . NOME_SERVIDOR . ";dbname=" . NOME_BANCO, USUARIO, SENHA);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}
