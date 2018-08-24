<div class="box-login">
    <?php if($erro): ?>
        <div style="width: 100%;" class="erro">
            <?php echo $erro; ?>
        </div>
    <?php endif; ?>
    <h3>Faça o seu login:</h3>
    <form method="post">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="submit" name="acao" value="Login">
        <label>Lembrar-me</label>
        <input type="checkbox" name="lembrar">
    </form>
    <div class="clear"></div>
    <div class="new-user">
        <p>
            <a id="esqueci" href="<?php echo BASE_URL; ?>login/esqueci">Esqueci a senha</a>
        </p>
    </div>
</div><!--box-login-->