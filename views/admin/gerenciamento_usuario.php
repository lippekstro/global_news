<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/usuario.php';

try {
    $lista = Usuario::listar();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<section class="container-table">
    <table>
        <caption>Gerenciamento de Usuários</caption>
        <tr>
            <th>Usuário</th>
            <th>Email</th>
            <th>Nível de Acesso</th>
            <th colspan="2">
                <a href="/global_news/views/admin/cadastrar_usuario.php">
                    <span class="material-symbols-outlined">add</span>
                </a>
            </th>
        </tr>

        <?php foreach ($lista as $usuario) : ?>
            <tr>
                <td><?= $usuario['nome_usuario'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td><?= $usuario['nivel_acesso'] ?></td>
                <td>
                    <a href="/global_news/views/admin/editar_usuario.php?id_usuario=<?= $usuario['id_usuario'] ?>">
                        <span class="material-symbols-outlined">edit</span>
                    </a>
                </td>
                <td>
                    <a href="/global_news/controllers/deleta_usuario_controller.php?id_usuario=<?= $usuario['id_usuario'] ?>">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>