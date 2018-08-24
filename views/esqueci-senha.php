<div class="box-login">
    <?php if($erro): ?>
        <div class="erro">
            <?php echo $erro; ?>
        </div>
        <div class="new-user">
            <p>
                <a href="<?php echo BASE_URL; ?>">Página inicial</a>
            </p>
        </div>
        <?php die(); ?>
    <?php elseif($aviso): ?>
        <div class="aviso">
            <?php echo $aviso; ?>
        </div>
        <div class="new-user">
            <p>
                <a href="<?php echo BASE_URL; ?>">Página inicial</a>
            </p>
        </div>
        <?php die(); ?>
    <?php endif; ?>
    <h3>Recupere a sua senha:</h3>
    <form method="post">
        <p>Digite o e-mail usado para se cadastrar!</p>
        <input type="email" name="email" placeholder="E-mail" required>

        <input style="width: auto;padding: 0 15px;" type="submit" name="novaSenha" value="Solicitar Senha">

    </form>
</div><!--box-login-->