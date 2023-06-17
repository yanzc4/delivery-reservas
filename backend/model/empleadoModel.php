<?php
//funcion para crud
function insertarEmpleado($conexion, $datos){
    $query = "INSERT INTO prueba (nombre, cel, dni) VALUES ('$datos[nombre]', '$datos[cel]', '$datos[dni]')";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function mostrarEmpleado($conexion, $buscar){
    $query = "SELECT * FROM prueba WHERE nombre like lower ('%" . $buscar . "%')";
    $resultado = $conexion->query($query);
    return $resultado;
}

function actualizarEmpleado($conexion, $datos){
    $query = "UPDATE prueba SET nombre = '$datos[nombre]', cel = '$datos[cel]', dni = '$datos[dni]' WHERE id = '$datos[id]'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}

function eliminarEmpleado($conexion, $id){
    $query = "DELETE FROM prueba WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);
    return $resultado;
}
?>