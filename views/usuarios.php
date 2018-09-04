<div class="last_casos">
    <div class="container">
        <nav class="admin">
            <ul>
                <li><a class="convite" href="<?php echo BASE_URL; ?>admin/novoMembro">Convidar Membro</a></li>
                <li><a class="convite" href="<?php echo BASE_URL; ?>admin">Estatísticas</a></li>
                <li><a class="convite" href="<?php echo BASE_URL; ?>casos/todos">Todos os casos</a></li>
            </ul>
        </nav>
        <h2>Listar Usuários</h2>

        <table style="margin-top: 30px;" class="casos">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Usuário</th>
                <th>Ações</th>
            </tr>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['nome']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['usuario']; ?></td>
                    <td><a class="excluir" href="<?php echo BASE_URL; ?>admin/excluir/<?php echo $user['id']; ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div><!--container-->
</div><!--last_casos--><?php