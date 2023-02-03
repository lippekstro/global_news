<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/categoria.php';

try {
    $lista = Categoria::listar();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<section class="container-table">
    <table>
        <caption>Gerenciamento de Categorias</caption>
        <tr>
            <th>Nome</th>
            <th colspan="2">
                <a href="/global_news/views/admin/cadastrar_categoria.php">
                    <span class="material-symbols-outlined">add</span>
                </a>
            </th>
        </tr>

        <?php foreach ($lista as $categoria) : ?>
            <tr>
                <td><?= $categoria['nome_categoria'] ?></td>
                <td>
                    <a href="/global_news/views/admin/editar_categoria.php?id_categoria=<?= $categoria['id_categoria'] ?>">
                        <span class="material-symbols-outlined">edit</span>
                    </a>
                </td>
                <td>
                    <a href="/global_news/controllers/deleta_categoria_controller.php?id_categoria=<?= $categoria['id_categoria'] ?>">
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