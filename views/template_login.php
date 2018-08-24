<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Acesso ao sistema</title>
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
    </head>
    <body>

        <?php $this->loadViewInTemplate($viewName, $viewData); ?>

        <script src="<?php echo BASE_URL; ?>assets/js/jquery.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    </body>
</html>