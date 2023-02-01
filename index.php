<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
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
    <section>
        <h1>Últimas Notícias</h1>
        <div class="container-cards">
            <?php for ($i = 0; $i < 10; $i++) : ?>
                <div class="card">
                    <a href="">
                        <img src="https://source.unsplash.com/random/1920x1080/?programming" width="100%" height="auto">
                        <div class="container">
                            <h4><b>John Doe</b></h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Libero, molestiae? Deleniti quam fugiat explicabo rem quo veritatis hic nam est ratione eius. 
                                Autem temporibus, at officiis iste reprehenderit atque odit?
                            </p>
                        </div>
                    </a>
                </div>
            <?php endfor; ?>
        </div>
    </section>
</div>


<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>