<?php
$cabecera="Reportes";

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

if ($rolColaborador == "Delivery") {
    header("location: ../delivery");
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/css/panel.css">
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mb-3">
                <div class="container">
                    <h3 class="pt-2 fw-bold text-azul-medio">Reporte de ventas</h3>
                    <div class="container azul-oscuro redondear">
                        <form id="frmventasxmes" action="../../backend/reports/reporteventas.php" method="post">
                            <div class="row pt-2">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mb-1">
                                    <label for="">Fecha de inicio</label>
                                    <input class="form-control" type="date" id="fechainicio" name="fechainicio">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mb-2">
                                    <label for="">Fecha de fin</label>
                                    <input class="form-control" type="date" id="fechafin" name="fechafin">
                                </div>
                                <div class="d-grid">
                                    <button type="submit" id="btnfecha" class="btn btn-primary"><i class='bx bx-printer'></i></button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mb-3">
                <div class="container">
                    <h3 class="pt-2 fw-bold text-azul-medio">Reporte de Clientes Activos</h3>
                    <div class="container azul-oscuro redondear">
                        <form action="../../backend/reports/reporteclientes.php" method="post">
                        <input type="submit" class="btn btn-info" value="Reporte de Clientes" id="rcliente" name="rcliente">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mb-3">
                <div class="container">
                    <h3 class="pt-2 fw-bold text-azul-medio">Reporte de Empleados Activos</h3>
                    <div class="container azul-oscuro redondear">
                        <form action="../../backend/reports/reporteempleados.php" method="post">
                            <input type="submit" class="btn btn-warning" value="Reporte de Empleados" id="rempleados" name="rempleados">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mb-3">
                <div class="container">
                    <h3 class="pt-2 fw-bold text-azul-medio">Reporte de Productos Mas Vendidos</h3>
                    <div class="container azul-oscuro redondear">
                        <form action="../../backend/reports/reportePlatosVendidos.php" method="post">
                            <input type="submit" class="btn btn-success" value="Reporte de Productos" id="rproducto" name="rproducto">
                        </form>
                    </div>
                </div>
            </div>

            <!-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mb-3">
                <div class="container">
                    <h3 class="pt-2 fw-bold text-azul-medio">Reporte de platos</h3>
                    <div class="container azul-oscuro redondear">
                        <form id="frmplatosven" action="../../backend/reports/reporteplatos.php" method="post">
                            <div class="row pt-2">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mb-1">
                                    <label for="">Fecha de inicio</label>
                                    <input class="form-control me-2" type="date" id="pfechainicio" name="pfechainicio">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2 mb-2">
                                    <label for="">Fecha de fin</label>
                                    <input class="form-control me-2" type="date" id="pfechafin" name="pfechafin">
                                </div>
                                <div class="d-grid">
                                    <button type="submit" id="pbtnfecha" class="btn btn-azul-gris w-25 mb-3"><i class='bx bx-printer'></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../assets/js/administrador/cabecera.js"></script>
</body>

</html>