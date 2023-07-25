<?php
//funcion para crud de platos

function listarPlatos($conexion){
    $query = "call _listarplatos()";
    $resultado = $conexion->query($query);
    return $resultado;
}

function llenarSlider($conexion){
    $query = "SELECT * from productos where estado=1 ORDER by id DESC LIMIT 10";
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

function agregarPlatosAdmin($conexion, $datos, $destinodb){
    $query = "insert into productos(nombre, precio, descripcion, imagen, id_categoria, estado) values ('$datos[nombre]', '$datos[precio]', '$datos[descripcion]', '$destinodb', '$datos[id_categoria]', 1)";
    $resultado = $conexion->query($query);
    return $resultado;
}

function editarPlatoAdmin($conexion, $datos){
    $query = "update productos set nombre='$datos[nombre]', precio='$datos[precio]', descripcion='$datos[descripcion]' where id='$datos[id]'";
    $resultado = $conexion->query($query);
    return $resultado;
}

function eliminarPlatoAdmin($conexion, $id){
    $query = "update productos set estado=0 where id='$id'";
    $resultado = $conexion->query($query);
    return $resultado;
}

?>