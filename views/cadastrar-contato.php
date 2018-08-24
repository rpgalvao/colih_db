<div class="novo-caso">
    <div class="container">
        <?php if($aviso): ?>
            <div class="aviso">
                <?php echo (isset($aviso)) ? $aviso : ''; ?>
            </div>
        <?php endif; ?>
        <h2>Inserir novo contato</h2>
        <form method="post" class="new-caso">
            <a style="display: inline-block; margin-bottom: 30px;" href="<?php echo BASE_URL; ?>contatos/cadastrarEspec">Cadastrar Especialidade</a>
            <div class="form-group">
                <label>Nome do Contato:</label>
                <input type="text" name="nome">
            </div><!--form-group-->
            <div class="form-group">
                <label>Especialidade:</label>
                <select name="especialidade">
                    <?php foreach($especs as $esp): ?>
                        <option value="<?php echo $esp['id']; ?>"><?php echo $esp['especialidade']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone celular:</label>
                <input type="text" name="celular" class="telefone">
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone Contato Principal:</label>
                <input type="text" name="contato_2" class="telefone">
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone Contato Opcional:</label>
                <input type="text" name="contato_3" class="telefone">
            </div><!--form-group-->
            <div class="form-group">
                <input type="submit" name="acao" value="Cadastrar">
            </div><!--form-group-->
        </form>
    </div><!--container-->
</div><!--novo-caso-->