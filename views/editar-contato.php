<div class="novo-caso">
    <div class="container">
        <?php if($aviso): ?>
            <div class="aviso">
                <?php echo (isset($aviso)) ? $aviso : ''; ?>
            </div>
        <?php endif; ?>
        <h2>Editando contato</h2>
        <form method="post" class="new-caso">
            <div class="form-group">
                <label>Nome do Contato:</label>
                <input type="text" name="nome" value="<?php echo $info['nome'] ?>">
            </div><!--form-group-->
            <div class="form-group">
                <label>Especialidade:</label>
                <select name="especialidade">
                    <?php foreach($especs as $esp): ?>
                        <option value="<?php echo $esp['id']; ?>" <?php echo ($esp['id'] == $info['especialidade'])?'selected':''; ?>><?php echo $esp['especialidade']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone celular:</label>
                <input type="text" name="celular" class="telefone" value="<?php echo $info['celular']; ?>">
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone Contato Principal:</label>
                <input type="text" name="contato_2" class="telefone" value="<?php echo ($info['contato_2'] == '0')?'':$info['contato_2'] ?>">
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone Contato Opcional:</label>
                <input type="text" name="contato_3" class="telefone" value="<?php echo ($info['contato_3'] == '0')?'':$info['contato_3'] ?>">
            </div><!--form-group-->
            <div class="form-group">
                <input type="submit" name="editarContato" value="Atualizar">
                <a href="<?php echo BASE_URL; ?>contatos/excluir/<?php echo $info['id']; ?>" class="excluir">Excluir</a>
            </div><!--form-group-->
        </form>
    </div><!--container-->
</div><!--novo-caso-->