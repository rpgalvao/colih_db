<div class="novo-caso">
    <div class="container">
        <?php if($aviso): ?>
            <div class="aviso">
                <?php echo (isset($aviso)) ? $aviso : ''; ?>
            </div>
        <?php endif; ?>
        <h2>Inserir novo caso</h2>
        <form method="post" class="new-caso">
            <div class="form-group">
                <label>Nome do Paciente:</label>
                <input type="text" name="nome">
            </div><!--form-group-->
            <div class="form-group">
                <label>Idade:</label>
                <input type="text" name="idade">
            </div><!--form-group-->
            <div class="form-group">
                <label>Hospital:</label>
                <input type="text" name="hospital">
            </div><!--form-group-->
            <div class="form-group">
                <label>Morbidade:</label>
                <input type="text" name="doenca">
            </div><!--form-group-->
            <div class="form-group">
                <label>Médico:</label>
                <input type="text" name="medico">
            </div><!--form-group-->
            <div class="form-group">
                <label>Data de abertura:</label>
                <input type="date" name="data_inicio">
            </div><!--form-group-->
            <div class="form-group">
                <label>Descrição do caso:</label>
                <textarea name="descricao_caso"></textarea>
            </div><!--form-group-->
            <div class="form-group">
                <label>Contato Principal:</label>
                <input type="text" name="contato_1">
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone Contato Principal:</label>
                <input type="text" name="tel_contato1" class="telefone">
            </div><!--form-group-->
            <div class="form-group">
                <label>Contato Opcional 1:</label>
                <input type="text" name="contato_2">
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone Contato Opcional 1:</label>
                <input type="text" name="tel_contato2" class="telefone">
            </div><!--form-group-->
            <div class="form-group">
                <label>Contato Opcional 2:</label>
                <input type="text" name="contato_3">
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone Contato Opcional 2:</label>
                <input type="text" name="tel_contato3" class="telefone">
            </div><!--form-group-->
            <div class="form-group">
                <input type="submit" name="acao" value="Cadastrar">
            </div><!--form-group-->
        </form>
    </div><!--container-->
</div><!--novo-caso-->