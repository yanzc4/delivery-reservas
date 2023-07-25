<?php
$cabecera="Delivery";

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
    <title>| Delivery</title>
    <link rel="icon" type="image/png" href="../../assets/img/delivery.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/css/estilomenu.css">
</head>

<body>
    <?php require_once('../../frontend/menuEmpleado.php') ?>

    <section class="home">
        <iframe src="mapa.php" name='myFrame' style="height: 100%; width: 100%; border: none;"></iframe>

    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        //funcion   para obtener la ubicacion del motorizado
        function obtenerUbicacion() {
            navigator.geolocation.getCurrentPosition(position => {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var id = '<?php echo $idColaborador ?>';
                var nombre = '<?php echo $nombreColaborador ?>';

                // Realizamos una petición AJAX a un archivo PHP
                $.ajax({
                    url: "../../backend/empleado/ubicacion.php",
                    method: "POST",
                    data: {
                        lat,
                        lng,
                        id,
                        nombre
                    }
                }).done(function(response) {
                    // La respuesta de PHP se almacena en la variable 'response'
                   console.log(response);
                });

            });
        }
        //ejecutamos la funcion luego se automatizara
        obtenerUbicacion();
    </script>
    
    <script src="../../assets/js/menu/funcionmenu.js"></script>
</body>

</html>