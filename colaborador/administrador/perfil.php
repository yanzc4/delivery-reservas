<?php
$cabecera = "Perfil";


session_start();
$usuarioColaborador = $_SESSION['usuarioc'];
$passwordColaborador = $_SESSION['passwordc'];
$rolColaborador = $_SESSION['rolc'];
$idColaborador = $_SESSION['idc'];
$nombreColaborador = $_SESSION['nombrec'];
$emailColaborador = $_SESSION['emailc'];
$telefonoColaborador = $_SESSION['telefonoc'];
$f_nacimientoColaborador = $_SESSION['f_nacimientoc'];
$imagenColaborador = $_SESSION['imagenc'];
$direccionColaborador = $_SESSION['direccionc'];
$estadoColaborador = $_SESSION['estadoc'];

if ($rolColaborador == "Delivery") {
    header("location: delivery");
} elseif ($rolColaborador == "Monitoreo") {
    header("location: monitoreo");
} elseif (!isset($rolColaborador)) {
    header("location: ../");
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../assets/css/perfil.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../../assets/css/cliente/cabecera.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: transparent;
        }

        .bg-modal1 {
            background: #18191a;
            color: #ccc;
        }

        .seccion-perfil-usuario {
            background: transparent;
        }
    </style>
</head>

<body>

    <!--==========================
=            html            =
===========================-->
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="../../assets/img/delivery.png" alt="img-avatar">
                    <button type="button" class="boton-avatar">
                        <i class="far fa-image"></i>
                    </button>
                </div>
                <button type="button" class="boton-portada">
                    <i class="far fa-image"></i> Cambiar fondo
                </button>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo $nombreColaborador ?></h3>
                <p class="texto">Trabajador activo del restaurante boomerang, desarrollando el cargo de <?php echo $rolColaborador ?>,
                    su codigo de empleado el cual le asigno el sistema es <?php echo $idColaborador ?>
                </p>
            </div>
            <div class="perfil-usuario-footer pb-0">
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-signs"></i><label>Direccion de usuario:</label></li>
                    <li><i class="icono fas fa-phone-alt"></i><label>Telefono: <?php echo $telefonoColaborador ?></label></li>
                    <li><i class="icono fas fa-briefcase"></i><label>Trabaja en: Boomerang</label></li>
                    <li><i class="icono fas fa-building"></i><label> Cargo: <?php echo $rolColaborador ?></label></li>
                </ul>
                <ul class="lista-datos pb-0">
                    <li><i class="icono fas fa-location"></i><label>Ubicacion.</label></li>
                    <li><i class="icono fas fa-calendar-alt"></i><label>Fecha nacimiento.</label></li>
                    <li><i class="icono fas fa-user-alt"></i><label>Registro.</label></li>
                    <li>
                        <i class="icono fas fa-unlock-alt"></i><label>Contraseña</label>
                        <button class="btn-modal" data-bs-toggle="modal" data-bs-target="#modalCambiarPass"><i class="fas fa-edit" style="color:#317FFF;"></i></button>
                    </li>
                </ul>
            </div>
            <div class="redes-sociales">
                <a href="#" class="boton-redes facebook fab fa-facebook-f"><i class="icon-facebook"></i></a>
                <a href="#" class="boton-redes twitter fab fa-twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="boton-redes instagram fab fa-instagram"><i class="icon-instagram"></i></a>
            </div>
        </div>
    </section>
    <!--====  End of html  ====-->


    <!--====  Modal  ====-->
    <div class="modal fade" id="modalCambiarPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-modal1">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="cambiarPass">
                        <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                        <input type="hidden" id="name" name="name" value="<?php echo $nombre ?>">
                        <input type="hidden" id="apellido" name="apellido" value="<?php echo $apellido ?>">
                        <input type="hidden" id="celular" name="celular" value="<?php echo $cel ?>">
                        <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario ?>">
                        <input type="hidden" id="nacimiento" name="nacimiento" value="<?php echo $nacimiento ?>">
                        <label class="form-label">Contraseña: </label>
                        <input type="text" class="form-control" id="pass" name="pass" value="">
                        <input type="hidden" id="nivel" name="nivel" value="<?php echo $rol ?>">
                        <button id="btnpass" class="btn-rosa mt-3">cambiar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../../assets/js/administrador/activarModoOscuro.js"></script>
</body>

</html>