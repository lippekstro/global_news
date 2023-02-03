<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
?>

<div>
    <section class="titulo">
        <div>
            <h1>Lorem Ipsum</h1>
            <div class="container-autor">
                <span>Por Fulano</span>
                <span><?= date('today') ?></span>
            </div>
        </div>
        <div>
            <img src="https://source.unsplash.com/random/1920x1080/?mountain" alt="" width="100%" height="auto">
        </div>
    </section>
    <hr>
    <section class="conteudo">
        <div>
            <?php for ($i=0; $i < 5; $i++): ?>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius provident dignissimos sunt, 
                incidunt id dolore est tempore, 
                ipsa a suscipit nesciunt temporibus sed ut vitae corporis rerum culpa soluta distinctio!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores mollitia ab ut, 
                quibusdam recusandae nam voluptatum esse libero blanditiis voluptatem fugiat veniam illum vitae cum quis earum, 
                quidem id eligendi.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias repellat saepe illo! Tempore at porro, 
                voluptas nulla quam sint molestias, 
                eligendi magni et blanditiis ex minima quasi quae hic commodi!
            </p>
            <?php endfor; ?>
        </div>
    </section>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>