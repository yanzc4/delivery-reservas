<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
    <link href='../assets/libs/boxicons-2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
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
            background: transparent;
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
        .w-60{
            width: 60%;
        }
        a{
            text-decoration: none;
            color: #707070;
        }
        a:hover{
            color: #fff;
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

    <div class="container p-4">
        <span>
            <i class='bx bx-map-pin'></i>
            <label>Mz H Lote 5 Av Las Palmeras</label>
        </span>

        <div class="container-fluid mt-3">
            <div class="glider">
                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                    <a href="#"><i class='bx bx-coffee-togo icon'></i></a>
                    </div>
                    <label class="w-60 text-center" for="">Bebidas</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                    <a href="#"><i class='bx bx-bowl-hot icon'></i></i></a>
                    </div>
                    <label class="w-60 text-center" for="">Comida</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                    <a href="#"><i class='bx bx-cheese icon'></i></a>
                    </div>
                    <label class="w-60 text-center" for="">Postre</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                    <a href="#"><i class='bx bx-coffee-togo icon'></i></a>
                    </div>
                    <label class="w-60 text-center" for="">Bebidas</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                    <a href="#"><i class='bx bx-coffee-togo icon'></i></a>
                    </div>
                    <label class="w-60 text-center" for="">Bebidas</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                    <a href="#"><i class='bx bx-coffee-togo icon'></i></a>
                    </div>
                    <label class="w-60 text-center" for="">Bebidas</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                    <a href="#"><i class='bx bx-coffee-togo icon'></i></a>
                    </div>
                    <label class="w-60 text-center" for="">Bebidas</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                    <a href="#"><i class='bx bx-coffee-togo icon'></i></a>
                    </div>
                    <label class="w-60 text-center" for="">Bebidas</label>
                </div>

            </div>
        </div>
    </div>



    <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/82f98f95e9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 9,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>

</body>

</html>