<?php


function mostrarUsuario($conexion, $buscar){
    $query = "SELECT * FROM usuarios WHERE nombre like lower ('%" . $buscar . "%')";
    $resultado = $conexion->query($query);
    return $resultado;
}


?>