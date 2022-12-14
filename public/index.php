<?php
    include './../app/configuracao.php';
    include './../app/Libraries/Rota.php';
    include './../app/Libraries/Controller.php';
    include './../app/Libraries/Database.php';
    $db = new Database();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=APP_MODE ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL?>/public/css/estilos.css">
    
</head>
<body>

    <?php
        include '../app/Views/topo.php';
        $rotas = new Rota();
        include '../app/Views/rodape.php';

       
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" ></script>
    <script src="<?=URL?>/public/js/jquery.funcoes.js"></script>
    
</body>
</html>