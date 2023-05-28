<?php
$cabecera="Pedidos";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../assets/css/cliente/cabecera.css">
</head>

<body>
    <?php
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    if (preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
        require_once "../frontend/cabecera.php";
    }
    ?>
    <div class="container">
        <h3 class="mt-3">Pedidos</h3>
        <div class="row">
            <?php
            for ($i = 1; $i <= 4; $i++) {
            ?>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-4 align-center pe-0 ps-0">
                                <img class="imagen" src="../assets/img/hamburguesa.webp" alt="bebida">
                            </div>
                            <div class="col-8 pt-2 align-items-center">
                                <label class="w-100 text-wrap">Hamburguesa de Pollo nnnn ddd ddd</label><br>
                                <span>
                                    <span class="material-symbols-outlined">thumb_up</span>
                                    <label for="" class="fs-8">100</label>
                                    <span class="ps-4">
                                        <button class="btn-cantidad">-</button>
                                        <label for="" class="fs-8 pe-1 ps-1">1</label>
                                        <button class="btn-cantidad">+</button>
                                    </span>
                                </span>
                                <br>
                                <label for="" class="text-rosa fw-bold">S/ 5.90</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="row mt-3">
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <label class="fw-bold" for="">Total a pagar</label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <label for="">S./ 90.00</label>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-3">
                <button class="btn-rosa">
                    <span class="material-symbols-outlined">payments</span>
                    <label for=""> Pagar</label>
                </button>
            </div>
        </div>
    </div>
    <script src="../assets/js/menu/activarDarkmode.js"></script>
</body>

</html>