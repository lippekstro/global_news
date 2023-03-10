<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/postagem.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/categoria.php';

if ($_POST) {
    try {
        $lista = Postagem::listarPorPalavra($_POST['busca']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    try {
        $lista = Postagem::listarPorCategoria($_GET['id_categoria']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


?>

<?php if (count($lista) > 0) : ?>
    <section>
        <div class="container-cards">
            <?php foreach ($lista as $post) : ?>
                <div class="card">
                    <a href="/global_news/views/noticia_aberta.php?id_post=<?= $post['id_post'] ?>">
                        <div class="img-card">
                            <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($post['imagem']); ?>" alt="Noticia" width="100%" height="auto">
                        </div>

                        <div class="container">
                            <h4><b><?= $post['titulo'] ?></b></h4>
                            <p>
                                <?= $post['conteudo'] ?>
                            </p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php else : ?>
    <section>
        <p>Não há notícias</p>
    </section>
<?php endif; ?>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>