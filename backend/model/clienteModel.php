<?php

function insertarCliente($conexion, $datos){
    $query = "INSERT INTO clientes (user, pass, nombre, apellido, telefono, f_nacimiento, direccion, email) VALUES ('$datos[user]', '$datos[pass]', '$datos[nombre]', '$datos[apellido]', '$datos[telefono]', '$datos[f_nacimiento]', '$datos[direccion]', '$datos[email]')";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function mostrarCliente($conexion){
    $query = "SELECT * FROM clientes";
    $resultado = $conexion->query($query);
    return $resultado;
}

function actualizarCliente($conexion, $datos){
    $query = "UPDATE clientes SET user = '$datos[user]', pass = '$datos[pass]', nombre = '$datos[nombre]', apellido = '$datos[apellido]', telefono = '$datos[telefono]', f_nacimiento = '$datos[f_nacimiento]', direccion = '$datos[direccion]', email = '$datos[email]' WHERE id = '$datos[id]'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function eliminarCliente($conexion, $id){
    $query = "DELETE FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}
