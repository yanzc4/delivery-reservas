<?php
$cabecera="Delivery";
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../assets/css/cabecera.css">
    <style>
        .detalleImagen{
            width: 50%;
        }
        .btn-transparente{
            border: none;
            background: transparent;
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

        <div class="row mb-3">
            <div class="col">
                <input type="text" class="bg-oscuro" placeholder="Buscar" name="buscar">
            </div>
            <div class="col-auto ms-1">
                <button class="btn bg-negro">
                    <span class="material-symbols-outlined">search</span>
                </button>
            </div>
        </div>

        <span>
            <i class='bx bx-map-pin'></i>
            <label>Mz H Lote 5 Av Las Palmeras</label>
        </span>

        <div class="container-fluid mt-3">
            <div class="glider">
                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                        <a href="#bebidas">
                            <span class="material-symbols-outlined icon">glass_cup</span>
                        </a>
                    </div>
                    <label class="w-60 text-center" for="">Bebidas</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                        <a href="#comida">
                            <span class="material-symbols-outlined icon">dinner_dining</span>
                        </a>
                    </div>
                    <label class="w-60 text-center" for="">Comida</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                        <a href="#postre">
                            <span class="material-symbols-outlined icon">icecream</span>
                        </a>
                    </div>
                    <label class="w-60 text-center" for="">Postre</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                        <a href="#snacks">
                            <span class="material-symbols-outlined icon">bakery_dining</span>
                        </a>
                    </div>
                    <label class="w-60 text-center" for="">Snacks</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                        <a href="#hamburguesas">
                            <span class="material-symbols-outlined icon">lunch_dining</span>
                        </a>
                    </div>
                    <label class="w-60 text-truncate" for="">Hamburguesas</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                        <a href="#pizza">
                            <span class="material-symbols-outlined icon">local_pizza</span>
                        </a>
                    </div>
                    <label class="w-60 text-center" for="">Pizza</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                        <a href="#parrillas">
                            <span class="material-symbols-outlined icon">kebab_dining</span>
                        </a>
                    </div>
                    <label class="w-60 text-center" for="">Parrillas</label>
                </div>

                <div class="container">
                    <div class="bg-blanco w-60 text-center redondear">
                        <a href="#caldo">
                            <span class="material-symbols-outlined icon">soup_kitchen</span>
                        </a>
                    </div>
                    <label class="w-60 text-center" for="">Caldo</label>
                </div>

            </div>
        </div>

        <?php require_once('../backend/clientes/buscarPlatos.php') ?>

        <div class="carrito">
            <a href="pedidos.php" target="myFrame" class="pagar">
                <span class="material-symbols-outlined">shopping_cart</span>
            </a>
            <span class="contador">+1</span>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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