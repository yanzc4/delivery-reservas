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
        $_SESSION['idc'] = $array["id"];
        $_SESSION['usuarioc'] = $array["user"];
        $_SESSION['passwordc'] = $array["pass"];
        $_SESSION['nombrec'] = $array["nombre"];
        $_SESSION['emailc'] = $array["email"];
        $_SESSION['telefonoc'] = $array["telefono"];
        $_SESSION['f_nacimientoc'] = $array["f_nacimiento"];
        $_SESSION['rolc'] = $array["rol"];
        $_SESSION['imagenc'] = $array["imagen"];
        $_SESSION['direccionc'] = $array["direccion"];
        $_SESSION['estadoc'] = $array["estado"];

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
