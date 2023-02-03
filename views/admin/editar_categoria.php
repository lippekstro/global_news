<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
?>

<div class="container-cadastro-cat">
    <h1>Cadastro de Categoria</h1>
    <form action="adiciona_categoria_controller.php" method="post">
        <input type="hidden" name="id_categoria" value="">
        <div class="row">
            <div class="col-25">
                <label for="nome_categoria">Nome</label>
            </div>
            <div class="col-75">
                <input type="text" id="nome_categoria" name="nome_categoria" placeholder="Nome da Categoria" value="" required>
            </div>
        </div>
        <div class="row" style="align-self: flex-end;">
            <button type="submit" class="sucesso">Atualizar Categoria</button>
        </div>
    </form>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>