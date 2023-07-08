<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Document</title>
    <style>
        .btn-navbar-toggler {
            display: none;
            background: transparent;
            border: none;
        }

        .height-100 {
            height: 70vh;
        }

        .bg-secundario {
            background-color: #f7f7f7;
        }

        body {
            background-color: #f7f7f7;
        }

        .redondear {
            border-radius: 10px;
        }

        .bg-blanco {
            background-color: #fff;
        }

        .bg-rosa {
            background-color: #F97777;
            color: #fff;
        }

        @media screen and (max-width: 720px) {
            .w-50 {
                width: 100% !important;
            }

            .btn-navbar-toggler {
                display: flex !important;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg bg-blanco">
        <div class="container-fluid">
            <a class="navbar-brand text-oscuro" href="index.php">
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
                        <a class="nav-link text-dark" aria-current="page" href="index.php">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="height-100 container position-relative">
        <div class="container w-50 bg-blanco redondear position-absolute top-50 start-50 translate-middle">
            <div class="container">
                <h4 class="pt-4 pb-1">Recuperar tu cuenta</h4>
                <hr>
                <p>Ingresa tu correo electronico con el cual creaste tu cuenta para buscar tus credenciales.</p>
                <form method="post" id="frmRecuperar">
                    <div>
                        <input type="email" class="form-control pt-2 pb-2" name="correo" placeholder="Ingresa tu correo">
                    </div>
                    <hr>
                    <div class="text-end mb-4 mt-4">
                        <a class="btn btn-secondary" href="index.php">Cancelar</a>
                        <button class="btn bg-rosa" id="btnRecuperar">Recuperar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <?php require_once('frontend/footer.php') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/login/recuperarPass.js"></script>
</body>

</html>