<div class="box-login">
    <?php if(isset($erro)): ?>
        <div class="erro">
            <?php echo $erro;?>
        </div>
        <div class="new-user">
            <p>
                <a href="<?php echo BASE_URL; ?>admin">Página administrativa</a>
            </p>
        </div>
        <?php die(); ?>
    <?php elseif(isset($aviso)): ?>
        <div class="aviso">
            <?php echo $aviso; ?>
        </div>
        <div class="new-user">
            <p>
                <a href="<?php echo BASE_URL; ?>admin">Página administrativa</a>
            </p>
        </div>
        <?php die(); ?>
    <?php endif; ?>
    <h3>Insira o e-mail do novo membro:</h3>
    <form method="post">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="submit" name="acao" value="Convidar">
    </form>
</div><!--box-login-->