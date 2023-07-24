<?php
//funcion para crud
function agregarCarrito($conexion, $datos){
    $query = "INSERT INTO carrito (id_cliente, id_producto, cantidad, precio) VALUES ('$datos[id_cliente]', '$datos[id_producto]', 1, '$datos[precio]')";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function mostrarCarrito($conexion, $buscar){
    $query = "CALL _listarmicarrito($buscar)";
    $resultado = $conexion->query($query);
    return $resultado;
}

function actualizarCarrito($conexion, $datos){
    $query = "UPDATE carrito SET cantidad='$datos[cantidad]' WHERE id_cliente = '$datos[id_cliente]' AND id_producto = '$datos[id_producto]'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function eliminarProducto($conexion, $idc, $idp){
    $query = "DELETE FROM carrito WHERE id_cliente='$idc' AND id_producto='$idp'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

//funcion para comprobar si un producto ya esta en el carrito
function comprobarCarrito($conexion, $idc, $idp){
    $query = "SELECT * FROM carrito WHERE id_cliente = '$idc' AND id_producto = '$idp'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

//pasos para crear un pedido
//funcion para crear un pedido
function crearVenta($conexion, $idc, $fecha, $vlat, $vlng){
    $query = "CALL _crearventa2($idc, '$fecha', '$vlat', '$vlng')";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

//funcion para eliminar el carrito
function eliminarCarrito($conexion, $id){
    $query = "DELETE FROM carrito WHERE id_cliente='$id'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

?>