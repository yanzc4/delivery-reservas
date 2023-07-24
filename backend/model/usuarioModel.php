<?php

function insertarUsuario($conexion, $datos){
    $query = "INSERT INTO usuarios (user, pass, nombre, email, telefono, f_nacimiento, rol, imagen, direccion, estado) VALUES ('$datos[user]', '$datos[pass]', '$datos[nombre]', '$datos[email]', '$datos[telefono]', '$datos[f_nacimiento]', '$datos[rol]', 'database/img/usuario4532.png', '$datos[direccion]', 1)";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function mostrarUsuario($conexion, $buscar){
    $query = "SELECT * FROM usuarios WHERE estado=1 and nombre like lower ('%" . $buscar . "%') ORDER BY id DESC LIMIT 6";
    $resultado = $conexion->query($query);
    return $resultado;
}

function actualizarUsuario($conexion, $datos){
    $query = "UPDATE usuarios SET user = '$datos[user]', pass = '$datos[pass]', nombre = '$datos[nombre]', email = '$datos[email]', telefono = '$datos[telefono]', f_nacimiento = '$datos[f_nacimiento]', direccion = '$datos[direccion]' WHERE id = '$datos[id]'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function eliminarUsuario($conexion, $id){
    $query = "UPDATE usuarios set estado=0 WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function loguearColaborador($conexion, $datos){
    $query = "call _loguearusuario('$datos[user]', '$datos[pass]')";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}
?>