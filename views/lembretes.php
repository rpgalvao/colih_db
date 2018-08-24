<div class="lembretes">
    <div class="container">
        <h2>Lembretes</h2>
        <a href="<?php echo BASE_URL; ?>lembretes/cadastrar">Cadastrar Lembrete</a>
        <table class="tabela-lembrete">
            <?php  foreach($lembretes as $lembrete): ?>
                <tr>
                    <td><a href="<?php BASE_URL; ?>lembretes/editar/<?php echo $lembrete['id']; ?>"><?php echo $lembrete['id']; ?></a></td>
                    <td><?php echo $lembrete['lembrete']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div><!--container-->
</div><!--lembretes-->