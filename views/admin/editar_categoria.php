<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/categoria.php';

try {
    $id_categoria = $_GET['id_categoria'];
    $categoria = new Categoria($id_categoria);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<div class="container-cadastro-cat">
    <h1>Cadastro de Categoria</h1>
    <form action="/global_news/controllers/edita_categoria_controller.php" method="post">
        <input type="hidden" name="id_categoria" value="<?= $categoria->id_categoria ?>">
        <div class="row">
            <div class="col-25">
                <label for="nome_categoria">Nome</label>
            </div>
            <div class="col-75">
                <input type="text" id="nome_categoria" name="nome_categoria" placeholder="Nome da Categoria" value="<?= $categoria->nome_categoria ?>" required>
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