<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/models/usuario.php';

try {
    $id_usuario = $_GET['id_usuario'];
    $usuario = new Usuario($id_usuario);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<div class="container-cadastro-cat">
    <h1>Cadastro de Usuario</h1>
    <form action="/global_news/controllers/edita_usuario_controller.php" method="post">
        <input type="hidden" name="id_usuario" value="<?= $usuario->id_usuario ?>">
        <div class="row">
            <div class="col-25">
                <label for="nome_usuario">Nome</label>
            </div>
            <div class="col-75">
                <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Nome" value="<?= $usuario->nome_usuario ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="email">E-mail</label>
            </div>
            <div class="col-75">
                <input type="email" id="email" name="email" placeholder="E-Mail" value="<?= $usuario->email ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="nivel_acesso">Nível de Acesso</label>
            </div>
            <div class="col-75">
                <input type="number" id="nivel_acesso" name="nivel_acesso" placeholder="Nível de Acesso" value="<?= $usuario->nivel_acesso ?>" required>
            </div>
        </div>
        <div class="row" style="align-self: flex-end;">
            <button type="submit" class="sucesso">Atualizar Usuário</button>
        </div>
    </form>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>