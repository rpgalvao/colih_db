<div class="novo-caso">
    <div class="container">
        <?php if($aviso): ?>
            <div class="aviso">
                <?php echo (isset($aviso)) ? $aviso : ''; ?>
            </div>
        <?php endif; ?>
        <h2>Editar especialidade</h2>
        <form method="post" class="new-caso">
            <div class="form-group">
                <label>Nome da Especialidade:</label>
                <input type="text" name="especialidade" value="<?php echo $info['especialidade']; ?>">
            </div><!--form-group-->
            <div class="form-group">
                <input type="submit" name="editarEspec" value="Editar">
                <a href="<?php echo BASE_URL; ?>contatos/excluirEspec/<?php echo $info['id']; ?>" class="excluir">Excluir</a>
            </div><!--form-group-->
        </form>
    </div><!--container-->
</div><!--novo-caso-->