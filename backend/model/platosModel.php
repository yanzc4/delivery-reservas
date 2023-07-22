<?php
//funcion para crud de platos

function listarPlatos($conexion){
    $query = "call _listarplatos()";
    $resultado = $conexion->query($query);
    return $resultado;
}

?>