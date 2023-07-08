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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../assets/css/cliente/cabecera.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-contextmenu/1.4.0/leaflet.contextmenu.css" />
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

    <!-- Scripts -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-contextmenu/1.4.0/leaflet.contextmenu.js"></script>

    <script>
        var baseLayer = L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
            }
        );

        var map = L.map('map', {
            layers: [baseLayer],
            center: [-12.046374, -77.042793],
            zoom: 12,
            zoomControl: false
        });

        //para obtener la ubicacion actual
        function cargarMapa() {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                // Agregar ubicación actual como waypoint
                control.setWaypoints([
                    L.latLng(latitude, longitude),
                    L.latLng(-12.036374, -77.042793),
                    L.latLng(-12.059733677889739, -77.03996420518459)
                ]);
            }, error);
        }

        cargarMapa();
        //setInterval(cargarMapa, 10000);
            //para agregar la ruta
            var control = L.Routing.control({

                createMarker: function(i, waypoints, n) {
                    var empleadoIcon = L.icon({
                        iconUrl: '../../assets/img/empleado.png',
                        iconSize: [38],
                    });

                    //para los iconos de los clientes crear un while para leer la ubicacion de cda imagen
                    var clienteIcon = L.icon({
                        iconUrl: '../../assets/img/cliente.png',
                        iconSize: [38],
                    });

                    //para cambiar el icono
                    switch (i) {
                        case 0:
                            market_icon = empleadoIcon;
                            info = "Erica Gonzales";
                            break;

                            //para lo de clientes usar tambien un while
                        case 1:
                            market_icon = clienteIcon;
                            info = "Roberto Carlos";
                            break;
                        case 2:
                            market_icon = clienteIcon;
                            info = "Julio Cesar";
                            break;
                    }

                    //dibujar el icono en el mapa
                    var marker = L.marker(waypoints.latLng, {
                        bounceOnAdd: false,
                        bounceOnAddOptions: {
                            duration: 1000,
                        },
                        icon: market_icon,
                    }).bindPopup(info);
                    return marker;
                },

                showAlternatives: true,
                altLineOptions: {
                    styles: [{
                            color: 'black',
                            opacity: 0.15,
                            weight: 9
                        },
                        {
                            color: 'white',
                            opacity: 0.8,
                            weight: 6
                        },
                        {
                            color: 'blue',
                            opacity: 0.5,
                            weight: 2
                        }
                    ]
                },
                lineOptions: {
                    styles: [{
                        color: 'blue',
                        opacity: 1,
                        weight: 5
                    }]
                },
                //cambiar el idioma
                language: 'es',
                //desabilitar que se pueda arrastrar el punto de inicio y fin
                draggableWaypoints: false,
                //desabilitar que se pueda agregar mas puntos
                addWaypoints: false,

            }).addTo(map);

            //para cambiar el nombre de los waypoints


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