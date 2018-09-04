<div class="last_casos">
    <div class="container">
        <nav class="admin">
            <ul>
                <li><a class="convite" href="<?php echo BASE_URL; ?>admin/novoMembro">Convidar Membro</a></li>
                <li><a class="convite" href="<?php echo BASE_URL; ?>admin/users">Listar Usuários</a></li>
                <li><a class="convite" href="<?php echo BASE_URL; ?>casos/todos">Todos os casos</a></li>
            </ul>
        </nav>
        <h2>Estatísticas</h2>
        <table style="margin-top: 30px;width: 50%;" class="casos">
            <tr>
                <th>Total de Casos</th>
                <th><?php echo $total;?></th>
            </tr>
            <tr>
                <th>Casos Abertos</th>
                <th><?php  echo $abertos; ?></th>
            </tr>
        </table>
    </div><!--container-->
</div><!--last_casos-->