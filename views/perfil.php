<div style="position: relative;top: 250px;" class="box-login">
    <?php if($erro): ?>
        <div class="erro">
            <?php echo $erro;?>
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
                <a href="<?php echo BASE_URL; ?>login">Faça seu login!</a>
            </p>
        </div>
        <?php die(); ?>
    <?php endif;
    foreach($infos as $info): ?>
        <h3>Meu perfil</h3>
        <form method="post">
            <input type="text" name="nome" value="<?php echo $info['nome']; ?>" required>
            <input type="email" name="email" value="<?php echo $info['email']; ?>" required>
            <input type="text" name="usuario" value="<?php echo $info['usuario']; ?>" disabled>
            <input type="password" name="senha" placeholder="Nova Senha" >

            <input type="submit" name="atualizar" value="Atualizar">
            <div class="clear"></div>
        </form>
    <?php endforeach; ?>
</div><!--box-login-->