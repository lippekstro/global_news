<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/postagem.php';

if(!isset($_SESSION['usuario'])){
    header('location: /global_news/index.php');
}

try {
    $lista = Postagem::listar();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<section class="container-table">
    <table>
        <caption>Gerenciamento de Postagens</caption>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Data</th>
            <th>Categoria</th>
            <th colspan="2">
                <a href="/global_news/views/admin/cadastrar_postagem.php">
                    <span class="material-symbols-outlined">add</span>
                </a>
            </th>
        </tr>

        <?php foreach($lista as $post) : ?>
            <tr>
                <td><?= $post['titulo'] ?></td>
                <td><?= $post['nome_autor'] ?></td>
                <td><?= $post['data_pub'] ?></td>
                <td><?= $post['nome_categoria'] ?></td>
                <td>
                    <a href="/global_news/views/admin/editar_postagem.php?id_post=<?= $post['id_post'] ?>">
                        <span class="material-symbols-outlined">edit</span>
                    </a>
                </td>
                <td>
                    <a href="/global_news/controllers/deleta_postagem_controller.php?id_post=<?= $post['id_post'] ?>">
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