<?php
//funcion para crud de platos

function listarPlatos($conexion){
    $query = "call _listarplatos()";
    $resultado = $conexion->query($query);
    return $resultado;
}

function llenarSlider($conexion){
    $query = "SELECT * from productos ORDER by id DESC LIMIT 10";
    $resultado = $conexion->query($query);
    return $resultado;
}

function llenarBanner($conexion){
    $query = "SELECT * FROM ofertas where tipo='banner'";
    $resultado = $conexion->query($query);
    return $resultado;
}

function llenarOfertas($conexion){
    $query = "SELECT * FROM ofertas where tipo='oferta'";
    $resultado = $conexion->query($query);
    return $resultado;
}

?>