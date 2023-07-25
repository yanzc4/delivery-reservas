<?php
$cabecera="Pedidos";

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
    <title>|Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/cliente/cabecera.css">
    <style>
        .img3 {
            width: 100%;
            height: 120px;
            background: var(--color-imagen);
            margin-top: 0.4rem;
            margin-bottom: 0.4rem;
            border-radius: 10px;
            box-shadow: 0px 24px 32px -8px rgba(0, 0, 0, 0.08);
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
    <div class="container" id="carritoContenedor">>
        
    </div>
    
    <script src="../assets/js/menu/activarDarkmode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        const idCliente = '<?php echo $idCliente ?>';
    </script>
    <script src="../assets/js/controladores/carritoFunciones.js"></script>
</body>

</html>