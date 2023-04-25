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
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: transparent;
            color: #ccc;
        }

        .text-azul {
            color: #ccc;
        }

        .bg-rosa {
            background: #F97777;
        }

        .bg-principal {
            background: #18191a;
        }

        .perfil {
            width: 45px;
        }

        .fs-10 {
            font-size: 10px;
        }

        .redondear {
            border-radius: 10px;
        }

        .bg-blanco {
            background: #fff;

        }

        .bg-blanco:hover {
            background: #F97777;
        }

        .icon {
            font-size: 50px;
            padding: 10px;
        }

        .w-60 {
            width: 60%;
            font-size: 12px;
        }

        a {
            text-decoration: none;
            color: #707070;
        }

        a:hover {
            color: #fff;
        }

        .bg-oscuro,
        .bg-oscuro:hover,
        .bg-oscuro:focus,
        .bg-oscuro:active {
            background: #3a3b3c;
            width: 100%;
            color: #ccc;
            padding: 0.8rem;
            border: none;
            border-radius: 6px;
            outline: none;
        }

        .bg-negro,
        .bg-negro:hover {
            background: #3a3b3c;
            color: #ccc;
            border: none;
            padding: 0.6rem;
            padding-left: 1.2rem;
            padding-right: 1.2rem;
        }

        .glider::-webkit-scrollbar:horizontal {
            display: none;
        }

        .bg-white {
            background: #fff;
        }

        .imagen {
            width: 100%;
            height: 88%;
            background: #E4F1F3;
            margin-top: 0.4rem;
            margin-bottom: 0.4rem;
            border-radius: 10px;
            box-shadow: 0px 24px 32px -8px rgba(0, 0, 0, 0.08);
        }

        .fs-8 {
            font-size: 12px;
        }

        .text-rosa {
            color: #F97777;
        }

        .carrito {
            width: 60px;
            height: 60px;
            position: fixed;
            bottom: 1rem;
            right: 1rem;
        }

        .pagar,
        .pagar:hover,
        .pagar:active {
            text-decoration: none;
            width: 60px;
            height: 60px;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
            background: #F97777;
            border: none;
            border-radius: 50%;
            color: #fff;
            font-size: 35px;
        }

        .contador {
            width: 22px;
            height: 22px;
            background: #fff;
            border-radius: 50%;
            position: absolute;
            top: 0;
            right: 0;
            color: #F97777;
            font-size: 14px;
            text-align: center;
        }

        .btn-cantidad {
            width: 25px;
            height: 25px;
            background: #F97777;
            border-radius: 50%;
            color: #fff;
            font-size: 14px;
            text-align: center;
            border: none;
        }

        .btn-rosa {
            width: 100%;
            background: #F97777;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 0.5rem;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .btn-rosa:hover,
        .btn-rosa:focus,
        .btn-rosa:active {
            background: #fff;
            color: #F97777;
        }
    </style>
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
</body>

</html>