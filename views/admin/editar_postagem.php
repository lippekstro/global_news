<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/categoria.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/postagem.php';

if(!isset($_SESSION['usuario'])){
    header('location: /global_news/index.php');
}

try {
    $lista = Categoria::listar();
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $id_post = $_GET['id_post'];
    $postagem = new Postagem($id_post);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<div class="container-cadastro-cat">
    <h1>Cadastro de Postagem</h1>
    <form action="/global_news/controllers/edita_postagem_controller.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_postagem" value="<?= $postagem->id_post ?>">
        <div class="row">
            <div class="col-25">
                <label for="titulo">Título</label>
            </div>
            <div class="col-75">
                <input type="text" id="titulo" name="titulo" placeholder="Título" value="<?= $postagem->titulo ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="categoria">Categoria</label>
            </div>
            <div class="col-75">
                <select id="categoria" name="categoria">
                    <?php foreach ($lista as $categoria) :
                        $verificaCat = $postagem->id_categoria == $categoria['id_categoria'];
                        $selecionaCat = $verificaCat ? "selected='select'" : "";
                    ?>
                        <option value="<?= $categoria['id_categoria'] ?>" <?= $selecionaCat ?>><?= $categoria['nome_categoria'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="conteudo">Conteúdo</label>
            </div>
            <div class="col-75">
                <textarea id="conteudo" name="conteudo" placeholder="Escreva uma nova notícia..." style="height:200px">
                <?= $postagem->conteudo ?>
                </textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="imagem">Imagem</label>
            </div>
            <div class="col-75">
                <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($postagem->imagem); ?>" alt="Noticia" width="200rem" height="200rem">
                <input type="file" id="imagem" name="imagem">
            </div>
        </div>
        <div class="row" style="align-self: flex-end;">
            <button type="submit" class="sucesso">Atualizar Post</button>
        </div>
    </form>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>