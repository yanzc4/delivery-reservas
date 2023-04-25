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
            background: #18191a;
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

        .w-60 {
            width: 60%;
            font-size: 12px;
        }

        a {
            text-decoration: none;
            color: #707070;
        }

        a:hover {
            color: #fff;
        }

        .bg-oscuro,
        .bg-oscuro:hover,
        .bg-oscuro:focus,
        .bg-oscuro:active {
            background: #3a3b3c;
            width: 100%;
            color: #ccc;
            padding: 0.8rem;
            border: none;
            border-radius: 6px;
            outline: none;
        }

        .bg-negro,
        .bg-negro:hover {
            background: #3a3b3c;
            color: #ccc;
            border: none;
            padding: 0.6rem;
            padding-left: 1.2rem;
            padding-right: 1.2rem;
        }

        .glider::-webkit-scrollbar:horizontal {
            display: none;
        }

        .bg-white {
            background: #fff;
        }

        .imagen {
            width: 100%;
            height: 88%;
            background: #E4F1F3;
            margin-top: 0.4rem;
            margin-bottom: 0.4rem;
            border-radius: 10px;
            box-shadow: 0px 24px 32px -8px rgba(0, 0, 0, 0.08);
        }

        .fs-8 {
            font-size: 12px;
        }

        .text-rosa {
            color: #F97777;
        }

        .carrito {
            width: 60px;
            height: 60px;
            position: fixed;
            bottom: 1rem;
            right: 1rem;
        }

        .pagar, .pagar:hover, .pagar:active {
            text-decoration: none;
            width: 60px;
            height: 60px;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
            background: #F97777;
            border: none;
            border-radius: 50%;
            color: #fff;
            font-size: 35px;
        }

        .contador {
            width: 22px;
            height: 22px;
            background: #fff;
            border-radius: 50%;
            position: absolute;
            top: 0;
            right: 0;
            color: #F97777;
            font-size: 14px;
            text-align: center;
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

        <?php require_once('../frontend/platos.php') ?>

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