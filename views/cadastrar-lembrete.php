<div class="novo-caso">
    <div class="container">
        <?php if($aviso): ?>
            <div class="aviso">
                <?php echo (isset($aviso)) ? $aviso : ''; ?>
            </div>
        <?php endif; ?>
        <h2>Inserir novo lembrete</h2>
        <form method="post" class="new-caso">
            <div class="form-group">
                <label>Lembrete:</label>
                <textarea name="lembrete"></textarea>
            </div><!--form-group-->
            <div class="form-group">
                <input type="submit" name="acao" value="Cadastrar">
            </div><!--form-group-->
        </form>
    </div><!--container-->
</div><!--novo-caso-->