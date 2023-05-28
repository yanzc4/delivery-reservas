<?php
$cabecera = "Delivery";
$id = 4;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/css/cliente/cabecera.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 100%;
            height: 100vh;
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
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        const map = L.map('map');
        // coordenadas lima -12.039733677889739, -77.03996420518459

        map.setView([-11.863641126812807, -77.07626043157313], 13);
        // Sets initial coordinates and zoom level

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);
        // Sets map data source and associates with map

        let marker, circle, zoomed;

        //iconos
        var empleadoIcon = L.icon({
            iconUrl: '../../assets/img/empleado.png',
            iconSize: [38],
        });
        var clienteIcon = L.icon({
            iconUrl: '../../assets/img/cliente.png',
            iconSize: [38],
        });
        var restauranteIcon = L.icon({
            iconUrl: '../../assets/img/restaurante.png',
            iconSize: [38],
        });

        L.marker([-11.863641126812807, -77.07626043157313], {
            icon: restauranteIcon
        }).addTo(map).bindPopup("Ubicacion del Restaurante");

        // select u.id, ub.lat, ub.lng, concat(u.nombre,' ',u.apellido) from usuario u join ubicacion ub on u.id=ub.id;
        <?php
        require_once "../../inc/conexion.php";
        $con = conectar();
        $sql = "select ub.id, ub.lat, ub.lng, concat(c.nombre,' ',c.apellido) from ubicacion ub join clientes c on ub.id=c.id";

        $resultado = mysqli_query($con, $sql);
        while ($fila = mysqli_fetch_row($resultado)) {
            echo "L.marker([" . $fila[1] . ", " . $fila[2] . "], {icon: clienteIcon}).addTo(map).bindPopup('" . $fila[3] . "');";
        }


        //fetch data from json
        $data = file_get_contents('../../database/empleados.json');
        //decode into php array
        $data = json_decode($data);

        $index = 0;
        foreach ($data as $row) {
            echo "L.marker([" . $row->lat . ", " . $row->lng . "], {icon: empleadoIcon}).addTo(map).bindPopup('" . $row->nombre . "');";
            $index++;
        }
        ?>

        function error(err) {

            if (err.code === 1) {
                alert("Encender el GPS");
            } else {
                alert("Error al encender el GPS");
            }

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../../assets/js/menu/activarDarkmode.js"></script>
</body>

</html>