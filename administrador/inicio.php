<?php
$cabecera="Delivery";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Cliente</title>
    <link rel="icon" type="image/png" href="../assets/img/delivery.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <link rel="stylesheet" href="../assets/css/panel.css">
    <style>
    </style>
</head>

<body class="dark-theme-variables">
<?php require_once('../frontend/menuadmin.php') ?>
<div class="cabecera">
<?php require_once('../frontend/cabeceraAdmin.php') ?>
</div>

<section class="home">
    <iframe src="dashboard.php" id="myFrame" name='myFrame' style="height: 100%; width: 100%; border: none;"></iframe>
    
        <!--<div class="text">Dashboard Sidebar</div>-->
</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../assets/js/administrador/cabecera.js"></script>
</body>

</html>