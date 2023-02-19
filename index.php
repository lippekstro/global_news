<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/postagem.php';

$limite = 3; /* define quantos posts por pagina */

try {
    $paginas = Postagem::contarLinhas($limite);
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

$comeca = ($pagina - 1) * $limite;
try {
    $lista = Postagem::listarPaginacao($limite, $comeca);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<?php if (count($lista) > 2) : ?>
    <section>
        <div class="slideshow-container">
            <?php for ($i = 0; $i < 3; $i++) : ?>
                <div class="mySlides fade">
                    <a href="/global_news/views/noticia_aberta.php?id_post=<?= $lista[$i]['id_post'] ?>">
                        <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($lista[$i]['imagem']); ?>" alt="Noticia" width="100%" height="auto">
                        <div class="texto-foto">
                            <p><?= $lista[$i]['titulo'] ?></p>
                        </div>
                    </a>
                </div>
            <?php endfor; ?>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </section>
<?php endif; ?>

<?php if (count($lista) > 0) : ?>
    <section>
        <h1>Últimas Notícias</h1>
        <div class="container-cards">
            <?php foreach ($lista as $post) : ?>
                <div class="card">
                    <a href="/global_news/views/noticia_aberta.php?id_post=<?= $post['id_post'] ?>">
                        <div class="img-card">
                            <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($post['imagem']); ?>" alt="Noticia">
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
        <div class="pagination">
            <?php if ($pagina == 1) : ?><!-- logica para a pagina 1 -->
                <a href="index.php?pagina=<?= $pagina - 1 ?>" style="display: none;">&laquo;</a>
            <?php else : ?>
                <a href="index.php?pagina=<?= $pagina - 1 ?>">&laquo;</a>
            <?php endif; ?>

            <?php for ($i = 1; $i < $paginas + 1; $i++) : ?> <!-- gerador das paginas -->
                <a class="active" href="index.php?pagina=<?= $i ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($pagina == $paginas) : ?><!-- logica para ultima pagina -->
                <a href="index.php?pagina=<?= $pagina + 1 ?>" style="display: none;">&raquo;</a>
            <?php else : ?>
                <a href="index.php?pagina=<?= $pagina + 1 ?>">&raquo;</a>
            <?php endif; ?>
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