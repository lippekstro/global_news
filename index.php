<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/postagem.php';

try {
    $lista = Postagem::listar();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<div>
    <div>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="https://source.unsplash.com/random/1920x1080/?mountain" width="100%" height="auto">
            </div>

            <div class="mySlides fade">
                <img src="https://source.unsplash.com/random/1920x1080/?beach" width="100%" height="auto">
            </div>

            <div class="mySlides fade">
                <img src="https://source.unsplash.com/random/1920x1080/?robot" width="100%" height="auto">
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
    <?php if (count($lista) > 0) : ?>
        <section>
            <h1>Últimas Notícias</h1>
            <div class="container-cards">
                <?php foreach ($lista as $post) : ?>
                    <div class="card">
                        <a href="/global_news/views/noticia_aberta.php?id_post=<?= $post['id_post'] ?>">
                            <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($post['imagem']); ?>" alt="Noticia" width="100%" height="auto">
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
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
            </div>
        </section>
    <?php else : ?>
        <section>
            <p>Não há notícias</p>
        </section>
    <?php endif; ?>
</div>


<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>