<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/postagem.php';

try {
    $id = $_GET['id_post'];
    $post = new Postagem($id);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<div>
    <article>
        <section class="titulo">
            <div>
                <h1><?= $post->titulo ?></h1>
                <div class="container-autor">
                    <span>Por <?= $post->getNomeAutor() ?></span>
                    <span><?= $post->data_pub ?></span>
                </div>
            </div>
            <div>
                <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($post->imagem); ?>" alt="Noticia" width="100%" height="auto">
            </div>
        </section>
        <hr>
        <section class="conteudo">
            <?php
            $conteudo = $post->conteudo;
            $texto_quebrado = explode("<br />", nl2br($conteudo));
            foreach ($texto_quebrado as $paragrafo) :
            ?>
                <p>
                    <?= $paragrafo ?>
                </p>
            <?php endforeach; ?>
        </section>
    </article>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>