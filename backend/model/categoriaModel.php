<?php

function insertarCategoria($conexion, $datos){
    $query = "INSERT INTO categorias (nombre) VALUES ('$datos[nombre]')";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function mostrarCategoria($conexion){
    $query = "SELECT * FROM categorias";
    $resultado = $conexion->query($query);
    return $resultado;
}

function actualizarCategoria($conexion, $datos){
    $query = "UPDATE categorias SET nombre = '$datos[nombre]' WHERE id = '$datos[id]'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function eliminarCategoria($conexion, $id){
    $query = "DELETE FROM categorias WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

?>