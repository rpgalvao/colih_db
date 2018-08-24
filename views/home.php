<?php
intval($totalAbertos);
if($totalAbertos == 1){
    $txt = 'caso aberto';
}else{
    $txt = 'casos abertos';
}
?>
<div class="last_casos">
    <div class="container">
        <h2>Olá <?php echo $_SESSION['nome'];?> - Você possui <?php echo $totalAbertos; ?> <?php echo $txt; ?></h2>
        <table class="casos">
            <tr>
                <th>Paciente</th>
                <th>Hospital</th>
                <th>Doença de Base</th>
                <th>Médico</th>
                <th>Contato Principal</th>
                <th>Telefone Contato</th>
            </tr>
            <?php foreach($abertos as $caso): ?>
                <tr>
                    <td><a href="<?php echo BASE_URL; ?>casos/editar/<?php echo $caso['id']; ?>"><?php echo $caso['nome']; ?></a></td>
                    <td><?php echo $caso['hospital']; ?></td>
                    <td><?php echo $caso['doenca']; ?></td>
                    <td><?php echo $caso['medico']; ?></td>
                    <td><?php echo $caso['contato_1']; ?></td>
                    <td><?php echo $caso['tel_contato1']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div><!--container-->
</div><!--last_casos-->