<?php

function listarOrdenes($conexion){
    $query = "call _listarnuevasordenes()";
    $resultado = $conexion->query($query);
    return $resultado;
}

function asignarRepartidor($conexion, $datos){
    $query = "update ubicaciontemporal set id_trabajador='$datos[id_trabajador]' where id_cliente='$datos[id_cliente]' and id_pedido='$datos[id_pedido]'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}
?>