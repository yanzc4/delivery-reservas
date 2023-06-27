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
            min-height: 100vh;
    font-family: 'Inconsolata', monospace;
}

details{
    position: fixed;
    right: 1rem;
    width: 400px;
    background-color: white;
    padding: 20px;
    border: 3px solid transparent;
    border-radius: 7px;
    background-color: rgb(0, 0, 0, 0.2);
    box-shadow: 0 0 10px black;
    height: 8vh;
}
.toggle{
    height: 70vh;
}

summary{
    font-size: 30px;
    letter-spacing: 1px;
    list-style: none;
    cursor: pointer;
}

summary::before{
    content: '+';
    margin-right: .5rem;
}

details[open] summary::before{
    content: '-';
}

.container{
    background-color: white;
    padding: 10px;
    border-radius: 6px;
    margin-top: 2rem;
}

p{
    margin: 1rem 0 1rem 0;
}

img{
    width: 100%;
    height: 200px;
    object-fit: cover;
    border: 1px solid rgba(0, 0, 0, 0.2);
}

        #map {
            width: 100%;
            height: 100vh;
        }
    </style>
</head>

<body>
<details id="detalle">
        <summary id="btnDesplegar">Ver Detalle</summary>
        <div class="contenido">
            <h1>Pedido</h1>
            <p>David Caceres 1 hamburguesa San Martin
                de Porres cuadra 5.
            </p>
            <img src="img/pedido.jpg" alt="">
        </div>
    </details>
    <script>
        var btnDesplegar = document.getElementById("btnDesplegar");
        var caja = document.getElementById("detalle");

        function desplegar(){
            caja.classList.toggle("toggle");
        }

        btnDesplegar.addEventListener("click", desplegar);
    </script>
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


        //marcadores de los clientes
        L.marker([-11.833885978707777, -77.11822736100126], {
            icon: clienteIcon
        }).addTo(map).bindPopup("Carlos Moreyra");
        L.marker([-11.960893594725457, -77.05023098873214], {
            icon: clienteIcon
        }).addTo(map).bindPopup("Erica Gonzales");


        // select u.id, ub.lat, ub.lng, concat(u.nombre,' ',u.apellido) from usuario u join ubicacion ub on u.id=ub.id;
        <?php
        /*
        require_once "../../inc/conexion.php";
        $con=conectar();
        $sql="select ub.id, ub.lat, ub.lng, concat(c.nombre,' ',c.apellido) from ubicacion ub join clientes c on ub.id=c.id";
        
        $resultado=mysqli_query($con,$sql);
        while($fila=mysqli_fetch_row($resultado)){
            echo "L.marker([".$fila[1].", ".$fila[2]."], {icon: clienteIcon}).addTo(map).bindPopup('".$fila[3]."');";
        }
        */


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