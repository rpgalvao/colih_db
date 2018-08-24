<div class="novo-caso">
    <div class="container">
        <?php if($aviso): ?>
            <div class="aviso">
                <?php echo (isset($aviso)) ? $aviso : ''; ?>
            </div>
        <?php endif; ?>
        <h2>Inserir nova especialidade</h2>
        <form method="post" class="new-caso">
            <a style="display: block; margin-bottom: 30px;" href="<?php echo BASE_URL; ?>contatos/cadastrar">Cadastrar Contato</a>
            <div class="form-group">
                <label>Nome da Especialidade:</label>
                <input type="text" name="especialidade">
            </div><!--form-group-->
            <div class="form-group">
                <input type="submit" name="acao" value="Cadastrar">
            </div><!--form-group-->
        </form>
    </div><!--container-->
</div><!--novo-caso-->