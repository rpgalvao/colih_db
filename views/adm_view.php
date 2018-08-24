<div class="novo-caso">
    <div class="container">
        <h2>Visualizar Caso</h2>
        <form method="post" class="new-caso">
            <div class="form-group">
                <label>Nome do Paciente:</label>
                <input type="text" name="nome" value="<?php echo $info['nome']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Idade:</label>
                <input type="text" name="idade" value="<?php echo $info['idade']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Hospital:</label>
                <input type="text" name="hospital" value="<?php echo $info['hospital']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Morbidade:</label>
                <input type="text" name="doenca" value="<?php echo $info['doenca']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Médico:</label>
                <input type="text" name="medico" value="<?php echo $info['medico']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Data de abertura:</label>
                <input type="date" name="data_inicio" value="<?php echo $info['data_inicio']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Data de fechamento:</label>
                <input type="date" name="data_final" value="<?php echo $info['data_final']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Descrição do caso:</label>
                <textarea name="descricao_caso" disabled><?php echo $info['descricao_caso']; ?></textarea>
            </div><!--form-group-->
            <div class="form-group">
                <label>Contato Principal:</label>
                <input type="text" name="contato_1" value="<?php echo $info['contato_1']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone Contato Principal:</label>
                <input type="text" name="tel_contato1" class="telefone" value="<?php echo $info['tel_contato1']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Contato Opcional 1:</label>
                <input type="text" name="contato_2" value="<?php echo $info['contato_2']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone Contato Opcional 1:</label>
                <input type="text" name="tel_contato2" class="telefone" value="<?php echo $info['tel_contato2']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Contato Opcional 2:</label>
                <input type="text" name="contato_3" value="<?php echo $info['contato_3']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Telefone Contato Opcional 2:</label>
                <input type="text" name="tel_contato3" class="telefone" value="<?php echo $info['tel_contato3']; ?>" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <label>Caso encerrado</label>
                <input type="checkbox" name="fechado" value="1" disabled>
            </div><!--form-group-->
            <div class="form-group">
                <a href="<?php echo BASE_URL; ?>" class="excluir">Voltar</a>
            </div><!--form-group-->
        </form>
    </div><!--container-->
</div><!--novo-caso-->