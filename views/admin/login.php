<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/cabecalho.php';
?>

<div class="container-login">
    <section class="section-form">
        <form action="login_controller.php" method="post">
            <div class="form-item">
                <label for="usuario">
                    <span class="material-symbols-outlined">person</span>
                </label>
                <input type="text" name="usuario" id="usuario" placeholder="Usuário">
            </div>

            <div class="form-item">
                <label for="senha">
                    <span class="material-symbols-outlined">password</span>
                </label>
                <input type="password" name="senha" id="senha" placeholder="Senha">
            </div>

            <div class="form-item">
                <button type="submit" class="sucesso">Login</button>
            </div>
        </form>
    </section>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/global_news/templates/rodape.php';
?>