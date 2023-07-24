<?php
include_once "../model/usuarioModel.php";
include_once "../../inc/conexion.php";
session_start();
    $conexion = conectar();
    $datos = array(
        "user" => $_POST['loginUser'],
        "pass" => $_POST['loginPassword']
    );
    $resultado = loguearColaborador($conexion, $datos);
    $array = $resultado->fetch_assoc();

    if ($array > 0) {
        $_SESSION['id'] = $array["id"];
        $_SESSION['usuario'] = $array["user"];
        $_SESSION['password'] = $array["pass"];
        $_SESSION['nombre'] = $array["nombre"];
        $_SESSION['email'] = $array["email"];
        $_SESSION['telefono'] = $array["telefono"];
        $_SESSION['f_nacimiento'] = $array["f_nacimiento"];
        $_SESSION['rol'] = $array["rol"];
        $_SESSION['imagen'] = $array["imagen"];
        $_SESSION['direccion'] = $array["direccion"];
        $_SESSION['estado'] = $array["estado"];

        if ($array['rol']=="Administrador") {
            header("location: ../../colaborador/administrador");
        }elseif ($array['rol']=="Delivery") {
            header("location: ../../colaborador/delivery");
        }elseif ($array['rol']=="Monitoreo") {
            header("location: ../../colaborador/monitoreo");
        }
    }else {
        header("location: ../../colaborador");
    }
