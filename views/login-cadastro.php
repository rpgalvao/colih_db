<div class="box-login">
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
    <?php endif; ?>
    <h3>Cadastre-se no sistema:</h3>
    <form method="post">
        <input type="text" name="nome" placeholder="Seu Nome" required>
        <input type="email" name="email" placeholder="Seu E-mail" required>
        <input type="text" name="usuario" placeholder="Nome de Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>

        <input type="submit" name="acao" value="Cadastrar">
        <div class="clear"></div>
    </form>


</div><!--box-login-->