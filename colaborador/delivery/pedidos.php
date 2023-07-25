<?php
$cabecera="Pedidos";

session_start();
$usuarioColaborador = $_SESSION['usuarioc'];
$passwordColaborador = $_SESSION['passwordc'];
$rolColaborador = $_SESSION['rolc'];
$idColaborador = $_SESSION['idc'];
$nombreColaborador = $_SESSION['nombrec'];
$emailColaborador = $_SESSION['emailc'];
$telefonoColaborador = $_SESSION['telefonoc'];
$f_nacimientoColaborador = $_SESSION['f_nacimientoc'];
$imagenColaborador = $_SESSION['imagenc'];
$direccionColaborador = $_SESSION['direccionc'];
$estadoColaborador = $_SESSION['estadoc'];

if ($rolColaborador == "Administrador") {
    header("location: ../administrador");
} elseif ($rolColaborador == "Monitoreo") {
    header("location: ../monitoreo");
}elseif(!isset($rolColaborador)){
    header("location: ../");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/css/cliente/cabecera.css">
    <title>pedidos</title>
    <style>
        .sombra {
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.12);
        }

        .menu-linea {
            color: #F6B8B8;
            background: transparent;
            border: none;
            width: 100%;
            border-bottom: 4px solid #F6B8B8;
        }

        .menu-linea:hover,
        .menu-linea:active,
        .menu-linea:focus {
            color: #F97777;
            background: transparent;
            transform: var(--tran-03);
            border-bottom: 4px solid #F97777;
        }

        .linea {
            color: #F97777;
            border-bottom: 4px solid #F97777;
        }

        .btn-secundario {
            background: var(--color-precio);
            color: var(--color-white);
        }

        .btn-secundario:hover,
        .btn-secundario:active,
        .btn-secundario:focus {
            background: var(--text-color);
            color: var(--color-white);
            scale: 1.07;
            transform: var(--tran-03);
        }

        .st {
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--body-color);
        }

        #ordenesActivas {
            display: none;
        }

        @media screen and (max-width: 468px) {

            .st {
                top: 63px;
            }
        }
    </style>
</head>

<body>

    <?php
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    if (preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
        require_once "../../frontend/cabeceraColaborador.php";
    }
    ?>

    <div class="container">
        <div class="row px-3 st">
            <!--<div class="col-6 p-0">
                <div class="container p-0 w-100 mt-3 mb-3 text-center">
                    <button id="btnNueva" class="menu-linea linea fs-5">
                        Nueva Orden
                    </button>
                </div>
            </div>-->
            <div class="col-6 p-0">
                <div class="container p-0 w-100 mt-3 mb-3 text-center">
                    <button id="btnActivas" class="menu-linea fs-5">
                        Ordenes Activas
                    </button>
                </div>
            </div>
        </div>

        <!--<div class="row" id="nuevaOrden">
            <?php for ($i = 1; $i <= 12; $i++) { ?>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-3">
                    <div class="container bg-modal sombra redondear p-3">
                        <div>
                            <label for="" class="fs-8">Cliente</label>
                        </div>
                        <div>
                            <label for="" class="form-label"><i class='bx bx-user'></i> Julian Morales</label>
                        </div>
                        <div>
                            <label for="" class="fs-8">Celular</label>
                        </div>
                        <div>
                            <label for="" class="form-label"><i class='bx bx-phone'></i> 999-999-999</label>
                        </div>
                        <div>
                            <label for="" class="fs-8">Total</label>
                        </div>
                        <div>
                            <label for="" class="form-label text-rosa"><i class='bx bx-credit-card'></i> S./ 35.90</label>
                        </div>
                        <hr>
                        <div>
                            <label for="" class="fs-8">Dirección</label>
                        </div>
                        <div>
                            <label for="" class="form-label"><i class='bx bx-map'></i> Calle 1 Mz A Lote 12 de Los Olivos de Pro, Lima</label>
                        </div>
                        <hr>
                        <div class="text-center">
                            <label for="" class="fs-8 mb-2">Aprox: <label for="" class="text-rosa">2km</label></label>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-secundario w-100"><i class='bx bx-check'></i></button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-secundario w-100"><i class='bx bx-x'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>-->


        <div class="row" id="nuevaOrden">
        </div>
    </div>

    <script src="../../assets/js/menu/activarDarkmode.js"></script>
    <script>
        const idTrabajador = <?php echo $idColaborador ?>;
    </script>
    <script src="../../assets/js/delivery/funcionPedidos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../assets/js/controladores/ordenesFunciones2.js"></script>
</body>

</html>