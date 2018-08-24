

<div class="all_casos">
    <div class="container">
        <h2>Listando as especialidades</h2>
        <table class="casos">
            <?php foreach($info as $esp): ?>
            <tr>
                <td><a href="<?php echo BASE_URL; ?>contatos/editarEspec/<?php echo $esp['id']; ?>"><?php echo $esp['especialidade']; ?></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div><!--container-->
</div><!--casos-->