<?php
include_once "../model/clienteModel.php";
include_once "../../inc/conexion.php";


function addCliente()
{
    $conexion = conectar();
    //validar que los datos no esten vacios
    if (!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['celular']) && !empty($_POST['correo']) && !empty($_POST['fechaNacimiento']) && !empty($_POST['direccion'])) {
        $datos = array(
            "user" => $_POST['user'],
            "pass" => $_POST['password'],
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "telefono" => $_POST['celular'],
            "correo" => $_POST['correo'],
            "fecha" => $_POST['fechaNacimiento'],
            "direccion" => $_POST['direccion']
        );
        echo insertarCliente($conexion, $datos);
    }else{
        echo 0;
    }
}

function iniciarSesion()
{
    session_start();
    $conexion = conectar();
    $datos = array(
        "user" => $_POST['loginUser'],
        "pass" => $_POST['loginPassword']
    );
    $resultado = loguearCliente($conexion, $datos);
    if ($resultado->num_rows > 0) {
        echo 1;
    } else {
        echo 0;
    }
    $array = $resultado->fetch_assoc();
    if ($array > 0) {
        $_SESSION['id'] = $array["id"];
        $_SESSION['usuario'] = $array["user"];
        $_SESSION['password'] = $array["pass"];
        $_SESSION['nombre'] = $array["nombre"];
        $_SESSION['apellido'] = $array["apellido"];
        $_SESSION['foto'] = $array["foto"];
        $_SESSION['telefono'] = $array["telefono"];
        $_SESSION['correo'] = $array["correo"];
        $_SESSION['fecha'] = $array["f_nacimiento"];
        $_SESSION['direccion'] = $array["direccion"];
    }
}



if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
