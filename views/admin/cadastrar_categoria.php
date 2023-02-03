<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
?>

<div class="container-cadastro-cat">
    <h1>Cadastro de Categoria</h1>
    <form action="/global_news/controllers/adiciona_categoria_controller.php" method="post">
        <div class="row">
            <div class="col-25">
                <label for="nome_categoria">Nome</label>
            </div>
            <div class="col-75">
                <input type="text" id="nome_categoria" name="nome_categoria" placeholder="Nome da Categoria" required>
            </div>
        </div>
        <div class="row" style="align-self: flex-end;">
            <button type="submit" class="sucesso">Cadastrar</button>
        </div>
    </form>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>