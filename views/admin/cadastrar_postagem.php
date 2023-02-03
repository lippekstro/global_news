<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
?>

<div class="container-cadastro-cat">
    <h1>Cadastro de Postagem</h1>
    <form action="adiciona_postagem_controller.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-25">
                <label for="titulo">Título</label>
            </div>
            <div class="col-75">
                <input type="text" id="titulo" name="titulo" placeholder="Título">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="categoria">Categoria</label>
            </div>
            <div class="col-75">
                <select id="categoria" name="categoria">
                    <option value="esportes">Esportes</option>
                    <option value="local">Local</option>
                    <option value="economia">Economia</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="conteudo">Conteúdo</label>
            </div>
            <div class="col-75">
                <textarea id="conteudo" name="conteudo" placeholder="Escreva uma nova notícia..." style="height:200px"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="imagem">Imagem</label>
            </div>
            <div class="col-75">
                <input type="file" id="imagem" name="imagem">
            </div>
        </div>
        <div class="row" style="align-self: flex-end;">
            <button type="submit" class="sucesso">Postar</button>
        </div>
    </form>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>