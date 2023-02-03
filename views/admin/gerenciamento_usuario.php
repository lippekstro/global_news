<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
?>

<section class="container-table">
    <table>
        <caption>Gerenciamento de Usuários</caption>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Email</th>
            <th colspan="2">
                <a href="/global_news/views/admin/cadastrar_usuario.php">
                    <span class="material-symbols-outlined">add</span>
                </a>
            </th>
        </tr>

        <?php for ($i = 0; $i < 4; $i++) : ?>
            <tr>
                <td>1</td>
                <td>Teste</td>
                <td>teste@mail.com</td>
                <td>
                    <a href="/global_news/views/admin/editar_usuario.php?id_usuario=#">
                        <span class="material-symbols-outlined">edit</span>
                    </a>
                </td>
                <td>
                    <a href="/global_news/controllers/deleta_usuario_controller.php?id_usuario=#">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </td>
            </tr>
        <?php endfor; ?>
    </table>
</section>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>