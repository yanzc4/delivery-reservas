<?php
$cabecera = "Delivery";

session_start();
$idCliente = $_SESSION['id'];
$nombreCliente = $_SESSION['nombre'];
$apellidoCliente = $_SESSION['apellido'];
$usuarioCliente = $_SESSION['usuario'];
$passwordCliente = $_SESSION['password'];
$correoCliente = $_SESSION['correo'];
$telefonoCliente = $_SESSION['telefono'];
$fechaCliente = $_SESSION['fecha'];
$direccionCliente = $_SESSION['direccion'];
$imagenCliente = $_SESSION['foto'];

if (!isset($usuarioCliente)) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/cliente/cabecera.css">
    <style>
        .detalleImagen {
            width: 100%;
            height: 20vh;
            object-fit: cover;
            filter: brightness(0.6);
        }

        .btn-transparente {
            border: none;
            background: transparent;
        }
        .bg-modal1{
            background: var(--body-color);
        }
        .btnTexto2{
            display: none;
        }
        @media screen and (max-width: 768px) {
            .btnTexto1{
                display: none;
            }
            .btnTexto2{
                display: block;
            }
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
            <label><?php echo $direccionCliente ?></label>
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


        <div id="categoriasLista"></div>

        <!-- modal -->
        <div class="modal fade" id="detalle">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-modal1">
                        <button type="button" class="text-rosa btn-transparente" data-bs-dismiss="modal" aria-label="Close">
                            <span class="material-symbols-outlined">arrow_back_ios</span>
                        </button>
                        <div class="container fw-bold text-rosa text-center" id="moPlato"></div>
                        <div class="container w-25 text-end">
                            <button type="button" class="text-rosa btn-transparente">
                                <span class="material-symbols-outlined">favorite</span>
                            </button>
                        </div>
                        <div>
                            <button type="button" class="text-rosa btn-transparente">
                                <span class="material-symbols-outlined">share</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body p-0">
                        <div class="text-center container m-0 p-0 bg-dark">
                            <img class="detalleImagen" id="moImagen" alt="">
                        </div>
                        <div class="container bg-modal1 redondear">
                            <div class="container p-3">
                                <div id="moDescripcion"></div>
                            </div>
                            <div class="container pb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="fs-5 fw-bold text-precio" id="moPrecio"></div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <form method="post" id="frmCarrito">
                                            <input type="hidden" name="idc" value="<?php echo $idCliente ?>">
                                            <input type="hidden" name="idp" id="moaId">
                                            <input type="hidden" name="precio" id="moaPrecio">
                                        <button id="btnAgrearDesdeModal" class="btn bg-rosa text-light w-100"><label for="" class="btnTexto1">Agregar a carrito</label><label for="" class="btnTexto2"><i class='bx bx-cart-add'></i></label></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carrito
        <div class="carrito">
            <a href="pedidos.php" target="myFrame" class="pagar">
                <span class="material-symbols-outlined">shopping_cart</span>
            </a>
            <span class="contador">+1</span>
        </div>
-->

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

        const id_cliente = <?php echo $idCliente ?>;
    </script>
    <script src="../assets/js/menu/activarDarkmode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../assets/js/controladores/platosFunciones.js"></script>

</body>

</html>