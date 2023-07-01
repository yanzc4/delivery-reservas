<?php

function insertarUsuario($conexion, $datos){
    $query = "INSERT INTO usuarios (user, pass, nombre, email, telefono, f_nacimiento, rol, direccion) VALUES ('$datos[user]', '$datos[pass]', '$datos[nombre]', '$datos[email]', '$datos[telefono]', '$datos[f_nacimiento]', '$datos[rol]', '$datos[direccion]')";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function mostrarUsuario($conexion, $buscar){
    $query = "SELECT * FROM usuarios WHERE nombre like lower ('%" . $buscar . "%')";
    $resultado = $conexion->query($query);
    return $resultado;
}

function actualizarUsuario($conexion, $datos){
    $query = "UPDATE usuarios SET user = '$datos[user]', pass = '$datos[pass]', nombre = '$datos[nombre]', email = '$datos[email]', telefono = '$datos[telefono]', f_nacimiento = '$datos[f_nacimiento]', rol = '$datos[rol]', direccion = '$datos[direccion]' WHERE id = '$datos[id]'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function eliminarUsuario($conexion, $id){
    $query = "DELETE FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

?>