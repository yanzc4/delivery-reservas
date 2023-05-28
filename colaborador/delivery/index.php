<?php
$cabecera = "Delivery";
$id = 5;
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


    <script>
        function obtenerUbicacion() {
            navigator.geolocation.getCurrentPosition(position => {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var id = <?php echo $id ?>;

                // Realizamos una petición AJAX a un archivo PHP
                $.ajax({
                    url: "../../backend/empleado/ubicacion.php",
                    method: "POST",
                    data: {
                        lat,
                        lng,
                        id
                    }
                }).done(function(response) {
                    // La respuesta de PHP se almacena en la variable 'response'
                    console.log(response);
                });

            });
        }
        obtenerUbicacion();
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../assets/js/menu/funcionmenu.js"></script>
</body>

</html>