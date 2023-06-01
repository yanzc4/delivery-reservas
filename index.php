<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/img/delivery.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/cliente/cabecera.css">
    <title>Delivery</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .btn-transparente {
            border: none;
            background-color: transparent;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .bg-b {
            background: var(--color-white);
            color: var(--text-color);
        }

        .bg-secundario {
            background: var(--body-color);
        }

        .btn-buscar {
            background: var(--primary-color);
            color: var(--color-white);
        }

        .imagen2 {
            height: 255px;
            width: 100%;
            object-fit: cover;
        }

        .cabecera .swiper {
            width: 100%;
            max-width: 1600px;
        }

        .cabecera .swiper-button-prev,
        .cabecera .swiper-button-next {
            --swiper-navigation-size: 20px;
            background: #F97777;
            color: #fff;
            font-weight: bold;
            height: 70px;
            width: 50px;
            margin-top: -35px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .cabecera .swiper-button-prev {
            border-radius: 0 65px 65px 0;
            left: -10px;
        }

        .cabecera .swiper-button-next {
            border-radius: 65px 0 0 65px;
            right: -10px;
        }

        .cabecera .swiper:hover .swiper-button-prev,
        .cabecera .swiper:hover .swiper-button-next {
            opacity: 1;
        }

        .cabecera .swiper-pagination {
            /* Reeditando las clases de la libreria */
            --swiper-pagination-color: white;
            --swiper-pagination-bullet-size: 8px;
            --swiper-pagination-bullet-inactive-color: #000;
            --swiper-pagination-bullet-inactive-opacity: 0.25;
            --swiper-pagination-bullet-opacity: 1;
            --swiper-pagination-bullet-horizontal-gap: 4px;
            --swiper-pagination-bullet-vertical-gap: 6px;
        }

        .cabecera .swiper-pagination-bullet {
            box-shadow: inset 0 0 0 1px #fff;
        }

        .cabecera .swiper-pagination-bullet-active {
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.25);
        }


        /* oferta */
        #oferta .swiper {
            width: 90%;
            max-width: 1600px;
        }

        #oferta .swiper-button-prev,
        #oferta .swiper-button-next {
            --swiper-navigation-size: 20px;
            background: #F97777;
            color: #fff;
            font-weight: bold;
            height: 70px;
            width: 50px;
            margin-top: -35px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        #oferta .swiper-button-prev {
            border-radius: 0 65px 65px 0;
            left: -10px;
        }

        #oferta .swiper-button-next {
            border-radius: 65px 0 0 65px;
            right: -10px;
        }

        #oferta .swiper:hover .swiper-button-prev,
        #oferta .swiper:hover .swiper-button-next {
            opacity: 1;
        }

        .img-card {
            width: 100%;
        }

        .tarjeta {
            width: 13.5rem;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }

        .w-90 {
            width: 90%;
        }

        .nav-link {
            text-decoration: none !important;
        }

        .nav-link:hover,
        .nav-link:focus,
        .nav-link:active {
            color: var(--text-color) !important;
        }

        .form-control:focus {
            outline: none !important;
            border-color: var(--primary-color) !important;
            box-shadow: 0 0 0 0.25rem rgb(249 119 119 / 25%);
        }

        .text-success {
            color: #F97777 !important;
        }

        .bg-black {
            background: #000 !important;
        }

        .text-container {
            color: #fff;
            display: flex;
            align-items: center;
        }

        .btn-login {
            background: #F97777 !important;
            color: #fff;
        }

        .btn-login:hover {
            background: #F97777 !important;
            color: #fff;
            transform: scale(1.07);
        }

        .btn-navbar-toggler {
            display: none;
            border: none;
            background: transparent;
        }

        @media (min-width: 1024px) {
            .imagen {
                height: 340px;
            }
        }

        @media screen and (max-width: 720px) {
            .w-50 {
                width: 100% !important;
            }

            #oferta .swiper {
                width: 95%;
            }

            .text-container {
                margin: auto;
                width: 93.95%;
            }

            .btn-navbar-toggler {
                display: flex;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg bg-secundario">
        <div class="container-fluid">
            <a class="navbar-brand text-oscuro" href="#">
                <img src="assets/img/delivery.png" width="45" height="45" class="d-inline-block align-text-top" alt="">
            </a>
            <label class="text-center fw-bold" for="">Delivery</label>
            <button class="btn-navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class='bx bx-grid-alt text-rosa fs-1'></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- para la barra de busqueda-->
                <form class="d-flex ms-auto w-50">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-buscar" type="submit"><i class='bx bx-search-alt-2'></i></button>
                </form>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-rosa" aria-current="page" href="">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-rosa" aria-current="page" href="" data-bs-toggle="modal" data-bs-target="#frmLogin">Iniciar Sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-rosa" aria-current="page" href="" data-bs-toggle="modal" data-bs-target="#frmRegistro">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mb-4">
        <section class="cabecera mt-2">
            <div class="swiper" id="banner">
                <div class="swiper-wrapper">
                    <!-- para colocar elementos del slider -->
                    <div class="swiper-slide">
                        <img class="imagen2" src="assets/img/banner-hamburgesa.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="imagen2" src="assets/img/banner-hamburgesa.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="imagen2" src="assets/img/banner-hamburgesa.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="imagen2" src="assets/img/banner-hamburgesa.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="imagen2" src="assets/img/banner-hamburgesa.png" alt="">
                    </div>
                </div>
                <!-- para la paginacion del slider (los puntitos) -->
                <div class="swiper-pagination"></div>

                <!-- para los botones de navegacion del slider (las flechas) -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
        </section>

        <section id="oferta" class="pt-3 mt-4 pb-3">

            <div class="swiper" id="ofertas">
                <div class="swiper-wrapper mb-3">
                    <!-- para elementos del slider que mostraran algunos productos -->
                    <?php for ($i = 1; $i <= 8; $i++) { ?>
                        <div class="swiper-slide tarjeta redondear bg-b">
                            <div class="container">
                                <img class="img-card" src="assets/img/hamburguesa.webp" alt="">
                                <hr>
                                <div>
                                    <label class="fw-bold" for="">S./ 20.00</label>
                                    <label class="text-success fs-8" for="">22% OFF</label>
                                </div>
                                <div>
                                    <label class="text-success" for="">ENVIO GRATIS</label>
                                </div>
                                <div>
                                    <p>Rica hamburguesa de carne hecha en plancha bañada en aceite de oliva</p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- para las flechistas que permiten avanzar y retroceder el slider -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
        </section>

        <!-- para la seccion de ofertas del dia -->
        <?php for ($i = 1; $i <= 3; $i++) { ?>
            <div class="container mb-3">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <img src="assets/img/anticucho.jpg" class="img-card" alt="">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 bg-black text-container">
                        <div class="p-3">
                            <p>OFERTAS DEL DIA</p>
                            <h3 class="text-wrap w-75">APROVECHA LAS MEJORES OFERTAS</h3>
                            <p>Ver Más ...</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- para los modales -->
        <?php require_once('frontend/clienteLogin.php') ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const banner = new Swiper('#banner', {
            // Parametros para el slider
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 2500,
                pauseOnMouseEnter: true,
                disableOnInteraction: false,
            },

            // para la paginacion del slider (los puntitos)
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },

            // para los botones de navegacion del slider (las flechas)
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        const ofertas = new Swiper('#ofertas', {
            // parametros para el slider
            slidesPerView: 'auto',
            spaceBetween: 25,
            direction: 'horizontal',
            loop: true,

            // para los botones de navegacion del slider (las flechas)
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="assets/js/menu/activarDarkmode.js"></script>
    <script>
        var input = document.getElementById('celular');
        input.addEventListener('input', function() {
            if (this.value.length > 9)
                this.value = this.value.slice(0, 9);
        })
    </script>
</body>

</html>