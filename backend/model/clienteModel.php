<?php
//funcion para crud
function insertarCliente($conexion, $datos){
    $resultado = $conexion->query("call _agregarcliente ('$datos[user]', '$datos[pass]', '$datos[nombre]', '$datos[apellido]', '$datos[telefono]', '$datos[correo]', '$datos[fecha]', '$datos[direccion]')");
    return $resultado;
}

function loguearCliente($conexion, $datos){
    $query = "call _loguearcliente('$datos[user]', '$datos[pass]')";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function actualizarCliente($conexion, $datos){
    $query = "UPDATE prueba SET nombre = '$datos[nombre]', cel = '$datos[cel]', dni = '$datos[dni]' WHERE id = '$datos[id]'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function eliminarCliente($conexion, $id){
    $query = "DELETE FROM prueba WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}
?>