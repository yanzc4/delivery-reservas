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
    <link rel="stylesheet" href="../../assets/css/panel.css">
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
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        const map = L.map('map');
        // coordenadas lima -12.039733677889739, -77.03996420518459

        // Establece las coordenadas iniciales y el nivel de zoom
        map.setView([-11.863641126812807, -77.07626043157313], 13);

        // Establece la fuente de datos del mapa y se asocia con el mapa
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

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

        //marcador del restaurante
        L.marker([-11.863641126812807, -77.07626043157313], {
            icon: restauranteIcon
        }).addTo(map).bindPopup("Ubicacion del Restaurante");




        //select u.id, ub.lat, ub.lng, concat(u.nombre,' ',u.apellido) from usuario u join ubicacion ub on u.id=ub.id;
        <?php
        
        require_once "../../inc/conexion.php";
        $con=conectar();
        $sql="SELECT u.lat, u.lng, concat(c.nombre,' ', c.apellido) as nombre, c.direccion, usu.nombre FROM ubicaciontemporal u JOIN clientes c on u.id_cliente=c.id join usuarios usu on u.id_trabajador=usu.id";
        
        $resultado=mysqli_query($con,$sql);
        while($fila=mysqli_fetch_row($resultado)){
            echo "L.marker([".$fila[0].", ".$fila[1]."], {icon: clienteIcon}).addTo(map).bindPopup('Cliente: <br> $fila[2] <hr> Dirección: <br> $fila[3] <hr> Repartidor: <br> $fila[4]');";
        }
        


        //marcador de los empleados con archivo json
        // obtener datos de json
        $data = file_get_contents('../../database/empleados.json');

        // decodificar en array php
        $data = json_decode($data);

        $index = 0;
        foreach ($data as $row) {
            echo "L.marker([" . $row->lat . ", " . $row->lng . "], {icon: empleadoIcon}).addTo(map).bindPopup('" . $row->nombre . "');";
            $index++;
        }
        ?>

        //error para solicitar encender el gps
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
    <script src="../../assets/js/administrador/activarModoOscuro.js"></script>
</body>

</html>