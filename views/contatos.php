<div class="contatos">
    <div class="container">
        <h2>Contatos</h2>
        <p>
            <a href="<?php echo BASE_URL; ?>contatos/cadastrar">Cadastrar Contato</a> | <a style="display: inline-block; margin-bottom: 10px;" href="<?php echo BASE_URL; ?>contatos/listarEspecs">Listar Especialidades</a>
        </p>
        <form method="post">
            <p>Buscar por especialidade:</p>
            <select name="especialidade">
                <option value="">Todas as especialidades</option>
                <?php foreach($especs as $esp): ?>
                    <option value="<?php echo $esp['id']; ?>"><?php echo $esp['especialidade']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="acao" value="Buscar">
        </form>
        <table class="casos">
            <tr>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Celular</th>
                <th>Contato Principal</th>
                <th>Contato Opcional</th>
            </tr>
            <?php foreach($contatos as $con): ?>
                <tr>
                    <td><a href="<?php echo BASE_URL ?>contatos/editar/<?php echo $con['id']; ?>"><?php echo $con['nome']; ?></a></td>
                    <td><?php echo $con['esp']; ?></td>
                    <td><?php echo $con['celular']; ?></td>
                    <td><?php echo ($con['contato_2'] == '0')?'':$con['contato_2']; ?></td>
                    <td><?php echo ($con['contato_3'] == '0')?'':$con['contato_3']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div><!--container-->
</div><!--contatos-->