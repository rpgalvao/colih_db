<div class="all_casos">
    <div class="container">
        <?php if($erro): ?>
            <div class="erro">
                <?php echo $erro; die();?>
            </div>
        <?php endif; ?>
        <h2>Listando todos os casos registrados</h2>
        <table class="casos">
            <tr>
                <th>Paciente</th>
                <th>Hospital</th>
                <th>Doença de Base</th>
                <th>Médico</th>
                <th>Aberto em...</th>
                <th>Fechado em...</th>
                <th>Membro</th>
            </tr>
            <?php foreach($todos as $caso):
                if($caso['data_final'] < $caso['data_inicio']){

                }
                ?>
                <tr>
                    <td><a href="<?php echo BASE_URL; ?>casos/admview/<?php echo $caso['id']; ?>"><?php echo $caso['nome']; ?></a></td>
                    <td><?php echo $caso['hospital']; ?></td>
                    <td><?php echo $caso['doenca']; ?></td>
                    <td><?php echo $caso['medico']; ?></td>
                    <td><?php echo date('d/m/Y',strtotime($caso['data_inicio'])); ?></td>
                    <td><?php echo (($caso['data_final'] > $caso['data_inicio'])||($caso['data_final'] == $caso['data_inicio'])) ? date('d/m/Y',strtotime($caso['data_final'])) : "" ; ?></td>
                    <td><?php echo $caso['username']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div><!--container-->
</div><!--casos-->