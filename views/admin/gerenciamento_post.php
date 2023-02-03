<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
?>

<section class="container-table">
    <table>
        <caption>Gerenciamento de Categorias</caption>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Data</th>
            <th colspan="2">
                <a href="/global_news/views/admin/cadastrar_postagem.php">
                    <span class="material-symbols-outlined">add</span>
                </a>
            </th>
        </tr>

        <?php for ($i = 0; $i < 4; $i++) : ?>
            <tr>
                <td>Lorem Ipsum</td>
                <td>Teste</td>
                <td><?= date('today') ?></td>
                <td>
                    <a href="">
                        <span class="material-symbols-outlined">edit</span>
                    </a>
                </td>
                <td>
                    <a href="">
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