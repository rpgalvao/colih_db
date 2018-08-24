<div class="all_casos">
    <div class="container">
        <h2>Listando todos os casos de <?php echo $_SESSION['nome']; ?></h2>
        <table class="casos">
            <tr>
                <th>Paciente</th>
                <th>Hospital</th>
                <th>Doença de Base</th>
                <th>Médico</th>
                <th>Aberto em...</th>
                <th>Fechado em...</th>
            </tr>
            <?php foreach($todos_casos as $caso):
                if($caso['data_final'] < $caso['data_inicio']){

                }
            ?>
                <tr>
                    <td><a href="<?php echo BASE_URL; ?>casos/editar/<?php echo $caso['id']; ?>"><?php echo $caso['nome']; ?></a></td>
                    <td><?php echo $caso['hospital']; ?></td>
                    <td><?php echo $caso['doenca']; ?></td>
                    <td><?php echo $caso['medico']; ?></td>
                    <td><?php echo date('d/m/Y',strtotime($caso['data_inicio'])); ?></td>
                    <td><?php echo (($caso['data_final'] > $caso['data_inicio'])||($caso['data_final'] == $caso['data_inicio'])) ? date('d/m/Y',strtotime($caso['data_final'])) : "" ; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div><!--container-->
</div><!--casos-->