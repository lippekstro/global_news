<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
?>

<div class="container-cadastro-cat">
    <h1>Cadastro de Usuario</h1>
    <form action="adiciona_usuario_controller.php" method="post">
        <div class="row">
            <div class="col-25">
                <label for="nome">Nome</label>
            </div>
            <div class="col-75">
                <input type="text" id="nome" name="nome" placeholder="Nome" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="email">E-mail</label>
            </div>
            <div class="col-75">
                <input type="email" id="email" name="email" placeholder="E-Mail" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="senha">Senha</label>
            </div>
            <div class="col-75">
                <input type="password" id="senha" name="senha" placeholder="Senha" required>
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