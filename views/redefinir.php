<div class="box-login">
    <?php if($erro): ?>
        <div class="erro">
            <?php echo $erro; ?>
        </div>
        <div style="float: right;" class="new-user">
        <p>
            <a href="<?php echo BASE_URL; ?>login">Faça seu login!</a>
        </p>
    </div>
    <?php die(); ?>
    <?php elseif($aviso): ?>
        <div class="aviso">
            <?php echo $aviso; ?>
        </div>
    <?php endif; ?>
    <h3>Redefina a sua senha:</h3>
    <form method="post">
        <p>Digite uma nova senha para seu acesso</p>
        <input type="password" name="senha" placeholder="Nova Senha" required>

        <input style="width: auto;padding: 0 15px;" type="submit" name="redefinir" value="Nova Senha">

    </form>
    <div style="float: right;" class="new-user">
        <p>
            <a href="<?php echo BASE_URL; ?>login">Faça seu login!</a>
        </p>
    </div>
    <div class="clear"></div>
</div><!--box-login-->