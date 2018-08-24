<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Gerenciamento de casos</title>
		<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
	</head>
	<body>
		<header>
			<div class="container">
				<?php
					$u = new Usuarios();
				?>
				<h2><a href="<?php echo BASE_URL; ?>">Gerenciamento de casos</a></h2>
				<nav class="desktop">
					<ul>
						<li><a href="<?php echo BASE_URL; ?>casos/novo">Novo Caso</a></li>
						<li><a href="<?php echo BASE_URL; ?>casos/listar">Listar Casos</a></li>
						<li><a href="<?php echo BASE_URL; ?>contatos">Contatos</a></li>
						<li><a href="<?php echo BASE_URL; ?>lembretes">Lembretes</a></li>
						<li <?php $perm = $u->getPermissao(); ?>><a href="<?php echo BASE_URL; ?>casos/todos">Todos os casos</a></li>
						<li <?php $perm = $u->getPermissao(); ?>><a href="<?php echo BASE_URL; ?>admin">ADMIN</a></li>
						<li><a href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
					</ul>
				</nav><!--desktop-->
				<nav class="mobile">
					<ul>
						<li><a href="<?php echo BASE_URL; ?>casos/novo">Novo Caso</a></li>
						<li><a href="<?php echo BASE_URL; ?>casos/listar">Listar Casos</a></li>
						<li><a href="<?php echo BASE_URL; ?>contatos">Contatos</a></li>
						<li><a href="<?php echo BASE_URL; ?>lembretes">Lembretes</a></li>
						<li <?php $perm = $u->getPermissao(); ?>><a href="<?php echo BASE_URL; ?>casos/todos">Todos os casos</a></li>
						<li <?php $perm = $u->getPermissao(); ?>><a href="<?php echo BASE_URL; ?>admin">ADMIN</a></li>
						<li><a href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
					</ul>
				</nav><!--mobile-->
			</div><!--container-->
		</header>
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>

		<script src="<?php echo BASE_URL; ?>assets/js/jquery.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>